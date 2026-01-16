/**
 * Posts Form Validation
 * Validasi form untuk posts (berita/artikel)
 * Dipakai di: posts-form.js
 */

window.PostsFormValidation = {
    /**
     * Validate thumbnail and update button state
     */
    validateThumbnailAndUpdateButton: function (options) {
        const {
            isEditMode = false,
            selectedImages = [],
            existingImagesArray = [],
            validateImageCount = null,
            hasChanges = null,
            getBodyContent = null
        } = options;

        const submitBtn = document.getElementById('submit-btn');
        const submitBtnText = document.getElementById('submit-btn-text');
        const statusSelect = document.getElementById('status-select');
        const scheduleToggle = document.getElementById('schedule-toggle');
        const publishedAtDateEl = document.getElementById('published-at-date');
        const publishedAtTimeEl = document.getElementById('published-at-time');
        const thumbnailInput = document.getElementById('thumbnail-input');
        const thumbnailPreview = document.getElementById('thumbnail-preview');
        const currentThumbnail = document.getElementById('current-thumbnail-container') || document.getElementById('thumbnail-current-container');
        const thumbnailUploadCard = document.getElementById('thumbnail-upload-card');

        if (!submitBtn || !statusSelect || !submitBtnText) return;

        const status = statusSelect.value;

        // Update teks tombol menggunakan helper (Mencegah duplikasi logika)
        if (typeof window.PostsFormHelpers !== 'undefined' && typeof window.PostsFormHelpers.updateSubmitButtonText === 'function') {
            window.PostsFormHelpers.updateSubmitButtonText(status, isEditMode);
        } else {
             // Fallback jika helper belum ready
            const submitBtnText = document.getElementById('submit-btn-text');
            if (submitBtnText) {
                if (!isEditMode) {
                    const newText = status === 'draft' ? 'Simpan' : 'Publish';
                    submitBtnText.textContent = newText;
                    if (submitBtnText.textContent !== newText) {
                        submitBtnText.innerHTML = newText;
                    }
                } else {
                    submitBtnText.textContent = 'Simpan';
                }
            }
        }
        
        // Validasi semua field wajib (bertanda bintang merah)
        const titleInput = document.querySelector('input[name="title"]');
        const bodyInput = document.querySelector('textarea[name="body"]');
        const authorNameInput = document.querySelector('input[name="author_name"]');

        // Get body content dari TinyMCE atau textarea
        let bodyContent = '';
        let bodyHtmlContent = '';

        if (getBodyContent) {
            bodyContent = getBodyContent();
        } else if (typeof window.PostsTinyMCE !== 'undefined' && window.PostsTinyMCE.getContentText) {
            bodyContent = window.PostsTinyMCE.getContentText();
        } else if (bodyInput) {
            bodyContent = bodyInput.value || '';
        }

        // Juga cek HTML content untuk memastikan ada konten (termasuk formatting)
        if (typeof window.PostsTinyMCE !== 'undefined' && typeof window.PostsTinyMCE.getContent === 'function') {
            bodyHtmlContent = window.PostsTinyMCE.getContent();
        } else if (bodyInput) {
            bodyHtmlContent = bodyInput.value || '';
        }

        // Cek apakah body memiliki konten (bukan hanya tag kosong atau whitespace)
        const hasBody = (bodyContent && bodyContent.trim() !== '') ||
            (bodyHtmlContent && bodyHtmlContent.trim() !== '' &&
                bodyHtmlContent.trim() !== '<p></p>' &&
                bodyHtmlContent.trim() !== '<p><br></p>' &&
                bodyHtmlContent.trim() !== '<p><br/></p>' &&
                bodyHtmlContent.trim() !== '<br>' &&
                bodyHtmlContent.trim() !== '<br/>');

        const hasTitle = titleInput && titleInput.value && titleInput.value.trim() !== '';

        // Author name validation
        let hasAuthorName = false;
        if (authorNameInput && authorNameInput.value && authorNameInput.value.trim() !== '') {
            hasAuthorName = true;
        }

        // Thumbnail validation
        const hasThumbnailFile = thumbnailInput && thumbnailInput.files && thumbnailInput.files.length > 0;
        const hasThumbnailPreview = thumbnailPreview && thumbnailPreview.classList && !thumbnailPreview.classList.contains('hidden');
        const hasExistingThumbnail = !!(currentThumbnail && currentThumbnail.querySelector('img')) || !!(thumbnailUploadCard && thumbnailUploadCard.querySelector('#thumbnail-current-container img'));
        const hasThumbnail = hasThumbnailFile || hasThumbnailPreview || hasExistingThumbnail;

        // Validasi: Semua field wajib harus terisi (baik draft maupun published)
        // Field wajib: title, body, author_name, thumbnail
        // REVISI: Thumbnail WAJIB untuk semua status (draft maupun published) karena ditandai bintang merah (*)
        const hasAllRequiredFields = hasTitle && hasBody && hasAuthorName && hasThumbnail;

        let isValid = false;

        if (!isEditMode) {
            // Mode tambah: harus mengisi semua field wajib
            isValid = hasAllRequiredFields;
        } else {
            // Mode edit: harus ada perubahan dulu, kemudian validasi field wajib
            // Cek jika thumbnail dihapus (ini juga perubahan)
            const removeThumbnailFlag = document.getElementById('remove-thumbnail-flag');
            const isThumbnailRemoved = removeThumbnailFlag && removeThumbnailFlag.value === '1';

            const hasFormChanges = (hasChanges ? hasChanges() : true) || isThumbnailRemoved;

            if (!hasFormChanges) {
                // Tidak ada perubahan sama sekali
                isValid = false;
            } else {
                // Ada perubahan - sekarang validasi field wajib
                // KHUSUS untuk thumbnail: jika thumbnail dihapus, izinkan simpan sebagai draft
                // tapi hanya jika field lain lengkap (title, body, author)
                if (isThumbnailRemoved && !hasThumbnailFile && !hasThumbnailPreview) {
                    // Thumbnail dihapus dan belum ada pengganti
                    // Izinkan simpan jika minimal field text sudah lengkap
                    isValid = hasTitle && hasBody && hasAuthorName;
                } else {
                    // Normal validation: semua field wajib harus terisi
                    isValid = hasAllRequiredFields;
                }
            }
        }

        // Validasi jadwal jika dipublikasikan dengan checkbox jadwal aktif
        let scheduleValid = true;
        if (status === 'published' && scheduleToggle && scheduleToggle.checked) {
            const hasDate = !!(publishedAtDateEl && publishedAtDateEl.value && publishedAtDateEl.value.trim() !== '');
            const hasTime = !!(publishedAtTimeEl && publishedAtTimeEl.value && publishedAtTimeEl.value.trim() !== '');
            if (!hasDate || !hasTime) {
                scheduleValid = false;
            } else {
                try {
                    const scheduled = new Date(`${publishedAtDateEl.value}T${publishedAtTimeEl.value}:00`);
                    const now = new Date();
                    scheduleValid = scheduled.getTime() >= (now.getTime() - 60000);
                } catch (e) {
                    scheduleValid = false;
                }
            }
        }

        // Cek validasi jumlah gambar
        const imageCountValid = validateImageCount ? validateImageCount() : true;

        // Update tombol submit
        if (isValid && imageCountValid && scheduleValid) {
            submitBtn.disabled = false;
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            submitBtn.removeAttribute('disabled');
        } else {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            submitBtn.setAttribute('disabled', 'disabled');
        }
    },

    /**
     * Validate image count
     * Aturan:
     * - Maksimal 6 gambar
     * - Tidak boleh ganjil kecuali 1 gambar
     * - Valid: 1, 2, 4, 6 gambar
     */
    validateImageCount: function (selectedImages = []) {
        const warningDiv = document.getElementById('images-warning');
        const warningText = document.getElementById('images-warning-text');
        const submitBtn = document.getElementById('submit-btn');
        const modalSaveBtn = document.getElementById('modal-save-btn');

        const existingInputs = document.querySelectorAll('input[name="existing_images[]"]');
        const totalExisting = Array.from(existingInputs).filter(input => {
            return input && input.value && input.value.trim() !== '';
        }).length;

        const validSelectedImages = selectedImages.filter(file => file && file instanceof File);
        const totalImages = validSelectedImages.length + totalExisting;

        // Validasi maksimal 6 gambar
        if (totalImages > 6) {
            if (warningDiv) {
                warningDiv.classList.remove('hidden');
                warningText.textContent = `Anda hanya dapat mengunggah hingga 6 gambar.`;
                warningDiv.className = 'mb-3 p-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg';
            }
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitBtn.setAttribute('disabled', 'disabled');
            }
            if (modalSaveBtn) {
                modalSaveBtn.disabled = true;
                modalSaveBtn.classList.add('opacity-50', 'cursor-not-allowed');
                modalSaveBtn.setAttribute('disabled', 'disabled');
            }
            return false;
        }

        // Jumlah ganjil (selain 1) — blokir simpan/publish TANPA notif
        if (totalImages > 1 && totalImages % 2 !== 0) {
            if (warningDiv) {
                warningDiv.classList.add('hidden');
                warningText.textContent = '';
                warningDiv.className = 'hidden mb-3 p-3 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-lg';
            }
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitBtn.setAttribute('disabled', 'disabled');
            }
            if (modalSaveBtn) {
                modalSaveBtn.disabled = true;
                modalSaveBtn.classList.add('opacity-50', 'cursor-not-allowed');
                modalSaveBtn.setAttribute('disabled', 'disabled');
            }
            return false;
        }

        // Valid: sembunyikan warning dan return true
        // Tombol akan di-enable/disable oleh validateThumbnailAndUpdateButton
        if (warningDiv) {
            warningDiv.classList.add('hidden');
            warningText.textContent = '';
            warningDiv.className = 'hidden mb-3 p-3 bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800 rounded-lg';
        }
        return true;
    }
};
