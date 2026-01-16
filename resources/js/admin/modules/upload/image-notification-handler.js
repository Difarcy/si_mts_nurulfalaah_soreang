/**
 * Universal Image Notification Handler
 * Menangani notifikasi modal dan toast untuk semua komponen upload gambar
 * Digunakan oleh: images.js, multi-generic.js, banner.js
 *
 * Fitur:
 * - Modal dengan animasi slide-down + auto-hide 3s
 * - Fallback ke toast jika modal tidak ada
 * - Konsisten di semua komponen
 */

export const ImageNotificationHandler = {
    /**
     * Tampilkan Size Limit Error (Ukuran File Terlalu Besar)
     * Modal: Merah | Toast: Error
     */
    showSizeLimitError(fileName) {
        const modal = document.getElementById('size-limit-modal');
        const text = document.getElementById('size-limit-modal-text');

        if (modal && text) {
            text.textContent = `Ukuran file ${fileName} terlalu besar (maksimal 5MB).`;
            this._showModal(modal);
        } else {
            this._showToast(`Ukuran file ${fileName} terlalu besar (maksimal 5MB).`, 'error', 'admin');
        }
    },

    /**
     * Tampilkan Duplicate Warning (Gambar Sudah Ada)
     * Modal: Biru | Toast: Info
     */
    showDuplicateWarning(fileName) {
        const modal = document.getElementById('duplicate-image-modal');
        const text = document.getElementById('duplicate-image-modal-text');

        if (modal && text) {
            text.textContent = `Gambar "${fileName}" sudah ada dalam daftar.`;
            this._showModal(modal);
        } else {
            this._showToast(`Gambar "${fileName}" sudah ada dalam daftar.`, 'info', 'public');
        }
    },

    /**
     * Tampilkan Limit Warning (Terlalu Banyak File)
     * Toast: Warning (Modal tidak ada untuk limit)
     */
    showLimitWarning(message) {
        this._showToast(message, 'warning', 'public');
    },

    /**
     * Private: Tampilkan Modal dengan Animasi Slide-Down
     * - Auto-hide setelah 3 detik
     * - Smooth transition dengan requestAnimationFrame
     */
    _showModal(modal) {
        // 1. Unhide
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        // 2. Animate In dengan requestAnimationFrame
        requestAnimationFrame(() => {
            modal.classList.remove('-translate-y-full', 'opacity-0');
            modal.classList.add('translate-y-0', 'opacity-100');
        });

        // 3. Auto-hide setelah 3 detik
        setTimeout(() => {
            // Animate Out
            modal.classList.add('-translate-y-full', 'opacity-0');
            modal.classList.remove('translate-y-0', 'opacity-100');

            // Hide completely
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 500);
        }, 3000);
    },

    /**
     * Private: Tampilkan Toast Notification
     * Prioritas:
     * 1. showAdminNotification (untuk error)
     * 2. showPublicNotification (untuk warning/info)
     * 3. Alert (fallback terakhir)
     */
    _showToast(message, type, notificationType = 'public') {
        if (notificationType === 'admin' && window.showAdminNotification) {
            window.showAdminNotification(message, type);
        } else if (notificationType === 'public' && window.showPublicNotification) {
            window.showPublicNotification(message, type);
        } else if (window.showAdminNotification) {
            window.showAdminNotification(message, type);
        } else {
            alert(message);
        }
    }
};
