/**
 * Announcement Form Handler
 * Enhanced with proper change detection and modal integration
 */

import { FormChangeTracker } from '../../modules/form/validation/form-change-detection.js';

window.initAnnouncementForm = function (options = {}) {
    const formId = 'pengumuman-form';
    const form = document.getElementById(formId);
    if (!form) return;

    // Initialize change tracking
    const tracker = new FormChangeTracker(form);

    // Initialize submit button state management
    tracker.startMonitoring((hasChanged) => {
        const submitBtn = document.getElementById('submit-btn');
        if (submitBtn) {
            submitBtn.disabled = !hasChanged;
            if (hasChanged) {
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                submitBtn.removeAttribute('disabled');
            } else {
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitBtn.setAttribute('disabled', 'disabled');
            }
        }
    });

    // Initialize Unsaved Changes Modal
    if (typeof window.initUnsavedChangesModal === 'function') {
        window.initUnsavedChangesModal({
            formId: formId,
            submitBtnId: 'submit-btn',
            modalId: 'confirm-modal'
        });
    }

    // TinyMCE integration with onContentChange
    const initializeTinyMCEDetection = () => {
        const textarea = document.getElementById('isi-editor');
        if (textarea && typeof window.TinyMCECommon !== 'undefined') {
            window.TinyMCECommon.init('isi-editor', {
                height: 400,
                onContentChange: function() {
                    // Sync content to textarea
                    textarea.value = window.TinyMCECommon.getContent('isi-editor');
                    // Trigger form change detection
                    textarea.dispatchEvent(new Event('input', { bubbles: true }));
                    textarea.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
        }
    };

    // Initialize with retry for async loading
    const initWithRetry = (attempts = 0) => {
        try {
            if (typeof window.TinyMCECommon === 'undefined') {
                if (attempts < 3) {
                    setTimeout(() => initWithRetry(attempts + 1), 500);
                    return;
                }
            } else {
                initializeTinyMCEDetection();
            }
        } catch (error) {
            if (attempts < 3) {
                setTimeout(() => initWithRetry(attempts + 1), 500);
            }
        }
    };

    initWithRetry();
};
