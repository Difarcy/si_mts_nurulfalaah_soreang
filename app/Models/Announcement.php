<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use Filterable;
    protected $table = 'announcements';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'urutan',
        'status',
        'author_name',
        'views_count',
    ];

    protected $casts = [
        'urutan' => 'integer',
        'tanggal' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'publish');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('tanggal', 'desc');
    }

    public function scopeSearch($query, ?string $term)
    {
        if (!$term) {
            return $query;
        }

        return $query->where('judul', 'like', "%{$term}%")
            ->orWhere('isi', 'like', "%{$term}%");
    }

    public function scopeStatusFilter($query, $status)
    {
        if ($status) {
            return $query->where('status', $status);
        }
        return $query;
    }

    protected static function booted(): void
    {
        // Clear home cache when pengumuman is created, updated, or deleted
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
