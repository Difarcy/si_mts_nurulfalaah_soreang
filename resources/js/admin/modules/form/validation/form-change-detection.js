/**
 * Generic Form Change Handler
 * Handles form snapshots, change detection, and unsaved changes protection.
 */

export class FormChangeTracker {
    constructor(form, options = {}) {
        this.form = form;
        this.options = {
            excludedNames: ['_token', '_method'],
            excludedClasses: ['ignore-change'],
            customSnapshot: null, // Function to get custom data
            customCompare: null, // Function(key, valA, valB) -> boolean
            ...options
        };
        this.initialSnapshot = this.getSnapshot();
        this._setupTinyMCEBaselineUpdate();
    }

    _setupTinyMCEBaselineUpdate() {
        if (typeof tinymce !== 'undefined') {
            const refresh = () => this.updateSnapshot();

            // Existing editors
            tinymce.editors.forEach(editor => {
                editor.on('init PostRender', refresh);
            });

            // Future editors
            tinymce.on('AddEditor', (e) => {
                e.editor.on('init PostRender', refresh);
            });
        }
    }

    _normalizeTinyMceContent(content) {
        if (content === undefined || content === null) return '';
        const html = String(content).trim();
        if (!html) return '';

        const stripped = this._stripTags(html);

        if (stripped.length === 0) return '';

        // Final normalization: trim multiple spaces and normalize line breaks
        return html.replace(/\s+/g, ' ').trim();
    }

    _stripTags(html) {
        if (html === undefined || html === null) return '';
        return String(html)
            .replace(/&nbsp;/gi, ' ')
            .replace(/<[^>]+>/g, '')
            .replace(/\s+/g, ' ')
            .trim();
    }

    getSnapshot() {
        if (!this.form) return {};

        const snapshot = {
            inputs: {},
            files: {},
            tags: [],
            meta: {}
        };

        // 1. Regular Inputs
        const inputs = this.form.querySelectorAll('input:not([type="file"]):not([type="submit"]):not([type="button"]), textarea, select');
        inputs.forEach(input => {
            if (this._shouldIgnore(input)) return;

            const name = input.name || input.id;
            if (!name) return;

            // Handle Checkboxes/Radios
            if (input.type === 'checkbox' || input.type === 'radio') {
                if (input.checked) {
                    // For checkboxes with same name (arrays), store as array
                    if (!snapshot.inputs[name]) snapshot.inputs[name] = [];
                    if (Array.isArray(snapshot.inputs[name])) {
                        snapshot.inputs[name].push(input.value);
                    } else {
                        snapshot.inputs[name] = [snapshot.inputs[name], input.value];
                    }
                } else if (!snapshot.inputs[name]) {
                    // Ensure key exists for unchecked state if needed
                    snapshot.inputs[name] = null;
                }
            }
            // Handle TinyMCE
            else if (input.tagName.toLowerCase() === 'textarea' &&
                input.id &&
                typeof tinymce !== 'undefined' &&
                tinymce.get(input.id)) {
                snapshot.inputs[name] = this._normalizeTinyMceContent(tinymce.get(input.id).getContent());
            }
            else {
                snapshot.inputs[name] = input.value.trim();
            }
        });

        // Normalize single-value checkboxes that might have been stored as null/array
        Object.keys(snapshot.inputs).forEach(key => {
            if (Array.isArray(snapshot.inputs[key])) {
                snapshot.inputs[key].sort();
            }
        });

        // 2. File Inputs (Check if file selected)
        const fileInputs = this.form.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            if (this._shouldIgnore(input)) return;
            const name = input.name || input.id;
            // Store boolean: has file or not. Or file name if available.
            snapshot.files[name] = input.files.length > 0 ? Array.from(input.files).map(f => `${f.name}:${f.size}`) : null;
        });

        // 3. Custom Snapshot Logic (e.g. for PostsImagesUpload)
        if (typeof this.options.customSnapshot === 'function') {
            const customData = this.options.customSnapshot(this.form);
            snapshot.meta = { ...snapshot.meta, ...customData };
        }

        return snapshot;
    }

    _shouldIgnore(input) {
        if (this.options.excludedNames.includes(input.name)) return true;
        if (this.options.excludedClasses.some(cls => input.classList.contains(cls))) return true;
        return false;
    }

    hasChanges() {
        const currentSnapshot = this.getSnapshot();
        return this._compareSnapshots(this.initialSnapshot, currentSnapshot);
    }

    _compareSnapshots(initial, current) {
        // Compare Inputs
        const allKeys = new Set([...Object.keys(initial.inputs), ...Object.keys(current.inputs)]);
        for (const key of allKeys) {
            let valA = initial.inputs[key];
            let valB = current.inputs[key];

            // Normalize null/undefined
            if (valA === undefined || valA === null) valA = '';
            if (valB === undefined || valB === null) valB = '';

            // Array comparison (for checkboxes)
            if (Array.isArray(valA) || Array.isArray(valB)) {
                if (JSON.stringify(valA) !== JSON.stringify(valB)) return true;
                continue;
            }

            if (String(valA) !== String(valB)) {
                // Ignore cases where the difference is just TinyMCE structural tags (like <p>)
                // but the text content is identical. This happens on initial load occasionally.
                if (this._stripTags(valA) === this._stripTags(valB)) {
                    continue;
                }

                // Allow custom comparison override
                if (this.options.customCompare && !this.options.customCompare(key, valA, valB)) {
                    continue; // Custom comparator says they are equal
                }
                return true;
            }
        }

        // Compare Files
        const fileKeys = new Set([...Object.keys(initial.files), ...Object.keys(current.files)]);
        for (const key of fileKeys) {
            const valA = initial.files[key];
            const valB = current.files[key];
            if (JSON.stringify(valA) !== JSON.stringify(valB)) {
                return true;
            }
        }

        // Compare Meta/Custom
        if (JSON.stringify(initial.meta) !== JSON.stringify(current.meta)) return true;

        return false;
    }

    updateSnapshot() {
        this.initialSnapshot = this.getSnapshot();
    }

    startMonitoring(callback) {
        if (!this.form || typeof callback !== 'function') return;

        // Debounced check handler to prevent excessive calls
        let checkTimeout = null;
        const debouncedCheck = () => {
            if (checkTimeout) clearTimeout(checkTimeout);
            checkTimeout = setTimeout(() => {
                const changed = this.hasChanges();
                callback(changed);
            }, 300); // 300ms debounce
        };

        // Enhanced event listeners untuk better detection
        // Standard inputs
        this.form.addEventListener('input', debouncedCheck);
        this.form.addEventListener('change', debouncedCheck);

        // File input changes - Enhanced detection
        const fileInputs = this.form.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', debouncedCheck);
            // Also listen for custom events from upload modules
            input.addEventListener('filechange', debouncedCheck);
        });

        // Form level event listeners untuk catch bubbled events dari upload modules
        this.form.addEventListener('input', debouncedCheck, true); // Capture phase
        this.form.addEventListener('change', debouncedCheck, true); // Capture phase

        // Image preview detection - only if preview containers exist
        const hasPreviewContainers = this.form.querySelectorAll('[id*="preview"], [class*="preview"], [data-image-preview]').length > 0;
        if (hasPreviewContainers) {
            this._setupImagePreviewDetection(debouncedCheck);
        }

        // TinyMCE integration - only if TinyMCE is available
        if (typeof tinymce !== 'undefined') {
            this._setupTinyMCEDetection(debouncedCheck);
        }

        // Mutation Observer for dynamic content - only if needed
        this._setupMutationObserver(debouncedCheck);

        // Global event listener untuk catch events dari external modules (like upload modules)
        this._setupGlobalEventDetection(debouncedCheck);

        // Reduced timer frequency - only for critical edge cases
        this.monitoringInterval = setInterval(debouncedCheck, 5000); // 5 seconds instead of 1

        // Initial check
        debouncedCheck();
    }

    _setupImagePreviewDetection(callback) {
        // Watch for changes in image preview containers
        const previewSelectors = [
            '[id*="preview-container"]',
            '[id*="thumbnail"]',
            '[class*="preview"]',
            '[id*="image-list"]',
            '.uploaded-images',
            '[data-image-preview]'
        ];

        previewSelectors.forEach(selector => {
            const containers = this.form.querySelectorAll(selector);
            containers.forEach(container => {
                // Watch for child element changes
                const observer = new MutationObserver(() => {
                    callback();
                });
                observer.observe(container, {
                    childList: true,
                    subtree: true,
                    attributes: true,
                    attributeFilter: ['class', 'style', 'src']
                });
            });
        });
    }

    _setupTinyMCEDetection(callback) {
        // Listen for TinyMCE content changes
        if (typeof tinymce !== 'undefined') {
            // Setup listeners for existing editors
            tinymce.editors.forEach(editor => {
                editor.on('Change KeyUp input', () => {
                    callback();
                });
            });

            // Listen for new editor initialization
            tinymce.on('AddEditor', (e) => {
                e.editor.on('Change KeyUp input', () => {
                    callback();
                });
            });
        }
    }

    _setupMutationObserver(callback) {
        // Watch for any changes in the form that might affect state
        const observer = new MutationObserver((mutations) => {
            let shouldCheck = false;

            mutations.forEach(mutation => {
                // Check if the mutation affects form elements
                if (mutation.type === 'childList') {
                    // Check if new elements were added that might affect form state
                    mutation.addedNodes.forEach(node => {
                        if (node.nodeType === Node.ELEMENT_NODE) {
                            // Check if new preview containers or dynamic elements were added
                            if (node.matches && (
                                node.matches('[id*="preview"]') ||
                                node.matches('[class*="preview"]') ||
                                node.matches('[data-image]') ||
                                node.matches('.uploaded-images')
                            )) {
                                shouldCheck = true;
                            }
                        }
                    });
                }

                // Check if class changes might affect visibility/state
                if (mutation.type === 'attributes' &&
                    (mutation.attributeName === 'class' || mutation.attributeName === 'style')) {
                    shouldCheck = true;
                }
            });

            if (shouldCheck) {
                callback();
            }
        });

        observer.observe(this.form, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class', 'style', 'src']
        });
    }

    stopMonitoring() {
        // Clear main interval
        if (this.monitoringInterval) {
            clearInterval(this.monitoringInterval);
            this.monitoringInterval = null;
        }

        // Clear debounce timeout
        if (this.checkTimeout) {
            clearTimeout(this.checkTimeout);
            this.checkTimeout = null;
        }

        // Disconnect all MutationObservers
        if (this.observers && Array.isArray(this.observers)) {
            this.observers.forEach(observer => {
                try {
                    observer.disconnect();
                } catch (e) {
                    // Ignore disconnect errors
                }
            });
            this.observers = [];
        }

        // Clear event listeners - difficult to remove anonymous functions
        // This is a limitation of anonymous function handlers
    }

    _setupGlobalEventDetection(callback) {
        // Listen for custom events from upload modules
        const customEvents = ['filechange', 'imageupload', 'previewupdate', 'filepreview'];
        customEvents.forEach(eventName => {
            this.form.addEventListener(eventName, callback);
        });

        // Listen for document-level events that might affect form state
        document.addEventListener('filechange', (e) => {
            if (this.form.contains(e.target)) {
                callback();
            }
        });
    }
}


export class UnsavedChangesGuard {
    constructor(formChangeTracker, options = {}) {
        this.tracker = formChangeTracker;
        this.isSubmitting = false;
        this.options = {
            confirmMessage: 'Anda memiliki perubahan yang belum disimpan. Yakin ingin meninggalkan halaman ini?',
            useBrowserConfirm: true, // Use standard browser dialog
            customModal: null, // Object with show/hide methods if not using browser confirm
            ...options
        };

        this.init();
    }

    init() {
        // 1. Submit Handler (Mark as submitting so we don't trigger warning)
        if (this.tracker.form) {
            this.tracker.form.addEventListener('submit', () => {
                this.isSubmitting = true;
            });
        }

        // 2. BeforeUnload Handler - DISABLED: Using custom modal only
        /*
        window.addEventListener('beforeunload', (e) => {
            if (this.isSubmitting) return;

            if (this.tracker.hasChanges()) {
                e.preventDefault();
                e.returnValue = this.options.confirmMessage;
                return this.options.confirmMessage;
            }
        });
        */

        // 3. Optional: Intercept internal links (if specific logic needed)
        // Note: Generic interception is risky. Prefer standard beforeunload.
    }

    // reset state (e.g. after AJAX save)
    reset() {
        this.tracker.updateSnapshot();
        this.isSubmitting = false;
    }
}
