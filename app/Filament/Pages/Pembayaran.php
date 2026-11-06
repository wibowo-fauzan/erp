<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use App\Models\Treatment;
use App\Services\BookingNotificationService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class Pembayaran extends Page
{
    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Pembayaran';

    protected static ?string $title = 'Verifikasi Pembayaran';

    protected static string $view = 'filament.pages.pembayaran';

    public static function canView(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function mount(): void
    {
        //
    }

    protected function getViewData(): array
    {
        $bookings = Booking::query()
            ->with('user')
            ->latest()
            ->get();

        return [
            'bookings' => $bookings,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function verifikasi(string $reference): \Illuminate\Http\RedirectResponse
    {
        $booking = Booking::query()->where('reference', $reference)->firstOrFail();
        $notificationService = app(BookingNotificationService::class);
        $oldStatus = $booking->payment_status;

        $booking->update([
            'payment_status' => 'dikonfirmasi',
            'verified_at' => now(),
        ]);

        if ($oldStatus !== $booking->payment_status && $booking->payment_status === 'dikonfirmasi') {
            $notificationService->sendPaymentVerified($booking);
        }

        return redirect()->route('filament.admin.pages.pembayaran')->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    public function tolak(string $reference): \Illuminate\Http\RedirectResponse
    {
        $booking = Booking::query()->where('reference', $reference)->firstOrFail();
        $notificationService = app(BookingNotificationService::class);
        $oldStatus = $booking->payment_status;

        $booking->update([
            'payment_status' => 'ditolak',
            'verified_at' => now(),
        ]);

        if ($oldStatus !== $booking->payment_status && $booking->payment_status === 'ditolak') {
            $notificationService->sendPaymentRejected($booking);
        }

        return redirect()->route('filament.admin.pages.pembayaran')->with('success', 'Pembayaran ditolak.');
    }
}
