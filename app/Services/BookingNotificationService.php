<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Facades\Http;

class BookingNotificationService
{
    public function sendBookingStatusUpdate(Booking $booking, string $newStatus): void
    {
        if (empty($booking->phone)) {
            return;
        }

        $statusLabels = [
            'menunggu_konfirmasi' => 'Menunggu Konfirmasi',
            'dikonfirmasi' => 'Dikonfirmasi',
            'selesai' => 'Selesai',
            'dibatalkan' => 'Dibatalkan',
        ];

        $label = $statusLabels[$newStatus] ?? $newStatus;

        $message = "Halo {$booking->name}, booking treatment Anda dengan kode *{$booking->reference}* telah berubah status menjadi: *{$label}*. Terima kasih telah memilih Octa Beauty Care.";

        $this->sendWhatsApp($booking->phone, $message);
    }

    public function sendPaymentVerified(Booking $booking): void
    {
        if (empty($booking->phone)) {
            return;
        }

        $message = "Halo {$booking->name}, pembayaran booking *{$booking->reference}* telah diverifikasi. Status pembayaran sekarang: *Dikonfirmasi*. Kami akan segera menindaklanjuti booking Anda. Terima kasih.";

        $this->sendWhatsApp($booking->phone, $message);
    }

    public function sendPaymentRejected(Booking $booking): void
    {
        if (empty($booking->phone)) {
            return;
        }

        $message = "Halo {$booking->name}, pembayaran booking *{$booking->reference}* tidak dapat diverifikasi. Silakan hubungi kami atau upload bukti pembayaran yang valid. Terima kasih.";

        $this->sendWhatsApp($booking->phone, $message);
    }

    private function sendWhatsApp(string $phone, string $message): void
    {
        // Normalisasi nomor telepon (hilangkan spasi, tanda hubung, tambahkan 62 jika dimulai 0)
        $normalized = preg_replace('/[\s\-]/', '', $phone);
        if (str_starts_with($normalized, '0')) {
            $normalized = '62' . substr($normalized, 1);
        }

        $url = 'https://wa.me/' . $normalized . '?' . http_build_query(['text' => $message]);

        try {
            Http::get($url);
        } catch (\Throwable $e) {
            \Log::error('Gagal mengirim notifikasi WhatsApp: ' . $e->getMessage());
        }
    }
}
