/**
 * Posts Images Upload & Management
 * Menangani upload, preview, drag & drop, dan management gambar konten
 * Dipakai di: posts-form.js
 */

import { ImageNotificationHandler } from './image-notification-handler.js';

// ============================================
// GLOBAL WRAPPER FUNCTIONS (Always Available)
// ============================================

/**
 * Global wrapper untuk handle images select
 * Selalu tersedia untuk inline handlers
 */
window.handleImagesSelectGlobal = function (event) {
    if (typeof window.handleImagesSelect === 'function') {
        window.handleImagesSelect(event);
    } else {
        // Fallback: trigger change event untuk event listener yang sudah ada
        const input = event.target;
        if (input && input.files && input.files.length > 0) {
            // Event listener di form-posts.js akan menangani ini
            const changeEvent = new Event('change', { bubbles: true });
            input.dispatchEvent(changeEvent);
        }
    }
};

/**
 * Global wrapper untuk handle images drop
 * Selalu tersedia untuk inline handlers
 */
window.handleImagesDropGlobal = function (event) {
    event.preventDefault();
    event.stopPropagation();

    if (typeof window.handleImagesDrop === 'function') {
        return window.handleImagesDrop(event);
    } else {
        // Fallback: basic drag & drop
        const files = Array.from(event.dataTransfer.files).filter(f => f.type.startsWith('image/'));
        if (files.length > 0) {
            const input = document.getElementById('images-input');
            if (input) {
                const dt = new DataTransfer();
                files.forEach(file => dt.items.add(file));
                input.files = dt.files;
                if (input.onchange) input.onchange();
                else input.dispatchEvent(new Event('change'));
            }
        }
        return false;
    }
};

/**
 * Global wrapper untuk handle images drag over
 * Selalu tersedia untuk inline handlers
 */
window.handleImagesDragOverGlobal = function (event) {
    event.preventDefault();
    event.stopPropagation();

    if (typeof window.handleImagesDragOver === 'function') {
        return window.handleImagesDragOver(event);
    } else {
        // Fallback: visual feedback
        const card = document.getElementById('images-upload-card');
        const isInternalDrag = event.dataTransfer && Array.from(event.dataTransfer.types || []).includes('application/x-draggable-image');
        if (card && !isInternalDrag && card.dataset.internalDrag !== 'true') {
            card.classList.add('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }
        return false;
    }
};

/**
 * Global wrapper untuk handle images drag leave
 * Selalu tersedia untuk inline handlers
 */
window.handleImagesDragLeaveGlobal = function (event) {
    event.preventDefault();
    event.stopPropagation();

    if (typeof window.handleImagesDragLeave === 'function') {
        return window.handleImagesDragLeave(event);
    } else {
        // Fallback: remove visual feedback
        const card = document.getElementById('images-upload-card');
        if (card && !card.contains(event.relatedTarget)) {
            card.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }
        return false;
    }
};

/**
 * Global wrapper untuk handle upload card click
 * Selalu tersedia untuk inline handlers
 */
window.handleUploadCardClickGlobal = function (event) {
    if (typeof window.handleUploadCardClick === 'function') {
        window.handleUploadCardClick(event);
    } else {
        // Fallback: langsung klik input
        if (!event.target.closest('button') &&
            !event.target.closest('#images-preview-container') &&
            !event.target.closest('#existing-images-container')) {
            const input = document.getElementById('images-input');
            if (input) input.click();
        }
    }
};

window.PostsImagesUpload = {
    // State variables
    selectedImages: [],
    existingImagesArray: [],
    draggedElement: null,
    draggedIndex: null,
    isDragging: false,
    pendingDeleteImage: {
        type: null,
        index: null,
        imagePath: null,
        button: null
    },

    // Callbacks
    onImageChange: null,
    onValidationChange: null,

    /**
     * Initialize images upload system
     */
    init: function (options = {}) {
        const {
            existingImages = [],
            uploadRoute = null,
            csrfToken = '',
            onImageChange = null,
            onValidationChange = null
        } = options;

        this.existingImagesArray = Array.isArray(existingImages) ? existingImages : [];
        this.uploadRoute = uploadRoute;
        this.csrfToken = csrfToken;
        this.onImageChange = onImageChange;
        this.onValidationChange = onValidationChange;

        // Setup global handlers
        this.setupGlobalHandlers();

        // Bootstrap existing images from DOM if not provided
        if (!this.existingImagesArray || this.existingImagesArray.length === 0) {
            const domExisting = Array.from(document.querySelectorAll('#images-list input[name="existing_images[]"]'))
                .map(inp => inp.value)
                .filter(v => v && typeof v === 'string');
            if (domExisting.length > 0) this.existingImagesArray = domExisting;
        }

        // Initial UI state based on existing images
        try { this.updateUIState(); } catch (_) { }
    },

    /**
     * Setup global event handlers
     */
    setupGlobalHandlers: function () {
        const self = this;

        // Upload card click handler
        window.handleUploadCardClick = function (event) {
            if (event.target.closest('button') ||
                event.target.closest('#images-list-wrapper')) {
                return;
            }
            const input = document.getElementById('images-input');
            if (input) {
                input.click();
            }
        };

        // Images select handler
        window.handleImagesSelect = function (event) {
            const files = Array.from(event.target.files);
            if (files.length > 0) {
                self.processImageFiles(files);
            }
            event.target.value = '';
        };

        // Drag & drop handlers
        window.handleImagesDrop = function (event) {
            event.preventDefault();
            event.stopPropagation();
            const uploadCard = document.getElementById('images-upload-card');
            if (uploadCard) {
                uploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
            }

            let files = Array.from(event.dataTransfer.files).filter(f => f.type.startsWith('image/'));
            if (files.length === 0) {
                ImageNotificationHandler.showSizeLimitError('File tidak valid');
                return false;
            }

            const input = document.getElementById('images-input');
            if (!input) {
                return false;
            }

            // Get current selected images count
            const currentCount = self.selectedImages ? self.selectedImages.length : 0;
            const existingCount = self.existingImagesArray ? self.existingImagesArray.length : 0;
            const totalCurrent = currentCount + existingCount;

            // Check total count after adding new files
            const allowableSlots = Math.max(0, 6 - totalCurrent);
            if (files.length > allowableSlots) {
                ImageNotificationHandler.showLimitWarning(`Anda hanya dapat mengunggah hingga 6 gambar.`);
                // Trim to fit slots
                files = files.slice(0, allowableSlots);
            }

            // Process files (will add to selectedImages and sync to input)
            // Show notifications for successful uploads
            self.processImageFiles(files, false);
            return false;
        };

        window.handleImagesDragOver = function (event) {
            event.preventDefault();
            event.stopPropagation();
            const uploadCard = document.getElementById('images-upload-card');
            const isInternalDrag = event.dataTransfer && Array.from(event.dataTransfer.types || []).includes('application/x-draggable-image');
            if (uploadCard && !isInternalDrag && uploadCard.dataset.internalDrag !== 'true') {
                uploadCard.classList.add('border-green-500', 'bg-green-50', 'dark:bg-green-900');
            }
            return false;
        };

        window.handleImagesDragLeave = function (event) {
            event.preventDefault();
            event.stopPropagation();
            // Only remove highlight if we're actually leaving the card (not just moving to child element)
            const uploadCard = document.getElementById('images-upload-card');
            if (uploadCard && !uploadCard.contains(event.relatedTarget)) {
                uploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
            }
            return false;
        };

        // Remove handlers sudah dipindahkan ke delete-image.js
        // Fungsi-fungsi ini akan tersedia setelah delete-image.js di-load
    },

    getTotalImagesCount: function () {
        const selectedCount = (this.selectedImages || []).filter(f => f && f instanceof File).length;
        const existingCount = (this.existingImagesArray || []).length;
        return selectedCount + existingCount;
    },

    updateUIState: function () {
        const defaultContent = document.getElementById('images-upload-default');
        const addBtn = document.getElementById('images-add-btn');
        const list = document.getElementById('images-list');
        const total = this.getTotalImagesCount();

        if (defaultContent) {
            if (total === 0) defaultContent.classList.remove('hidden');
            else defaultContent.classList.add('hidden');
        }

        if (list) {
            list.classList.remove('grid-cols-1', 'grid-cols-2');
            list.classList.add(total === 1 ? 'grid-cols-1' : 'grid-cols-2');
        }

        if (addBtn) {
            if (total === 0) {
                addBtn.classList.add('hidden');
                addBtn.disabled = false;
                addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                addBtn.classList.remove('hidden');
                if (total >= 6) {
                    addBtn.disabled = true;
                    addBtn.classList.add('opacity-50', 'cursor-not-allowed');
                } else {
                    addBtn.disabled = false;
                    addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                }
            }
        }
    },

    /**
     * Process image files
     * @param {File[]} files - Array of files to process
     * @param {boolean} suppressNotifications - If true, don't show notifications (for drag & drop)
     */
    processImageFiles: function (files, suppressNotifications = false) {
        if (!files || files.length === 0) return;

        // 1. Filter Valid Files (Type & Size)
        const validFiles = files.filter(file => {
            // Use global FileValidation for consistent error messages
            if (window.FileValidation) {
                return window.FileValidation.validateImage(file, 5 * 1024 * 1024);
            } else {
                // Fallback validation
                if (!file || !file.type || !file.type.startsWith('image/')) return false;
                const maxSize = 5 * 1024 * 1024; // 5MB
                if (file.size > maxSize) {
                    ImageNotificationHandler.showSizeLimitError(file.name);
                    return false;
                }
                return true;
            }
        });

        if (validFiles.length === 0) return;

        // 2. Identify Duplicates & Unique Files
        const uniqueFilesToAdd = [];
        let hasDuplicates = false;
        let duplicateName = '';

        validFiles.forEach(file => {
            const isDuplicate = this.selectedImages.some(existingFile =>
                existingFile &&
                existingFile.name === file.name &&
                existingFile.size === file.size &&
                existingFile.lastModified === file.lastModified
            );

            if (!isDuplicate) {
                uniqueFilesToAdd.push(file);
            } else {
                hasDuplicates = true;
                duplicateName = file.name;
            }
        });

            // 3. Handle Duplicates Notification
            if (hasDuplicates) {
                ImageNotificationHandler.showDuplicateWarning(duplicateName);
            }

        // 4. Check Limit & Add Unique Files
        if (uniqueFilesToAdd.length > 0) {
            const currentCount = this.selectedImages ? this.selectedImages.length : 0;
            const existingCount = this.existingImagesArray ? this.existingImagesArray.length : 0;
            const totalCurrent = currentCount + existingCount;

            const allowableSlots = Math.max(0, 6 - totalCurrent);

            if (uniqueFilesToAdd.length > allowableSlots) {
                ImageNotificationHandler.showLimitWarning(`Anda hanya dapat mengunggah hingga 6 gambar.`);
                // Trim the array to fit slots
                uniqueFilesToAdd.length = allowableSlots;
            }

            if (uniqueFilesToAdd.length > 0) {
                this.selectedImages.push(...uniqueFilesToAdd);
                this.syncImagesToInput();
                this.updateImagesPreview();
                this.updateUIState();
                if (this.onImageChange) this.onImageChange();
            }
        }
    },

    /**
     * Update images preview
     */
    updateImagesPreview: function () {
        const previewContainer = document.getElementById('images-list-wrapper');
        const previewList = document.getElementById('images-list');
        const defaultContent = document.getElementById('images-upload-default');
        const addBtn = document.getElementById('images-add-btn');

        if (!previewList) {

        }

        // Remove only previous new items to avoid duplicating existing images
        Array.from(previewList.querySelectorAll('.draggable-image[data-type="new"]')).forEach(el => el.remove());

        if (this.selectedImages.length === 0) {
            this.updateUIState();
            if (this.onValidationChange) this.onValidationChange();
            return;
        }

        if (previewContainer) previewContainer.classList.remove('hidden');
        this.updateUIState();

        // Ensure selectedImages array matches what we're displaying
        const validImages = this.selectedImages.filter(file => file && file instanceof File);
        if (validImages.length !== this.selectedImages.length) {
            // console.warn('Some invalid files filtered out');
            this.selectedImages = validImages;
        }

        let filesToLoad = validImages.length;
        let filesLoaded = 0;
        const self = this;

        function checkAllLoaded() {
            filesLoaded++;
            if (filesLoaded === filesToLoad) {
                // Update all indices after all images loaded
                self.updateAllIndices();
                self.setupDragAndDropForAll();
                if (self.onValidationChange) self.onValidationChange();
            }
        }

        // Process each image sequentially to avoid race conditions
        validImages.forEach((file, index) => {
            // Use a unique identifier for each file to prevent duplicates
            const fileId = `${file.name}_${file.size}_${file.lastModified}_${index}`;
            try { file._fileId = fileId; } catch (_) { }

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
                div.dataset.type = 'new';
                div.dataset.newIndex = index;

                // Create remove button with proper event listener
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all z-10';
                removeBtn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                `;
                removeBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    const currentIndex = parseInt(div.dataset.index);
                    // Langsung hapus tanpa modal
                    if (window.PostsImagesUpload && window.PostsImagesUpload.executeRemoveImage) {
                        window.PostsImagesUpload.executeRemoveImage(currentIndex);
                    } else if (typeof window.removeImage === 'function') {
                        window.removeImage(currentIndex);
                    } else {
                        // console.error('Cannot remove image: functions not available');
                    }
                });

                div.innerHTML = `
                    <div class="overflow-hidden border border-gray-200 dark:border-slate-700 cursor-move rounded-none" data-image-preview data-image-src="${e.target.result}" data-image-title="Pratinjau">
                        <img src="${e.target.result}" alt="Pratinjau ${index + 1}" class="w-full aspect-video object-cover hover:opacity-90 transition-opacity pointer-events-none">
                    </div>
                `;
                div.appendChild(removeBtn);
                previewList.appendChild(div);
                // Setup drag & drop after element is in DOM
                setTimeout(() => {
                    self.setupDragAndDrop(div);
                }, 10);
                checkAllLoaded();
            };
            reader.onerror = function () {
                checkAllLoaded();
            };
            reader.readAsDataURL(file);
        });
    },

    /**
     * Execute remove image
     */
    executeRemoveImage: function (index) {
        if (index < 0 || index >= this.selectedImages.length) {
            // console.warn('Invalid index for removeImage:', index);
            return;
        }
        this.selectedImages.splice(index, 1);
        const input = document.getElementById('images-input');
        if (input) {
            const dataTransfer = new DataTransfer();
            this.selectedImages.forEach(file => {
                if (file && file instanceof File) {
                    dataTransfer.items.add(file);
                }
            });
            input.files = dataTransfer.files;
        }
        // Update preview (will automatically update indices)
        this.updateImagesPreview();
        this.updateUIState();
        if (this.onValidationChange) this.onValidationChange();
    },

    /**
     * Show delete image modal for new image
     */
    showDeleteImageModalForNewImage: function (index) {
        // Langsung hapus tanpa modal
        this.executeRemoveImage(index);
    },

    /**
     * Confirm delete image
     */
    confirmDeleteImage: function () {
        if (this.pendingDeleteImage.type === 'existing') {
            const beforeCount = this.existingImagesArray.length;
            this.existingImagesArray = this.existingImagesArray.filter(img => img !== this.pendingDeleteImage.imagePath);

            if (this.pendingDeleteImage.button) {
                this.pendingDeleteImage.button.closest('.image-item').remove();
            }

            const hiddenInputs = document.querySelectorAll('input[name="existing_images[]"]');
            hiddenInputs.forEach(input => {
                if (input && input.value === this.pendingDeleteImage.imagePath) {
                    input.remove();
                }
            });

            const remainingInputs = Array.from(document.querySelectorAll('input[name="existing_images[]"]')).map(inp => inp.value);
            this.existingImagesArray = this.existingImagesArray.filter(img => remainingInputs.includes(img));

            // Unified container remains; no need to hide when none left

            if (this.onValidationChange) this.onValidationChange();
            // Update UI state after existing image deletion
            this.updateUIState();
        } else if (this.pendingDeleteImage.type === 'new') {
            this.executeRemoveImage(this.pendingDeleteImage.index);
        }
        if (typeof window.hideDeleteImageModal === 'function') {
            window.hideDeleteImageModal();
        }
        this.pendingDeleteImage = {
            type: null,
            index: null,
            imagePath: null,
            button: null
        };
    },

    /**
     * Sync images to input
     */
    syncImagesToInput: function () {
        const input = document.getElementById('images-input');
        if (!input) {
            // console.warn('images-input not found');
            return false;
        }

        try {
            // Filter hanya file valid dan hapus duplikasi
            const validFiles = [];
            const seenFiles = new Set();

            this.selectedImages.forEach((file) => {
                if (file && file instanceof File) {
                    // Create unique key untuk setiap file
                    const fileKey = `${file.name}_${file.size}_${file.lastModified}`;
                    if (!seenFiles.has(fileKey)) {
                        seenFiles.add(fileKey);
                        validFiles.push(file);
                    }
                }
            });

            // Update selectedImages array untuk menghapus duplikasi
            if (validFiles.length !== this.selectedImages.length) {
                this.selectedImages = validFiles;
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
                    // console.error('Error adding file to DataTransfer:', err, file);
                }
            });

            input.files = dataTransfer.files;

            const actualCount = input.files ? input.files.length : 0;
            if (actualCount !== validFiles.length) {
                return false;
            }

            return true;
        } catch (error) {
            return false;
        }
    },

    /**
     * Setup drag and drop for element
     * Note: This removes old event listeners by cloning the element first
     */
    setupDragAndDrop: function (element) {
        if (!element) return;
        const self = this;

        // Remove old event listeners by cloning (if element already has parent)
        let targetElement = element;
        if (element.parentNode) {
            // Clone element untuk menghapus event listeners lama
            const newElement = element.cloneNode(true);
            element.parentNode.replaceChild(newElement, element);
            targetElement = newElement;

            // Setup ulang tombol X setelah clone
            const removeBtn = targetElement.querySelector('button[type="button"]');
            if (removeBtn) {
                // Gunakan newIndex jika ada (untuk new images), atau index biasa (untuk existing)
                const isNew = targetElement.dataset.type === 'new';

                if (isNew) {
                    const currentIndex = parseInt(targetElement.dataset.newIndex !== undefined ? targetElement.dataset.newIndex : targetElement.dataset.index);
                    removeBtn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        // Langsung hapus tanpa modal
                        if (window.PostsImagesUpload && window.PostsImagesUpload.executeRemoveImage) {
                            window.PostsImagesUpload.executeRemoveImage(currentIndex);
                        } else if (typeof window.removeImage === 'function') {
                            window.removeImage(currentIndex);
                        }
                    });
                } else {
                    // Untuk existing images, kita perlu mengambil path gambar dan menggunakan removeExistingImage
                    const imagePath = targetElement.dataset.image;
                    removeBtn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        if (imagePath && typeof window.removeExistingImage === 'function') {
                            window.removeExistingImage(this, imagePath);
                        } else {
                            // console.error('Cannot remove existing image: function not available or path missing');
                        }
                    });
                }
            }
        } else {
            targetElement = element;
        }

        targetElement.addEventListener('dragstart', function (e) {
            e.stopPropagation();
            self.draggedElement = this;
            self.draggedIndex = this.dataset.type === 'new' ? parseInt(this.dataset.newIndex || this.dataset.index) : parseInt(this.dataset.index);
            self.isDragging = true;
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
            e.dataTransfer.setData('application/x-draggable-image', 'true');
            const uploadCard = document.getElementById('images-upload-card');
            if (uploadCard) {
                uploadCard.dataset.internalDrag = 'true';
                uploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
                uploadCard.classList.remove('hover:border-green-500', 'dark:hover:border-green-600');
            }
        });

        targetElement.addEventListener('dragend', function (e) {
            e.stopPropagation();
            // keep visual appearance unchanged on drag end
            self.isDragging = false;
            document.querySelectorAll('.draggable-image').forEach(el => {
                el.classList.remove('drag-over');
            });
            const uploadCard = document.getElementById('images-upload-card');
            if (uploadCard) {
                uploadCard.dataset.internalDrag = '';
                // Restore hover classes
                uploadCard.classList.add('hover:border-green-500', 'dark:hover:border-green-600');
                uploadCard.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
            }
        });

        targetElement.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            e.dataTransfer.dropEffect = 'move';
            // Add visual feedback - highlight target
            if (!this.classList.contains('drag-over')) {
                this.classList.add('drag-over', 'border-green-500', 'bg-green-50', 'dark:bg-green-900');
            }
            return false;
        });

        targetElement.addEventListener('dragenter', function (e) {
            e.preventDefault();
            e.stopPropagation();
            // Add visual feedback
            if (!this.classList.contains('drag-over')) {
                this.classList.add('drag-over', 'border-green-500', 'bg-green-50', 'dark:bg-green-900');
            }
            return false;
        });

        targetElement.addEventListener('dragleave', function (e) {
            e.stopPropagation();
            // Remove visual feedback when leaving the element
            if (!this.contains(e.relatedTarget)) {
                this.classList.remove('drag-over', 'border-green-500', 'bg-green-50', 'dark:bg-green-900');
            }
        });

        targetElement.addEventListener('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            // Remove visual feedback
            this.classList.remove('drag-over', 'border-green-500', 'bg-green-50', 'dark:bg-green-900');

            if (self.draggedElement && self.draggedElement !== this) {
                const fromEl = self.draggedElement;
                const toEl = this;

                // Prefer swapping positions so only the two items exchange places
                try {
                    self.swapDomNodes(fromEl, toEl);
                } catch (_) {
                    // Fallback: do a naive insertBefore if swap fails
                    const parent = toEl.parentElement;
                    if (parent) {
                        parent.insertBefore(fromEl, toEl);
                    }
                }

                // Rebuild internal arrays (selectedImages, existingImagesArray) based on current DOM order
                if (typeof self.rebuildListsFromDOM === 'function') {
                    try { self.rebuildListsFromDOM(); } catch (_) { }
                }
            }

            self.draggedElement = null;
            self.draggedIndex = null;
            return false;
        });
    },

    /**
     * Update all indices for preview images
     */
    updateAllIndices: function () {
        const previewList = document.getElementById('images-list');
        if (!previewList) return;

        // Update indices for NEW images only (relative to new list order)
        const newImages = previewList.querySelectorAll('.draggable-image[data-type="new"]');
        newImages.forEach((el, newIdx) => {
            el.dataset.newIndex = newIdx;
            // Penting: update juga dataset.index agar konsisten saat drag & drop setup ulang
            el.dataset.index = newIdx;

            // Update remove button listener for NEW images only
            const removeBtn = el.querySelector('button[type="button"]');
            if (removeBtn) {
                const newBtn = removeBtn.cloneNode(true);
                removeBtn.parentNode.replaceChild(newBtn, removeBtn);
                newBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    const currentIndex = parseInt(el.dataset.newIndex || el.dataset.index || '0');
                    // Langsung hapus tanpa modal untuk preview upload baru
                    if (window.PostsImagesUpload && window.PostsImagesUpload.executeRemoveImage) {
                        window.PostsImagesUpload.executeRemoveImage(currentIndex);
                    } else if (typeof window.removeImage === 'function') {
                        window.removeImage(currentIndex);
                    } else {
                        // console.error('Cannot remove image: functions not available');
                    }
                });
            }
        });

        // Update indices for EXISTING images only (do not alter their remove listeners here)
        const existingImages = previewList.querySelectorAll('.draggable-image[data-type="existing"]');
        existingImages.forEach((el, idx) => {
            el.dataset.index = idx;
        });
    },

    /**
     * Swap two DOM nodes in-place using a temporary placeholder.
     */
    swapDomNodes: function (a, b) {
        if (!a || !b) return;
        const parentA = a.parentNode;
        const parentB = b.parentNode;
        if (!parentA || !parentB) return;

        // If same node, nothing to do
        if (a === b) return;

        const placeholder = document.createElement('div');
        parentA.replaceChild(placeholder, a);

        // Replace b with a
        const replacedB = parentB.replaceChild(a, b);

        // Replace placeholder with b
        parentA.replaceChild(replacedB, placeholder);
    },

    /**
     * Rebuild selectedImages and existingImagesArray based on current DOM order
     */
    rebuildListsFromDOM: function () {
        const previewList = document.getElementById('images-list');
        if (!previewList) return;

        const items = Array.from(previewList.querySelectorAll('.image-item'));
        const newSelected = [];
        const newExisting = [];

        items.forEach(item => {
            const type = item.dataset.type || 'new';
            if (type === 'new') {
                const fileId = item.dataset.fileId;
                if (fileId && Array.isArray(this.selectedImages)) {
                    const found = this.selectedImages.find(f => f && (f._fileId === fileId));
                    if (found) newSelected.push(found);
                }
            } else if (type === 'existing') {
                const path = item.dataset.image;
                if (path) newExisting.push(path);
            }
        });

        // Replace internal arrays with new ordering
        this.selectedImages = newSelected;
        this.existingImagesArray = newExisting;

        // Sync inputs and update hidden existing inputs
        this.syncImagesToInput();
        this.updateExistingImagesOrder();
        // Build images_order hidden inputs to represent mixed ordering for server
        // Remove previous images_order inputs
        const previousOrderInputs = previewList.querySelectorAll('input[name="images_order[]"]');
        previousOrderInputs.forEach(i => i.remove());
        // Build new order inputs
        items.forEach((item) => {
            const orderInput = document.createElement('input');
            orderInput.type = 'hidden';
            orderInput.name = 'images_order[]';
            if ((item.dataset.type || 'new') === 'new') {
                orderInput.value = '__NEW__';
            } else {
                orderInput.value = item.dataset.image || '';
            }
            previewList.appendChild(orderInput);
        });
        this.updateAllIndices();
        this.setupDragAndDropForAll();
    },

    /**
     * Setup drag and drop for all images
     */
    setupDragAndDropForAll: function () {
        const self = this;
        // Update indices first
        this.updateAllIndices();

        document.querySelectorAll('#images-list .draggable-image').forEach((el) => {
            self.setupDragAndDrop(el);
        });

        // Pastikan tombol X juga di-setup ulang setelah drag & drop
        // (updateAllIndices sudah dipanggil di awal, tapi setup ulang untuk memastikan)
        this.updateAllIndices();
    },

    /**
     * Swap new images
     */
    swapNewImages: function (fromIndex, toIndex) {
        if (fromIndex !== toIndex && fromIndex >= 0 && toIndex >= 0 &&
            fromIndex < this.selectedImages.length && toIndex < this.selectedImages.length) {
            // Swap data array
            const temp = this.selectedImages[fromIndex];
            this.selectedImages[fromIndex] = this.selectedImages[toIndex];
            this.selectedImages[toIndex] = temp;

            // Swap DOM elements
            const previewList = document.getElementById('images-list');
            if (previewList) {
                // Hanya ambil element dengan tipe 'new' agar index sesuai dengan selectedImages
                const images = Array.from(previewList.querySelectorAll('.draggable-image[data-type="new"]'));
                if (images[fromIndex] && images[toIndex]) {
                    const fromElement = images[fromIndex];
                    const toElement = images[toIndex];
                    this.swapDomNodes(fromElement, toElement);
                }
            }

            // Sync to input
            const input = document.getElementById('images-input');
            if (input) {
                const dataTransfer = new DataTransfer();
                this.selectedImages.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }

            // Update indices dan setup ulang drag & drop (tanpa membuat ulang element)
            this.updateAllIndices();
            this.setupDragAndDropForAll();
        }
    },

    /**
     * Swap existing images
     */
    swapExistingImages: function (fromElement, toElement) {
        // Swap DOM nodes in-place to keep layout stable
        this.swapDomNodes(fromElement, toElement);
        this.updateExistingImagesOrder();
    },

    /**
     * Update existing images order
     */
    updateExistingImagesOrder: function () {
        const container = document.getElementById('images-list');
        if (!container) return;
        const images = container.querySelectorAll('.image-item[data-type="existing"]');
        const hiddenInputs = container.querySelectorAll('input[name="existing_images[]"]');

        hiddenInputs.forEach(input => input.remove());

        images.forEach((item, index) => {
            const imagePath = item.dataset.image;
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'existing_images[]';
            input.value = imagePath;
            item.appendChild(input);
            item.dataset.index = index;
        });

        this.updateUIState();
        if (this.onValidationChange) setTimeout(() => this.onValidationChange(), 10);
    },

    /**
     * Setup existing images remove buttons
     */
    setupExistingImagesRemoveButtons: function () {
        const self = this;
        document.querySelectorAll('.remove-existing-image-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                const imagePath = this.getAttribute('data-image');
                if (imagePath) {
                    window.removeExistingImage(this, imagePath);
                }
            });
        });
    },

    /**
     * Initialize drag and drop
     */
    initializeDragAndDrop: function () {
        const self = this;
        setTimeout(() => {
            self.setupDragAndDropForAll();
        }, 200);
    },

    /**
     * Get selected images
     */
    getSelectedImages: function () {
        return this.selectedImages;
    },

    /**
     * Get existing images array
     */
    getExistingImagesArray: function () {
        return this.existingImagesArray;
    }
};
