<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\BookingNotificationService;
use App\Services\MidtransService;
use Illuminate\Http\Request;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request, MidtransService $midtransService, BookingNotificationService $notificationService)
    {
        $notification = $midtransService->handleNotification($request->getContent());

        $booking = Booking::query()->where('reference', $notification['order_id'])->first();

        if (! $booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $oldPaymentStatus = $booking->payment_status;

        $booking->update([
            'midtrans_transaction_id' => $notification['transaction_id'],
            'midtrans_payment_type' => $notification['payment_type'],
            'midtrans_transaction_status' => $notification['transaction_status'],
            'midtrans_va_number' => $notification['va_numbers'][0]['va_number'] ?? null,
            'midtrans_qr_string' => $notification['qr_string'],
            'midtrans_response' => $request->getContent(),
        ]);

        if ($notification['transaction_status'] === 'capture' || $notification['transaction_status'] === 'settlement') {
            $booking->update([
                'payment_status' => 'dikonfirmasi',
                'midtrans_paid_at' => now(),
            ]);
        } elseif ($notification['transaction_status'] === 'deny' || $notification['transaction_status'] === 'expire' || $notification['transaction_status'] === 'cancel') {
            $booking->update([
                'payment_status' => 'ditolak',
            ]);
        }

        if ($oldPaymentStatus !== $booking->payment_status) {
            if ($booking->payment_status === 'dikonfirmasi') {
                $notificationService->sendPaymentVerified($booking);
            } elseif ($booking->payment_status === 'ditolak') {
                $notificationService->sendPaymentRejected($booking);
            }
        }

        return response()->json(['message' => 'OK']);
    }
}
