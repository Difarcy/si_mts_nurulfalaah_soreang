/**
 * Control Panel JavaScript - Main Entry Point
 * File ini berfungsi sebagai pusat import semua modul JavaScript yang digunakan di halaman admin.
 * Struktur folder:
 * - auth/: Logika autentikasi (login, logout)
 * - components/: Komponen UI yang digunakan ulang (sidebar, modal, toolbar)
 * - modules/: Modul logika generik (validasi, form, search, upload)
 * - features/: Logika spesifik per fitur (posts, agenda, dll)
 * - utils/: Fungsi bantuan kecil
 */

// Import emoji picker element
import 'emoji-picker-element';

// 1. Fungsi Auth (Login/Logout)
import './core/auth/logout.js';

// 2. Komponen (Elemen UI Reusable)
import './ui/sidebar.js';          // Toggle sidebar & submenu
import './ui/user-menu.js';        // Dropdown menu user di header
import './ui/modals/modal-unsaved-changes.js'; // Modal konfirmasi perubahan tak tersimpan
import './ui/modals/modal-comment-reply.js';   // Modal balasan komentar
import './ui/comments-toolbar.js';      // Toolbar aksi komentar (bulk delete/approve)
import './ui/tags-input.js';            // Input tags dengan autocomplete

// 3. Modul (Logika Generik & Helper)
// Validasi
import './modules/form/validation/form-change-detection.js'; // Deteksi perubahan form

import './modules/form/validation/file-validation.js';       // Validasi tipe & ukuran file
import './modules/form/validation/image-count.js';          // Validasi jumlah gambar
import './modules/form/validation/unsaved-changes.js';       // Fungsi utama modal unsaved changes
import './modules/form/validation/unsaved-changes-auto.js'; // Auto-init proteksi unsaved changes
import { FileValidation } from './modules/form/validation/file-validation.js';
window.FileValidation = FileValidation;

// Form (Controller Generik untuk Form Standard)
import './modules/form/controller.js';

// Utils
import './utils/repeater-helper.js';    // Helper untuk field repeater (jika ada)
import './utils/meta-description.js';   // Auto-generate meta description

// Delete (Handler Hapus Generik)
import { initGenericDeleteHandler } from './modules/delete/generic.js';
import './modules/delete/image.js';     // Handler hapus gambar individual

// Upload (Handler Upload Generik)
import './modules/upload/thumbnail.js'; // Upload thumbnail preview
import './modules/upload/images.js';    // Upload multi-images
import './modules/upload/logo.js';      // Upload logo sekolah
import './modules/upload/banner.js';    // Upload banner sekolah
import './modules/upload/generic.js';   // Upload file generik
import './modules/upload/multi-generic.js';   // Upload multi file generik

// Search (Pencarian Real-time Generik & Filter)
import './modules/search/generic.js';

// 4. Fitur (Logika Spesifik Per Halaman)
// Posts (Berita & Artikel)
import './features/posts/helpers.js';
import './features/posts/validation.js';
import './features/posts/change-detection.js';
import './features/posts/form-submission.js';
import './features/posts/form-controller.js';
import './features/posts/index.js';
import './features/posts/form.js';

// Announcement (Pengumuman)
import './features/announcement/controller.js';
import './features/announcement/index.js';
import './features/announcement/form.js';

// Agenda (Kegiatan)
import './features/agenda/controller.js';
import './features/agenda/index.js';
import './features/agenda/form.js';

// Achievement (Prestasi)
import './features/achievement/controller.js';
import './features/achievement/index.js';

// Inbox (Pesan Masuk)
import './features/inbox/controller.js';
import './features/inbox/detail-controller.js';
import './features/inbox/index.js';
import './features/inbox/show.js';

// Comments (Komentar)
import './features/comments/controller.js';
import './features/comments/detail-controller.js';
import './features/comments/index.js';
import './features/comments/show.js';

// Media (Galeri Foto)
import './features/media/photo-controller.js';
import './features/media/video-form.js';

// Settings (Pengaturan Sekolah)
import './features/settings/school-profile.js';
import './features/settings/site-information.js';
import './features/settings/visual-identity.js';
import './features/settings/visual-identity-form.js';
import './features/settings/spmb.js';
import './features/settings/credentials.js';

// School Profile (Form Handler untuk Toast Notification File Upload)
import './features/school-profile/form.js';

// Help (Bantuan)
import './features/help.js';

// 5. Editor
import './editor/init-tinymce.js'; // Inisialisasi TinyMCE Editor

// Inisialisasi komponen (Saat DOM Ready)
document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Generic Delete Handler (untuk tombol hapus dengan SweetAlert)
    if (typeof initGenericDeleteHandler === 'function') {
        initGenericDeleteHandler();
    }

    // Inisialisasi Sidebar
    if (typeof window.initSidebarToggle === 'function') {
        window.initSidebarToggle();
    }
    if (typeof window.initSidebarSubmenuToggle === 'function') {
        window.initSidebarSubmenuToggle();
    }

    // Inisialisasi User Menu
    if (typeof window.initUserMenuDropdown === 'function') {
        window.initUserMenuDropdown();
    }

    // Catatan: Logout modal auto-initializes via logout.js DOMContentLoaded
    // Catatan: Unsaved changes modal auto-initializes via modal-unsaved-changes.js
    // Catatan: Comment reply modal auto-initializes via modal-comment-reply.js

    // Inisialisasi Comments Toolbar (jika ada)
    if (typeof window.initCommentsToolbarManagement === 'function') {
        window.initCommentsToolbarManagement();
    }
});
