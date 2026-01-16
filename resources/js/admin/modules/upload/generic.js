/**
 * Generic Image Upload Handler
 * Menangani logika upload gambar tunggal dengan preview, validasi, dan drag & drop.
 *
 * @param {Object} options Konfigurasi upload
 * @param {string} options.inputId ID input file
 * @param {string} options.dropZoneId ID elemen drop zone (opsional)
 * @param {string} options.previewContainerId ID container preview
 * @param {string} options.previewImageId ID elemen gambar preview (img)
 * @param {string} options.placeholderId ID elemen placeholder (yang muncul saat kosong)
 * @param {string} options.removeBtnId ID tombol hapus
 * @param {string} options.deleteInputId ID input hidden untuk flag hapus (opsional)
 * @param {number} options.maxSize Maksimal ukuran file dalam bytes (default: 5MB)
 * @param {Function} options.onChange Callback saat gambar berubah (dipilih/dihapus)
 * @param {Function} options.onError Callback saat terjadi error validasi
 */

import { ImageNotificationHandler } from './image-notification-handler.js';

export function initGenericImageUpload(options = {}) {
    const {
        inputId,
        dropZoneId,
        previewContainerId,
        previewImageId,
        placeholderId,
        removeBtnId,
        deleteInputId,
        maxSize = 5 * 1024 * 1024, // 5MB
        allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'], // Default allowed types
        onChange = null,
        onError = null
    } = options;

    const input = document.getElementById(inputId);
    const dropZone = document.getElementById(dropZoneId);
    const previewContainer = document.getElementById(previewContainerId);
    const previewImg = document.getElementById(previewImageId);
    const placeholder = document.getElementById(placeholderId);
    const removeBtn = document.getElementById(removeBtnId);
    const deleteInput = document.getElementById(deleteInputId);

    if (!input) return;

    // Deteksi state awal apakah sudah ada gambar
    const initialHasImage = previewContainer && !previewContainer.classList.contains('hidden');
    let currentObjectUrl = null;

    // Helper: Validasi File
    function validateFile(file) {
        // Jika ini adalah gambar dan FileValidation tersedia, gunakan FileValidation untuk konsistensi
        if (allowedTypes.includes('image/*') && window.FileValidation) {
            return window.FileValidation.validateImage(file, maxSize);
        }

        // Fallback: validasi manual untuk tipe file lainnya atau jika FileValidation tidak tersedia
        const fileType = file.type || '';
        const fileName = file.name || '';
        const ext = fileName.includes('.') ? fileName.split('.').pop().toLowerCase() : '';
        const extensionToMime = {
            jpg: 'image/jpeg',
            jpeg: 'image/jpeg',
            png: 'image/png',
            webp: 'image/webp',
            gif: 'image/gif',
        };

        const allowWildcardImage = allowedTypes.includes('image/*');
        const allowWildcardOf = allowedTypes.some(t => typeof t === 'string' && t.endsWith('/*'));

        const isMimeAllowed = (() => {
            if (allowWildcardImage) return fileType.startsWith('image/');
            if (allowWildcardOf) {
                for (const t of allowedTypes) {
                    if (typeof t !== 'string' || !t.endsWith('/*')) continue;
                    const prefix = t.slice(0, -1);
                    if (fileType.startsWith(prefix)) return true;
                }
            }
            return allowedTypes.includes(fileType);
        })();

        const isExtAllowed = (() => {
            if (!ext) return false;
            const inferred = extensionToMime[ext];
            if (!inferred) return false;
            if (allowWildcardImage) return true;
            if (allowWildcardOf) return allowedTypes.some(t => typeof t === 'string' && t.endsWith('/*') && inferred.startsWith(t.slice(0, -1)));
            return allowedTypes.includes(inferred);
        })();

        if (!isMimeAllowed && !isExtAllowed) {
            const msg = 'Format file tidak didukung. Harap upload gambar (JPG, PNG, WEBP, GIF).';
            if (onError) {
                onError(msg);
            } else {
                ImageNotificationHandler.showSizeLimitError(file.name);
            }
            return false;
        }

        if (file.size > maxSize) {
            ImageNotificationHandler.showSizeLimitError(file.name);
            return false;
        }
        return true;
    }

    // Helper: Tampilkan Preview
    function showPreview(file) {
        // Tampilkan container preview secepatnya agar user merasa responsif
        if (previewContainer) previewContainer.classList.remove('hidden');
        if (placeholder) placeholder.classList.add('hidden');

        if (currentObjectUrl) {
            URL.revokeObjectURL(currentObjectUrl);
            currentObjectUrl = null;
        }

        const objectUrl = URL.createObjectURL(file);
        currentObjectUrl = objectUrl;

        if (previewImg) {
            previewImg.src = objectUrl;
            previewImg.onerror = () => {
                if (currentObjectUrl) {
                    URL.revokeObjectURL(currentObjectUrl);
                    currentObjectUrl = null;
                }
                const msg = 'Gagal memuat preview gambar. Coba pilih file lain.';
                if (onError) {
                    onError(msg);
                } else {
                    ImageNotificationHandler.showSizeLimitError(file.name);
                }
            };
        }

        // Update zoom attributes if compatible structure exists
        const zoomContainer = previewContainer ? previewContainer.querySelector('[data-image-preview]') : null;
        if (zoomContainer) {
            zoomContainer.setAttribute('data-image-src', objectUrl);
        }

        if (deleteInput) {
            deleteInput.value = '0';
            deleteInput.dispatchEvent(new Event('change', { bubbles: true }));
        }

        // Trigger change event manual jika diperlukan oleh listener lain
        if (onChange) onChange(file);
    }

    // Helper: Reset / Hapus Gambar
    function resetImage() {
        input.value = ''; // Reset input file

        if (currentObjectUrl) {
            URL.revokeObjectURL(currentObjectUrl);
            currentObjectUrl = null;
        }

        if (previewImg) {
            previewImg.onerror = null; // Hapus error handler sebelum reset src
            previewImg.src = '';
        }
        if (previewContainer) previewContainer.classList.add('hidden');
        if (placeholder) placeholder.classList.remove('hidden');

        if (deleteInput) {
            // Jika awalnya ada gambar, maka reset berarti menghapus gambar lama (value = 1)
            // Jika awalnya tidak ada gambar, maka reset berarti kembali ke kosong (value = 0)
            deleteInput.value = initialHasImage ? '1' : '0';
            deleteInput.dispatchEvent(new Event('change', { bubbles: true }));
        }

        const zoomContainer = previewContainer ? previewContainer.querySelector("[data-image-preview]") : null;
        if (zoomContainer) {
            zoomContainer.removeAttribute("data-image-src");
        }

        if (onChange) onChange(null);

        // Dispatch native change event agar form validation mendeteksi perubahan
        input.dispatchEvent(new Event('change', { bubbles: true }));
    }

    // Event Listener: Input Change
    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            if (validateFile(file)) {
                showPreview(file);
            } else {
                input.value = ''; // Reset invalid file
            }
        }
    });

    // Event Listener: Remove Button
    if (removeBtn) {
        // Clone untuk menghapus listener lama jika ada
        const newRemoveBtn = removeBtn.cloneNode(true);
        removeBtn.parentNode.replaceChild(newRemoveBtn, removeBtn);

        newRemoveBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            resetImage();
        });
    }

    // Drag & Drop Logic
    if (dropZone) {
        // Klik dropzone memicu input file
        dropZone.addEventListener('click', function (e) {
            // Jangan trigger jika klik pada tombol atau elemen preview interaktif
            if (e.target.closest('button')) {
                return;
            }
            input.click();
        });

        // Drag Events
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, function (e) {
                e.preventDefault();
                e.stopPropagation();
            }, false);
            document.body.addEventListener(eventName, function (e) {
                e.preventDefault();
                e.stopPropagation();
            }, false);
        });

        // Visual Feedback
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.add('border-green-500', 'bg-green-50', 'dark:bg-slate-700');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, () => {
                dropZone.classList.remove('border-green-500', 'bg-green-50', 'dark:bg-slate-700');
            }, false);
        });

        // Handle Drop
        dropZone.addEventListener('drop', function (e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                const file = files[0];
                if (validateFile(file)) {
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);

                    input.files = dataTransfer.files;

                    // Trigger change event manual
                    input.dispatchEvent(new Event('change', { bubbles: true }));
                }
            }
        }, false);
    }
}

// Expose globally
window.initGenericImageUpload = initGenericImageUpload;
