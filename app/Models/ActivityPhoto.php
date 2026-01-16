<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityPhoto extends Model
{
    protected $table = 'activity_photos';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('created_at', 'desc')->orderBy('urutan');
    }

    protected static function booted(): void
    {
        // Clear home cache when foto kegiatan is created, updated, or deleted
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
