<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ActivityPhoto;
use App\Models\ActivityVideo;
use App\Models\Post;
use App\Models\Schedule;
use App\Models\StudentAchievement;

class GalleryController extends Controller
{
    public function index()
    {
        return view('web.pages.gallery.index');
    }

    public function fotoKegiatan()
    {
        $fotos = ActivityPhoto::latest()->paginate(20);
        return view('web.pages.gallery.photo.index', compact('fotos'));
    }

    public function videoKegiatan()
    {
        $videos = ActivityVideo::where('is_active', true)->latest()->paginate(12);
        return view('web.pages.gallery.video.index', compact('videos'));
    }

    public function dokumentasi()
    {
        return view('web.pages.gallery.dokumentasi');
    }

    public function prestasiSiswa()
    {
        $prestasi = StudentAchievement::active()->ordered()->paginate(10);

        return view('web.pages.profile.prestasi', compact('prestasi'));
    }

    public function showPrestasiSiswa(StudentAchievement $prestasiSiswa)
    {
        if (!$prestasiSiswa->is_active) {
            abort(404);
        }

        $latestPosts = Post::published()->latest()->take(5)->get();
        $agendaItems = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        return view('web.pages.gallery.achievement.show', [
            'item' => $prestasiSiswa,
            'latestPosts' => $latestPosts,
            'agendaItems' => $agendaItems,
        ]);
    }
}
