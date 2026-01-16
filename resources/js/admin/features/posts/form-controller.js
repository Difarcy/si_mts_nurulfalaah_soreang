/**
 * Posts Form Handler - Main Coordinator
 * Mengkoordinasikan semua modul posts form
 * Dipakai di: admin/pages/posts/_form.blade.php
 *
 * Modul yang digunakan:
 * - posts-form-helpers.js: Helper functions
 * - posts-form-validation.js: Form validation
 * - posts-form-change-detection.js: Change detection
 * - posts-images-upload.js: Image upload & management
 * - posts-tinymce.js: TinyMCE integration
 * - posts-meta-description.js: Meta description auto-update
 * - posts-form-submission.js: Form submission handling
 */

window.initPostsForm = function (options = {}) {
    const {
        isEditMode = false,
        isBerita = true,
        existingImages = [],
        uploadRoute = null,
        csrfToken = '',
        tagSuggestionsRoute = null
    } = options;

    // ============================================
    // 1. INITIAL DATA TRACKING
    // ============================================
    let initialData = {
        title: '',
        body: '',
        bodyHtml: '',
        authorName: '',
        status: '',
        slug: '',
        excerpt: '',
        metaDescription: '',
        publishedAt: '',
        publishedAtTime: '',
        isFeatured: false,
        existingImagesCount: 0,
        existingImagesOrder: [],
        tags: []
    };

    // ============================================
    // 2. INITIALIZE MODULES
    // ============================================

    // Initialize Images Upload Module
    if (typeof window.PostsImagesUpload !== 'undefined') {
        window.PostsImagesUpload.init({
            existingImages: existingImages,
            uploadRoute: uploadRoute,
            csrfToken: csrfToken,
            onImageChange: function () {
                validateThumbnailAndUpdateButton();
            },
            onValidationChange: function () {
                validateThumbnailAndUpdateButton();
            }
        });
    }



    // ============================================
    // 3. VALIDATION FUNCTIONS (using modules)
    // ============================================

    function validateThumbnailAndUpdateButton() {
        if (typeof window.PostsFormValidation !== 'undefined') {
            window.PostsFormValidation.validateThumbnailAndUpdateButton({
                isEditMode: isEditMode,
                selectedImages: window.PostsImagesUpload ? window.PostsImagesUpload.getSelectedImages() : [],
                existingImagesArray: window.PostsImagesUpload ? window.PostsImagesUpload.getExistingImagesArray() : [],
                validateImageCount: function () {
                    return validateImageCount();
                },
                hasChanges: function () {
                    return hasChanges();
                },
                getBodyContent: function () {
                    return getBodyContent();
                }
            });
        }
    }

    function validateImageCount() {
        if (typeof window.PostsFormValidation !== 'undefined') {
            return window.PostsFormValidation.validateImageCount(
                window.PostsImagesUpload ? window.PostsImagesUpload.getSelectedImages() : []
            );
        }
        return true;
    }

    // ============================================
    // 4. HELPER FUNCTIONS (using modules)
    // ============================================

    function getBodyContent() {
        if (typeof window.PostsFormHelpers !== 'undefined') {
            return window.PostsFormHelpers.getBodyContent();
        }
        return '';
    }

    function getBodyHtmlContent() {
        if (typeof window.PostsFormHelpers !== 'undefined') {
            return window.PostsFormHelpers.getBodyHtmlContent();
        }
        return '';
    }

    function updateSubmitButtonTextGlobal(status) {
        if (typeof window.PostsFormHelpers !== 'undefined') {
            window.PostsFormHelpers.updateSubmitButtonText(status, isEditMode);
        }
    }

    // ============================================
    // 5. FORM CHANGE DETECTION (using modules)
    // ============================================

    function hasChanges() {
        if (typeof window.PostsFormChangeDetection !== 'undefined') {
            return window.PostsFormChangeDetection.hasChanges({
                isEditMode: isEditMode,
                initialData: initialData,
                selectedImages: window.PostsImagesUpload ? window.PostsImagesUpload.getSelectedImages() : [],
                existingImagesArray: window.PostsImagesUpload ? window.PostsImagesUpload.getExistingImagesArray() : [],
                getBodyHtmlContent: getBodyHtmlContent
            });
        }
        return true;
    }

    // ============================================
    // 6. AUTO UPDATE META DESCRIPTION (using modules)
    // ============================================

    function slugifyTitle(t) {
        return (t || '')
            .toString()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    }

    function getPlainBody() {
        if (typeof window.PostsFormHelpers !== 'undefined') {
            return (window.PostsFormHelpers.getBodyContent() || '').trim();
        }
        return '';
    }

    function computeAutoExcerpt() {
        const text = getPlainBody();
        return text.length > 200 ? text.substring(0, 200) : text;
    }

    function autoUpdateMetaDescription() {
        if (!isEditMode) return;
        if (typeof window.PostsMetaDescription !== 'undefined' && typeof window.PostsMetaDescription.autoUpdate === 'function') {
            window.PostsMetaDescription.autoUpdate(getPlainBody);
        }
    }

    // ============================================
    // 7. INITIALIZATION
    // ============================================
    function runInitialization() {
        // Initialize submit button state
        const submitBtn = document.getElementById('submit-btn');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }

        // Meta description char count will be handled together with other listeners later

        // Capture Initial Data for Edit Mode
        function captureInitialData() {
            const titleInput = document.querySelector('input[name="title"]');
            const authorNameInput = document.querySelector('input[name="author_name"]');
            const statusSelect = document.getElementById('status-select');
            const thumbnailInput = document.getElementById('thumbnail-input');
            const thumbnailPreview = document.getElementById('thumbnail-preview');
            const currentThumbnail = document.getElementById('current-thumbnail-container') || document.getElementById('thumbnail-current-container');
            const thumbnailUploadCard = document.getElementById('thumbnail-upload-card');
            const slugInput = document.getElementById('slug-input');
            const excerptInput = document.getElementById('excerpt-input');
            const metaDescriptionInput = document.getElementById('meta-description-input');
            const publishedAtInput = document.querySelector('input[name="published_at_date"]');
            const publishedAtTimeInput = document.querySelector('input[name="published_at_time"]');
            const isFeaturedInput = document.getElementById('is_featured');
            const existingImagesInputs = document.querySelectorAll('input[name="existing_images[]"]');
            const tagsInputs = document.querySelectorAll('input[name="tags[]"]');

            initialData.title = titleInput ? titleInput.value.trim() : '';
            initialData.body = getBodyContent();
            initialData.bodyHtml = getBodyHtmlContent();
            initialData.authorName = authorNameInput ? authorNameInput.value.trim() : '';
            initialData.status = statusSelect ? statusSelect.value : '';
            initialData.type = document.getElementById('type-select') ? document.getElementById('type-select').value : 'berita';
            // Simpan state is_featured awal sesuai kondisi
            // Jika type awal adalah 'artikel', isFeatured awal harus dianggap false (karena artikel tidak punya highlight)
            // Ini untuk mencegah false positive "change" jika user ganti ke Berita (yg default false) -> sistem mikir berubah dari "true" (jika data DB true)
            // Tapi kita ingin mendeteksi perubahan dari "nilai awal saat load".
            // Jadi:
            const isFeaturedEl = document.getElementById('is_featured');
            let initialFeaturedState = isFeaturedEl ? isFeaturedEl.checked : false;
            if (initialData.type === 'artikel') {
                initialFeaturedState = false;
            }
            initialData.isFeatured = initialFeaturedState;

            initialData.slug = slugInput ? slugInput.value.trim() : '';
            initialData.excerpt = excerptInput ? excerptInput.value.trim() : '';
            initialData.metaDescription = metaDescriptionInput ? metaDescriptionInput.value.trim() : '';
            initialData.publishedAt = publishedAtInput ? publishedAtInput.value : '';
            initialData.publishedAtTime = publishedAtTimeInput ? publishedAtTimeInput.value : '';
            // initialData.isFeatured sudah diset di atas
            initialData.existingImagesCount = existingImagesInputs ? existingImagesInputs.length : 0;
            initialData.existingImagesOrder = existingImagesInputs ? Array.from(existingImagesInputs).map(input => input.value) : [];
            initialData.tags = Array.from(tagsInputs).map(input => input.value);

            const hasThumbnailFile = thumbnailInput && thumbnailInput.files && thumbnailInput.files.length > 0;
            const hasThumbnailPreview = thumbnailPreview && thumbnailPreview.classList && !thumbnailPreview.classList.contains('hidden');
            const hasExistingThumbnail = !!(currentThumbnail && currentThumbnail.querySelector('img')) ||
                !!(thumbnailUploadCard && thumbnailUploadCard.querySelector('#thumbnail-current-container img'));
            initialData.hasThumbnail = hasThumbnailFile || hasThumbnailPreview || hasExistingThumbnail;

            initialData.isInitialized = true;

            // Validate after setting initial data to ensure button state is correct
            validateThumbnailAndUpdateButton();
        }

        // Status change handler
        const statusSelect = document.getElementById('status-select');

        // Schedule toggle handler
        const scheduleToggle = document.getElementById('schedule-toggle');
        const scheduleFields = document.getElementById('schedule-fields');
        let scheduleIntervalId = null;

        function getNowParts() {
            const now = new Date();
            const pad = (n) => String(n).padStart(2, '0');
            const yyyy = now.getFullYear();
            const mm = pad(now.getMonth() + 1);
            const dd = pad(now.getDate());
            const hh = pad(now.getHours());
            const mi = pad(now.getMinutes());
            return { date: `${yyyy}-${mm}-${dd}`, time: `${hh}:${mi}` };
        }

        function ensureScheduleDefaults() {
            const dateInput = document.getElementById('published-at-date');
            const timeInput = document.getElementById('published-at-time');
            if (!dateInput || !timeInput) return;
            const nowParts = getNowParts();
            if (!dateInput.value) dateInput.value = nowParts.date;
            if (!timeInput.value) timeInput.value = nowParts.time;
        }
        function startRealtimeScheduleValidation() {
            if (scheduleIntervalId) clearInterval(scheduleIntervalId);
            scheduleIntervalId = setInterval(() => {
                validateThumbnailAndUpdateButton();
            }, 1000);
        }
        function stopRealtimeScheduleValidation() {
            if (scheduleIntervalId) {
                clearInterval(scheduleIntervalId);
                scheduleIntervalId = null;
            }
        }
        function updateStatusDrivenVisibility(status) {
            // Handle schedule section based on status
            if (scheduleToggle && scheduleFields) {
                const dateInput = document.getElementById('published-at-date');
                const timeInput = document.getElementById('published-at-time');
                const scheduleSection = document.getElementById('schedule-section');

                const isPublish = status === 'published';
                if (isPublish) {
                    if (scheduleSection) scheduleSection.classList.remove('hidden');
                    scheduleToggle.disabled = false;
                    // Keep current toggle state, but start realtime validation if checked
                    if (scheduleToggle.checked) {
                        scheduleFields.classList.remove('hidden');
                        ensureScheduleDefaults();
                        startRealtimeScheduleValidation();
                    } else {
                        scheduleFields.classList.add('hidden');
                        stopRealtimeScheduleValidation();
                    }
                } else {
                    // For draft/unpublished: hide & disable schedule, clear values
                    if (scheduleSection) scheduleSection.classList.add('hidden');
                    scheduleToggle.checked = false;
                    scheduleToggle.disabled = true;
                    scheduleFields.classList.add('hidden');
                    if (dateInput) dateInput.value = '';
                    if (timeInput) timeInput.value = '';
                    stopRealtimeScheduleValidation();
                }
            }

            // Handle highlight visibility based on status
            const typeSelect = document.getElementById('type-select');
            const highlightContainer = document.getElementById('highlight-checkbox-container');
            const featuredCheckbox = document.getElementById('is_featured');
            if (typeSelect && highlightContainer && featuredCheckbox) {
                const isArtikel = typeSelect.value === 'artikel';
                const isPublish = status === 'published';
                if (!isPublish || isArtikel) {
                    highlightContainer.classList.add('hidden');
                    featuredCheckbox.disabled = true;
                    featuredCheckbox.checked = false;
                    // ensure hidden input exists and set to 0
                    let hidden = document.getElementById('is_featured_hidden');
                    if (!hidden) {
                        hidden = document.createElement('input');
                        hidden.type = 'hidden';
                        hidden.name = 'is_featured';
                        hidden.id = 'is_featured_hidden';
                        hidden.value = '0';
                        highlightContainer.insertAdjacentElement('afterend', hidden);
                    } else {
                        hidden.value = '0';
                    }
                } else {
                    // published & not artikel
                    highlightContainer.classList.remove('hidden');
                    featuredCheckbox.disabled = false;
                    const hidden = document.getElementById('is_featured_hidden');
                    if (hidden) hidden.remove();
                }
            }
        }
        function updateScheduleVisibility() {
            if (!scheduleToggle || !scheduleFields) return;
            if (scheduleToggle.checked) {
                scheduleFields.classList.remove('hidden');
                ensureScheduleDefaults();
                startRealtimeScheduleValidation();
            } else {
                scheduleFields.classList.add('hidden');
                const dateInput = document.getElementById('published-at-date');
                const timeInput = document.getElementById('published-at-time');
                if (dateInput) dateInput.value = '';
                if (timeInput) timeInput.value = '';
                stopRealtimeScheduleValidation();
            }
            validateThumbnailAndUpdateButton();
        }
        if (scheduleToggle) {
            scheduleToggle.addEventListener('change', updateScheduleVisibility);
            // Initialize visibility state
            updateScheduleVisibility();
        }

        function updateRequiredFields(status) {
            const titleInput = document.getElementById('title-input');
            const bodyInput = document.querySelector('textarea[name="body"]');
            const authorNameInput = document.getElementById('author-name-input');

            if (titleInput) titleInput.setAttribute('required', 'required');
            if (authorNameInput) authorNameInput.setAttribute('required', 'required');
            // Jangan set required pada body textarea karena editor TinyMCE menyembunyikannya
            // Validasi isi konten ditangani oleh PostsFormValidation (TinyMCE wrapper)
            if (bodyInput) bodyInput.removeAttribute('required');
        }

        if (statusSelect) {
            const handleStatusChange = function (e) {
                const currentStatus = this.value;

                updateRequiredFields(currentStatus);
                updateSubmitButtonTextGlobal(currentStatus);

                requestAnimationFrame(() => {
                    updateSubmitButtonTextGlobal(currentStatus);
                });

                setTimeout(() => {
                    const statusCheck = document.getElementById('status-select')?.value;
                    if (statusCheck === currentStatus) {
                        updateSubmitButtonTextGlobal(currentStatus);
                    }
                    validateThumbnailAndUpdateButton();
                    if (currentStatus === 'published' && scheduleToggle && scheduleToggle.checked) {
                        startRealtimeScheduleValidation();
                    } else {
                        stopRealtimeScheduleValidation();
                    }
                    updateStatusDrivenVisibility(currentStatus);
                }, 50);
            };

            statusSelect.removeEventListener('change', handleStatusChange);
            statusSelect.addEventListener('change', handleStatusChange, { passive: true });
        }

        const initialStatus = statusSelect ? statusSelect.value : 'published';
        updateRequiredFields(initialStatus);
        updateSubmitButtonTextGlobal(initialStatus);
        updateStatusDrivenVisibility(initialStatus);

        // Type selection handler (for featured checkbox)
        const typeSelect = document.getElementById('type-select');
        const highlightContainer = document.getElementById('highlight-checkbox-container');
        const featuredCheckbox = document.getElementById('is_featured');

        function syncFeaturedHidden(isArtikel) {
            let hidden = document.getElementById('is_featured_hidden');
            if (isArtikel) {
                if (!hidden) {
                    hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'is_featured';
                    hidden.id = 'is_featured_hidden';
                    hidden.value = '0';
                    if (highlightContainer) highlightContainer.insertAdjacentElement('afterend', hidden);
                } else {
                    hidden.value = '0';
                }
            } else {
                if (hidden) hidden.remove();
            }
        }

        function updateHighlightVisibility() {
            if (!typeSelect || !highlightContainer || !featuredCheckbox) return;
            const isArtikel = typeSelect.value === 'artikel';
            if (isArtikel) {
                highlightContainer.classList.add('hidden');
                featuredCheckbox.disabled = true;
                syncFeaturedHidden(true);
            } else {
                highlightContainer.classList.remove('hidden');
                featuredCheckbox.disabled = false;
                syncFeaturedHidden(false);
            }
        }
        updateHighlightVisibility();
        if (typeSelect) {
            typeSelect.addEventListener('change', function () {
                updateHighlightVisibility();
                validateThumbnailAndUpdateButton();
            });
        }

        // Field change handlers
        const titleInput = document.getElementById('title-input');
        const bodyInput = document.querySelector('textarea[name="body"]');
        const authorNameInput = document.getElementById('author-name-input');
        const thumbnailInput = document.getElementById('thumbnail-input');
        const metaDescriptionInput = document.getElementById('meta-description-input');
        const excerptInput = document.getElementById('excerpt-input');
        const slugInput = document.getElementById('slug-input');

        if (titleInput) {
            titleInput.addEventListener('input', function () {
                validateThumbnailAndUpdateButton();
                if (typeof window.updateCharCountDirect === 'function') {
                }
                // Di Edit Mode, slug TIDAK di-update otomatis saat judul berubah
                // untuk mencegah perubahan URL yang tidak disengaja dan menjaga konsistensi state tombol Simpan
                if (!isEditMode) {
                    const slugInput = document.getElementById('slug-input');
                    if (slugInput) {
                        slugInput.value = slugifyTitle(titleInput.value || '');
                        if (typeof window.updateCharCountDirect === 'function') {
                        }
                    }
                }
            });
            titleInput.addEventListener('change', function () {
                validateThumbnailAndUpdateButton();
                // Di Edit Mode, slug TIDAK di-update otomatis saat judul berubah
                if (!isEditMode) {
                    const slugInput = document.getElementById('slug-input');
                    if (slugInput) {
                        slugInput.value = slugifyTitle(titleInput.value || '');
                        if (typeof window.updateCharCountDirect === 'function') {
                        }
                    }
                }
            });
        }

        if (bodyInput) {
            bodyInput.addEventListener('input', function () {
                validateThumbnailAndUpdateButton();
                if (isEditMode) {
                    const excerptInput = document.getElementById('excerpt-input');
                    if (excerptInput) {
                        const ex = computeAutoExcerpt();
                        if (ex) {
                            excerptInput.value = ex;
                            if (typeof window.updateCharCountDirect === 'function') {
                            }
                        }
                    }
                    autoUpdateMetaDescription();
                }
            });
            bodyInput.addEventListener('change', function () {
                validateThumbnailAndUpdateButton();
                if (isEditMode) {
                    const excerptInput = document.getElementById('excerpt-input');
                    if (excerptInput) {
                        const ex = computeAutoExcerpt();
                        if (ex) {
                            excerptInput.value = ex;
                            if (typeof window.updateCharCountDirect === 'function') {
                            }
                        }
                    }
                    autoUpdateMetaDescription();
                }
            });
        }

        // Validasi tombol submit akan dipicu dari PostsTinyMCE.onContentChange

        if (authorNameInput) {
            authorNameInput.addEventListener('input', function () {
                validateThumbnailAndUpdateButton();
                if (typeof window.updateCharCountDirect === 'function') {
                }
            });
            authorNameInput.addEventListener('change', validateThumbnailAndUpdateButton);
        }

        if (thumbnailInput) {
            thumbnailInput.addEventListener('change', validateThumbnailAndUpdateButton);
        }

        if (metaDescriptionInput) {
            metaDescriptionInput.addEventListener('input', function () {
                validateThumbnailAndUpdateButton();
                if (typeof window.updateCharCountDirect === 'function') {
                }
            });
            metaDescriptionInput.addEventListener('change', function () {
                validateThumbnailAndUpdateButton();
                if (typeof window.updateCharCountDirect === 'function') {
                }
            });
        }

        if (excerptInput) {
            excerptInput.addEventListener('input', function () {
                validateThumbnailAndUpdateButton();
                if (typeof window.updateCharCountDirect === 'function') {
                }
                if (isEditMode) {
                    autoUpdateMetaDescription();
                }
            });
            excerptInput.addEventListener('change', function () {
                validateThumbnailAndUpdateButton();
                if (typeof window.updateCharCountDirect === 'function') {
                }
                if (isEditMode) {
                    autoUpdateMetaDescription();
                }
            });
        }

        if (slugInput) {
            slugInput.addEventListener('input', function () {
                validateThumbnailAndUpdateButton();
                if (typeof window.updateCharCountDirect === 'function') {
                }
            });
            slugInput.addEventListener('change', validateThumbnailAndUpdateButton);
        }

        const publishedAtDateInput = document.querySelector('input[name="published_at_date"]');
        if (publishedAtDateInput) {
            publishedAtDateInput.addEventListener('change', validateThumbnailAndUpdateButton);
            publishedAtDateInput.addEventListener('input', validateThumbnailAndUpdateButton);
        }
        const publishedAtTimeInput = document.querySelector('input[name="published_at_time"]');
        if (publishedAtTimeInput) {
            publishedAtTimeInput.addEventListener('change', validateThumbnailAndUpdateButton);
            publishedAtTimeInput.addEventListener('input', validateThumbnailAndUpdateButton);
        }

        // Type change handler
        const typeSelectInput = document.getElementById('type-select');
        if (typeSelectInput) {
            typeSelectInput.addEventListener('change', function () {
                updateHighlightVisibility();
                validateThumbnailAndUpdateButton();
            });
        }

        // Tags wrapper click handler for removing tags
        const tagsWrapper = document.getElementById('tags-wrapper');
        if (tagsWrapper) {
            // Gunakan MutationObserver untuk memantau perubahan pada daftar tag
            const observer = new MutationObserver(function (mutations) {
                validateThumbnailAndUpdateButton();
            });

            observer.observe(document.getElementById('tags-container'), {
                childList: true,
                subtree: true
            });
        }

        // Initialize TinyMCE with retry mechanism
        async function initializeTinyMCE(retryCount = 0) {
            const maxRetries = 20; // Try for 2 seconds (20 * 100ms)

            if (typeof window.TinyMCECommon !== 'undefined') {
                try {
                    // PostsTinyMCE.init() sekarang diganti dengan TinyMCECommon.init
                    await window.TinyMCECommon.init('body-editor', {
                        uploadRoute: uploadRoute,
                        csrfToken: csrfToken,
                        height: 400,
                        onContentChange: function () {
                            validateThumbnailAndUpdateButton();
                        }
                    });

                    // After TinyMCE is fully initialized, capture initial data
                    captureInitialData();

                } catch (error) {
                    // console.error('Error initializing TinyMCE:', error);
                    if (retryCount < maxRetries) {
                        setTimeout(() => initializeTinyMCE(retryCount + 1), 100);
                    } else {
                        // If TinyMCE fails, we still need to capture initial data (using textarea fallback)
                        captureInitialData();
                    }
                }
            } else {
                if (retryCount < maxRetries) {
                    setTimeout(() => initializeTinyMCE(retryCount + 1), 100);
                } else {
                    // console.error('TinyMCECommon not found after ' + maxRetries + ' retries!');
                    // Fallback capture
                    captureInitialData();
                }
            }
        }

        // Start initialization
        initializeTinyMCE();

        // Initialize Tag Input
        if (typeof window.initTagInput === 'function' && tagSuggestionsRoute) {
            window.initTagInput({
                apiUrl: tagSuggestionsRoute,
                onTagChange: function () {
                    validateThumbnailAndUpdateButton();
                }
            });
        }

        // Initialize Thumbnail Upload
        if (typeof window.initThumbnailUpload === 'function') {
            window.initThumbnailUpload({
                onThumbnailChange: function () {
                    validateThumbnailAndUpdateButton();
                }
            });
        }

        // Setup images input event listener
        const imagesInput = document.getElementById('images-input');
        if (imagesInput) {
            imagesInput.addEventListener('change', window.handleImagesSelect);
        }

        // Setup images upload card event listeners
        const imagesUploadCard = document.getElementById('images-upload-card');
        const imagesUploadBtn = document.getElementById('images-upload-btn');
        const imagesAddBtn = document.getElementById('images-add-btn');

        // Setup tombol upload FIRST (prioritas tinggi dengan capture phase)
        if (imagesUploadBtn && imagesInput) {
            imagesUploadBtn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                imagesInput.click();
            }, true); // Capture phase untuk memastikan di-handle lebih dulu
        }
        if (imagesAddBtn && imagesInput) {
            imagesAddBtn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                imagesInput.click();
            }, true);
        }

        // Setup card click handler dan drag & drop (hanya jika bukan button yang diklik)
        if (imagesUploadCard) {
            // Click handler
            if (typeof window.handleUploadCardClick === 'function') {
                imagesUploadCard.addEventListener('click', window.handleUploadCardClick, false);
            }

            // Drag & Drop handlers - MUST be attached for drag and drop to work
            // These handlers are set up in PostsImagesUpload.setupGlobalHandlers()
            if (typeof window.handleImagesDrop === 'function') {
                imagesUploadCard.addEventListener('drop', window.handleImagesDrop, false);
            }

            if (typeof window.handleImagesDragOver === 'function') {
                imagesUploadCard.addEventListener('dragover', window.handleImagesDragOver, false);
            }

            if (typeof window.handleImagesDragLeave === 'function') {
                imagesUploadCard.addEventListener('dragleave', window.handleImagesDragLeave, false);
            }

            // Also add dragenter for better UX
            imagesUploadCard.addEventListener('dragenter', function (e) {
                e.preventDefault();
                e.stopPropagation();
                if (typeof window.handleImagesDragOver === 'function') {
                    window.handleImagesDragOver(e);
                }
            }, false);
        }

        // Setup remove thumbnail button event listener
        const removeThumbnailBtn = document.getElementById('remove-thumbnail-btn');
        if (removeThumbnailBtn) {
            removeThumbnailBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                if (typeof window.removeThumbnailPreview === 'function') {
                    window.removeThumbnailPreview();
                }
            });
        }

        // Initialize Delete Image Modal
        if (typeof window.initDeleteImageModal === 'function') {
            window.initDeleteImageModal({
                onConfirm: function () {
                    if (window.PostsImagesUpload) {
                        window.PostsImagesUpload.confirmDeleteImage();
                    }
                }
            });
        }

        // Setup event listeners for existing images remove buttons
        if (window.PostsImagesUpload) {
            window.PostsImagesUpload.setupExistingImagesRemoveButtons();
        }

        // Initialize form submission
        if (typeof window.PostsFormSubmission !== 'undefined') {
            window.PostsFormSubmission.init({
                formId: isEditMode ? 'edit-form' : 'create-form',
                getSelectedImages: function () {
                    return window.PostsImagesUpload ? window.PostsImagesUpload.getSelectedImages() : [];
                },
                validateImageCount: validateImageCount,
                syncImagesToInput: function () {
                    return window.PostsImagesUpload ? window.PostsImagesUpload.syncImagesToInput() : true;
                }
            });
        }

        // Jika tidak dalam mode edit, panggil validasi awal
        if (!isEditMode) {
            setTimeout(() => {
                validateThumbnailAndUpdateButton();
            }, 500);
        }

        // Initialize Unsaved Changes Modal with Custom Tracker
        if (typeof window.initUnsavedChangesModal === 'function') {
            window.initUnsavedChangesModal({
                formId: isEditMode ? 'edit-form' : 'create-form',
                // Gunakan disableGenericTracker agar tracker generic modal OFF.
                disableGenericTracker: true,
                // Gunakan custom check
                extraCheck: function () {
                    return hasChanges();
                }
            });
        }
    }

    // Execute initialization immediately if DOM ready, otherwise wait
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', runInitialization);
    } else {
        runInitialization();
    }

    // Setup drag and drop for existing images after DOM ready
    if (window.PostsImagesUpload) {
        window.addEventListener('load', function () {
            const selectedImages = window.PostsImagesUpload.getSelectedImages();
            if (selectedImages && selectedImages.length > 0) {
                const previewContainer = document.getElementById('images-list-wrapper');
                if (previewContainer) {
                    previewContainer.classList.remove('hidden');
                }
            }
            if (window.PostsImagesUpload.updateImagesPreview) {
                window.PostsImagesUpload.updateImagesPreview();
            }
            if (window.PostsImagesUpload.initializeDragAndDrop) {
                window.PostsImagesUpload.initializeDragAndDrop();
            }
            if (window.PostsImagesUpload.setupExistingImagesRemoveButtons) {
                window.PostsImagesUpload.setupExistingImagesRemoveButtons();
            }
        });

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () {
                if (window.PostsImagesUpload && window.PostsImagesUpload.initializeDragAndDrop) {
                    window.PostsImagesUpload.initializeDragAndDrop();
                }
            });
        } else {
            if (window.PostsImagesUpload && window.PostsImagesUpload.initializeDragAndDrop) {
                window.PostsImagesUpload.initializeDragAndDrop();
            }
        }
    }

    // Initialize Unsaved Changes Modal after full load
    window.addEventListener('load', function () {
        if (typeof window.initUnsavedChangesModal === 'function') {
            const formId = isEditMode ? 'edit-form' : 'create-form';
            window.initUnsavedChangesModal({
                formId: formId,
                submitBtnId: 'submit-btn',
                modalId: 'confirm-modal',
                // Status dropdown for publish/save button text
                statusSelectId: 'status-select',
                extraCheck: hasChanges
            });
        }
    });
};
