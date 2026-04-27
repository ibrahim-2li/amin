<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_title_ar',
        'hero_subtitle',
        'hero_subtitle_ar',
        'hero_image',
        'home_title',
        'home_title_ar',
        'home_text',
        'home_text_ar',
        'home_image',
        'home_delivery_label',
        'home_delivery_label_ar',
        'home_delivery_text',
        'home_delivery_text_ar',
        'home_features',
        'home_features_ar',
        'purpose_title',
        'purpose_title_ar',
        'purpose_description',
        'purpose_description_ar',
        'mission',
        'mission_ar',
        'vision',
        'vision_ar',
        'backing',
        'backing_ar',
        'values',
        'values_ar',
    ];

    protected function casts(): array
    {
        return [
            'values' => 'array',
            'values_ar' => 'array',
            'home_features' => 'array',
            'home_features_ar' => 'array',
        ];
    }


}
