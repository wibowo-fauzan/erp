<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'treatment_slug',
        'discount_amount',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'discount_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function hasDependents(): bool
    {
        return Booking::where('promotion_code', $this->code)->exists();
    }

    public function deactivate(): void
    {
        $this->update(['is_active' => false]);
    }
}
