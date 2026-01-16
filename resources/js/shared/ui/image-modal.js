/**
 * Universal Image Modal Functions (dipakai di website dan admin)
 */
window.openImageModal = function (imageSrc, options = {}) {
    const {
        modalId = 'imageZoomModal',
        imgId = 'zoomImage',
        title = null
    } = options;

    const modal = document.getElementById(modalId);
    const img = document.getElementById(imgId);
    if (modal && img && imageSrc) {
        img.src = imageSrc;
        if (title && img.alt !== undefined) {
            img.alt = title;
        }
        // Show modal and ensure opacity classes allow CSS transition
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // If modal uses opacity utilities, animate to visible
        modal.classList.remove('opacity-0');
        modal.classList.add('opacity-100');
        // Allow background scroll to be locked
        document.body.classList.add('overflow-hidden');
    }
};

window.closeImageModal = function (modalId = 'imageZoomModal') {
    const modal = document.getElementById(modalId);
    if (modal) {
        // Smoothly fade out if opacity utilities present
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        // After transition, hide completely
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }, 200);
    }
};

// Legacy functions untuk backward compatibility (website)
window.openImageZoom = function (imageSrc, modalId = 'imageZoomModal', imgId = 'zoomImage') {
    window.openImageModal(imageSrc, { modalId, imgId });
};

window.closeImageZoom = function (modalId = 'imageZoomModal') {
    window.closeImageModal(modalId);
};

// Legacy functions untuk backward compatibility (admin)
window.openImagePreview = function (imageSrc, title = 'Preview', modalId = 'imagePreviewModal', imgId = 'previewImage') {
    window.openImageModal(imageSrc, { modalId, imgId, title });
};

window.closeImagePreview = function (modalId = 'imagePreviewModal') {
    window.closeImageModal(modalId);
};

// Universal ESC key handler untuk semua image modals (hanya sekali)
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        // Check imageZoomModal (website)
        const imageZoomModal = document.getElementById('imageZoomModal');
        if (imageZoomModal && !imageZoomModal.classList.contains('hidden')) {
            window.closeImageModal('imageZoomModal');
            return;
        }
        // Check imagePreviewModal (admin)
        const imagePreviewModal = document.getElementById('imagePreviewModal');
        if (imagePreviewModal && !imagePreviewModal.classList.contains('hidden')) {
            window.closeImageModal('imagePreviewModal');
            return;
        }
    }
});

function initDataAttributePreviewModal() {
    const modal = document.querySelector('[data-image-preview-modal]');
    if (!modal) return;
    if (modal.dataset.__imagePreviewInit === '1') return;
    modal.dataset.__imagePreviewInit = '1';

    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('[data-image-preview]');
        if (trigger) {
            const src = trigger.getAttribute('data-image-src') || '';
            if (src) {
                window.openImagePreview(src);
            }
            return;
        }

        const closeBtn = e.target.closest('[data-image-preview-close]');
        if (closeBtn) {
            window.closeImagePreview();
            return;
        }

        const content = e.target.closest('[data-image-preview-content]');
        if (!content && e.target.closest('[data-image-preview-modal]')) {
            window.closeImagePreview();
        }
    });
}

initDataAttributePreviewModal();
