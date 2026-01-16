/**
 * Modal Delete Image
 * Digunakan untuk konfirmasi penghapusan gambar
 */

window.initDeleteImageModal = function (options = {}) {
    const {
        onConfirm = null
    } = options;

    let pendingDeleteCallback = null;

    function showDeleteImageModal(title, message, onConfirmCallback) {
        pendingDeleteCallback = onConfirmCallback || onConfirm;

        const modal = document.getElementById('delete-confirmation-modal');
        const form = document.getElementById('delete-confirmation-form');
        const titleEl = document.getElementById('delete-confirmation-title');
        const messageEl = document.getElementById('delete-confirmation-message');
        const cancelBtn = document.getElementById('delete-confirmation-cancel');

        if (!modal || !form) {
            if (confirm(message || 'Apakah Anda yakin ingin menghapus gambar ini?')) {
                if (pendingDeleteCallback) pendingDeleteCallback();
            }
            return;
        }

        // Set Content
        if (titleEl) titleEl.textContent = title || 'Konfirmasi Hapus Gambar';
        if (messageEl) messageEl.textContent = message || 'Apakah Anda yakin ingin menghapus gambar ini? Tindakan ini tidak dapat dibatalkan.';

        // Prepare Hijack Handler
        const handleConfirm = (e) => {
            e.preventDefault();
            if (pendingDeleteCallback) pendingDeleteCallback();
            cleanupHijack();
            if (window.hideDeleteModal) window.hideDeleteModal();
            else modal.classList.add('hidden');
        };

        const cleanupHijack = () => {
            form.onsubmit = null;
            if (cancelBtn) cancelBtn.removeEventListener('click', cleanupHijack);
            modal.removeEventListener('click', checkBackdropHijack);
            document.removeEventListener('keydown', checkEscHijack);
            form.removeAttribute('action');
        };

        const checkBackdropHijack = (e) => { if (e.target === modal) cleanupHijack(); };
        const checkEscHijack = (e) => { if (e.key === 'Escape') cleanupHijack(); };

        // Attach Listeners
        form.onsubmit = handleConfirm;
        if (cancelBtn) cancelBtn.addEventListener('click', cleanupHijack);
        modal.addEventListener('click', checkBackdropHijack);
        document.addEventListener('keydown', checkEscHijack);

        // Show Modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function hideDeleteImageModal() {
        // Alias for hiding the generic modal if needed programmatically
        if (window.hideDeleteModal) window.hideDeleteModal();
    }

    // Make functions globally available
    window.showDeleteImageModal = showDeleteImageModal;
    window.hideDeleteImageModal = hideDeleteImageModal;
};

/**
 * Remove image handler - untuk menghapus gambar dari preview
 * Dipanggil dari tombol X pada preview images
 */
window.removeImage = function (index) {
    if (window.PostsImagesUpload && window.PostsImagesUpload.executeRemoveImage) {
        // Langsung hapus tanpa modal untuk UX yang lebih cepat
        window.PostsImagesUpload.executeRemoveImage(index);
    } else {
        // console.error('Cannot remove image: PostsImagesUpload not available');
    }
};

/**
 * Remove existing image handler - untuk menghapus gambar yang sudah diupload
 * Dipanggil dari tombol X pada existing images
 */
window.removeExistingImage = function (button, imagePath) {
    if (window.PostsImagesUpload) {
        window.PostsImagesUpload.pendingDeleteImage = {
            type: 'existing',
            index: null,
            imagePath: imagePath,
            button: button
        };
        // Langsung hapus tanpa modal (tunggu tombol simpan)
        window.PostsImagesUpload.confirmDeleteImage();
    }
};

