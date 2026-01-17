<?php

namespace App\Domain\Chatbot\Services;

use App\Models\InfoText;
use App\Models\Post;
use App\Models\SpmbSetting;
use App\Models\SchoolProfile;
use App\Models\StudentAchievement;
use App\Models\Announcement;
use App\Models\Schedule;
use App\Models\SpmbFaq;
use App\Models\SpmbRequirement;
use App\Models\SpmbTimeline;
use App\Models\VisualIdentity;
use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ChatbotContextService
{
    /**
     * Membangun konteks prompt untuk AI berdasarkan data sekolah terkini yang tampil di website.
     * Terhubung langsung ke seluruh model/program utama.
     */
    public function getSchoolContext(?string $currentPageUrl = null, ?string $currentPageTitle = null): string
    {
        // 1. Ambil Identitas & Branding Website
        $branding = VisualIdentity::first(['tagline', 'judul', 'deskripsi']);

        // 2. Ambil Profil & Pimpinan
        $profile = SchoolProfile::first(['nama_sekolah', 'kepala_sekolah_nama', 'visi', 'misi', 'sejarah', 'deskripsi_sekolah']);

        // 3. Ambil Data Akademik & Info Terkini
        // 3. Ambil Data Akademik & Info Terkini (Lebih Detail)
        $latestNews = Post::published()
            ->latest('published_at')
            ->take(3)
            ->get(['title', 'published_at', 'excerpt', 'type']);

        $announcements = Announcement::where('status', '=', 'publish')
            ->latest()
            ->take(2)
            ->get(['judul', 'isi']);

        $agendas = Schedule::where('status', '=', 'publish')
            ->where('tanggal_mulai', '>=', now()->toDateString())
            ->orderBy('tanggal_mulai', 'asc')
            ->take(3)
            ->get(['judul', 'tanggal_mulai', 'lokasi']);

        $achievements = StudentAchievement::where('is_active', '=', true)
            ->latest()
            ->take(5)
            ->get(['judul', 'nama_siswa', 'tingkat_prestasi', 'jenis_prestasi']);

        // 4. Ambil Data SPMB (Pendaftaran)
        $spmb = SpmbSetting::first(['*']);
        $spmbRequirements = SpmbRequirement::orderBy('urutan')->pluck('content')->toArray();
        $spmbTimeline = SpmbTimeline::orderBy('urutan')->get();

        // 5. Ambil Kontak
        $contacts = Contact::where('is_active', '=', true)->get(['label', 'nilai']);

        // 6. Ambil Info Dasar lainnya
        $site = [
            'address' => InfoText::where('key', '=', 'site_address')->value('value'),
            'phone' => InfoText::where('key', '=', 'site_phone')->value('value'),
            'email' => InfoText::where('key', '=', 'site_email')->value('value'),
        ];

        // --- MULAI MEMBANGUN KONTEKS ---
        $context = "Anda adalah Nafa, asisten virtual resmi MTs Nurul Falaah Soreang.\n";

        if ($currentPageUrl || $currentPageTitle) {
            $context .= "KONTEKS HALAMAN SAAT INI: " . ($currentPageTitle ?? 'Web') . " (" . ($currentPageUrl ?? '') . ")\n\n";
        }

        $context .= "=== DATA REAL-TIME DARI SISTEM ===\n";
        $context .= "- Nama Madrasah: " . ($profile->nama_sekolah ?? 'MTs Nurul Falaah Soreang') . "\n";
        if ($branding && $branding->tagline)
            $context .= "- Tagline Website: {$branding->tagline}\n";
        if ($profile && $profile->kepala_sekolah_nama)
            $context .= "- Kepala Madrasah: {$profile->kepala_sekolah_nama}\n";
        if ($site['address'])
            $context .= "- Alamat: {$site['address']}\n";

        // Data Berita (Lebih Detail)
        $context .= "=== BERITA & ARTIKEL TERBARU ===\n";
        if ($latestNews->isEmpty()) {
            $context .= "Belum ada berita terbaru.\n";
        } else {
            foreach ($latestNews as $news) {
                $date = $news->published_at ? $news->published_at->isoFormat('D MMMM Y') : '-';
                $type = ucfirst($news->type);
                $desc = \Illuminate\Support\Str::limit($news->excerpt, 100);
                $context .= "- [{$date}] {$type}: {$news->title} ({$desc})\n";
            }
        }
        $context .= "\n";

        // Data Pengumuman
        $context .= "=== PENGUMUMAN PENTING ===\n";
        if ($announcements->isEmpty()) {
            $context .= "Tidak ada pengumuman aktif.\n";
        } else {
            foreach ($announcements as $info) {
                $desc = \Illuminate\Support\Str::limit(strip_tags($info->isi), 100);
                $context .= "- {$info->judul}: {$desc}\n";
            }
        }
        $context .= "\n";

        // Agenda
        $context .= "=== AGENDA MENDATANG ===\n";
        if ($agendas->isEmpty()) {
            $context .= "Belum ada agenda terjadwal.\n";
        } else {
            foreach ($agendas as $agenda) {
                $date = $agenda->tanggal_mulai ? Carbon::parse($agenda->tanggal_mulai)->isoFormat('D MMMM Y') : '-';
                $loc = $agenda->lokasi ? " di {$agenda->lokasi}" : "";
                $context .= "- {$date}: {$agenda->judul}{$loc}\n";
            }
        }
        $context .= "\n";

        // Prestasi
        $context .= "=== PRESTASI SISWA KEBANGGAAN ===\n";
        if ($achievements->isEmpty()) {
            $context .= "Belum ada data prestasi terbaru.\n";
        } else {
            foreach ($achievements as $ach) {
                $context .= "- {$ach->judul} oleh {$ach->nama_siswa} (Tingkat: {$ach->tingkat_prestasi}, Jenis: {$ach->jenis_prestasi})\n";
            }
        }
        $context .= "\n";

        // Detail SPMB (Sangat Akurat)
        if ($spmb) {
            $status = ($spmb->registration_status === 'open') ? 'DIBUKA' : 'DITUTUP';
            $biaya = ($spmb->registration_fee <= 0) ? 'Gratis' : 'Rp ' . number_format($spmb->registration_fee, 0, ',', '.');
            $context .= "=== INFO PENDAFTARAN (SPMB) ===\n";
            $context .= "- Status: {$status} ({$spmb->academic_year})\n";
            $context .= "- Biaya: {$biaya}\n";
            $context .= "- Syarat Dokumen: " . (!empty($spmbRequirements) ? implode(', ', $spmbRequirements) : 'Lihat di website.') . "\n";
            if (!$spmbTimeline->isEmpty()) {
                $context .= "- Alur Penting: ";
                foreach ($spmbTimeline as $t) {
                    $context .= "{$t->activity} (" . ($t->start_date ? Carbon::parse($t->start_date)->format('d/m') : '') . "), ";
                }
                $context .= "\n";
            }
            $context .= "\n";
        }

        // Visi Misi & Pengetahuan Khusus (Knowledge Base)
        $vision = InfoText::where('key', '=', 'site_vision')->value('value');
        if ($vision) {
            $context .= "=== VISI & MISI SEKOLAH ===\n" . strip_tags($vision) . "\n\n";
        } elseif ($profile && $profile->visi) {
            // Fallback jika InfoText kosong tapi di profil ada
            $context .= "=== VISI & MISI SEKOLAH ===\n";
            $context .= "Visi: " . strip_tags($profile->visi) . "\n";
            $context .= "Misi: " . strip_tags($profile->misi) . "\n\n";
        }

        // Tambahkan Sejarah
        if ($profile && $profile->sejarah) {
            $context .= "=== SEJARAH & LATAR BELAKANG SEKOLAH ===\n" . strip_tags($profile->sejarah) . "\n\n";
        }

        $context .= "=== PUSAT PENGETAHUAN & BIJAKSANA (VALUES) ===\n";
        $context .= "- Budaya Sekolah: Kami mengutamakan Akhlakul Karimah dan kemandirian siswa.\n";
        $context .= "- Metode Belajar: Menggabungkan kurikulum nasional dengan nilai-nilai pesantren yang modern.\n";
        $context .= "- Keunggulan Kompetitif: Lulusan kami tidak hanya cerdas secara akademik, tapi juga fasih membaca Al-Qur'an dan memiliki karakter yang kuat.\n";
        $context .= "- Pesan Penutup (Closing Wisdom): Selalu tekankan bahwa pendidikan di MTs Nurul Falaah adalah investasi terbaik untuk masa depan dunia dan akhirat.\n\n";

        // Kontak Sekolah
        if ($contacts && !$contacts->isEmpty()) {
            $context .= "=== HUBUNGI KAMI ===\n";
            foreach ($contacts as $c)
                $context .= "- {$c->label}: {$c->nilai}\n";
            $context .= "\n";
        }

        // 7. Tambahan FAQ SPMB & Galeri (Agar lebih pintar)
        $faqs = SpmbFaq::orderBy('urutan')->get(['question', 'answer']);
        if (!$faqs->isEmpty()) {
            $context .= "=== PERTANYAAN UMUM (FAQ) SEPUTAR SPMB ===\n";
            foreach ($faqs as $faq) {
                $answer = strip_tags($faq->answer);
                $context .= "T: {$faq->question}\nJ: {$answer}\n";
            }
            $context .= "\n";
        }

        // Info Galeri Singkat
        $latestPhotos = \App\Models\ActivityPhoto::where('is_active', true)->latest()->take(3)->pluck('judul')->toArray();
        if (!empty($latestPhotos)) {
            $context .= "=== DOKUMENTASI KEGIATAN TERBARU ===\n";
            $context .= "Kami aktif mendokumentasikan kegiatan sekolah, diantaranya: " . implode(', ', $latestPhotos) . ".\n\n";
        }

        $context .= "INSTRUKSI PENTING:\n";
        $context .= "1. KEJUJURAN DATA: Jika data di atas tertulis 'Belum ada' atau 'Tidak ada', JANGAN PERNAH MENGARANG CERITA. Katakan jujur.\n";
        $context .= "2. PERSONA: Anda adalah asisten yang PROFESIONAL namun INSPIRATIF dan PERSUASIF (seperti CS premium). Gunakan nada yang memberikan semangat agar user segera mengambil langkah.\n";
        $context .= "3. RESPONS TERIMA KASIH: Jawab dengan ramah disertai ajakan positif untuk segera bergabung (contoh: 'Sama-sama! Mari mulai perjalanan pendidikan terbaik bersama MTs Nurul Falaah. Kami tunggu kehadirannya! 🚀').\n";
        $context .= "4. STRUKTUR JAWABAN: Kalimat pertama adalah inti jawaban. Kalimat berikutnya adalah tambahan info/ajakan. Maksimal 3 kalimat.\n";
        $context .= "5. DILARANG menyapa dengan 'Bapak/Ibu/Saudara'.\n";
        $context .= "6. Akhiri jawaban dengan 1 emoji yang kuat dan positif (😊/🙏/🚀/✨).\n";

        return $context;
    }
}
