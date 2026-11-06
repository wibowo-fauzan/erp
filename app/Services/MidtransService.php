<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$clientKey = config('services.midtrans.client_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    public function createTransaction(array $data): array
    {
        $params = [
            'transaction_details' => [
                'order_id' => $data['order_id'],
                'gross_amount' => (int) $data['gross_amount'],
            ],
            'customer_details' => [
                'first_name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ],
            'enabled_payments' => [
                'bank_transfer',
                'echannel',
                'qris',
                'gopay',
                'shopeepay',
            ],
        ];

        $result = Snap::createTransaction($params);

        return [
            'snap_token' => $result->token,
            'redirect_url' => $result->redirect_url,
        ];
    }

    public function handleNotification(string $json): array
    {
        $notification = new Notification();

        return [
            'order_id' => $notification->order_id,
            'transaction_status' => $notification->transaction_status,
            'payment_type' => $notification->payment_type,
            'transaction_id' => $notification->transaction_id,
            'va_numbers' => $notification->va_numbers,
            'qr_string' => $notification->qr_string ?? null,
            'fraud_status' => $notification->fraud_status,
        ];
    }
}
