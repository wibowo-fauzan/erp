<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\BookingNotificationService;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Midtrans\Config;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request, MidtransService $midtransService, BookingNotificationService $notificationService)
    {
        $this->verifyMidtransSignature($request);

        $notification = $midtransService->handleNotification();

        $booking = Booking::query()->where('reference', $notification['order_id'])->first();

        if (! $booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $oldPaymentStatus = $booking->payment_status;

        $booking->update([
            'midtrans_transaction_id' => $notification['transaction_id'],
            'midtrans_payment_type' => $notification['payment_type'],
            'midtrans_transaction_status' => $notification['transaction_status'],
            'midtrans_va_number' => isset($notification['va_numbers'][0]['va_number']) ? $notification['va_numbers'][0]['va_number'] : null,
            'midtrans_qr_string' => $notification['qr_string'] ?? null,
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

    private function verifyMidtransSignature(Request $request): void
    {
        $signatureKey = config('services.midtrans.signature_key');

        if (empty($signatureKey)) {
            abort(401, 'Midtrans signature key not configured');
        }

        $signature = $request->header('signature') ?? $request->input('signature');

        if (empty($signature)) {
            abort(401, 'Missing Midtrans signature');
        }

        $payload = json_decode($request->getContent(), true);

        $orderId = $payload['order_id'] ?? '';
        $statusCode = $payload['status_code'] ?? '';
        $grossAmount = $payload['gross_amount'] ?? '';
        $serverKey = config('services.midtrans.server_key');

        $expected = hash_hmac('sha512', $orderId . $statusCode . $grossAmount . $serverKey, false);

        if (! hash_equals($signature, $expected)) {
            abort(401, 'Invalid Midtrans signature');
        }
    }
}
