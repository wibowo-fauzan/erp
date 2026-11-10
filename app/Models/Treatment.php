<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'product_ids',
        'is_primary',
        'alt',
        'show_detail_button',
        'show_booking_button',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_primary' => 'boolean',
        'show_detail_button' => 'boolean',
        'show_booking_button' => 'boolean',
        'product_ids' => 'array',
    ];

    protected static function booted(): void
    {
        static::creating(function ($treatment) {
            if (empty($treatment->slug)) {
                $treatment->slug = self::generateSlug($treatment->filter, $treatment->name);
            }
        });

        static::updating(function ($treatment) {
            $treatment->slug = self::generateSlug($treatment->filter, $treatment->name, $treatment->id);
        });
    }

    public static function generateSlug(?string $filter, ?string $name, ?int $excludeId = null): string
    {
        $base = trim((string) $filter . ' ' . (string) $name);
        $slug = Str::slug($base);

        if (empty($slug)) {
            $slug = 'treatment';
        }

        $query = self::query()->where('slug', 'like', $slug . '%');

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $existing = $query->pluck('slug')->all();

        if (! in_array($slug, $existing, true)) {
            return $slug;
        }

        $counter = 2;
        while (in_array($slug . '-' . $counter, $existing, true)) {
            $counter++;
        }

        return $slug . '-' . $counter;
    }

    public function hasDependents(): bool
    {
        return Booking::where('treatment_slug', $this->slug)->exists();
    }

    public function deactivate(): void
    {
        $this->update(['is_active' => false]);
    }
}
