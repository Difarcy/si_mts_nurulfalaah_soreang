<?php

use App\Http\Controllers\Admin\ActivityPhotoController;
use App\Http\Controllers\Admin\ActivityVideoController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CommentController as CpanelCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SpmbSettingController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\SiteInformationController;
use App\Http\Controllers\Admin\StudentAchievementController;
use App\Http\Controllers\Admin\VisualIdentityController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/login', [AuthController::class, 'adminLogin'])->name('login');
Route::post('/login', [AuthController::class, 'adminAuthenticate'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (Middleware: auth)
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Publikasi (gabungan Berita dan Artikel)
    Route::get('publikasi', [PublicationController::class, 'index'])->name('publikasi.index');

    // Berita & Artikel (Using PostController for CRUD)
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [PublicationController::class, 'redirectBerita'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::match(['put', 'patch'], '/{post}', [PostController::class, 'update'])->name('update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('artikel')->name('artikel.')->group(function () {
        Route::get('/', [PublicationController::class, 'redirectArtikel'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
        Route::match(['put', 'patch'], '/{post}', [PostController::class, 'update'])->name('update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy');
    });

    // Identitas Visual
    Route::prefix('visual-identity')->name('visual-identity.')->group(function () {
        Route::get('/', [VisualIdentityController::class, 'index'])->name('index');
        Route::put('/', [VisualIdentityController::class, 'update'])->name('update');
        Route::post('/settings', [VisualIdentityController::class, 'updateSettings'])->name('settings.update');
        Route::post('/banner', [VisualIdentityController::class, 'uploadBanner'])->name('banner.upload');
        Route::delete('/banner/{banner}', [VisualIdentityController::class, 'destroyBanner'])->name('banner.destroy');
        Route::patch('/banner/update-order', [VisualIdentityController::class, 'updateBannerOrder'])->name('banner.update-order');
        Route::patch('/banner/{banner}/toggle', [VisualIdentityController::class, 'toggleBanner'])->name('banner.toggle');
        Route::post('/promosi', [VisualIdentityController::class, 'uploadPromosi'])->name('promosi.upload');
        Route::delete('/promosi', [VisualIdentityController::class, 'destroyPromosi'])->name('promosi.destroy');
    });

    // Media
    Route::resource('foto-kegiatan', ActivityPhotoController::class);
    Route::resource('activity-videos', ActivityVideoController::class);
    Route::post('uploads/images', [ImageUploadController::class, 'store'])->name('uploads.images');

    // Website Content
    Route::resource('prestasi-siswa', StudentAchievementController::class);
    Route::resource('pengumuman', AnnouncementController::class);
    Route::resource('agenda', ScheduleController::class);
    // Profil Sekolah
    Route::get('profil-sekolah', [SchoolProfileController::class, 'index'])->name('profil-sekolah.index');
    Route::put('profil-sekolah', [SchoolProfileController::class, 'update'])->name('profil-sekolah.update');

    // Informasi Situs & Kontak
    Route::prefix('site-information')->name('site-information.')->group(function () {
        Route::get('/', [SiteInformationController::class, 'index'])->name('index');
        Route::put('/', [SiteInformationController::class, 'update'])->name('update');
        Route::post('/kontak', [SiteInformationController::class, 'storeKontak'])->name('kontak.store');
        Route::delete('/kontak/{kontak}', [SiteInformationController::class, 'destroyKontak'])->name('kontak.destroy');
    });

    // Settings group
    Route::prefix('settings')->name('settings.')->group(function () {
        // SPMB
        Route::get('spmb', [SpmbSettingController::class, 'index'])->name('spmb.index');
        Route::put('spmb', [SpmbSettingController::class, 'update'])->name('spmb.update');
    });

    // Interaksi - Komentar
    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/', [CpanelCommentController::class, 'index'])->name('index');
        Route::get('/{comment}', [CpanelCommentController::class, 'show'])->name('show');
        Route::post('/{comment}/reply', [CpanelCommentController::class, 'reply'])->name('reply');
        Route::patch('/{comment}/approve', [CpanelCommentController::class, 'approve'])->name('approve');
        Route::patch('/{comment}/reject', [CpanelCommentController::class, 'reject'])->name('reject');
        Route::patch('/{comment}/read', [CpanelCommentController::class, 'markAsRead'])->name('read');
        Route::patch('/{comment}/unread', [CpanelCommentController::class, 'markAsUnread'])->name('unread');
        Route::post('/mark-all-read', [CpanelCommentController::class, 'markAllAsRead'])->name('mark-all-read');
        Route::post('/bulk-approve', [CpanelCommentController::class, 'bulkApprove'])->name('bulk-approve');
        Route::delete('/{comment}', [CpanelCommentController::class, 'destroy'])->name('destroy');
    });

    // Interaksi - Inbox
    Route::prefix('inbox')->name('inbox.')->group(function () {
        Route::get('/', [InboxController::class, 'index'])->name('index');
        Route::get('/{message}', [InboxController::class, 'show'])->name('show');
        Route::delete('/{message}', [InboxController::class, 'destroy'])->name('destroy');
        Route::patch('/{message}/read', [InboxController::class, 'markAsRead'])->name('read');
        Route::patch('/{message}/unread', [InboxController::class, 'markAsUnread'])->name('unread');
    });


    // Help / Documentation
    Route::get('help', [HelpController::class, 'index'])->name('help.index');

    // Change Username & Password
    Route::get('change-username', [AuthController::class, 'showChangeUsername'])->name('change-username');
    Route::put('change-username', [AuthController::class, 'changeUsername'])->name('change-username.update');
    Route::get('change-password', [AuthController::class, 'showChangePassword'])->name('change-password');
    Route::put('change-password', [AuthController::class, 'changePassword'])->name('change-password.update');
});
