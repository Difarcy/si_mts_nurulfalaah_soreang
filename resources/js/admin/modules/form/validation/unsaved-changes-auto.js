/**
 * Auto-initialize Unsaved Changes Modal
 * Searches for forms with data-unsaved-changes="true"
 * MODIFIED: Disabled auto-init to prevent conflicts
 */

document.addEventListener('DOMContentLoaded', function () {
    // Auto-initialization DISABLED to prevent conflicts with feature-specific calls
    // Each feature should call initUnsavedChangesModal manually with their specific config

    // If you need auto-init, uncomment below:
    /*
    const forms = document.querySelectorAll('form[data-unsaved-changes="true"]');

    forms.forEach((form, index) => {
        if (typeof window.initUnsavedChangesModal === 'function') {
            const config = {
                formId: form.id,
                modalId: form.dataset.ucModalId || 'confirm-modal',
                backBtnId: form.dataset.ucBackBtnId || 'back-btn',
                cancelBtnId: form.dataset.ucCancelBtnId || 'cancel-btn',
                modalCancelBtnId: form.dataset.ucModalCancelBtnId || 'modal-cancel-btn',
                modalDiscardBtnId: form.dataset.ucModalDiscardBtnId || 'modal-discard-btn',
                modalSaveBtnId: form.dataset.ucModalSaveBtnId || 'modal-save-btn',
                modalSaveBtnTextId: form.dataset.ucModalSaveBtnTextId || 'modal-save-btn-text',
                statusSelectId: form.dataset.ucStatusSelectId || 'status-select',
                submitBtnId: form.dataset.ucSubmitBtnId || null,
            };

            // Special handling for edit form which might need onDiscard to replace location
            if (form.id === 'edit-form') {
                config.onDiscard = function(url) {
                    window.location.replace(url);
                };
            }

            // Initialize unsaved changes for this form
            window.initUnsavedChangesModal(config);
        }
    });
    */

    // Additional global handlers for navigation and browser events
    // KEEP: Global navigation protection works independently
    const forms = document.querySelectorAll('form[data-unsaved-changes="true"]');

    if (typeof window.initUnsavedChangesModal === 'function' && forms.length > 0) {
        // Add global navigation protection
        let hasUnsavedChanges = false;

        // Track changes across all forms
        forms.forEach(form => {
            if (form.id) {
                // Monitor all input changes
                const inputs = form.querySelectorAll('input, textarea, select');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        hasUnsavedChanges = true;
                    });
                    input.addEventListener('change', function() {
                        hasUnsavedChanges = true;
                    });
                });
            }
        });

        // DUPLICATE REMOVED: Global navigation click handler moved to main initUnsavedChangesModal function
        // This prevents event listener conflicts and duplicate handlers

        // Navigation handling is now centralized in the main modal function
        // to avoid conflicts between multiple click listeners
    }
});
