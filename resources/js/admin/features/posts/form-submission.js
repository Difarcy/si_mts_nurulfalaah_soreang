/**
 * Posts Form Submission Handler
 * Menangani logika submit form, sinkronisasi gambar, dan validasi akhir
 * Dipakai di: posts-form-controller.js
 */

window.PostsFormSubmission = {
    /**
     * Initialize form submission handler
     * @param {Object} options
     */
    init: function(options = {}) {
        const {
            formId,
            getSelectedImages, // Function returning array of selected files
            validateImageCount, // Function returning boolean
            syncImagesToInput // Function returning boolean (success/fail)
        } = options;

        const form = document.getElementById(formId);
        if (!form) return;

        // Handler submit form
        form.addEventListener('submit', function(e) {
            // 1. Sync Images dari state JS ke input file
            // Ini penting karena input file mungkin tidak sinkron jika hanya mengandalkan event change
            if (typeof syncImagesToInput === 'function') {
                const synced = syncImagesToInput();
                if (!synced) {
                    // console.warn('Warning: Image sync reported issues');
                }
            }

            // 2. Validate Image Count
            if (typeof validateImageCount === 'function') {
                const isValid = validateImageCount();
                if (!isValid) {
                    e.preventDefault();
                    e.stopPropagation();
                    // Scroll ke bagian error (biasanya ditangani oleh validator)
                    const errorEl = document.getElementById('images-warning');
                    if (errorEl) {
                        errorEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                    return false;
                }
            }

            // 3. Remove "unsaved changes" warning if form is valid
            if (typeof window.setFormSubmitting === 'function') {
                window.setFormSubmitting(true);
            }
            
            // Allow submit to proceed
            return true;
        });
    }
};
