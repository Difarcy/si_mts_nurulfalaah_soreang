<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'judul',
        'tagline',
        'deskripsi',
        'gambar',
        'link',
        'button_text',
        'urutan',
        'is_active',
        'show_logo',
        'show_tagline',
        'show_title',
        'show_description',
        'show_button',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_logo' => 'boolean',
        'show_tagline' => 'boolean',
        'show_title' => 'boolean',
        'show_description' => 'boolean',
        'show_button' => 'boolean',
        'urutan' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('created_at', 'asc');
    }

    protected static function booted(): void
    {
        // Clear home cache when banner is created, updated, or deleted
        static::created(function () {
            app(\App\Domain\Content\Services\HomeDataService::class)->clearCacheOnContentUpdate();
        });

        static::updated(function () {
            app(\App\Domain\Content\Services\HomeDataService::class)->clearCacheOnContentUpdate();
        });

        static::deleted(function () {
            app(\App\Domain\Content\Services\HomeDataService::class)->clearCacheOnContentUpdate();
        });
    }
}
