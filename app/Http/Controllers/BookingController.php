<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Promotion;
use App\Models\Treatment;
use App\Services\BookingAvailabilityService;
use App\Services\MidtransService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BookingController extends Controller
{
    protected BookingAvailabilityService $availability;

    public function __construct(BookingAvailabilityService $availability)
    {
        $this->availability = $availability;
    }

    public function create(Request $request): View|RedirectResponse
    {
        if (auth()->check() && (empty(auth()->user()->phone) || empty(auth()->user()->address))) {
            return redirect()->route('profile')->with('error', 'Lengkapi data profil Anda (telepon & alamat) sebelum booking.');
        }

        $treatments = Treatment::query()->where('is_active', true)->get()->map(fn ($t) => [
            'slug' => $t->slug,
            'filter' => $t->filter,
            'category' => $t->category,
            'title' => $t->name,
            'description' => $t->description,
            'duration' => $t->duration_minutes,
            'price' => $t->price,
            'price_label' => $t->price_label ?? $t->price,
            'action' => $t->action,
            'primary' => $t->is_primary,
            'image' => $t->image ? (str_starts_with($t->image, 'http') ? $t->image : '/storage/' . $t->image) : null,
            'alt' => $t->alt,
        ])->all();
        $promotions = config('promotions');
        $selectedTreatment = collect($treatments)->firstWhere('slug', old('treatment_slug', $request->query('treatment')))
            ?? ($treatments[0] ?? null);
        $selectedPromotion = collect($promotions)->firstWhere('slug', old('promotion_slug', $request->query('promo')));
        $minimumDate = now('Asia/Jakarta')->toDateString();
        $maximumDate = now('Asia/Jakarta')->addMonths(2)->toDateString();
        $selectedDate = old('booking_date', $minimumDate);
        $parsedSelectedDate = is_string($selectedDate) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $selectedDate)
            ? Carbon::createFromFormat('!Y-m-d', $selectedDate)
            : false;

        if ($parsedSelectedDate === false
            || $parsedSelectedDate->format('Y-m-d') !== $selectedDate
            || $selectedDate < $minimumDate
            || $selectedDate > $maximumDate) {
            $selectedDate = $minimumDate;
        }

        $availableDates = $this->availability->getAvailableDatesInRange($minimumDate, $maximumDate);
        $blockedDates = $this->availability->getBlockedDatesReasons($minimumDate, $maximumDate);

        $user = auth()->user();

        return view('booking', [
            'treatments' => $treatments,
            'availableTimes' => $this->availability->availableTimes($selectedDate),
            'selectedTreatment' => $selectedTreatment,
            'selectedPromotion' => $selectedPromotion,
            'minimumDate' => $minimumDate,
            'maximumDate' => $maximumDate,
            'selectedDate' => $selectedDate,
            'availableDates' => $availableDates,
            'blockedDates' => $blockedDates,
            'userName' => $user?->name ?? '',
            'userEmail' => $user?->email ?? '',
            'userPhone' => $user?->phone ?? '',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        if (auth()->check() && (empty(auth()->user()->phone) || empty(auth()->user()->address))) {
            return redirect()->route('profile')->with('error', 'Lengkapi data profil Anda (telepon & alamat) sebelum booking.');
        }

        $treatmentSlugs = Treatment::query()->where('is_active', true)->pluck('slug')->all();
        $promotions = Promotion::query()
            ->where('is_active', true)
            ->get()
            ->map(fn ($p) => $p->toArray());
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30', 'regex:/^[0-9+().\-\s]{8,30}$/'],
            'treatment_slug' => ['required', 'string', Rule::in($treatmentSlugs)],
            'promotion_slug' => ['nullable', 'string', Rule::in($promotions->pluck('slug')->all())],
            'booking_date' => [
                'required',
                'date',
                'after_or_equal:'.now('Asia/Jakarta')->toDateString(),
                'before_or_equal:'.now('Asia/Jakarta')->addMonths(2)->toDateString(),
            ],
            'booking_time' => ['required', 'string', Rule::in($this->availability->availableTimes())],
            'notes' => ['nullable', 'string', 'max:1000'],
            'terms' => ['accepted'],
        ]);

        $promotion = $promotions->firstWhere('slug', $validated['promotion_slug'] ?? null);

        if ($promotion !== null && $promotion['treatment_slug'] !== $validated['treatment_slug']) {
            throw ValidationException::withMessages([
                'promotion_slug' => 'Promo ini tidak berlaku untuk treatment yang dipilih.',
            ]);
        }

        if ($this->availability->isTimeBlocked($validated['booking_date'], $validated['booking_time'])) {
            throw ValidationException::withMessages([
                'booking_time' => 'Waktu yang dipilih tidak tersedia. Silakan pilih jadwal lain.',
            ]);
        }

        $treatment = Treatment::query()->where('slug', $validated['treatment_slug'])->first();
        $price = $treatment ? (int) $treatment->price : 0;

        if ($price <= 0) {
            throw ValidationException::withMessages([
                'treatment_slug' => 'Treatment yang dipilih tidak memiliki harga yang valid.',
            ]);
        }

        $midtrans = new MidtransService;
        $midtransResult = null;
        $midtransError = null;
        try {
            $midtransResult = $midtrans->createTransaction([
                'order_id' => 'PENDING-'.Str::upper(Str::random(10)),
                'gross_amount' => $price,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ]);
        } catch (\Throwable $e) {
            \Log::error('Midtrans createTransaction failed: '.$e->getMessage());
            $midtransError = 'Sistem pembayaran sedang mengalami gangguan. Tim kami akan menghubungi Anda untuk konfirmasi pembayaran.';
        }

        $reference = $this->newReference();

        $booking = DB::transaction(function () use ($validated, $promotion, $reference, $price, $midtransResult) {
            return Booking::query()->create([
                'reference' => $reference,
                'user_id' => auth()->id(),
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'treatment_slug' => $validated['treatment_slug'],
                'promotion_code' => $promotion['code'] ?? null,
                'booking_date' => $validated['booking_date'],
                'booking_time' => $validated['booking_time'],
                'notes' => $validated['notes'] ?? null,
                'total_amount' => $price,
                'status' => 'menunggu_konfirmasi',
                'payment_status' => 'menunggu_verifikasi',
                'midtrans_order_id' => $reference,
                'midtrans_snap_token' => $midtransResult['snap_token'] ?? null,
                'midtrans_response' => is_array($midtransResult) ? json_encode($midtransResult) : null,
            ]);
        });

        if ($midtransError) {
            session()->flash('error', $midtransError);
        } else {
            session()->flash('snap_token', $midtransResult['snap_token'] ?? null);
            session()->flash('snap_redirect_url', $midtransResult['redirect_url'] ?? null);
        }

        return redirect()->route('booking.show', $booking->reference);
    }

    public function show(string $reference): View
    {
        $booking = Booking::query()
            ->where('reference', $reference)
            ->firstOrFail();

        $treatment = Treatment::query()->where('slug', $booking->treatment_slug)->first();

        abort_if($treatment === null, 404);

        $treatmentArray = [
            'slug' => $treatment->slug,
            'title' => $treatment->name,
            'description' => $treatment->description,
            'duration' => $treatment->duration_minutes,
            'price' => $treatment->price,
            'action' => $treatment->action,
            'image' => $treatment->image ? (str_starts_with($treatment->image, 'http') ? $treatment->image : '/storage/' . $treatment->image) : null,
            'alt' => $treatment->alt,
        ];

        $snapToken = $booking->midtrans_snap_token;

        return view('booking-confirmation', compact('booking', 'treatmentArray', 'snapToken'));
    }

    public function uploadPaymentProof(Request $request, string $reference): RedirectResponse
    {
        $booking = Booking::query()->where('reference', $reference)->firstOrFail();

        $validated = $request->validate([
            'payment_proof' => ['required', 'image', 'max:2048'],
        ]);

        $path = $request->file('payment_proof')->store('payment-proofs', 'public');

        $booking->update([
            'payment_proof' => $path,
            'payment_status' => 'menunggu_verifikasi',
        ]);

        return redirect()->route('booking.show', $booking->reference)->with('status', 'Bukti pembayaran berhasil diunggah.');
    }

    private function newReference(): string
    {
        do {
            $reference = 'OCTA-'.now('Asia/Jakarta')->format('Ymd').'-'.Str::upper(Str::random(10));
        } while (Booking::query()->where('reference', $reference)->exists());

        return $reference;
    }
}
