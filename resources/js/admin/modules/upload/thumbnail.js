/**
 * Thumbnail Preview Handler
 * Digunakan untuk upload dan preview thumbnail
 * Dipakai di: posts/_form.blade.php
 */

import { ImageNotificationHandler } from './image-notification-handler.js';

// ============================================
// GLOBAL HELPER FUNCTIONS (Always Available)
// ============================================

/**
 * Global wrapper untuk update thumbnail preview
 * Selalu tersedia untuk inline handlers
 */
window.updateThumbnailPreviewGlobal = function (input) {
    if (typeof window.updateThumbnailPreview === 'function') {
        window.updateThumbnailPreview(input);
    } else {
        // Fallback: langsung tampilkan preview
        const file = input.files && input.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const preview = document.getElementById('thumbnail-preview');
                const img = document.getElementById('thumbnail-preview-img');
                if (preview && img) {
                    img.src = e.target.result;
                    preview.classList.remove('hidden');
                }
            };
            reader.readAsDataURL(file);
        }
    }
};

/**
 * Global wrapper untuk remove thumbnail preview
 * Selalu tersedia untuk inline handlers
 */
window.removeThumbnailPreviewGlobal = function () {
    if (typeof window.removeThumbnailPreview === 'function') {
        window.removeThumbnailPreview();
    } else {
        // Fallback: langsung hapus preview
        const preview = document.getElementById('thumbnail-preview');
        const input = document.getElementById('thumbnail-input');
        if (preview) preview.classList.add('hidden');
        if (input) input.value = '';
    }
};

/**
 * Global handler untuk thumbnail drop (drag & drop)
 * Selalu tersedia untuk inline handlers
 */
window.handleThumbnailDropGlobal = function (event) {
    event.preventDefault();
    event.stopPropagation();

    const card = document.getElementById('thumbnail-upload-card');
    if (card) card.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');

    if (typeof window.handleThumbnailDrop === 'function') {
        window.handleThumbnailDrop(event);
    } else {
        // Fallback: langsung proses file
        const file = event.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const input = document.getElementById('thumbnail-input');
            if (input) {
                const dt = new DataTransfer();
                dt.items.add(file);
                input.files = dt.files;
                window.updateThumbnailPreviewGlobal(input);
            }
        }
    }
    return false;
};

/**
 * Global handler untuk thumbnail drag over
 * Selalu tersedia untuk inline handlers
 */
window.handleThumbnailDragOverGlobal = function (event) {
    event.preventDefault();
    event.stopPropagation();

    if (typeof window.handleThumbnailDragOver === 'function') {
        window.handleThumbnailDragOver(event);
    } else {
        // Fallback: visual feedback
        const card = document.getElementById('thumbnail-upload-card');
        if (card) card.classList.add('border-green-500', 'bg-green-50', 'dark:bg-green-900');
    }
    return false;
};

/**
 * Global handler untuk thumbnail drag leave
 * Selalu tersedia untuk inline handlers
 */
window.handleThumbnailDragLeaveGlobal = function (event) {
    event.preventDefault();
    event.stopPropagation();

    if (typeof window.handleThumbnailDragLeave === 'function') {
        window.handleThumbnailDragLeave(event);
    } else {
        // Fallback: remove visual feedback
        const card = document.getElementById('thumbnail-upload-card');
        if (card && !card.contains(event.relatedTarget)) {
            card.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }
    }
    return false;
};

/**
 * Global handler untuk klik upload card
 * Selalu tersedia untuk inline handlers
 */
window.handleThumbnailCardClick = function (event) {
    const currentContainer = document.getElementById('thumbnail-current-container');
    const previewDiv = document.getElementById('thumbnail-preview');
    const hasPreview = previewDiv && !previewDiv.classList.contains('hidden');
    if (currentContainer || hasPreview) {
        return;
    }
    if (!event.target.closest('#thumbnail-preview') && !event.target.closest('button')) {
        const input = document.getElementById('thumbnail-input');
        if (input) input.click();
    }
};

window.initThumbnailUpload = function (options = {}) {
    const {
        thumbnailInputId = 'thumbnail-input',
        thumbnailPreviewId = 'thumbnail-preview',
        thumbnailPreviewImgId = 'thumbnail-preview-img',
        thumbnailUploadCardId = 'thumbnail-upload-card',
        maxSize = 5 * 1024 * 1024, // 5MB
        onThumbnailChange = null
    } = options;

    const thumbnailInput = document.getElementById(thumbnailInputId);
    const thumbnailUploadCard = document.getElementById(thumbnailUploadCardId);
    if (!thumbnailInput || !thumbnailUploadCard) {
        // console.warn('Thumbnail upload elements not found:', {
        //     thumbnailInput: !!thumbnailInput,
        //     thumbnailUploadCard: !!thumbnailUploadCard
        // });
        return;
    }

    function updateThumbnailPreview(input) {
        if (input.files && input.files[0]) {
            processThumbnailFile(input.files[0]);
        }
    }


    function processThumbnailFile(file) {
        if (window.FileValidation) {
            if (!window.FileValidation.validateImage(file, maxSize)) {
                if (thumbnailInput) thumbnailInput.value = '';
                return;
            }
        } else {
            // Fallback: basic type check only
            if (!file.type.startsWith('image/')) {
                ImageNotificationHandler.showSizeLimitError(file.name);
                return;
            }
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            const previewDiv = document.getElementById(thumbnailPreviewId);
            const previewImg = document.getElementById(thumbnailPreviewImgId);
            const defaultDiv = document.getElementById('thumbnail-upload-default');
            if (previewDiv && previewImg) {
                previewImg.src = e.target.result;
                previewDiv.classList.remove('hidden');
            }
            if (defaultDiv) {
                defaultDiv.classList.add('hidden');
            }
            if (typeof onThumbnailChange === 'function') {
                onThumbnailChange();
            }
        };
        reader.readAsDataURL(file);
    }

    function handleThumbnailDrop(event) {
        event.preventDefault();
        event.stopPropagation();
        if (thumbnailUploadCard) {
            thumbnailUploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }
        if (document.getElementById('thumbnail-current-container')) {
            return false;
        }

        const file = Array.from(event.dataTransfer.files).find(f => f.type.startsWith('image/'));
        if (!file) {
            ImageNotificationHandler.showSizeLimitError('File');
            return false;
        }

        // Validate file using global helper
        if (window.FileValidation) {
            if (!window.FileValidation.validateImage(file, maxSize)) return false;
        }

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        thumbnailInput.files = dataTransfer.files;
        processThumbnailFile(file);
        return false;
    }

    function handleThumbnailDragOver(event) {
        event.preventDefault();
        event.stopPropagation();
        if (thumbnailUploadCard) {
            thumbnailUploadCard.classList.add('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }
        return false;
    }

    function handleThumbnailDragLeave(event) {
        event.preventDefault();
        event.stopPropagation();
        // Only remove highlight if we're actually leaving the card (not just moving to child element)
        if (thumbnailUploadCard && !thumbnailUploadCard.contains(event.relatedTarget)) {
            thumbnailUploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }
        return false;
    }

    function removeThumbnailPreview() {
        // Langsung hapus tanpa modal untuk preview upload baru
        executeRemoveThumbnail();
    }

    // Actual removal logic
    function executeRemoveThumbnail() {
        const previewDiv = document.getElementById(thumbnailPreviewId);
        const defaultDiv = document.getElementById('thumbnail-upload-default');
        const uploadBtn = document.getElementById('thumbnail-upload-btn');
        const currentContainer = document.getElementById('thumbnail-current-container');

        // Check if we are removing an existing image from database
        const isExistingThumbnail = !!currentContainer;

        if (currentContainer) {
            currentContainer.remove();
        }

        if (previewDiv) {
            previewDiv.classList.add('hidden');
        }
        if (thumbnailInput) {
            thumbnailInput.value = '';
        }
        if (defaultDiv) {
            defaultDiv.classList.remove('hidden');
        }
        if (uploadBtn) {
            uploadBtn.removeAttribute('disabled');
            uploadBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            uploadBtn.textContent = 'Upload Thumbnail';
        }

        // Tambahkan logic flag untuk edit mode
        const removeThumbnailFlag = document.getElementById('remove-thumbnail-flag');
        if (removeThumbnailFlag && isExistingThumbnail) {
            removeThumbnailFlag.value = '1';
        }

        if (typeof onThumbnailChange === 'function') {
            onThumbnailChange();
        }
    }



    // Setup event listeners
    if (thumbnailInput) {
        thumbnailInput.addEventListener('change', function () {
            updateThumbnailPreview(this);
        });
    }

    if (thumbnailUploadCard) {
        thumbnailUploadCard.addEventListener('drop', handleThumbnailDrop);
        thumbnailUploadCard.addEventListener('dragover', handleThumbnailDragOver);
        thumbnailUploadCard.addEventListener('dragleave', handleThumbnailDragLeave);
        // Click handler untuk card (hanya jika bukan button yang diklik)
        // Gunakan bubbling phase agar button handler (capture) di-handle lebih dulu
        thumbnailUploadCard.addEventListener('click', function (e) {
            const currentContainer = document.getElementById('thumbnail-current-container');
            const previewDiv = document.getElementById(thumbnailPreviewId);
            const hasPreview = previewDiv && !previewDiv.classList.contains('hidden');
            if (currentContainer || hasPreview) {
                return; // Jangan buka file picker jika thumbnail/preview sudah ada
            }
            if (!e.target.closest('#thumbnail-preview') && !e.target.closest('button')) {
                thumbnailInput.click();
            }
        }, false); // Bubbling phase
    }

    // Setup thumbnail upload button handler (prioritas tinggi dengan capture phase)
    const thumbnailUploadBtn = document.getElementById('thumbnail-upload-btn');
    if (thumbnailUploadBtn && thumbnailInput) {
        // Remove any existing listeners first (if any)
        const newBtn = thumbnailUploadBtn.cloneNode(true);
        thumbnailUploadBtn.parentNode.replaceChild(newBtn, thumbnailUploadBtn);

        // Add event listener to the new button
        newBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            const currentContainer = document.getElementById('thumbnail-current-container');
            const previewDiv = document.getElementById(thumbnailPreviewId);
            const hasPreview = previewDiv && !previewDiv.classList.contains('hidden');
            if (currentContainer || hasPreview) return;
            if (thumbnailInput) thumbnailInput.click();
        }, true); // Capture phase untuk memastikan di-handle lebih dulu
    }

    // Disable upload button if current thumbnail exists or preview visible
    if (thumbnailUploadBtn) {
        const currentContainer = document.getElementById('thumbnail-current-container');
        const previewDiv = document.getElementById(thumbnailPreviewId);
        const hasPreview = previewDiv && !previewDiv.classList.contains('hidden');
        if (currentContainer || hasPreview) {
            thumbnailUploadBtn.setAttribute('disabled', 'disabled');
            thumbnailUploadBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            thumbnailUploadBtn.removeAttribute('disabled');
            thumbnailUploadBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    // Setup remove thumbnail button handler
    const removeThumbnailBtn = document.getElementById('remove-thumbnail-btn');
    if (removeThumbnailBtn) {
        removeThumbnailBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            removeThumbnailPreview();
        });
    }

    // Make all functions globally available for inline handlers
    window.updateThumbnailPreview = updateThumbnailPreview;
    window.handleThumbnailDrop = handleThumbnailDrop;
    window.handleThumbnailDragOver = handleThumbnailDragOver;
    window.handleThumbnailDragLeave = handleThumbnailDragLeave;
    window.removeThumbnailPreview = removeThumbnailPreview;
};
