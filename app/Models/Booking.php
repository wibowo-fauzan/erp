<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'treatment_slug',
        'promotion_code',
        'booking_date',
        'booking_time',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
        ];
    }
}
