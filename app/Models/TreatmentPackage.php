<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentPackage extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'price',
        'duration_minutes',
        'treatment_ids',
        'image',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'duration_minutes' => 'integer',
        'treatment_ids' => 'array',
        'is_active' => 'boolean',
    ];

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class, 'treatment_package_items', 'package_id', 'treatment_id');
    }
}
