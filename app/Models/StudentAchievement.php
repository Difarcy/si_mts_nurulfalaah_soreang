<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAchievement extends Model
{
    protected $table = 'student_achievements';

    protected $fillable = [
        'judul',
        'nama_siswa',
        'kelas',
        'jenis_prestasi',
        'tingkat_prestasi',
        'deskripsi',
        'gambar',
        'foto_sertifikat',
        'tanggal_prestasi',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
        'tanggal_prestasi' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    protected static function booted(): void
    {
        // Clear home cache when prestasi siswa is created, updated, or deleted
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
