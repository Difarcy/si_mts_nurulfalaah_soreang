<?php

namespace App\Http\Controllers\Web;

use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Models\ActivityPhoto;
use App\Models\Announcement;
use App\Models\Contact;
use App\Models\InfoText;
use App\Models\Post;
use App\Models\Schedule;
use App\Models\SchoolProfile;
use App\Models\StudentAchievement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Get last post update timestamp
     */
    public function lastPostUpdate(): JsonResponse
    {
        try {
            $lastPost = Post::published()->orderBy('updated_at', 'desc')->first();
            if ($lastPost && $lastPost->updated_at) {
                return response()->json([
                    'timestamp' => $lastPost->updated_at->timestamp,
                    'datetime' => $lastPost->updated_at->toDateTimeString(),
                ]);
            }

            return response()->json([
                'timestamp' => time(),
                'datetime' => now()->toDateTimeString(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'timestamp' => time(),
                'datetime' => now()->toDateTimeString(),
                'error' => 'Failed to get last update',
            ], 500);
        }
    }

    /**
     * Get tag suggestions
     */
    public function tagSuggestions(Request $request): JsonResponse
    {
        $query = $request->input('q', '');

        // Get all unique tags from all posts (published and draft)
        $allTags = Post::whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->filter()
            ->map(fn($tag) => trim($tag))
            ->unique()
            ->values();

        // Filter by query if provided
        if ($query) {
            $allTags = $allTags->filter(function ($tag) use ($query) {
                return stripos($tag, $query) !== false;
            });
        }

        // Return top 10 suggestions (sinkron dengan maksimal tag per posting)
        return response()->json($allTags->take(10)->values()->toArray());
    }

    /**
     * Global search across all content
     */
    public function search(Request $request): JsonResponse
    {
        $query = trim((string) $request->input('q', ''));
        $type = $request->input('type');

        if ($query === '') {
            return response()->json([]);
        }

        // Jika type spesifik diminta (berita/artikel), batasi ke Post sesuai type
        if ($type && PostType::isValid($type)) {
            $posts = Post::published()
                ->ofType($type)
                ->search($query)
                ->latest('published_at')
                ->take(10)
                ->get()
                ->map(function ($post) {
                    return [
                        'id' => $post->id,
                        'title' => $post->title,
                        'slug' => $post->slug,
                        'type' => $post->type,
                        'excerpt' => $post->excerpt,
                        'thumbnail_path' => $post->thumbnail_path,
                        'published_at' => $post->published_at?->format('d M Y'),
                        'url' => route('informasi.show', ['type' => $post->type, 'slug' => $post->slug]),
                    ];
                });

            return response()->json($posts->toArray());
        }

        // Header search: cari lintas konten
        $results = collect();

        // Posts (berita + artikel)
        $postResults = Post::published()
            ->search($query)
            ->latest('published_at')
            ->take(10)
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'type' => $post->type,
                    'excerpt' => $post->excerpt,
                    'thumbnail_path' => $post->thumbnail_path,
                    'published_at' => $post->published_at?->translatedFormat('d F Y'),
                    'url' => route('informasi.show', ['type' => $post->type, 'slug' => $post->slug]),
                ];
            });
        $results = $results->merge($postResults);

        // Pengumuman
        $pengumumanResults = Announcement::query()
            ->where(function ($q) use ($query) {
                $q->where('judul', 'like', "%{$query}%")
                    ->orWhere('isi', 'like', "%{$query}%");
            })
            ->latest('tanggal')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'type' => 'pengumuman',
                    'excerpt' => strip_tags($item->isi),
                    'url' => route('informasi.pengumuman'),
                ];
            });
        $results = $results->merge($pengumumanResults);

        // Agenda
        $agendaResults = Schedule::query()
            ->where('judul', 'like', "%{$query}%")
            ->latest('tanggal_mulai')
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'type' => 'agenda',
                    'excerpt' => $item->deskripsi,
                    'url' => route('informasi.agenda'),
                ];
            });
        $results = $results->merge($agendaResults);

        // Foto Kegiatan
        $fotoResults = ActivityPhoto::query()
            ->where('judul', 'like', "%{$query}%")
            ->ordered()
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'type' => 'foto_kegiatan',
                    'excerpt' => $item->deskripsi,
                    'url' => route('galeri.foto-kegiatan'),
                ];
            });
        $results = $results->merge($fotoResults);

        // Prestasi Siswa
        $prestasiResults = StudentAchievement::query()
            ->active()
            ->where('judul', 'like', "%{$query}%")
            ->ordered()
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'type' => 'prestasi_siswa',
                    'excerpt' => $item->deskripsi,
                    'url' => route('galeri.prestasi-siswa'),
                ];
            });
        $results = $results->merge($prestasiResults);

        // Info Sekolah (Tentang Sekolah - dari SchoolProfile)
        $schoolProfile = SchoolProfile::first();
        $infoSekolahResults = collect();

        if ($schoolProfile) {
            $fields = [
                'deskripsi_sekolah' => 'Tentang Sekolah',
                'sejarah' => 'Sejarah Sekolah',
                'visi' => 'Visi Sekolah',
                'misi' => 'Misi Sekolah',
                'tujuan' => 'Tujuan Sekolah',
                'kepala_sekolah_nama' => 'Kepala Sekolah',
                'kepala_sekolah_sambutan' => 'Sambutan Kepala Sekolah'
            ];

            foreach ($fields as $field => $label) {
                $value = $schoolProfile->$field;
                if ($value && stripos($value, $query) !== false) {
                    $infoSekolahResults->push([
                        'id' => $schoolProfile->id . '_' . $field,
                        'title' => $label,
                        'type' => 'tentang_sekolah',
                        'excerpt' => strip_tags(substr($value, 0, 150)) . '...',
                        'url' => route('profil.informasi-sekolah'),
                    ]);
                }
            }
        }

        $results = $results->merge($infoSekolahResults);

        // InfoText (Visi, Misi, Struktur Organisasi)
        $textKeys = ['visi', 'misi', 'struktur_organisasi'];
        $infoTextResults = InfoText::query()
            ->whereIn('key', $textKeys)
            ->where('value', 'like', "%{$query}%")
            ->get()
            ->map(function ($item) {
                $map = [
                    'visi' => ['type' => 'visi_misi', 'title' => 'Visi & Misi', 'route' => route('profil.visi-misi')],
                    'misi' => ['type' => 'visi_misi', 'title' => 'Visi & Misi', 'route' => route('profil.visi-misi')],
                    'struktur_organisasi' => ['type' => 'struktur_organisasi', 'title' => 'Struktur Organisasi', 'route' => route('profil.struktur-organisasi')],
                ];
                $cfg = $map[$item->key] ?? ['type' => 'informasi', 'title' => 'Informasi', 'route' => route('profil')];

                return [
                    'id' => $item->id,
                    'title' => $cfg['title'],
                    'type' => $cfg['type'],
                    'excerpt' => strip_tags($item->value),
                    'url' => $cfg['route'],
                ];
            });
        $results = $results->merge($infoTextResults);

        // Kontak
        $kontakResults = Contact::query()
            ->where(function ($q) use ($query) {
                $q->where('label', 'like', "%{$query}%")
                    ->orWhere('nilai', 'like', "%{$query}%");
            })
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->label,
                    'type' => 'kontak',
                    'excerpt' => $item->nilai,
                    'url' => route('contact'),
                ];
            });
        $results = $results->merge($kontakResults);

        return response()->json($results->take(20)->values()->toArray());
    }
}
