<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'reference',
        'user_id',
        'name',
        'email',
        'phone',
        'treatment_slug',
        'promotion_code',
        'booking_date',
        'booking_time',
        'total_amount',
        'notes',
        'status',
        'payment_status',
        'payment_proof',
        'verified_at',
        'midtrans_order_id',
        'midtrans_snap_token',
        'midtrans_transaction_id',
        'midtrans_payment_type',
        'midtrans_transaction_status',
        'midtrans_va_number',
        'midtrans_qr_string',
        'midtrans_response',
        'midtrans_paid_at',
    ];

    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
            'total_amount' => 'decimal:2',
            'verified_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
