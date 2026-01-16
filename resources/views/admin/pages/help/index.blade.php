@extends('admin.layouts.admin')

@section('title', 'Panduan Penggunaan Control Panel')

@section('content')
    <div class="space-y-6">
        {{-- Header --}}
        <div
            class="bg-linear-to-r from-green-600 to-green-700 dark:from-green-700 dark:to-green-800 p-8 rounded text-white">
            <h1 class="text-base sm:text-lg font-bold mb-2">Panduan Penggunaan Control Panel</h1>
            <p class="text-green-100 text-base">Dokumentasi lengkap untuk mengelola website MTs Nurul Falaah Soreang</p>
        </div>

        {{-- Quick Navigation --}}
        <div class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-6 rounded">
            <h2 class="text-base font-bold text-black dark:text-slate-100 mb-4">Navigasi Cepat</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                <a href="#dashboard"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-700/50 hover:bg-green-50 dark:hover:bg-green-900/20 border border-slate-200 dark:border-slate-600 hover:border-green-500 dark:hover:border-green-500 text-base font-medium text-black dark:text-slate-300 transition-colors rounded">Dashboard</a>
                <a href="#konten"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-700/50 hover:bg-green-50 dark:hover:bg-green-900/20 border border-slate-200 dark:border-slate-600 hover:border-green-500 dark:hover:border-green-500 text-base font-medium text-black dark:text-slate-300 transition-colors rounded">Konten
                    Website</a>
                <a href="#media"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-700/50 hover:bg-green-50 dark:hover:bg-green-900/20 border border-slate-200 dark:border-slate-600 hover:border-green-500 dark:hover:border-green-500 text-base font-medium text-black dark:text-slate-300 transition-colors rounded">Media</a>
                <a href="#interaksi"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-700/50 hover:bg-green-50 dark:hover:bg-green-900/20 border border-slate-200 dark:border-slate-600 hover:border-green-500 dark:hover:border-green-500 text-base font-medium text-black dark:text-slate-300 transition-colors rounded">Interaksi</a>
                <a href="#pengaturan"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-700/50 hover:bg-green-50 dark:hover:bg-green-900/20 border border-slate-200 dark:border-slate-600 hover:border-green-500 dark:hover:border-green-500 text-base font-medium text-black dark:text-slate-300 transition-colors rounded">Pengaturan</a>
                <a href="#tips"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-700/50 hover:bg-green-50 dark:hover:bg-green-900/20 border border-slate-200 dark:border-slate-600 hover:border-green-500 dark:hover:border-green-500 text-base font-medium text-black dark:text-slate-300 transition-colors rounded">Tips
                    & Trik</a>
            </div>
        </div>

        {{-- Dashboard Section --}}
        <div id="dashboard" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-6 rounded">
            <h2 class="text-base font-bold text-black dark:text-slate-100 mb-4">Dashboard</h2>
            <div class="prose dark:prose-invert max-w-none">
                <p class="text-black dark:text-slate-400 text-base">Dashboard adalah halaman utama control panel yang menampilkan
                    ringkasan aktivitas dan statistik website.</p>

                <h3 class="text-base font-semibold text-black dark:text-slate-100 mt-4 mb-2">Fitur Dashboard:</h3>
                <ul class="list-disc list-inside space-y-2 text-black dark:text-slate-400 text-base">
                    <li><strong>Kartu Statistik:</strong> Menampilkan jumlah publikasi, komentar, pesan, dan konten lainnya
                    </li>
                    <li><strong>Aksi Cepat:</strong> Tombol shortcut untuk membuat konten baru dengan cepat</li>
                    <li><strong>Aktivitas Terbaru:</strong> Daftar publikasi, komentar, dan pesan terbaru</li>
                    <li><strong>Notifikasi:</strong> Indikator item yang belum dibaca (komentar & pesan)</li>
                </ul>

                <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 rounded">
                    <p class="text-base text-blue-900 dark:text-blue-100">
                        <strong>Tips:</strong> Periksa dashboard secara rutin untuk memantau aktivitas website dan merespons
                        komentar atau pesan dengan cepat.
                    </p>
                </div>
            </div>
        </div>

        {{-- Konten Website Section --}}
        <div id="konten" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-6 rounded">
            <h2 class="text-base font-bold text-black dark:text-slate-100 mb-4">Konten Website</h2>
            <div class="space-y-6">
                {{-- Profil Sekolah --}}
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">1. Profil Sekolah</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola informasi tentang sekolah termasuk
                        visi-misi, sejarah, struktur organisasi, dan data guru.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded">
                        <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Langkah-langkah:</p>
                        <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                            <li>Klik menu <strong>Konten Website</strong> → <strong>Profil Sekolah</strong></li>
                            <li>Edit informasi yang ingin diubah pada tab yang tersedia</li>
                            <li>Klik tombol <strong>Simpan</strong></li>
                        </ol>
                    </div>
                </div>

                {{-- Publikasi --}}
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">2. Publikasi (Berita & Artikel)</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Membuat dan mengelola berita serta artikel untuk
                        website.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-4">
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Membuat Berita/Artikel Baru:</p>
                            <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li>Klik <strong>Publikasi</strong> di sidebar atau tombol <strong>Buat
                                        Berita/Artikel</strong> di dashboard</li>
                                <li>Isi <strong>Judul</strong> - hindari judul terlalu panjang (maksimal 100 karakter)</li>
                                <li>Pilih <strong>Jenis</strong> (Berita atau Artikel)</li>
                                <li>Upload <strong>Thumbnail</strong> (gambar utama) - ukuran disarankan 1200x630px</li>
                                <li>Tulis <strong>Konten</strong> menggunakan editor</li>
                                <li>Tambahkan <strong>Tag</strong> untuk memudahkan pencarian</li>
                                <li>Pilih <strong>Status</strong>: Draft atau Dipublikasi</li>
                                <li>Klik <strong>Simpan</strong></li>
                            </ol>
                        </div>
                        <div class="p-3 bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 rounded">
                            <p class="text-base text-yellow-900 dark:text-yellow-100">
                                <strong>Penting:</strong> Periksa kembali ejaan dan tata bahasa sebelum mempublikasi.
                                Gunakan status "Draft" untuk preview sebelum publikasi.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Pengumuman --}}
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">3. Pengumuman</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Membuat dan mengelola pengumuman penting untuk sekolah.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-3">
                        <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                            <li>Klik <strong>Pengumuman</strong> di sidebar</li>
                            <li>Klik tombol <strong>Buat Pengumuman</strong></li>
                            <li>Isi judul dan konten pengumuman</li>
                            <li>Pilih <strong>Status</strong>: Draft atau Dipublikasi</li>
                            <li>Klik <strong>Simpan</strong></li>
                        </ol>
                    </div>
                </div>

                {{-- Prestasi Siswa --}}
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">4. Prestasi Siswa</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mencatat dan menampilkan prestasi siswa.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-3">
                        <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                            <li>Klik menu <strong>Konten Website</strong> → <strong>Prestasi Siswa</strong></li>
                            <li>Isi data prestasi: nama siswa, jenis prestasi, tanggal</li>
                            <li>Sesuaikan kategori dan deskripsi prestasi</li>
                            <li>Klik <strong>Simpan</strong></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- Media Section --}}
        <div id="media" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-6 rounded">
            <h2 class="text-base font-bold text-black dark:text-slate-100 mb-4">Media</h2>
            <div class="space-y-6">
                {{-- Foto Kegiatan --}}
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">1. Foto Kegiatan</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola galeri foto kegiatan sekolah.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-4">
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Upload Foto Kegiatan:</p>
                            <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li>Klik <strong>Media</strong> → <strong>Foto Kegiatan</strong></li>
                                <li>Klik tombol <strong>Upload Foto</strong></li>
                                <li>Isi nama kegiatan dan deskripsi</li>
                                <li>Upload foto (maksimal 20 foto per kegiatan)</li>
                                <li>Klik <strong>Simpan</strong></li>
                            </ol>
                        </div>
                        <div class="p-3 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 rounded">
                            <p class="text-base text-green-900 dark:text-green-100">
                                <strong>Best Practice:</strong> Gunakan foto berkualitas tinggi (minimal 1080p). Format: JPG atau WEBP, maksimal 5MB per foto.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Video Kegiatan --}}
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">2. Video Kegiatan</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola galeri video kegiatan sekolah.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-4">
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Upload Video Kegiatan:</p>
                            <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li>Klik <strong>Media</strong> → <strong>Video Kegiatan</strong></li>
                                <li>Klik tombol <strong>Upload Video</strong></li>
                                <li>Isi nama kegiatan dan deskripsi</li>
                                <li>Pilih URL video (YouTube, Vimeo) atau upload file video</li>
                                <li>Klik <strong>Simpan</strong></li>
                            </ol>
                        </div>
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 rounded">
                            <p class="text-base text-blue-900 dark:text-blue-100">
                                <strong>Tips:</strong> Lebih baik gunakan YouTube/Vimeo untuk video agar tidak membebani server. Kualitas video disarankan 1080p atau 720p.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Interaksi Section --}}
        <div id="interaksi" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-6 rounded">
            <h2 class="text-base font-bold text-black dark:text-slate-100 mb-4">Interaksi</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">1. Pesan (Inbox)</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola pesan dari formulir kontak website.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded">
                        <ul class="list-disc list-inside space-y-1 text-base text-black dark:text-slate-400">
                            <li>Pesan baru ditandai dengan badge merah di sidebar</li>
                            <li>Klik pesan untuk membaca detail</li>
                            <li>Gunakan tombol <strong>Tandai Dibaca/Belum Dibaca</strong></li>
                            <li>Hapus pesan yang sudah tidak diperlukan</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">2. Komentar</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola komentar pengunjung pada berita dan
                        artikel.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-4">
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Moderasi Komentar:</p>
                            <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li>Klik <strong>Interaksi</strong> → <strong>Komentar</strong></li>
                                <li>Komentar baru berstatus <strong>Pending</strong></li>
                                <li>Klik tombol <strong>Setujui</strong> untuk mempublikasi</li>
                                <li>Klik komentar untuk membaca detail dan membalas</li>
                                <li>Hapus komentar yang tidak pantas atau spam</li>
                            </ol>
                        </div>
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 rounded">
                            <p class="text-base text-blue-900 dark:text-blue-100">
                                <strong>Tips Moderasi:</strong> Balas komentar dengan sopan dan informatif. Jangan menerima
                                komentar yang mengandung SARA atau kata-kata kasar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengaturan Section --}}
        <div id="pengaturan" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-6 rounded">
            <h2 class="text-base font-bold text-black dark:text-slate-100 mb-4">Pengaturan</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">1. Identitas
                        Visual</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola tampilan visual website termasuk logo dan
                        banner.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-4">
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Logo:</p>
                            <ul class="list-disc list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li>Upload logo sekolah (format PNG dengan background transparan)</li>
                                <li>Ukuran ideal: 200x200px atau rasio 1:1</li>
                                <li>Logo muncul di header website dan footer</li>
                            </ul>
                        </div>
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Banner Slide:</p>
                            <ul class="list-disc list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li>Upload hingga 6 banner untuk slideshow homepage</li>
                                <li>Ukuran ideal: 1920x600px (rasio 16:5)</li>
                                <li>Drag & drop untuk mengubah urutan tampilan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">2. Informasi Website (SEO)</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola metadata dan informasi website untuk SEO.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded">
                        <ul class="list-disc list-inside space-y-1 text-base text-black dark:text-slate-400">
                            <li>Isi <strong>Meta Title</strong> untuk judul halaman di browser</li>
                            <li>Isi <strong>Meta Description</strong> untuk deskripsi di search engine</li>
                            <li>Atur <strong>Meta Keywords</strong> untuk kata kunci pencarian</li>
                            <li>Verifikasi dengan Google Search Console</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">3. Pengaturan SPMB</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola informasi penerimaan siswa baru (SPMB).</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded space-y-4">
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Pengaturan SPMB mencakup:</p>
                            <ul class="list-disc list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li><strong>FAQ SPMB</strong> - Pertanyaan umum calon siswa</li>
                                <li><strong>Syarat SPMB</strong> - Persyaratan pendaftaran</li>
                                <li><strong>Timeline SPMB</strong> - Jadwal pembukaan dan penutupan pendaftaran</li>
                                <li><strong>Setting SPMB</strong> - Konfigurasi umum SPMB</li>
                            </ul>
                        </div>
                        <div>
                            <p class="text-base font-medium text-black dark:text-slate-300 mb-2">Cara Update:</p>
                            <ol class="list-decimal list-inside space-y-1 text-base text-black dark:text-slate-400">
                                <li>Klik <strong>Pengaturan</strong> → <strong>SPMB</strong></li>
                                <li>Edit informasi sesuai kebutuhan</li>
                                <li>Klik <strong>Simpan</strong></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-base font-semibold text-black dark:text-slate-100 mb-2">4. Jadwal Sekolah</h3>
                    <p class="text-black dark:text-slate-400 mb-3 text-base">Mengelola jadwal penting sekolah seperti jam pelajaran, libur, dan kegiatan.</p>
                    <div class="bg-slate-50 dark:bg-slate-700/50 p-4 rounded">
                        <ul class="list-disc list-inside space-y-1 text-base text-black dark:text-slate-400">
                            <li>Klik menu <strong>Pengaturan</strong> → <strong>Jadwal Sekolah</strong></li>
                            <li>Buat jadwal baru atau edit jadwal yang sudah ada</li>
                            <li>Tentukan tanggal mulai dan selesai untuk setiap jadwal</li>
                            <li>Tambahkan deskripsi jadwal untuk kejelasan</li>
                            <li>Klik <strong>Simpan</strong></li>
                        </ul>
                    </div>
                </div>

        {{-- Tips & Trik Section --}}
        <div id="tips" class="bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 p-6 rounded">
            <h2 class="text-base font-bold text-black dark:text-slate-100 mb-4">Tips & Trik</h2>
            <div class="space-y-4">
                <div
                    class="p-4 bg-linear-to-r from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-900/30 border-l-4 border-blue-500 rounded">
                    <h4 class="font-semibold text-base text-blue-900 dark:text-blue-100 mb-2">Produktivitas</h4>
                    <ul class="list-disc list-inside space-y-1 text-base text-blue-800 dark:text-blue-200">
                        <li>Gunakan <strong>Aksi Cepat</strong> di Dashboard untuk membuat konten baru</li>
                        <li>Simpan konten sebagai <strong>Draft</strong> untuk melanjutkan editing nanti</li>
                        <li>Gunakan fitur <strong>Pencarian</strong> untuk menemukan artikel tertentu</li>
                        <li>Periksa notifikasi badge di sidebar untuk item yang perlu perhatian</li>
                    </ul>
                </div>

                <div
                    class="p-4 bg-linear-to-r from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-900/30 border-l-4 border-green-500 rounded">
                    <h4 class="font-semibold text-base text-green-900 dark:text-green-100 mb-2">Menulis Konten Berkualitas</h4>
                    <ul class="list-disc list-inside space-y-1 text-base text-green-800 dark:text-green-200">
                        <li>Gunakan judul yang <strong>menarik dan informatif</strong></li>
                        <li>Tulis konten minimal 300 kata untuk artikel</li>
                        <li>Gunakan heading (H2, H3) untuk struktur konten yang jelas</li>
                        <li>Tambahkan gambar pendukung untuk membuat artikel lebih menarik</li>
                    </ul>
                </div>

                <div
                    class="p-4 bg-linear-to-r from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-900/30 border-l-4 border-purple-500 rounded">
                    <h4 class="font-semibold text-base text-purple-900 dark:text-purple-100 mb-2">Keamanan</h4>
                    <ul class="list-disc list-inside space-y-1 text-base text-purple-800 dark:text-purple-200">
                        <li>Jangan share password dengan orang lain</li>
                        <li>Gunakan password yang kuat (minimal 8 karakter)</li>
                        <li>Ganti password secara berkala</li>
                        <li>Selalu <strong>logout</strong> setelah selesai</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Footer Help --}}
        <div
            class="bg-linear-to-r from-slate-50 to-slate-100 dark:from-slate-800 dark:to-slate-700 border border-slate-200 dark:border-slate-600 p-6 rounded text-center">
            <p class="text-black dark:text-slate-400 mb-2 text-base">Masih ada pertanyaan atau butuh bantuan?</p>
            <p class="text-base text-black dark:text-slate-500">Hubungi administrator atau tim IT sekolah untuk bantuan
                lebih lanjut.</p>
        </div>
    </div>
@endsection
