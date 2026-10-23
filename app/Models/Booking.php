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
        'notes',
        'status',
        'payment_status',
        'payment_proof',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
            'verified_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
