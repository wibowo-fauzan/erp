<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'code',
        'slug',
        'name',
        'eyebrow',
        'description',
        'treatment_slug',
        'discount_amount',
        'discount',
        'start_date',
        'end_date',
        'date',
        'validity',
        'minimum',
        'style',
        'image',
        'alt',
        'detail_title',
        'detail_description',
        'benefits',
        'terms',
        'is_active',
    ];

    protected $casts = [
        'discount_amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
        'benefits' => 'array',
        'terms' => 'array',
    ];

    protected $appends = ['title'];

    public function getTitleAttribute(): string
    {
        return $this->name;
    }

    public function hasDependents(): bool
    {
        return Booking::where('promotion_code', $this->code)->exists();
    }

    public function deactivate(): void
    {
        $this->update(['is_active' => false]);
    }
}
