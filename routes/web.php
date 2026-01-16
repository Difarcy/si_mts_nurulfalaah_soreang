<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Web\CommentLikeController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\GalleryController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InformationController;
use App\Http\Controllers\Web\SpmbController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\UnderConstructionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Website Routes (Publik)
Route::get('/', [HomeController::class, 'index'])->name('web.home');

// Profil
Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
Route::get('/profil/informasi-sekolah', [ProfileController::class, 'informasiSekolah'])->name('profil.informasi-sekolah');
Route::get('/profil/visi-misi', [ProfileController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil/sejarah', [ProfileController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/struktur-organisasi', [ProfileController::class, 'strukturOrganisasi'])->name('profil.struktur-organisasi');
Route::get('/profil/kepala-madrasah', [ProfileController::class, 'kepalaSekolahGuru'])->name('profil.kepala-madrasah');
Route::get('/profil/prestasi', [ProfileController::class, 'prestasi'])->name('profil.prestasi');

// Informasi
Route::get('/pencarian', [InformationController::class, 'globalSearch'])->name('search.global');
Route::get('/informasi/berita', [InformationController::class, 'berita'])->name('informasi.berita');
Route::get('/informasi/artikel', [InformationController::class, 'artikel'])->name('informasi.artikel');
Route::get('/informasi/tag/{tag}', [InformationController::class, 'byTag'])->name('informasi.tag');
Route::get('/pengumuman', [InformationController::class, 'pengumuman'])->name('informasi.pengumuman');
Route::get('/pengumuman/{announcement}', [InformationController::class, 'showAnnouncement'])->name('informasi.pengumuman.show');
Route::get('/informasi/agenda', [InformationController::class, 'agenda'])->name('informasi.agenda');
Route::get('/informasi/agenda/{schedule}', [InformationController::class, 'showAgenda'])->name('informasi.agenda.show');
Route::get('/informasi/{type}/{slug}', [InformationController::class, 'show'])->name('informasi.show');
Route::post('/informasi/{type}/{slug}/comment', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{comment}/like', [CommentLikeController::class, 'toggle'])->name('comments.like');

// SPMB (Sistem Penerimaan Murid Baru)
Route::get('/spmb', [SpmbController::class, 'index'])->name('spmb.index');

// Galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');
Route::get('/galeri/foto-kegiatan', [GalleryController::class, 'fotoKegiatan'])->name('galeri.foto-kegiatan');
Route::get('/galeri/video-kegiatan', [GalleryController::class, 'videoKegiatan'])->name('galeri.video-kegiatan');
Route::get('/galeri/dokumentasi', [GalleryController::class, 'dokumentasi'])->name('galeri.dokumentasi');
Route::get('/galeri/prestasi-siswa', function () {
    return redirect()->route('profil.prestasi');
})->name('galeri.prestasi-siswa');
Route::get('/galeri/prestasi-siswa/{prestasiSiswa}', [GalleryController::class, 'showPrestasiSiswa'])->name('galeri.prestasi-siswa.show');

// Kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Under Construction & Error Pages
Route::get('/under-construction', [UnderConstructionController::class, 'index'])->name('under-construction');
Route::get('/social-media-unavailable', [UnderConstructionController::class, 'socialMediaUnavailable'])->name('social-media-unavailable');

