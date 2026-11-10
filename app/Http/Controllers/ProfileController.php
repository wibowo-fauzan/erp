<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Treatment;
use App\Services\MidtransService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $user = auth()->user();

        $query = $user->bookings()->with('treatment');

        $filter = $request->get('filter', 'all');
        match ($filter) {
            'unpaid' => $query->where('payment_status', 'menunggu_verifikasi'),
            'paid' => $query->where('payment_status', 'dikonfirmasi'),
            'failed' => $query->where('payment_status', 'ditolak'),
            default => null,
        };

        $bookings = $query->paginate(10)->withQueryString();

        $stats = [
            'total' => $user->bookings()->count(),
            'paid' => $user->bookings()->where('payment_status', 'dikonfirmasi')->count(),
            'unpaid' => $user->bookings()->where('payment_status', 'menunggu_verifikasi')->count(),
            'failed' => $user->bookings()->where('payment_status', 'ditolak')->count(),
        ];

        $treatments = Treatment::query()->where('is_active', true)->get()->keyBy('slug');

        return view('profile', compact('user', 'bookings', 'treatments', 'stats', 'filter'));
    }

    public function show(string $reference): View
    {
        $booking = Booking::query()
            ->with('treatment')
            ->where('user_id', auth()->id())
            ->where('reference', $reference)
            ->firstOrFail();

        return view('profile-detail', compact('booking'));
    }

    public function pay(string $reference, MidtransService $midtransService)
    {
        $booking = Booking::query()
            ->where('user_id', auth()->id())
            ->where('reference', $reference)
            ->firstOrFail();

        if ($booking->payment_status !== 'menunggu_verifikasi') {
            return response()->json(['error' => 'Transaksi tidak dapat dibayar ulang.'], 400);
        }

        $snapToken = $booking->midtrans_snap_token;

        if (empty($snapToken)) {
            $treatment = \App\Models\Treatment::query()->where('slug', $booking->treatment_slug)->first();
            $price = $treatment ? (int) $treatment->price : (int) $booking->total_amount;

            try {
                $result = $midtransService->createTransaction([
                    'order_id' => 'REPAY-'.$reference,
                    'gross_amount' => $price,
                    'name' => $booking->name,
                    'email' => $booking->email,
                    'phone' => $booking->phone,
                ]);
                $snapToken = $result['snap_token'] ?? null;
                $redirectUrl = $result['redirect_url'] ?? null;

                $booking->update([
                    'midtrans_order_id' => 'REPAY-'.$reference,
                    'midtrans_snap_token' => $snapToken,
                    'midtrans_response' => $redirectUrl ? json_encode(['redirect_url' => $redirectUrl]) : $booking->midtrans_response,
                ]);
            } catch (\Throwable $e) {
                Log::error('Re-payment Midtrans failed: '.$e->getMessage());
                return response()->json(['error' => 'Gagal membuat token pembayaran.'], 500);
            }
        }

        return response()->json(['snap_token' => $snapToken]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'avatar' => ['nullable', 'image', 'max:10240'],
            'remove_avatar' => ['sometimes', 'boolean'],
        ]);

        $user = auth()->user();

        if ($request->boolean('remove_avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = null;
        } elseif ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        } else {
            unset($data['avatar']);
        }

        unset($data['remove_avatar']);
        $user->update($data);

        return redirect()->route('profile')->with('status', 'Profil diperbarui.');
    }
}
