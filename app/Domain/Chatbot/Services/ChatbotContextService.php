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
        $profile = SchoolProfile::first(['nama_sekolah', 'kepala_sekolah_nama', 'visi', 'misi']);

        // 3. Ambil Data Akademik & Info Terkini
        $latestNews = Post::published()->latest('published_at')->take(3)->pluck('title')->toArray();
        $announcements = Announcement::where('status', '=', 'publish')->latest()->take(2)->pluck('judul')->toArray();
        $agendas = Schedule::where('status', '=', 'publish')->where('tanggal_mulai', '>=', now()->toDateString())->latest()->take(2)->pluck('judul')->toArray();
        $achievements = StudentAchievement::where('is_active', '=', true)->latest()->take(3)->pluck('judul')->toArray();

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

        // Berita & Pengumuman (Jujur jika kosong)
        $context .= "- Berita Terbaru: " . (!empty($latestNews) ? implode(', ', $latestNews) : 'Belum ada berita baru.') . "\n";
        $context .= "- Pengumuman: " . (!empty($announcements) ? implode(', ', $announcements) : 'Tidak ada pengumuman aktif.') . "\n";
        $context .= "- Agenda Terdekat: " . (!empty($agendas) ? implode(', ', $agendas) : 'Belum ada agenda terjadwal.') . "\n";
        $context .= "- Prestasi: " . (!empty($achievements) ? implode(', ', $achievements) : 'Belum ada data prestasi terbaru.') . "\n\n";

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
