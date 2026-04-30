<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Partner extends Model
{
    /** @use HasFactory<\Database\Factories\PartnerFactory> */
    use HasFactory;

    protected $fillable = ['name', 'logo', 'website', 'category', 'order', 'is_active'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function getLogoAttribute(?string $value): ?string
    {
        if (! $value || Str::startsWith($value, ['http://', 'https://', '/'])) {
            return $value;
        }

        if (Str::startsWith($value, 'storage/')) {
            return '/'.$value;
        }

        return '/storage/'.$value;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
