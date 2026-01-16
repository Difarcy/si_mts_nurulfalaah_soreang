<?php

namespace App\Domain\Content\Services;

use App\Enums\PostType;
use App\Models\ActivityPhoto;
use App\Models\ActivityVideo;
use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Post;
use App\Models\Schedule;
use App\Models\SchoolProfile;
use App\Models\StudentAchievement;
use App\Models\VisualIdentity;
use Illuminate\Support\Facades\Cache;

class HomeDataService
{
    public function getHomeData(): array
    {
        return Cache::remember('home_data', now()->addMinutes(1), function () {
            return [
                'banners' => $this->getBanners(),
                'highlightNews' => $this->getHighlightNews(),
                'latestNews' => $this->getLatestNews(),
                'latestArticles' => $this->getLatestArticles(),
                'fotoKegiatan' => $this->getFotoKegiatan(),
                'videoKegiatan' => $this->getVideoKegiatan(),
                'prestasiSiswa' => $this->getPrestasiSiswa(),
                'infoTerkini' => $this->getInfoTerkini(),
                'agendaTerbaru' => $this->getAgendaTerbaru(),
                'lastPostUpdate' => $this->getLastPostUpdate(),
                'tickerItems' => $this->getTickerItems(),
                'promosiBannerPath' => $this->getPromosiBannerPath(),
                'schoolProfile' => $this->getSchoolProfile(),
            ];
        });
    }

    protected function getSchoolProfile()
    {
        return Cache::remember('home_school_profile', now()->addHours(24), function () {
            return SchoolProfile::firstOrCreate([], [
                'nama_sekolah' => 'MTs Nurul Falaah Soreang',
            ]);
        });
    }

    protected function getBanners()
    {
        return Cache::remember('home_banners', now()->addHours(1), function () {
            return Banner::active()
                ->ordered()
                ->select('id', 'gambar', 'judul', 'deskripsi', 'link', 'urutan', 'is_active', 'updated_at')
                ->get();
        });
    }

    protected function getHighlightNews()
    {
        return Cache::remember('home_highlight_news', now()->addMinutes(1), function () {
            return Post::published()
                ->ofType(PostType::BERITA->value)
                ->where('is_featured', true)
                ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at', 'updated_at')
                ->latest('published_at')
                ->latest('updated_at')
                ->take(5)
                ->get();
        });
    }

    protected function getLatestNews()
    {
        return Cache::remember('home_latest_news', now()->addMinutes(1), function () {
            return Post::published()
                ->ofType(PostType::BERITA->value)
                ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
                ->latest('published_at')
                ->take(4)
                ->get();
        });
    }

    protected function getLatestArticles()
    {
        return Cache::remember('home_latest_articles', now()->addMinutes(1), function () {
            return Post::published()
                ->ofType(PostType::ARTIKEL->value)
                ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
                ->latest('published_at')
                ->take(4)
                ->get();
        });
    }

    protected function getFotoKegiatan()
    {
        return Cache::remember('home_foto_kegiatan', now()->addHours(1), function () {
            return ActivityPhoto::active()
                ->select('id', 'judul', 'gambar', 'urutan')
                ->inRandomOrder()
                ->take(12)
                ->get();
        });
    }

    protected function getPrestasiSiswa()
    {
        return Cache::remember('home_prestasi_siswa_v2', now()->addHours(1), function () {
            return StudentAchievement::active()
                ->ordered()
                ->select('id', 'judul', 'deskripsi', 'gambar', 'urutan', 'nama_siswa', 'kelas', 'tingkat_prestasi', 'tanggal_prestasi')
                ->take(6)
                ->get();
        });
    }

    protected function getInfoTerkini()
    {
        return Cache::remember('home_info_terkini', now()->addMinutes(15), function () {
            return Announcement::active()
                ->ordered()
                ->select('id', 'judul', 'isi', 'tanggal')
                ->latest('tanggal')
                ->take(5)
                ->get();
        });
    }

    protected function getAgendaTerbaru()
    {
        return Cache::remember('home_agenda_terbaru', now()->addMinutes(15), function () {
            return Schedule::active()
                ->ordered()
                ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi', 'waktu_mulai', 'waktu_selesai')
                ->orderBy('tanggal_mulai', 'desc')
                ->take(5)
                ->get();
        });
    }

    protected function getLastPostUpdate(): int
    {
        return Cache::remember('home_last_post_update', now()->addMinutes(5), function () {
            return Post::published()
                ->max('updated_at')?->timestamp ?? time();
        });
    }

    protected function getTickerItems()
    {
        return Cache::remember('home_ticker_items', now()->addMinutes(1), function () {
            $beritaTexts = Post::published()
                ->ofType(PostType::BERITA->value)
                ->select('title')
                ->latest('published_at')
                ->take(2)
                ->pluck('title');

            $artikelTexts = Post::published()
                ->ofType(PostType::ARTIKEL->value)
                ->select('title')
                ->latest('published_at')
                ->take(2)
                ->pluck('title');

            $pengumumanTexts = Announcement::active()
                ->select('judul')
                ->latest('tanggal')
                ->take(1)
                ->pluck('judul');

            return collect()
                ->concat($beritaTexts)
                ->concat($artikelTexts)
                ->concat($pengumumanTexts)
                ->filter();
        });
    }

    protected function getVideoKegiatan()
    {
        return Cache::remember('home_video_kegiatan', now()->addHours(1), function () {
            return ActivityVideo::where('is_active', true)
                ->latest()
                ->take(6)
                ->get();
        });
    }

    protected function getPromosiBannerPath(): ?string
    {
        return Cache::remember('home_promosi_banner', now()->addHours(1), function () {
            $bannerPromosi = VisualIdentity::first();

            return $bannerPromosi?->promosi_banner_path;
        });
    }

    public function clearCache(): void
    {
        $cacheKeys = [
            'home_data',
            'home_banners',
            'home_highlight_news',
            'home_latest_news',
            'home_latest_articles',
            'home_foto_kegiatan',
            'home_prestasi_siswa',
            'home_prestasi_siswa_v2',
            'home_info_terkini',
            'home_agenda_terbaru',
            'home_last_post_update',
            'home_ticker_items',
            'home_promosi_banner',
            'home_school_profile',
            'home_video_kegiatan',
            'school_profile_global',
            'visual_identity_global',
        ];

        foreach ($cacheKeys as $key) {
            Cache::forget($key);
        }
    }

    public function clearCacheOnContentUpdate(): void
    {
        $this->clearCache();
    }
}
