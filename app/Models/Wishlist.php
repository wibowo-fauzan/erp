<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'treatment_slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'treatment_slug', 'slug');
    }
}
