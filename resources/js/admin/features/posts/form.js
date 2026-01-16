/**
 * Posts Form Initialization
 * Handles initialization of posts form logic
 */

document.addEventListener('DOMContentLoaded', function () {
    const configEl = document.getElementById('posts-form-config');

    if (configEl && typeof window.initPostsForm === 'function') {
        const config = {
            isEditMode: JSON.parse(configEl.dataset.isEditMode || 'false'),
            isBerita: JSON.parse(configEl.dataset.isBerita || 'true'),
            existingImages: JSON.parse(configEl.dataset.existingImages || '[]'),
            uploadRoute: configEl.dataset.uploadRoute,
            csrfToken: configEl.dataset.csrfToken,
            tagSuggestionsRoute: configEl.dataset.tagSuggestionsRoute
        };

        // Retry logic similar to original script
        function tryInit(count = 0) {
            if (typeof window.initPostsForm === 'function') {
                window.initPostsForm(config);
            } else if (count < 50) {
                setTimeout(() => tryInit(count + 1), 100);
            }
        }

        tryInit();
    }
});
