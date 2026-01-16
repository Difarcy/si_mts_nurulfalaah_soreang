import { initGenericMultiImageUpload } from '../../modules/upload/multi-generic.js';
import { ImageNotificationHandler } from '../../modules/upload/image-notification-handler.js';

/**
 * Activity Photo Controller
 * Manages modal interactions, delete actions, and initializes upload module.
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Initialize Upload Module
    const uploader = initGenericMultiImageUpload({
        inputId: 'fileInput',
        previewContainerId: 'previewContainer',
        uploadPlaceholderId: 'uploadPlaceholder',
        submitBtnId: 'submitBtn',
        dropZoneId: 'dropzone',
        addBtnId: 'addMoreBtn', // Pass the ID of the existing Add button
        maxFiles: 20,
        maxSize: 5 * 1024 * 1024, // 5MB
        onError: (message, type) => {
            if (message.includes('terlalu besar')) {
                ImageNotificationHandler.showSizeLimitError(message.match(/\b[\w.]+\b/)?.[0] || 'File');
            } else {
                alert(message);
            }
        }
    });

    // 2. Modal Management
    const uploadModal = document.getElementById('uploadModal');
    const modalBackdrop = document.getElementById('modalBackdrop');
    const modalPanel = document.getElementById('modalPanel');
    const openModalBtns = document.querySelectorAll('.js-open-upload-modal');
    const closeModalBtns = document.querySelectorAll('.js-close-upload-modal');
    const uploadForm = document.getElementById('uploadForm');

    // TAMBAHAN: Intercept form submit untuk inject files ke FormData
    // Karena input.files adalah read-only, kita perlu tambahkan file secara manual
    if (uploadForm && uploader) {
        uploadForm.addEventListener('submit', function(e) {
            // Jangan preventDefault dulu, tapi inject selected files
            const selectedFiles = uploader.getSelectedFiles?.();

            if (selectedFiles && selectedFiles.length > 0) {
                // Kita gunakan FormData API untuk proper multipart handling
                const formData = new FormData(this);

                // Hapus gambar[] yang mungkin kosong
                formData.delete('gambar[]');

                // Tambahkan selected files ke FormData
                selectedFiles.forEach((file, index) => {
                    formData.append('gambar[]', file);
                });

                // Submit form dengan FormData yang benar
                e.preventDefault();

                // Tampilkan loading notif
                if (typeof window.showAdminNotification === 'function') {
                    window.showAdminNotification('Mengupload foto...', 'loading');
                }

                // Close modal immediately
                closeModal();

                // Submit via fetch dengan FormData
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Tampilkan success notif
                        if (typeof window.showAdminNotification === 'function') {
                            window.showAdminNotification('Foto kegiatan berhasil diupload', 'success');
                        }
                        // Redirect setelah 1.5 detik
                        setTimeout(() => {
                            window.location.href = response.url || response.redirected ? response.url : window.location.href;
                        }, 1500);
                    } else {
                        throw new Error('Upload failed: ' + response.status);
                    }
                })
                .catch(error => {
                    // Tampilkan error notif
                    if (typeof window.showAdminNotification === 'function') {
                        window.showAdminNotification('Error: ' + error.message, 'error');
                    } else {
                        alert('Error uploading files: ' + error.message);
                    }
                });
            }
        });
    }

    if (uploadForm && typeof window.initUnsavedChangesModal === 'function') {
        window.initUnsavedChangesModal({
            formId: 'uploadForm',
            submitBtnId: 'submitBtn',
            modalId: 'confirm-modal',
            extraCheck: function () {
                const input = document.getElementById('fileInput');
                return !!(input && input.files && input.files.length > 0);
            }
        });
    }

    function openModal() {
        if (uploadModal) {
            uploadModal.classList.remove('hidden');
            // Animate in
            if (modalBackdrop) modalBackdrop.classList.remove('opacity-0');
            if (modalPanel) {
                modalPanel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            }
        }
    }

    function closeModal() {
        if (uploadModal) {
            // Close immediately without delay
            uploadModal.classList.add('hidden');

            if (uploadForm) uploadForm.reset();
            if (uploader && typeof uploader.reset === 'function') {
                uploader.reset();
            }
        }
    }

    // Event Listeners for Modal
    openModalBtns.forEach(btn => btn.addEventListener('click', openModal));
    closeModalBtns.forEach(btn => btn.addEventListener('click', closeModal));

    if (uploadModal) {
        uploadModal.addEventListener('click', function(e) {
            if (e.target === uploadModal) closeModal();
        });
    }

    // 3. UI Interactions (Dropzone Click & Add More)
    const dropzone = document.getElementById('dropzone');
    const fileInput = document.getElementById('fileInput');
    const addMoreBtn = document.getElementById('addMoreBtn');

    // Clicking dropzone triggers file input (but ignore if clicking child buttons)
    if (dropzone && fileInput) {
        dropzone.addEventListener('click', function(e) {
            // Prevent if clicking on buttons or their children
            if (e.target.closest('button')) return;

            // Prevent upload trigger if there are already selected images
            // We rely on the module state or DOM check
            const previewContainer = document.getElementById('previewContainer');
            if (previewContainer && previewContainer.children.length > 0 && !previewContainer.classList.contains('hidden')) {
                 return;
            }

            // Also check if we are clicking on a preview item (just in case)
            if (e.target.closest('[data-image-preview]')) return;

            fileInput.click();
        });
    }

    // "Add More" button explicitly triggers file input
    if (addMoreBtn && fileInput) {
        addMoreBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent bubbling to dropzone
            fileInput.click();
        });
    }

    // Prevent file input click from bubbling (avoid double trigger)
    if (fileInput) {
        fileInput.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }

    // 4. Delete Photo Management
    const deleteBtns = document.querySelectorAll('.js-delete-photo-btn');
    deleteBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const url = this.getAttribute('data-delete-url');
            const title = this.getAttribute('data-delete-title');
            const message = this.getAttribute('data-delete-message');

            if (window.showDeleteModal) {
                window.showDeleteModal(url, title, message);
            }
        });
    });

    // 5. Image Preview Modal (Global Delegation)
    const previewModal = document.getElementById('imagePreviewModal');
    const previewImage = document.getElementById('previewImage');
    const previewClose = document.querySelectorAll('[data-image-preview-close]');

    if (previewModal && previewImage) {
        function openPreview(src) {
            previewImage.src = src;
            previewModal.classList.remove('hidden');
            previewModal.classList.add('flex');
        }

        function closePreview() {
            previewModal.classList.add('hidden');
            previewModal.classList.remove('flex');
            setTimeout(() => { previewImage.src = ''; }, 200);
        }

        // Use Event Delegation for dynamic content support
        document.body.addEventListener('click', function(e) {
            const trigger = e.target.closest('[data-image-preview]');
            if (trigger) {
                // Ignore if clicking delete button inside (or other interactive elements)
                if (e.target.closest('button') || e.target.closest('a')) return;

                const src = trigger.getAttribute('data-image-src');
                if (src) openPreview(src);
            }
        });

        previewClose.forEach(btn => btn.addEventListener('click', closePreview));
        previewModal.addEventListener('click', (e) => {
            if (e.target === previewModal || e.target.closest('[data-image-preview-content]') === null) {
                closePreview();
            }
        });
    }
});
