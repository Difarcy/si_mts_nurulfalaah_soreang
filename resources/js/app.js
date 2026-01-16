// Global JavaScript Entry Point - Dipakai oleh Website DAN Control Panel
// Import shared utilities
import './shared/index.js';

// Notifikasi global: tampilkan loading saat submit dan flash success/error
// Tampilkan loading pada form dengan atribut data-notify="loading"
document.addEventListener('DOMContentLoaded', function () {
    // Handler submit form dengan loading notification
    document.querySelectorAll('form[data-notify="loading"]').forEach(function (form) {
        form.addEventListener('submit', function () {
            if (typeof window.showPublicNotification === 'function') {
                window.showPublicNotification('Memproses...', 'loading');
            }
        });
    });

    // Handler flash success/error di seluruh website dan admin
    const statusEls = Array.from(document.querySelectorAll('[data-flash-status]'));
    const statusEl = statusEls.length ? statusEls[statusEls.length - 1] : null;
    const errorEl = document.querySelector('[data-flash-error]');
    const loginSuccessMeta = document.querySelector('meta[name="login-success"]');

    // Cek sessionStorage untuk flash messages dari fetch redirects
    const sessionFlashSuccess = sessionStorage.getItem('flash_success');
    if (statusEl && typeof window.showPublicNotification === 'function') {
        const msg = statusEl.textContent.trim();
        if (msg) window.showPublicNotification(msg, 'success');
        // Bersihkan possible stale storage agar tidak menimpa pesan berikutnya
        sessionStorage.removeItem('flash_success');
    } else if (loginSuccessMeta && typeof window.showPublicNotification === 'function') {
        window.showPublicNotification('Login berhasil', 'success');
    } else if (sessionFlashSuccess && typeof window.showPublicNotification === 'function') {
        window.showPublicNotification(sessionFlashSuccess, 'success');
        sessionStorage.removeItem('flash_success');
    }

    // Handler error flash
    if (errorEl && typeof window.showPublicNotification === 'function') {
        window.showPublicNotification(errorEl.textContent.trim(), 'error');
    }

    // Handler file input dengan data-preview-container attribute
    document.querySelectorAll('input[type="file"][data-preview-container]').forEach(function (input) {
        input.addEventListener('change', function () {
            const container = this.getAttribute('data-preview-container') || 'preview-container';
            const imageId = this.getAttribute('data-preview-image') || 'preview-image';

            if (typeof window.previewImage === 'function') {
                window.previewImage(this, container, imageId);
            }
        });
    });

    // Handler tombol reset gambar dengan data-reset-image attribute
    document.querySelectorAll('[data-reset-image]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const container = this.getAttribute('data-container') || 'preview-container';
            const imageId = this.getAttribute('data-image') || 'preview-image';
            const inputId = this.getAttribute('data-input') || 'gambar';

            if (typeof window.resetImage === 'function') {
                window.resetImage(container, imageId, inputId);
            }
        });
    });

    // Handler modal gambar universal untuk semua modal gambar
    // Setup untuk imageZoomModal (website)
    const imageZoomModal = document.querySelector('[data-image-zoom-modal]');
    if (imageZoomModal) {
        // Tutup saat klik backdrop
        imageZoomModal.addEventListener('click', function (e) {
            if (e.target === imageZoomModal) {
                window.closeImageModal('imageZoomModal');
            }
        });

        // Tombol tutup
        const closeBtn = imageZoomModal.querySelector('[data-image-zoom-close]');
        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                window.closeImageModal('imageZoomModal');
            });
        }

        // Cegah tutup saat klik konten
        const content = imageZoomModal.querySelector('[data-image-zoom-content]');
        if (content) {
            content.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        }
    }

    // Setup untuk imagePreviewModal (admin)
    const imagePreviewModal = document.querySelector('[data-image-preview-modal]');
    if (imagePreviewModal) {
        // Tutup saat klik backdrop
        imagePreviewModal.addEventListener('click', function (e) {
            if (e.target === imagePreviewModal) {
                window.closeImageModal('imagePreviewModal');
            }
        });

        // Tombol tutup
        const closeBtn = imagePreviewModal.querySelector('[data-image-preview-close]');
        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                window.closeImageModal('imagePreviewModal');
            });
        }

        // Cegah tutup saat klik konten
        const content = imagePreviewModal.querySelector('[data-image-preview-content]');
        if (content) {
            content.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        }
    }

    // Handler zoom gambar untuk semua gambar dengan data-image-zoom attribute (website)
    document.querySelectorAll('[data-image-zoom]').forEach(function (img) {
        img.addEventListener('click', function () {
            if (this.src) {
                window.openImageModal(this.src, { modalId: 'imageZoomModal', imgId: 'zoomImage' });
            }
        });
    });

    // Handler klik preview gambar dengan data attributes (admin)
    // Menggunakan fungsi universal openImageModal
    document.addEventListener('click', function (e) {
        const previewTrigger = e.target.closest('[data-image-preview]');
        if (previewTrigger && !e.target.closest('button')) {
            e.preventDefault();
            e.stopPropagation();

            let imageSrc = previewTrigger.getAttribute('data-image-src');
            const imageTitle = previewTrigger.getAttribute('data-image-title') || 'Preview';

            // Jika data-image-src dimulai dengan #, itu adalah ID elemen
            if (imageSrc && imageSrc.startsWith('#')) {
                const imgElement = document.querySelector(imageSrc);
                if (imgElement && imgElement.src) {
                    imageSrc = imgElement.src;
                } else {
                    return; // Tidak ada gambar
                }
            }

            if (imageSrc && typeof window.openImageModal === 'function') {
                window.openImageModal(imageSrc, {
                    modalId: 'imagePreviewModal',
                    imgId: 'previewImage',
                    title: imageTitle
                });
            }
        }

        // Handler preview gambar dinamis (untuk gambar yang dibuat secara dinamis)
        const dynamicPreviewTrigger = e.target.closest('[data-image-preview-dynamic]');
        if (dynamicPreviewTrigger && !e.target.closest('button')) {
            e.preventDefault();
            e.stopPropagation();

            // Cari elemen img di dalam trigger
            const imgElement = dynamicPreviewTrigger.querySelector('img');
            if (imgElement && imgElement.src) {
                const imageTitle = dynamicPreviewTrigger.getAttribute('data-image-title') || 'Preview';
                if (typeof window.openImageModal === 'function') {
                    window.openImageModal(imgElement.src, {
                        modalId: 'imagePreviewModal',
                        imgId: 'previewImage',
                        title: imageTitle
                    });
                }
            }
        }
    });
});
