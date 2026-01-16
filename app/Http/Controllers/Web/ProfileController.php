<?php

namespace App\Http\Controllers\Web;

use App\Enums\PostType;
use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Post;
use App\Models\Schedule;
use App\Models\SchoolProfile;
use App\Models\StudentAchievement;

class ProfileController extends Controller
{
    protected function getSidebarData()
    {
        $articles = Post::published()
            ->ofType(PostType::ARTIKEL->value)
            ->select('id', 'title', 'excerpt', 'slug', 'type', 'thumbnail_path', 'published_at')
            ->latest('published_at')
            ->take(5)
            ->get();

        $announcements = Announcement::active()
            ->select('id', 'judul as title', 'isi', 'tanggal as published_at')
            ->selectRaw("'pengumuman' as type")
            ->latest('tanggal')
            ->take(5)
            ->get();

        $agenda = Schedule::active()
            ->select('id', 'judul', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(5)
            ->get();

        $schoolProfile = SchoolProfile::firstOrCreate([], [
            'nama_sekolah' => 'MTs Nurul Falaah Soreang',
        ]);

        return compact('articles', 'announcements', 'agenda', 'schoolProfile');
    }

    public function index()
    {
        return view('web.pages.profile.about-school', $this->getSidebarData());
    }

    public function informasiSekolah()
    {
        return view('web.pages.profile.school-info', $this->getSidebarData());
    }

    public function visiMisi()
    {
        return view('web.pages.profile.vision-mission', $this->getSidebarData());
    }

    public function sejarah()
    {
        return view('web.pages.profile.sejarah', $this->getSidebarData());
    }

    public function strukturOrganisasi()
    {
        return view('web.pages.profile.organizational-structure', $this->getSidebarData());
    }

    public function kepalaSekolahGuru()
    {
        return view('web.pages.profile.principal-teacher', $this->getSidebarData());
    }

    public function prestasi()
    {
        $prestasi = StudentAchievement::active()->ordered()->paginate(10);
        $sidebarData = $this->getSidebarData();

        return view('web.pages.profile.prestasi', array_merge(compact('prestasi'), $sidebarData));
    }
}
