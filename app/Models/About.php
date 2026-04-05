<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'home_title',
        'home_text',
        'home_image',
        'purpose_title',
        'purpose_description',
        'mission',
        'vision',
        'backing',
        'values',
    ];

    protected function casts(): array
    {
        return [
            'values' => 'array',
        ];
    }
}
