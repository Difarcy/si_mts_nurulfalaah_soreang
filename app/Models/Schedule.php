<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'agendas';

    protected $fillable = [
        'judul',
        'author_name',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'urutan',
        'status',
        'published_at',
        'views_count',
    ];

    protected $casts = [
        'urutan' => 'integer',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'published_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'publish');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('tanggal_mulai', 'asc');
    }

    protected static function booted(): void
    {
        // Clear home cache when agenda is created, updated, or deleted
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
