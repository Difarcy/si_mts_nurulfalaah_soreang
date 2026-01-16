/**
 * GENERIC DELETE HANDLER MODULE
 * =============================
 *
 * FUNGSI UTAMA:
 * Menangani DELETE confirmation untuk SEMUA resource type di admin panel
 * Menggunakan shared modal dan data-attributes di HTML
 *
 * CARA KERJA:
 * 1. User klik tombol dengan class 'delete-trigger'
 * 2. Extract data dari data-attributes: data-action, data-title, data-message
 * 3. Tampilkan modal konfirmasi dengan title & message
 * 4. User klik "Hapus" untuk submit form ke action URL
 * 5. Server hapus resource, kirim response ke browser
 * 6. Modal tutup, halaman refresh/update
 *
 * STRUKTUR MODAL (di layout):
 * <div id="delete-confirmation-modal" class="hidden">
 *     <h3 id="delete-confirmation-title">Konfirmasi</h3>
 *     <p id="delete-confirmation-message">Yakin hapus?</p>
 *     <form id="delete-confirmation-form" method="POST">
 *         <button type="button" id="delete-confirmation-cancel">Batal</button>
 *         <button type="submit">Hapus</button>
 *     </form>
 * </div>
 *
 * USAGE DI BLADE:
 * <button class="delete-trigger"
 *     data-action="{{ route('posts.destroy', $post->id) }}"
 *     data-title="Hapus: {{ $post->title }}"
 *     data-message="Data ini akan dihapus secara permanen!">
 *     Delete
 * </button>
 *
 * FUNCTION UTAMA:
 * ===============
 * initGenericDeleteHandler(options)
 *   → Setup delete handler untuk semua tombol dengan class 'delete-trigger'
 *   → Konfigurasi modal IDs, form ID, dll
 *
 * GLOBAL FUNCTIONS (dipanggil dari luar):
 * =======================================
 * window.showDeleteModal(action, title, message)
 *   → Tampilkan modal konfirmasi dengan custom title & message
 *   → Set form.action ke endpoint untuk disubmit
 *
 * window.hideDeleteModal()
 *   → Tutup modal konfirmasi
 *   → Reset form.action
 */

export function initGenericDeleteHandler(options = {}) {
    const config = {
        triggerSelector: '[data-delete-trigger]',
        modalId: 'delete-confirmation-modal',
        formId: 'delete-confirmation-form',
        titleId: 'delete-confirmation-title',
        messageId: 'delete-confirmation-message', // Optional
        cancelBtnId: 'delete-confirmation-cancel',
        ...options
    };

    const modal = document.getElementById(config.modalId);
    const form = document.getElementById(config.formId);
    const titleEl = document.getElementById(config.titleId);
    const messageEl = document.getElementById(config.messageId);
    const cancelBtn = document.getElementById(config.cancelBtnId);

    /**
     * TAMPILKAN MODAL - Show delete confirmation dialog
     * @param {string} action - Form action URL untuk submit (route dengan method DELETE)
     * @param {string} title - Judul/nama item yang akan dihapus
     * @param {string} message - Pesan konfirmasi khusus (optional)
     */
    function showModal(action, title, message) {
        if (!modal || !form) {
            // console.warn('Delete modal or form not found in DOM.');
            return;
        }

        // Set form action ke endpoint yang akan di-submit
        form.action = action;

        // Update title element
        if (titleEl && title) {
            titleEl.textContent = title;
        }

        // Update message element
        if (messageEl) {
            if (message) {
                messageEl.textContent = message;
            }
        }

        // Show modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    /**
     * TUTUP MODAL - Hide delete confirmation dialog
     * Reset form action dan clear text
     */
    function hideModal() {
        if (!modal) return;

        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
        if (form) form.action = '#'; // Reset action
        if (titleEl) titleEl.textContent = '';
    }

    // Expose Global Helpers
    window.hideDeleteModal = hideModal;
    window.showDeleteModal = showModal;

    // If modal/form doesn't exist, we can't proceed with event listeners
    if (!modal || !form) {
        return;
    }

    // Global Click Listener for Triggers
    document.addEventListener('click', function (e) {
        const trigger = e.target.closest(config.triggerSelector);
        if (trigger) {
            e.preventDefault();
            const action = trigger.getAttribute('data-action');
            const title = trigger.getAttribute('data-title');
            const message = trigger.getAttribute('data-message');

            if (action) {
                showModal(action, title, message);
            } else {
                // console.warn('Delete trigger missing data-action attribute');
            }
        }
    });

    // Cancel Button Listener
    if (cancelBtn) {
        cancelBtn.addEventListener('click', hideModal);
    }

    // Close on Backdrop Click
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            hideModal();
        }
    });

    // Close on ESC Key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            hideModal();
        }
    });
}
