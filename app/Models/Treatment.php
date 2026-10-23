<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = ['slug', 'name', 'filter', 'price', 'duration_minutes', 'description', 'image', 'is_active'];
}
