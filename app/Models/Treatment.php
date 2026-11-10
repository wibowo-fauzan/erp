<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'filter',
        'category',
        'price',
        'price_label',
        'duration_minutes',
        'description',
        'image',
        'action',
        'is_primary',
        'alt',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_primary' => 'boolean',
    ];

    public function hasDependents(): bool
    {
        return Booking::where('treatment_slug', $this->slug)->exists();
    }

    public function deactivate(): void
    {
        $this->update(['is_active' => false]);
    }
}
