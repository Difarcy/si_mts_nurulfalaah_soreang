import { FormChangeTracker } from '../../modules/form/validation/form-change-detection.js';

document.addEventListener('DOMContentLoaded', function () {
    const ppdbForm = document.getElementById('ppdb-form');
    if (!ppdbForm) return;

    // --- Form Change Tracking & Submit State ---
    const floatingBtn = document.getElementById('spmb-save-btn-floating');
    const mainBtn = document.getElementById('ppdb-save-btn');
    let tracker = null;

    if (ppdbForm) {
        tracker = new FormChangeTracker(ppdbForm);
    }

    const updateSubmitState = () => {
        if (!mainBtn || !tracker) return;
        const hasChanges = tracker.hasChanges();

        mainBtn.disabled = !hasChanges;
        if (floatingBtn) floatingBtn.disabled = !hasChanges;

        if (hasChanges) {
            mainBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            if (floatingBtn) floatingBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        } else {
            mainBtn.classList.add('opacity-50', 'cursor-not-allowed');
            if (floatingBtn) floatingBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    };

    // Monitor Native Inputs for changes
    if (ppdbForm) {
        ppdbForm.addEventListener('input', updateSubmitState);
        ppdbForm.addEventListener('change', updateSubmitState);
    }

    // Sync floating button
    if (floatingBtn && mainBtn) {
        floatingBtn.addEventListener('click', function (e) {
            e.preventDefault();
            mainBtn.click();
        });
    }

    // Filter numeric only inputs
    const numericInputs = document.querySelectorAll('[data-numeric-only]');
    numericInputs.forEach(input => {
        input.addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
        input.addEventListener('keypress', function (e) {
            if (!/[0-9]/.test(e.key)) {
                e.preventDefault();
            }
        });
    });

    // --- Unsaved Changes Modal ---
    if (ppdbForm && typeof window.initUnsavedChangesModal === 'function') {
        window.initUnsavedChangesModal({
            formId: 'ppdb-form',
            submitBtnId: 'ppdb-save-btn',
            modalId: 'confirm-modal'
        });
    }
});
