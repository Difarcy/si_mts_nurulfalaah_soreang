/**
 * Upload Banner
 * Digunakan untuk upload banner slide dan banner promosi dengan drag & drop
 * Dipakai di: admin/pages/banners/banners.blade.php
 */

import { ImageNotificationHandler } from './image-notification-handler.js';

// Global state untuk banner upload
let selectedBannerImages = [];
try { window.selectedBannerImages = selectedBannerImages; } catch (_) { }
let maxBanners = 6;
const fileKey = (file) => `${file.name}_${file.size}_${file.lastModified}`;

// Track banner order for detecting changes
let originalBannerOrder = [];
let currentBannerOrder = [];

/**
 * Get current banner order from DOM
 */
window.getCurrentBannerOrder = function () {
    const bannerList = document.getElementById('banner-list');
    if (!bannerList) return [];

    const items = bannerList.querySelectorAll('.banner-item');
    return Array.from(items).map(item => item.dataset.id);
};

/**
 * Check if banner order has changed from original
 */
window.hasBannerOrderChanged = function () {
    const current = window.getCurrentBannerOrder();
    const original = originalBannerOrder;

    if (current.length !== original.length) return true;

    for (let i = 0; i < current.length; i++) {
        if (current[i] !== original[i]) return true;
    }

    return false;
};

/**
 * Initialize banner order tracking
 */
window.initBannerOrderTracking = function () {
    originalBannerOrder = window.getCurrentBannerOrder();
    currentBannerOrder = [...originalBannerOrder];
};

// Helper function untuk menampilkan limit warning
function showBannerLimitWarning(remainingSlots) {
    if (remainingSlots <= 0) {
        ImageNotificationHandler.showLimitWarning(`Maksimal ${maxBanners} banner. Hapus banner yang tidak digunakan terlebih dahulu.`);
    } else {
        ImageNotificationHandler.showLimitWarning(`Maksimal ${maxBanners} banner. Anda hanya bisa menambah ${remainingSlots} banner lagi.`);
    }
}

window.getEffectiveBannerCount = function () {
    const currentCount = window.currentBannerCount || 0;
    const pendingDeleteCount = window.__pendingBannerDeletions ? window.__pendingBannerDeletions.size : 0;
    return Math.max(0, currentCount - pendingDeleteCount);
};



function validateFile(file) {
    if (!file || !file.type || !file.type.startsWith('image/')) {
        return false;
    }

    // Use global FileValidation for consistent error messages
    if (window.FileValidation) {
        return window.FileValidation.validateImage(file, 5 * 1024 * 1024);
    }

    // Fallback: basic size check only
    const maxSize = 5 * 1024 * 1024;
    if (file.size > maxSize) {
        ImageNotificationHandler.showSizeLimitError(file.name);
        return false;
    }

    return true;
}

// Initialize banner upload handlers
document.addEventListener('DOMContentLoaded', function () {
    // Init grid layout for existing banners
    updateBannerGridLayout();

    // Initialize banner order tracking
    if (typeof window.initBannerOrderTracking === 'function') {
        window.initBannerOrderTracking();
    }

    // Setup drag & drop for existing banners
    setupExistingBanners();

    function initBannerUploadHandlers() {
        const bannerUploadCard = document.getElementById('banner-upload-card');
        const bannerAddBtn = document.getElementById('banner-add-btn');

        const promosiInput = document.getElementById('promosi_banner');
        const promosiCard = document.getElementById('promosi-upload-card');

        if (!bannerUploadCard && !promosiCard) {
            return;
        }

        const bannerUploadInput = document.getElementById('gambar');

        if (bannerUploadInput) {
            bannerUploadInput.removeEventListener('change', window.handleFileSelect);
            bannerUploadInput.addEventListener('change', window.handleFileSelect);
        }

        if (bannerUploadCard) {
            bannerUploadCard.removeEventListener('drop', window.handleDrop);
            bannerUploadCard.removeEventListener('dragover', window.handleDragOver);
            bannerUploadCard.removeEventListener('dragleave', window.handleDragLeave);
            bannerUploadCard.removeEventListener('click', window.handleBannerUploadCardClick);

            bannerUploadCard.addEventListener('drop', window.handleDrop);
            bannerUploadCard.addEventListener('dragover', window.handleDragOver);
            bannerUploadCard.addEventListener('dragleave', window.handleDragLeave);
            bannerUploadCard.addEventListener('click', window.handleBannerUploadCardClick);
        }

        // Perbaikan: Tambahkan event listener khusus untuk bannerAddBtn
        if (bannerAddBtn && bannerAddBtn.parentNode) {
            // Hapus listener lama jika ada (optional, tapi good practice)
            const newBtn = bannerAddBtn.cloneNode(true);
            bannerAddBtn.parentNode.replaceChild(newBtn, bannerAddBtn);

            newBtn.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default button behavior
                event.stopPropagation(); // Stop propagation
                if (bannerUploadInput) {
                    bannerUploadInput.click();
                }
            });
        }

        if (promosiInput) {
            promosiInput.addEventListener('change', window.handlePromosiFileSelect);
        }

        if (promosiCard) {
            promosiCard.addEventListener('drop', window.handlePromosiDrop);
            promosiCard.addEventListener('dragover', window.handlePromosiDragOver);
            promosiCard.addEventListener('dragleave', window.handlePromosiDragLeave);
            promosiCard.addEventListener('click', function (event) {
                if (!event.target.closest('#promosi-preview-container') && !event.target.closest('button')) {
                    if (promosiInput) promosiInput.click();
                }
            });
        }
    }

    initBannerUploadHandlers();
});

window.updateBannerGridLayout = function () {
    const bannerListEl = document.getElementById('banner-list');
    if (!bannerListEl) return;

    // Ensure landscape style is present
    const styleId = 'banner-landscape-style';
    if (!document.getElementById(styleId)) {
        const style = document.createElement('style');
        style.id = styleId;
        style.textContent = `
            .banner-item-img, .draggable-image img {
                aspect-ratio: 16/9 !important;
                object-fit: cover !important;
                width: 100%;
                height: 100%;
            }
            .banner-item-container, .draggable-image > div {
                 aspect-ratio: 16/9 !important;
                 height: auto !important;
            }
        `;
        document.head.appendChild(style);
    }

    const existingCount = document.querySelectorAll('.banner-item:not(.hidden)').length;
    const newCount = selectedBannerImages ? selectedBannerImages.length : 0;
    const totalCount = existingCount + newCount;

    bannerListEl.className = 'grid gap-4 w-full'; // Reset base classes

    let gridClasses = 'grid gap-4 w-full mx-auto';

    if (totalCount === 1) {
        gridClasses += ' grid-cols-1 max-w-2xl';
    } else if (totalCount === 2) {
        gridClasses += ' grid-cols-2 max-w-4xl';
    } else {
        // 3 or more (4, 5, etc) -> 2 Columns
        gridClasses += ' grid-cols-2 max-w-4xl';
    }

    bannerListEl.className = gridClasses;

    // Handle vertical alignment in parent container
    const parentContainer = bannerListEl.parentElement; // contentWrapper
    if (parentContainer) {
         if (totalCount <= 2) {
             // For 1-2 banners, center vertically and horizontally
             parentContainer.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'min-h-[400px]');
             parentContainer.classList.remove('block');
         } else {
             parentContainer.classList.remove('flex', 'flex-col', 'items-center', 'justify-center', 'min-h-[400px]');
             parentContainer.classList.add('block');
         }
    }
};

function setupExistingBanners() {
    const existingBanners = document.querySelectorAll('.banner-item[data-id]');
    existingBanners.forEach(banner => {
        // Do NOT clone existing banners - let visual-identity.js handle deletion
        // Just add drag listeners

        // Add drag listeners only (pure drag & drop, no click mode)
        banner.addEventListener('dragstart', handleBannerDragStart);
        banner.addEventListener('dragend', handleBannerDragEnd);
        banner.addEventListener('dragover', handleBannerDragOver);
        banner.addEventListener('dragleave', handleBannerDragLeave);
        banner.addEventListener('drop', handleBannerDrop);

        // Ensure draggable attribute
        banner.setAttribute('draggable', 'true');
    });
}

function handleBannerDragStart(e) {
    e.stopPropagation();
    // Store reference to dragged element
    window.draggedBannerElement = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
    e.dataTransfer.setData('application/x-draggable-banner', 'true');

    // Set flag to prevent upload card from reacting during internal drag
    const uploadCard = document.getElementById('banner-upload-card');
    if (uploadCard) {
        uploadCard.dataset.internalDrag = 'true';
    }
}

function handleBannerDragEnd(e) {
    e.stopPropagation();
    window.draggedBannerElement = null;

    // Clear flag to allow upload card to react again
    const uploadCard = document.getElementById('banner-upload-card');
    if (uploadCard) {
        uploadCard.dataset.internalDrag = '';
    }
}

function handleBannerDragOver(e) {
    e.preventDefault();
    e.stopPropagation();
    e.dataTransfer.dropEffect = 'move';
    // Add visual feedback - highlight target
    if (e.currentTarget) {
        e.currentTarget.classList.add('border-green-500', 'bg-green-50', 'dark:bg-green-900');
    }
    return false;
}

function handleBannerDragLeave(e) {
    e.stopPropagation();
    // Remove visual feedback when leaving the element
    if (e.currentTarget && !e.currentTarget.contains(e.relatedTarget)) {
        e.currentTarget.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
    }
}

function handleBannerDrop(e) {
    e.preventDefault();
    e.stopPropagation();

    const fromElement = window.draggedBannerElement;
    const toElement = this;

    // Remove visual feedback
    if (toElement) {
        toElement.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
    }

    if (fromElement && fromElement !== toElement) {
        // Swap DOM nodes
        try {
            swapDomNodes(fromElement, toElement);
        } catch (_) {
            // Fallback: do a naive insertBefore if swap fails
            const parent = toElement.parentElement;
            if (parent) {
                parent.insertBefore(fromElement, toElement);
            }
        }

        // Rebuild banner list from DOM
        rebuildBannerListFromDOM();

        // Trigger save button state update
        if (typeof window.updateSaveButtonState === 'function') {
            window.updateSaveButtonState();
        }
    }

    return false;
}

function swapDomNodes(a, b) {
    const aParent = a.parentNode;
    const bParent = b.parentNode;

    const aNext = a.nextSibling;
    const bNext = b.nextSibling;

    // If a is next to b
    if (aNext === b) {
        bParent.insertBefore(b, a);
    }
    // If b is next to a
    else if (bNext === a) {
        aParent.insertBefore(a, b);
    }
    // Distant swap
    else {
        aParent.insertBefore(b, aNext);
        bParent.insertBefore(a, bNext);
    }
}

/**
 * Rebuild banner list from DOM order
 * Called after reordering to sync internal state
 */
function rebuildBannerListFromDOM() {
    // Update grid layout based on new count
    try { window.updateBannerGridLayout(); } catch (_) { }

    // Update currentBannerOrder tracking
    currentBannerOrder = window.getCurrentBannerOrder();

    // Trigger save button state update
    if (typeof window.updateSaveButtonState === 'function') {
        window.updateSaveButtonState();
    }
}

window.handleBannerUploadCardClick = function (event) {
    // Prevent triggering if clicking on child interactive elements (like delete buttons)
    if (event.target.closest('button') || event.target.closest('a')) {
        return;
    }
    const input = document.getElementById('gambar');
    if (input) input.click();
};

/**
 * Process selected banner files (common logic for file select and drag-drop)
 */
function processSelectedBannerFiles(files) {
    if (files.length === 0) return false;

    // Check if adding these files would exceed the limit
    const effectiveCurrent = window.getEffectiveBannerCount();
    const totalCurrent = effectiveCurrent + selectedBannerImages.length;
    const remainingSlots = Math.max(0, maxBanners - totalCurrent);

    // Jika tidak ada slot yang tersisa, tampilkan notifikasi dan exit
    if (remainingSlots === 0) {
        showBannerLimitWarning(remainingSlots);
        return false;
    }

    const validFiles = files.filter(file => validateFile(file));
    if (validFiles.length === 0) {
        return false;
    }

    // Identify Duplicates & Unique Files
    const uniqueFilesToAdd = [];
    let hasDuplicates = false;
    let duplicateName = '';

    const existingKeys = new Set(selectedBannerImages.map(fileKey));
    validFiles.forEach(f => {
        const key = fileKey(f);
        if (!existingKeys.has(key)) {
            uniqueFilesToAdd.push(f);
            existingKeys.add(key);
        } else {
            hasDuplicates = true;
            duplicateName = f.name;
        }
    });

    // Handle Duplicates Notification
    if (hasDuplicates) {
        ImageNotificationHandler.showDuplicateWarning(duplicateName);
    }

    // Jika tidak ada file baru (semua duplikasi), exit
    if (uniqueFilesToAdd.length === 0) {
        return false;
    }

    // Check Limit & Add Unique Files
    if (uniqueFilesToAdd.length > 0) {
        const allowableSlots = remainingSlots;
        if (uniqueFilesToAdd.length > allowableSlots) {
            ImageNotificationHandler.showLimitWarning(`Anda hanya dapat mengunggah hingga ${maxBanners} banner.`);
            uniqueFilesToAdd.length = allowableSlots;
        }
    }

    if (uniqueFilesToAdd.length > 0) {
        selectedBannerImages = selectedBannerImages.concat(uniqueFilesToAdd);
        try { window.selectedBannerImages = selectedBannerImages; } catch (_) { }
    }

    // Update preview
    updateBannerImagesPreview();
    syncBannerImagesToInput();

    // Trigger save button state update
    if (typeof window.updateSaveButtonState === 'function') {
        window.updateSaveButtonState();
    } else {
        const input = document.getElementById('gambar');
        if (input && input.form) {
            input.form.dispatchEvent(new Event('change', { bubbles: true }));
        }
    }

    return true;
}

window.handleFileSelect = function (event) {
    const files = Array.from(event.target.files);
    processSelectedBannerFiles(files);
    event.target.value = '';
};

window.handleDrop = function (event) {
    event.preventDefault();
    event.stopPropagation();

    const uploadCard = document.getElementById('banner-upload-card');
    if (uploadCard) {
        uploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
    }

    // Ignore non-file drops (e.g. reordering)
    const types = event.dataTransfer.types ? Array.from(event.dataTransfer.types) : [];
    if (!types.includes('Files')) {
        return;
    }

    const files = Array.from(event.dataTransfer.files).filter(f => f.type.startsWith('image/'));
    if (files.length === 0) {
        ImageNotificationHandler.showSizeLimitError('File tidak valid atau bukan gambar');
        return;
    }

    processSelectedBannerFiles(files);
};

window.handleDragOver = function (event) {
    event.preventDefault();
    event.stopPropagation();
    const uploadCard = document.getElementById('banner-upload-card');
    const isInternalDrag = event.dataTransfer && Array.from(event.dataTransfer.types || []).includes('application/x-draggable-image');
    if (uploadCard && !isInternalDrag && uploadCard.dataset.internalDrag !== 'true') {
        uploadCard.classList.add('border-green-500', 'bg-green-50', 'dark:bg-green-900');
    }
};

window.handleDragLeave = function (event) {
    event.preventDefault();
    event.stopPropagation();
    const uploadCard = document.getElementById('banner-upload-card');
    if (uploadCard && !uploadCard.contains(event.relatedTarget)) {
        uploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
    }
};

function updateBannerImagesPreview() {
    const previewList = document.getElementById('banner-preview-list');
    if (!previewList) return;

    const contentWrapper = document.getElementById('banner-content-wrapper');
    const defaultContent = document.getElementById('banner-upload-default');
    const addBtn = document.getElementById('banner-add-btn');
    const bannerListEl = document.getElementById('banner-list');

    // Clear existing previews (new uploads only)
    previewList.innerHTML = '';

    const effectiveCount = window.getEffectiveBannerCount();
    const newCount = selectedBannerImages.length;
    const totalCount = effectiveCount + newCount;

    if (totalCount === 0) {
        if (contentWrapper) contentWrapper.classList.add('hidden');
        if (defaultContent) defaultContent.classList.remove('hidden');
        if (addBtn) addBtn.classList.add('hidden');
        const submitContainer = document.getElementById('banner-submit-container');
        if (submitContainer) submitContainer.classList.add('hidden');
        return;
    }

    if (contentWrapper) contentWrapper.classList.remove('hidden');
    if (defaultContent) defaultContent.classList.add('hidden');
    if (addBtn) {
        addBtn.classList.remove('hidden');
        if (totalCount >= (window.maxBanners || 6)) {
            addBtn.disabled = true;
            addBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            addBtn.disabled = false;
            addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }

    // Dynamic grid columns: 1 col if only one item, otherwise 2 cols
    if (bannerListEl) {
        bannerListEl.classList.remove('grid-cols-1', 'grid-cols-2', 'max-w-2xl', 'mx-auto');
        if (totalCount === 1) {
            bannerListEl.classList.add('grid-cols-1', 'max-w-2xl', 'mx-auto');
        } else {
            bannerListEl.classList.add('grid-cols-2');
        }
    }

    const submitContainer = document.getElementById('banner-submit-container');
    if (submitContainer) {
        submitContainer.classList.remove('hidden');
    }

    // Dynamic grid columns based on file count
    // Use landscape aspect ratio for banner items
    // Force aspect-ratio to be wide (e.g., 2:1 or 16:9) and object-cover

    // Add CSS for landscape banner items dynamically if not present
    const styleId = 'banner-landscape-style';
    if (!document.getElementById(styleId)) {
        const style = document.createElement('style');
        style.id = styleId;
        style.textContent = `
            .banner-item img, .draggable-image img {
                aspect-ratio: 16/9 !important;
                object-fit: cover !important;
                width: 100%;
                height: 100%;
            }
            .banner-item > div, .draggable-image > div {
                 aspect-ratio: 16/9 !important;
                 height: auto !important;
            }
        `;
        document.head.appendChild(style);
    }

    if (bannerListEl) {
        bannerListEl.className = 'grid gap-4 w-full'; // Reset base classes

        let gridClasses = 'grid gap-4 w-full mx-auto';

        if (totalCount === 1) {
            gridClasses += ' grid-cols-1 max-w-2xl';
        } else if (totalCount === 2) {
            gridClasses += ' grid-cols-2 max-w-4xl';
        } else {
            // 3 or more (4, 5, etc) -> 2 Columns
            gridClasses += ' grid-cols-2 max-w-4xl';
        }

        bannerListEl.className = gridClasses;

        // Handle vertical alignment in parent container
        const parentContainer = bannerListEl.parentElement; // contentWrapper
        if (parentContainer) {
             if (totalCount <= 2) {
                 parentContainer.classList.add('flex', 'flex-col', 'justify-center', 'min-h-[400px]');
                 parentContainer.classList.remove('block');
             } else {
                 parentContainer.classList.remove('flex', 'flex-col', 'justify-center', 'min-h-[400px]');
                 parentContainer.classList.add('block');
             }
        }
    }

    let filesLoaded = 0;
    const filesToLoad = selectedBannerImages.length;

    const checkAllLoaded = () => {
        filesLoaded++;
        if (filesLoaded === filesToLoad) {
            // Setup drag & drop for all banners after all images loaded
            setupExistingBanners();
        }
    };

    if (filesToLoad === 0) {
        // If only existing banners, still need to setup drag & drop for them
        setupExistingBanners();
    }

    // Process each image sequentially to avoid race conditions
    selectedBannerImages.forEach((file, index) => {
        // Use a unique identifier for each file to prevent duplicates
        const fileId = `${file.name}_${file.size}_${file.lastModified}_${index}`;

        // Check if this file is already being processed
        const existingDiv = previewList.querySelector(`[data-file-id="${fileId}"]`);
        if (existingDiv) {
            checkAllLoaded();
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            // Double-check that we haven't added this file already
            const checkDiv = previewList.querySelector(`[data-file-id="${fileId}"]`);
            if (checkDiv) {
                checkAllLoaded();
                return;
            }

            const div = document.createElement('div');
            div.className = 'image-item relative group draggable-image p-1';
            div.draggable = true;
            div.dataset.index = index;
            div.dataset.fileIndex = index;
            div.dataset.fileId = fileId; // Unique identifier

            // Create remove button with proper event listener
        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.className = 'absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all z-20';
        removeBtn.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        `;
        removeBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            e.preventDefault();
            // Find index in selectedBannerImages
            const currentIndex = selectedBannerImages.indexOf(file);
            executeRemoveBannerImage(currentIndex);
        });

        div.innerHTML = `
            <div class="overflow-hidden cursor-move rounded-none border border-gray-200 dark:border-slate-700 h-full relative" data-image-preview data-image-src="${e.target.result}" data-image-title="Pratinjau">
                <img src="${e.target.result}" alt="Pratinjau" class="w-full h-full object-cover hover:opacity-90 transition-opacity pointer-events-none">
            </div>
        `;
        div.appendChild(removeBtn);
        previewList.appendChild(div);
            // Setup drag & drop after element is in DOM
            setupExistingBanners();
            checkAllLoaded();
        };
        reader.onerror = function () {
            checkAllLoaded();
        };
        reader.readAsDataURL(file);
    });
}

function executeRemoveBannerImage(index) {
    const performRemove = () => {
        if (index < 0 || index >= selectedBannerImages.length) {
            return;
        }
        selectedBannerImages.splice(index, 1);
        try { window.selectedBannerImages = selectedBannerImages; } catch (_) { }
        const input = document.getElementById('gambar');
        if (input) {
            const dataTransfer = new DataTransfer();
            selectedBannerImages.forEach(file => {
                if (file && file instanceof File) {
                    dataTransfer.items.add(file);
                }
            });
            input.files = dataTransfer.files;
        }
        // Update preview (will automatically update indices)
        updateBannerImagesPreview();

        // Trigger save button state update explicitly
        if (typeof window.updateSaveButtonState === 'function') {
            window.updateSaveButtonState();
        } else {
            // Fallback: manually trigger change event on form to wake up listeners
            const input = document.getElementById('gambar');
            if (input && input.form) {
                input.form.dispatchEvent(new Event('change', { bubbles: true }));
            }
        }
    };

    // Langsung hapus tanpa modal untuk preview upload baru
    performRemove();
}

function syncBannerImagesToInput() {
    const form = document.getElementById('uploadForm');
    const input = form ? form.querySelector('input[name="gambar[]"]') : document.getElementById('gambar');
    if (!input) {
        console.warn('[Banner] gambar input not found');
        return false;
    }

    try {
        // Filter hanya file valid dan hapus duplikasi
        const validFiles = [];
        const seenFiles = new Set();

        selectedBannerImages.forEach((file) => {
            if (file && file instanceof File) {
                // Create unique key untuk setiap file
                const fileKey = `${file.name}_${file.size}_${file.lastModified}`;
                if (!seenFiles.has(fileKey)) {
                    seenFiles.add(fileKey);
                    validFiles.push(file);
                }
            }
        });

        // Update selectedBannerImages array untuk menghapus duplikasi
        if (validFiles.length !== selectedBannerImages.length) {
            selectedBannerImages = validFiles;
        }

        if (validFiles.length === 0) {
            input.value = '';
            return true;
        }

        const dataTransfer = new DataTransfer();
        validFiles.forEach((file) => {
            try {
                dataTransfer.items.add(file);
            } catch (err) {
                console.error('[Banner] Error adding file to DataTransfer:', err, file);
            }
        });

        input.files = dataTransfer.files;

        const actualCount = input.files ? input.files.length : 0;

        if (actualCount !== validFiles.length) {
            console.warn('[Banner] File count mismatch after sync:', {
                expected: validFiles.length,
                actual: actualCount,
                selectedImagesLength: selectedBannerImages.length
            });
            return false;
        }

        return true;
    } catch (error) {
        console.error('[Banner] Error sinkronisasi images ke input:', error);
        return false;
    }
}

window.handleBannerUploadCardClick = function (event) {
    // Prevent triggering if clicking on other interactive elements
    if (event.target.closest('button') || event.target.closest('input')) {
        return;
    }

    // Prevent triggering if clicking on image preview (zoom functionality)
    if (event.target.closest('[data-image-preview]')) {
        return;
    }

    // Prevent triggering if clicking on banner item (swap functionality)
    if (event.target.closest('.banner-item') || event.target.closest('.draggable-image')) {
        return;
    }

    const form = document.getElementById('uploadForm');
    const input = form ? form.querySelector('input[name="gambar[]"]') : document.getElementById('gambar');
    if (input) input.click();
};

// Banner Promosi Upload Functions
let selectedPromosiImageKey = null;
window.handlePromosiFileSelect = function (event) {
    const file = event.target.files[0];
    if (!file) return;

    // Use global FileValidation for consistent error messages
    if (window.FileValidation) {
        if (!window.FileValidation.validateImage(file, 5 * 1024 * 1024)) {
            const promosiInput = document.getElementById('promosi_banner');
            if (promosiInput) promosiInput.value = '';
            return;
        }
    } else {
        // Fallback validation
        if (!file.type || !file.type.startsWith('image/')) {
            const promosiInput = document.getElementById('promosi_banner');
            if (promosiInput) promosiInput.value = '';
            return;
        }

        const maxSize = 5 * 1024 * 1024; // 5MB
        if (file.size > maxSize) {
            ImageNotificationHandler.showSizeLimitError(file.name);
            const promosiInput = document.getElementById('promosi_banner');
            if (promosiInput) promosiInput.value = '';
            return;
        }
    }

    const key = fileKey(file);
    if (selectedPromosiImageKey && selectedPromosiImageKey === key) {
        return;
    }
    const reader = new FileReader();
    reader.onload = function (e) {
        const previewImg = document.getElementById('promosi-preview-img');
        const previewContainer = document.getElementById('promosi-preview-container');
        const uploadDefault = document.getElementById('promosi-upload-default');
        const uploadCard = document.getElementById('promosi-upload-card');
        const submitContainer = document.getElementById('promosi-submit-container');

        if (previewImg) previewImg.src = e.target.result;
        if (previewContainer) previewContainer.classList.remove('hidden');
        if (uploadDefault) uploadDefault.classList.add('hidden');
        if (uploadCard) uploadCard.classList.add('border-green-500', 'dark:border-green-600');
        if (submitContainer) submitContainer.classList.remove('hidden');
        selectedPromosiImageKey = key;
    };
    reader.readAsDataURL(file);
};

window.handlePromosiDragOver = function (event) {
    event.preventDefault();
    event.stopPropagation();
    if (event.currentTarget) {
        event.currentTarget.classList.add('border-green-500', 'dark:border-green-600');
    }
};

window.handlePromosiDragLeave = function (event) {
    event.preventDefault();
    event.stopPropagation();
    if (event.currentTarget) {
        event.currentTarget.classList.remove('border-green-500', 'dark:border-green-600');
    }
};

window.handlePromosiDrop = function (event) {
    event.preventDefault();
    event.stopPropagation();
    if (event.currentTarget) {
        event.currentTarget.classList.remove('border-green-500', 'dark:border-green-600');
    }

    const files = event.dataTransfer.files;
    if (files.length > 0) {
        const file = files[0];
        if (file.type.startsWith('image/')) {
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            const promosiInput = document.getElementById('promosi_banner');
            if (promosiInput) {
                promosiInput.files = dataTransfer.files;
                window.handlePromosiFileSelect({
                    target: { files: [file] }
                });
            }
        }
    }
};

window.resetPromosiImage = function () {
    const promosiInput = document.getElementById('promosi_banner');
    const previewImg = document.getElementById('promosi-preview-img');
    const previewContainer = document.getElementById('promosi-preview-container');
    const uploadDefault = document.getElementById('promosi-upload-default');
    const uploadCard = document.getElementById('promosi-upload-card');
    const submitContainer = document.getElementById('promosi-submit-container');

    if (promosiInput) promosiInput.value = '';
    if (previewImg) previewImg.src = '';
    if (previewContainer) previewContainer.classList.add('hidden');
    if (uploadDefault) uploadDefault.classList.remove('hidden');
    if (uploadCard) uploadCard.classList.remove('border-green-500', 'dark:border-green-600');
    if (submitContainer) submitContainer.classList.add('hidden');
    selectedPromosiImageKey = null;
};

// Fungsi reset untuk banner utama (multi-upload)
window.resetBannerImage = function () {
    selectedBannerImages = [];
    try { window.selectedBannerImages = selectedBannerImages; } catch (_) { }
    updateBannerImagesPreview();
    syncBannerImagesToInput();
    setupExistingBanners();
};

window.reinitBannerHandlers = function() {
    updateBannerGridLayout();
    setupExistingBanners();
};

// Helper untuk mengecek status upload dari luar (enkapsulasi)
window.hasPendingBannerUploads = function () {
    return Array.isArray(selectedBannerImages) && selectedBannerImages.length > 0;
};

// Initialize on DOM ready (Removed redundant listener)
// document.addEventListener('DOMContentLoaded', function () { ... });
