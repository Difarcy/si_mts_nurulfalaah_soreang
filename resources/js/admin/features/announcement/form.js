/**
 * Announcement Form Page Initialization
 * Entry point untuk halaman form (create/edit) Pengumuman.
 * Menginisialisasi form controller dan penghitung karakter.
 *
 * Dipanggil di: resources/views/admin/pages/announcement/create.blade.php & edit.blade.php
 */

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('pengumuman-form');

    if (form) {
        // Initialize Announcement Form Controller
        if (typeof window.initAnnouncementForm === 'function') {
            const config = form.dataset.announcementConfig ? JSON.parse(form.dataset.announcementConfig) : {};
            window.initAnnouncementForm(config);
        }


    }
});
