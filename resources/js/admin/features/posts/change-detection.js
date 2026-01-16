/**
 * Posts Form Change Detection
 * Deteksi perubahan form untuk edit mode
 * Dipakai di: posts-form.js
 */

window.PostsFormChangeDetection = {
    /**
     * Check if form has changes
     */
    hasChanges: function (options = {}) {
        const {
            isEditMode = false,
            initialData = {},
            selectedImages = [],
            existingImagesArray = [],
            getBodyHtmlContent = null
        } = options;

        // Prevent false positives during initialization
        if (!initialData.isInitialized) {
            return false;
        }

        const titleInput = document.querySelector('input[name="title"]');
        const authorNameInput = document.querySelector('input[name="author_name"]');
        const statusSelect = document.getElementById('status-select');
        const thumbnailInput = document.getElementById('thumbnail-input');
        const thumbnailPreview = document.getElementById('thumbnail-preview');
        const currentThumbnail = document.getElementById('current-thumbnail-container') || document.getElementById('thumbnail-current-container');
        const thumbnailUploadCard = document.getElementById('thumbnail-upload-card');

        // Cek perubahan title
        const currentTitle = titleInput ? titleInput.value.trim() : '';
        if (currentTitle !== initialData.title) return true;

        // Cek perubahan body
        const currentBodyHtml = getBodyHtmlContent ? getBodyHtmlContent() : '';
        if (currentBodyHtml !== initialData.bodyHtml) return true;

        // Cek perubahan author name
        const currentAuthorName = authorNameInput ? authorNameInput.value.trim() : '';
        if (currentAuthorName !== initialData.authorName) return true;

        // Cek perubahan status
        // Cek perubahan status
        const currentStatus = statusSelect ? statusSelect.value : '';
        // Di Create Mode, perubahan status diabaikan agar tidak memicu modal warning saat user hanya mengubah status
        if (isEditMode && currentStatus !== initialData.status) {
            return true;
        }

        // Cek perubahan tipe (type)
        const typeSelect = document.getElementById('type-select');
        const currentType = typeSelect ? typeSelect.value : 'berita';
        // Di Create Mode, perubahan tipe saja tidak dianggap perubahan (dirty) untuk menghindari modal peringatan dini
        if (initialData.type && currentType !== initialData.type) {
            if (isEditMode) return true;
        }

        // Cek perubahan thumbnail
        const hasThumbnailFile = thumbnailInput && thumbnailInput.files && thumbnailInput.files.length > 0;
        const hasThumbnailPreview = thumbnailPreview && thumbnailPreview.classList && !thumbnailPreview.classList.contains('hidden');
        const hasExistingThumbnail = !!(currentThumbnail && currentThumbnail.querySelector('img')) ||
            !!(thumbnailUploadCard && thumbnailUploadCard.querySelector('#thumbnail-current-container img'));
        const currentHasThumbnail = hasThumbnailFile || hasThumbnailPreview || hasExistingThumbnail;

        // Jika user memilih file baru via input, pasti ada perubahan
        if (hasThumbnailFile) {
            return true;
        }

        // Cek jika thumbnail dihapus atau berubah statusnya dibanding awal
        if (currentHasThumbnail !== initialData.hasThumbnail) {
            return true;
        }

        // Cek perubahan gambar konten
        try {
            if (selectedImages.length > 0) {
                return true;
            }
            const existingInputs = document.querySelectorAll('input[name="existing_images[]"]');
            if (existingInputs.length !== initialData.existingImagesCount) {
                return true;
            }
            const currentOrder = Array.from(existingInputs).map(input => input.value);
            if (JSON.stringify(currentOrder) !== JSON.stringify(initialData.existingImagesOrder)) {
                return true;
            }
        } catch (e) { }

        // Cek perubahan field opsional lainnya
        const slugInput = document.getElementById('slug-input');
        const excerptInput = document.getElementById('excerpt-input');
        const metaDescriptionInput = document.getElementById('meta-description-input');
        const publishedAtInput = document.querySelector('input[name="published_at_date"]');
        const publishedAtTimeInput = document.querySelector('input[name="published_at_time"]');
        const isFeaturedInput = document.getElementById('is_featured');

        if (slugInput && slugInput.value.trim() !== initialData.slug) return true;
        if (excerptInput && excerptInput.value.trim() !== initialData.excerpt) return true;
        if (metaDescriptionInput && metaDescriptionInput.value.trim() !== initialData.metaDescription) return true;
        if (publishedAtInput && publishedAtInput.value !== initialData.publishedAt) return true;
        if (publishedAtTimeInput && publishedAtTimeInput.value !== (initialData.publishedAtTime || '')) return true;

        // Logika khusus untuk isFeatured:
        // Jika currentType === 'artikel', isFeatured dianggap false (karena disembunyikan/disabled)
        // Jika currentType === 'berita', isFeatured sesuai checkbox
        let currentIsFeatured = isFeaturedInput ? isFeaturedInput.checked : false;
        if (currentType === 'artikel') {
            currentIsFeatured = false;
        }
        if (currentIsFeatured !== initialData.isFeatured) return true;

        // Cek perubahan tags (Gunakan spread [...array] untuk menghindari mutasi sort in-place)
        const currentTags = Array.from(document.querySelectorAll('input[name="tags[]"]')).map(input => input.value);
        if (JSON.stringify([...currentTags].sort()) !== JSON.stringify([...initialData.tags].sort())) return true;

        return false;
    }
};
