/**
 * School Profile Form Handler
 * Menangani:
 * - Upload & preview gambar dengan drag-drop
 * - Validasi file size & type
 * - Preview gambar tanpa harus submit form
 * - Delete gambar
 */

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('school-profile-form');
    if (!form) return;

    // Array untuk menyimpan input file yang di-monitor
    const fileInputs = [
        {
            id: 'gambar_sekolah',
            dropZoneId: 'drop-zone-sekolah',
            previewContainerId: 'preview-container-sekolah',
            placeholderId: 'upload-placeholder-sekolah',
            previewImgId: 'preview-img-sekolah',
            removeBtnId: 'remove-sekolah-btn',
            deleteFieldId: 'delete_gambar_sekolah',
            maxSize: 5 * 1024 * 1024
        },
        {
            id: 'struktur_organisasi',
            dropZoneId: 'drop-zone-struktur',
            previewContainerId: 'preview-container-struktur',
            placeholderId: 'upload-placeholder-struktur',
            previewImgId: 'preview-img-struktur',
            removeBtnId: 'remove-struktur-btn',
            deleteFieldId: 'delete_struktur_organisasi',
            maxSize: 5 * 1024 * 1024
        },
        {
            id: 'kepala_sekolah_foto',
            dropZoneId: 'drop-zone-kepsek',
            previewContainerId: 'preview-container-kepsek',
            placeholderId: 'upload-placeholder-kepsek',
            previewImgId: 'preview-img-kepsek',
            removeBtnId: 'remove-kepsek-btn',
            deleteFieldId: 'delete_kepala_sekolah_foto',
            maxSize: 5 * 1024 * 1024
        }
    ];

    /**
     * Setup drag-drop dan file handling untuk setiap input
     */
    fileInputs.forEach(config => {
        const fileInput = document.getElementById(config.id);
        const dropZone = document.getElementById(config.dropZoneId);
        const previewContainer = document.getElementById(config.previewContainerId);
        const placeholder = document.getElementById(config.placeholderId);
        const previewImg = document.getElementById(config.previewImgId);
        const removeBtn = document.getElementById(config.removeBtnId);
        const deleteField = document.getElementById(config.deleteFieldId);

        if (!fileInput || !dropZone) return;

        // === DRAG & DROP HANDLING === (SUDAH DIHANDLE OLEH generic.js)
        // Semua event listener drag-drop sudah ditambahkan oleh window.initGenericImageUpload

        // === PREVIEW IMAGE CLICK - OPEN MODAL (JANGAN TRIGGER UPLOAD) ===
        if (previewImg) {
            previewImg.addEventListener('click', (e) => {
                e.stopPropagation();
                // Cukup buka preview modal, jangan trigger file upload
                if (previewImg.src && typeof window.openImageModal === 'function') {
                    window.openImageModal(previewImg.src, {
                        modalId: 'imagePreviewModal',
                        imgId: 'previewImage',
                        title: config.id
                    });
                }
            });
        }

        // === REMOVE BUTTON HANDLING === (SUDAH DIHANDLE OLEH generic.js)
        // Remove button listener sudah ditambahkan oleh window.initGenericImageUpload
    });

    /**
     * Handle validation errors from server (display as toast)
     */
    function checkServerValidationErrors() {
        const errorElements = form.querySelectorAll('[data-flash-error], .text-red-600');

        errorElements.forEach(el => {
            const errorText = el.textContent?.trim();
            if (errorText && errorText.includes('terlalu besar')) {
                showFileValidationError(errorText);
                el.remove(); // Remove inline error message since we show as toast
            }
        });

        // Also check inline error messages next to file inputs
        fileInputs.forEach(fileInput => {
            const inputElement = document.getElementById(fileInput.id);
            if (!inputElement) return;

            // Find adjacent error message
            let errorEl = inputElement.nextElementSibling;
            while (errorEl && !errorEl.classList?.contains('text-red-600')) {
                errorEl = errorEl?.nextElementSibling;
            }

            if (errorEl && errorEl.textContent?.trim()) {
                const errorText = errorEl.textContent.trim();
                if (errorText.includes('terlalu besar') || errorText.includes('gambar')) {
                    showFileValidationError(errorText);
                    // Keep inline error but also show as toast
                }
            }
        });
    }

    /**
     * Display file validation error as toast
     */
    function showFileValidationError(message) {
        if (typeof window.showPublicNotification === 'function') {
            window.showPublicNotification(message, 'error');
        } else if (typeof window.showAdminNotification === 'function') {
            window.showAdminNotification(message, 'error');
        }
    }

    // Check for server validation errors on page load
    setTimeout(checkServerValidationErrors, 100);
});
