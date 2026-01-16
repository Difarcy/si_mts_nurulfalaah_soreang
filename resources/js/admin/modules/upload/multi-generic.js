/**
 * Generic Multi-Image Upload Module
 * Handles multiple image selection, preview, deduplication, and validation.
 *
 * @param {Object} options Configuration options
 * @param {string} options.inputId ID of the file input element
 * @param {string} options.previewContainerId ID of the container for previews
 * @param {string} options.uploadPlaceholderId ID of the placeholder element (shown when empty/dragover)
 * @param {string} options.submitBtnId ID of the submit button (to disable/enable)
 * @param {string} options.dropZoneId ID of the drop zone element
 * @param {string} options.hiddenInputId ID of the hidden input to sync FileList/DataTransfer (optional)
 * @param {number} options.maxFiles Maximum number of files allowed (default: 10)
 * @param {number} options.maxSize Maximum file size in bytes (default: 5MB)
 * @param {Function} options.onUpdate Callback when files are updated (params: files)
 * @param {Function} options.onError Callback when error occurs (params: message, type)
 */

import { ImageNotificationHandler } from './image-notification-handler.js';
export function initGenericMultiImageUpload(options = {}) {
    const {
        inputId,
        previewContainerId,
        uploadPlaceholderId,
        submitBtnId,
        dropZoneId,
        hiddenInputId, // Optional: if provided, we'll try to sync a DataTransfer object to it (if possible) or just rely on the main input
        maxFiles = 10,
        maxSize = 5 * 1024 * 1024,
        onUpdate = null,
        onError = null
    } = options;

    const input = document.getElementById(inputId);
    const previewContainer = document.getElementById(previewContainerId);
    const uploadPlaceholder = document.getElementById(uploadPlaceholderId);
    const submitBtn = document.getElementById(submitBtnId);
    const dropZone = document.getElementById(dropZoneId);

    // We maintain our own list of selected files because Input.files is read-only (mostly)
    // and we want to support accumulation of files from multiple selections.
    let selectedFiles = [];

    if (!input) {
        // console.error(`MultiImageUpload: Input element with ID '${inputId}' not found.`);
        return;
    }

    // --- Helper: File Key for Deduplication ---
    const fileKey = (file) => `${file.name}_${file.size}_${file.lastModified}`;

    // --- Core: Handle File Selection ---
    function handleFiles(files) {
        if (!files || files.length === 0) return;

        const filesArray = Array.from(files);

        // 1. Limit Check - Calculate remaining slots
        const remainingSlots = Math.max(0, maxFiles - selectedFiles.length);

        if (remainingSlots === 0) {
            // Jika tidak ada slot yang tersisa, tampilkan notifikasi dan exit
            const message = `Maksimal ${maxFiles} foto. Hapus foto yang ada terlebih dahulu.`;
            ImageNotificationHandler.showLimitWarning(message);
            input.value = '';
            return;
        }

        // 2. Validation (Type & Size)
        const validFiles = filesArray.filter(file => {
            // Use global FileValidation for consistent error messages
            if (window.FileValidation) {
                return window.FileValidation.validateImage(file, maxSize);
            } else {
                // Fallback validation
                if (!file.type.startsWith('image/')) {
                    ImageNotificationHandler.showSizeLimitError(file.name);
                    return false;
                }
                if (file.size > maxSize) {
                    ImageNotificationHandler.showSizeLimitError(file.name);
                    return false;
                }
                return true;
            }
        });

        if (validFiles.length === 0) {
            input.value = '';
            return;
        }

        // 3. Deduplication
        const existingKeys = new Set(selectedFiles.map(fileKey));
        const uniqueFiles = [];
        const duplicateFiles = [];

        validFiles.forEach(f => {
            const key = fileKey(f);
            if (!existingKeys.has(key)) {
                uniqueFiles.push(f);
                existingKeys.add(key);
            } else {
                duplicateFiles.push(f);
            }
        });

        // Tampilkan notifikasi untuk file duplikat jika ada
        if (duplicateFiles.length > 0) {
            ImageNotificationHandler.showDuplicateWarning(duplicateFiles[0].name);
        }

        if (uniqueFiles.length === 0) {
            input.value = '';
            return;
        }

        // 4. Potong gambar yang masuk ke dalam slot yang tersedia (seperti banner)
        const filesToAdd = uniqueFiles.slice(0, remainingSlots);
        const rejectedCount = uniqueFiles.length - filesToAdd.length;

        // Tampilkan notifikasi jika ada gambar yang ditolak
        if (rejectedCount > 0) {
            const remainingAfterAdd = Math.max(0, remainingSlots - filesToAdd.length);
            const message = remainingAfterAdd <= 0
                ? `Maksimal ${maxFiles} foto. Hapus foto yang ada terlebih dahulu.`
                : `Maksimal ${maxFiles} foto. Anda hanya bisa menambah ${remainingAfterAdd} foto lagi.`;
            ImageNotificationHandler.showLimitWarning(message);
        }

        // 5. Update State
        selectedFiles = [...selectedFiles, ...filesToAdd];

        // 6. Update UI
        updatePreview();
        syncInput();

        // 7. Callback
        if (onUpdate) onUpdate(selectedFiles);

        // Clear input value to allow selecting the same file again (important for "click" flow)
        // This ensures the input 'change' event fires even if user picks the same file twice.
        try {
            input.value = '';
        } catch (err) {
            // Some browsers may restrict clearing programmatically in odd contexts; ignore.
        }

        // Note: for form submit we sync via DataTransfer in `syncInput()` above.
    }

    // --- Helper: Sync to Input (for Form Submission) ---
    function syncInput() {
        if (typeof DataTransfer !== 'undefined') {
            const dt = new DataTransfer();
            selectedFiles.forEach(file => dt.items.add(file));
            input.files = dt.files;
        }
    }

    // --- UI: Update Preview ---
    function updatePreview() {
        if (!previewContainer) return;

        // Clear existing previews
        previewContainer.innerHTML = '';

        // Handle external Add Button visibility
        // Ensure we check options.addBtnId or fallback to 'addMoreBtn' if user forgets, but better to rely on options
        const addBtnId = options.addBtnId || 'addMoreBtn';
        const addBtn = document.getElementById(addBtnId);

        if (selectedFiles.length === 0) {
            if (uploadPlaceholder) uploadPlaceholder.classList.remove('hidden');
            if (submitBtn) submitBtn.disabled = true;
            if (previewContainer) previewContainer.classList.add('hidden');
            // Tombol tetap visible tapi disabled saat 0 file
            if (addBtn) {
                addBtn.disabled = true;
                addBtn.style.opacity = '0.5';
                addBtn.style.cursor = 'not-allowed';
            }
            return;
        }

        if (uploadPlaceholder) uploadPlaceholder.classList.add('hidden');
        if (previewContainer) previewContainer.classList.remove('hidden');

        // Handle add button: Always visible, disabled when limit reached
        if (addBtn) {
            addBtn.classList.remove('hidden'); // Selalu tampilkan tombol

            if (selectedFiles.length >= maxFiles) {
                addBtn.disabled = true; // Disable jika sudah mencapai limit
                addBtn.style.opacity = '0.5'; // Ubah opacity untuk visual feedback
                addBtn.style.cursor = 'not-allowed'; // Cursor berubah menjadi not-allowed
                addBtn.style.zIndex = '1000'; // Force high z-index
                addBtn.style.pointerEvents = 'auto'; // Ensure clickable
            } else {
                addBtn.disabled = false; // Enable jika belum penuh
                addBtn.style.opacity = '1'; // Kembalikan opacity normal
                addBtn.style.cursor = 'pointer'; // Cursor normal
                addBtn.style.zIndex = '1000'; // Force high z-index
                addBtn.style.pointerEvents = 'auto'; // Ensure clickable
            }
        }

        // Dynamic Layout
        // Always use Grid Layout for consistency
        let appendTarget = previewContainer;

        // Multiple Images Mode (Grid) - Unified
        // Host: Scrollable, Flex Col, Items Center
        // PENTING: Maintain z-30 dan pointer-events: auto agar addMoreBtn tetap clickable
        previewContainer.className = 'absolute inset-0 w-full h-full bg-white dark:bg-slate-800 z-30 rounded overflow-y-auto flex flex-col items-center';
        previewContainer.style.pointerEvents = 'auto'; // Pastikan previewContainer bisa menerima mouse events

        // Grid Wrapper: The actual grid
        const gridWrapper = document.createElement('div');

        // Dynamic grid columns based on file count
        const count = selectedFiles.length;

        // Determine grid configuration
        // 1. Grid 1 Center (1 file)
        // 2. Grid 2 Center (2 files)
        // 3. Grid 3 Center (3 files)
        // 4. Grid 3 Top (4+ files)

        let gridClasses = 'grid gap-4 p-4 mx-auto';

        if (count === 1) {
            gridClasses += ' grid-cols-1 w-full max-w-lg';
        } else if (count === 2) {
            gridClasses += ' grid-cols-2 w-full max-w-3xl';
        } else {
            // 3 or more (4, 5, etc) -> 3 Columns
            gridClasses += ' grid-cols-3 w-full max-w-5xl';

            // Add extra top padding for 4+ items so the floating button doesn't overlap
            if (count > 3) {
                gridClasses += ' pt-14';
            }
        }

        gridWrapper.className = gridClasses;

        previewContainer.appendChild(gridWrapper);

        // Vertically center grid when 1-3 items, align to top when 4+
        if (count <= 3) {
            gridWrapper.classList.add('my-auto');
        } else {
            gridWrapper.classList.remove('my-auto');
        }
        appendTarget = gridWrapper;

        if (submitBtn) submitBtn.disabled = false;

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();

            // Create placeholder immediately to ensure order
            const div = document.createElement('div');
            // Always use Card structure
            div.className = 'relative group/item p-1';
            appendTarget.appendChild(div);

            reader.onload = (e) => {
                // Match Banner/Content Image inner structure
                div.innerHTML = `
                    <div class="overflow-hidden border border-gray-200 dark:border-slate-700 cursor-pointer rounded-lg h-full relative aspect-video"
                            data-image-preview
                            data-image-src="${e.target.result}">
                        <img src="${e.target.result}" class="w-full h-full object-cover hover:opacity-90 transition-opacity" alt="${file.name}">
                    </div>
                `;

                // Button for grid image (Same as Banner/Content)
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                // User requested "X inside image in corner".
                // banner.js uses: absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all z-20
                removeBtn.className = 'absolute top-2 right-2 bg-red-600 hover:bg-red-700 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover/item:opacity-100 transition-all z-20';
                removeBtn.innerHTML = `
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                `;
                removeBtn.addEventListener('click', (e) => {
                    e.stopPropagation(); // Prevent bubbling
                    removeFile(index);
                });
                div.appendChild(removeBtn);
            };
            reader.readAsDataURL(file);
        });
    }

    // --- Action: Remove File ---
    function removeFile(index) {
        selectedFiles.splice(index, 1);
        updatePreview();
        syncInput();
        if (onUpdate) onUpdate(selectedFiles);
    }

    // --- Event Listeners ---

    // 1. Input Change
    input.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    // 2. Drag & Drop
    if (dropZone) {
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.classList.add('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }

        function unhighlight(e) {
            dropZone.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-green-900');
        }

        dropZone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        });
    }

    // Initial sync/check
    if (input.files && input.files.length > 0) {
        handleFiles(input.files);
    }

    // Return interface
    return {
        getSelectedFiles: () => selectedFiles,
        reset: () => {
            selectedFiles = [];
            input.value = '';
            updatePreview();
            syncInput();
        }
    };
}
