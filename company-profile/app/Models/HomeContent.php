<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_background',
        'services',
        'tagline',
    ];

    protected $casts = [
        'services' => 'array',
    ];
}
