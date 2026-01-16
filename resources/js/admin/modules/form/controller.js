import { FormChangeTracker } from './validation/form-change-detection.js';

/**
 * Generic Form Controller
 * Modul generik untuk menangani form standar (Create/Edit)
 * Menangani:
 * 1. Change Detection (Enable/Disable Submit)
 * 2. Unsaved Changes Warning
 * 3. Status Button Text (Simpan/Publish)
 * 4. Submit Loading State
 * 5. Validation (Basic & Custom)
 */
export class GenericFormController {
    constructor(options = {}) {
        this.options = {
            formId: null,
            submitBtnId: 'submit-btn',
            submitBtnTextId: 'submit-btn-text',
            statusSelectId: 'status-select', // Dropdown status (0/1)
            isActiveInputId: 'is_active', // Hidden input target
            backBtnId: 'back-btn',

            // Validation
            requiredFields: [], // Array of ids
            customValidators: [], // Array of functions returning {valid: bool, message: string}

            // Behavior
            enableUnsavedChangesWarning: true,
            autoDisableSubmit: true, // Disable submit if no changes (edit mode only)
            disableUntilValid: false, // Disable submit if validation fails (create & edit)

            // Messages
            messages: {
                unsaved: 'Anda memiliki perubahan yang belum disimpan. Yakin ingin meninggalkan halaman?',
                processing: 'Memproses...',
                publish: 'Publish',
                draft: 'Simpan'
            },

            ...options
        };

        this.form = document.getElementById(this.options.formId);
        if (!this.form) return;

        this.submitBtn = document.getElementById(this.options.submitBtnId);
        this.submitBtnText = document.getElementById(this.options.submitBtnTextId);
        this.isEditMode = this.form.querySelector('input[name="_method"]')?.value === 'PUT';

        this.init();
    }

    init() {
        // 1. Initialize Change Tracker
        this.tracker = new FormChangeTracker(this.form, {
            customSnapshot: this.options.customSnapshot
        });

        // 2. Setup Listeners
        this.setupStatusSync();
        this.setupInputListeners();
        this.setupSubmitHandler();
        this.setupUnsavedChanges();

        // 3. Initial State Check
        this.updateSubmitState();
    }

    setupStatusSync() {
        const statusSelect = document.getElementById(this.options.statusSelectId);
        const isActiveInput = document.getElementById(this.options.isActiveInputId);

        if (statusSelect) {
            statusSelect.addEventListener('change', () => {
                const isPublish = statusSelect.value === '1' || statusSelect.value === 'published';

                // Sync to hidden input if exists
                if (isActiveInput) {
                    isActiveInput.value = statusSelect.value;
                }

                // Update Button Text
                if (this.submitBtnText) {
                    this.submitBtnText.textContent = isPublish
                        ? this.options.messages.publish
                        : this.options.messages.draft;
                }

                this.updateSubmitState();
            });
        }
    }

    setupInputListeners() {
        // Debounce update to avoid performance hit
        const handleChange = () => {
            setTimeout(() => this.updateSubmitState(), 50);
        };

        this.form.addEventListener('input', handleChange);
        this.form.addEventListener('change', handleChange);

        // Listen to TinyMCE if exists
        if (typeof tinymce !== 'undefined') {
            tinymce.on('AddEditor', (e) => {
                e.editor.on('Change KeyUp', handleChange);
            });
        }
    }

    setupSubmitHandler() {
        this.form.addEventListener('submit', (e) => {
            if (!this.checkValidation()) {
                e.preventDefault();
                return;
            }

            // Show Loading
            if (this.submitBtn) {
                this.submitBtn.disabled = true;
                const originalText = this.submitBtn.innerHTML;
                this.submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    ${this.options.messages.processing}
                `;
            }

            // Disable Unsaved Changes Warning
            window.removeEventListener('beforeunload', this.beforeUnloadHandler);
        });
    }

    setupUnsavedChanges() {
        // DISABLED: Using custom modal only - No beforeunload warning
        // if (!this.options.enableUnsavedChangesWarning) return;

        // this.beforeUnloadHandler = (e) => {
        //     if (this.tracker.hasChanges()) {
        //         e.preventDefault();
        //         e.returnValue = this.options.messages.unsaved;
        //         return this.options.messages.unsaved;
        //     }
        // };

        // window.addEventListener('beforeunload', this.beforeUnloadHandler);

        // Using custom modal instead
        return;
    }

    // Check validation without showing errors (for button state)
    isValid() {
        // 1. Required Fields
        for (const id of this.options.requiredFields) {
            const el = document.getElementById(id);
            // Check if element exists. If not, ignore (or fail? assume fail for safety)
            if (!el) continue;

            // For TinyMCE, we might need special handling, but usually they sync to textarea
            // If TinyMCE is used, ensure sync happened before this call or check editor content directly?
            // FormChangeTracker syncs before snapshot, but here we read DOM.
            // Assumption: Input listeners sync TinyMCE to textarea.

            if (!el.value.trim()) {
                return false;
            }
        }

        // 2. Custom Validators
        for (const validator of this.options.customValidators) {
            const result = validator();
            if (!result.valid) {
                return false;
            }
        }

        return true;
    }

    // Check validation and show errors (on submit)
    checkValidation() {
        // 1. Required Fields
        for (const id of this.options.requiredFields) {
            const el = document.getElementById(id);
            if (el && !el.value.trim()) {
                this.showError(`Field wajib diisi`, el);
                return false;
            }
        }

        // 2. Custom Validators
        for (const validator of this.options.customValidators) {
            const result = validator();
            if (!result.valid) {
                this.showError(result.message);
                return false;
            }
        }

        return true;
    }

    showError(msg, el = null) {
        if (typeof window.showNotification === 'function') {
            window.showNotification(msg, 'error');
        } else {
            alert(msg);
        }
        if (el) el.focus();
    }

    updateSubmitState() {
        if (!this.submitBtn) return;

        let shouldDisable = false;

        // 1. Check Validation (if disableUntilValid is true)
        if (this.options.disableUntilValid) {
            if (!this.isValid()) {
                shouldDisable = true;
            }
        }

        // 2. Check Changes (if autoDisableSubmit is true AND isEditMode)
        // Note: In Create mode, we usually don't disable based on "no changes" because "no changes" is the initial state,
        // but if validation is required, that handles it.
        // However, if we want "Create" button disabled until something is typed (even if valid?), usually valid is enough.
        // Logic:
        // Edit Mode: Disable if (Invalid OR NoChanges)
        // Create Mode: Disable if (Invalid) [if disableUntilValid is true]

        if (this.isEditMode && this.options.autoDisableSubmit) {
            if (!this.tracker.hasChanges()) {
                shouldDisable = true;
            }
        }

        this.submitBtn.disabled = shouldDisable;
        if (shouldDisable) {
            this.submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            this.submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }
}

// Expose globally
window.GenericFormController = GenericFormController;
window.initGenericForm = (opts) => new GenericFormController(opts);
