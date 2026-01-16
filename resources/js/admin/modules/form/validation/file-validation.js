export class FileValidation {
    static validate(file, options = {}) {
        const {
            maxSize = 5 * 1024 * 1024, // 5MB
            allowedTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'],
            allowedTypesLabel = 'JPG, PNG, WEBP',
            showError = true
        } = options;

        if (!file) return false;

        // Check Type
        let isValidType = false;
        // Simple string check
        if (options.allowedTypes === 'image/*') {
            if (file.type.startsWith('image/')) isValidType = true;
        } else {
            // Check specific types
            if (allowedTypes.includes(file.type)) isValidType = true;
            // Fallback: check if it starts with image/ if allowedTypes contained wildcards or logic mismatch
            if (!isValidType && allowedTypes.some(t => t.endsWith('/*') && file.type.startsWith(t.slice(0, -1)))) {
                isValidType = true;
            }
        }

        if (!isValidType) {
            if (showError && typeof window.showPublicNotification === 'function') {
                window.showPublicNotification(`File harus berupa ${allowedTypesLabel}`, 'error');
            }
            return false;
        }

        // Check Size
        if (file.size > maxSize) {
            if (showError && typeof window.showPublicNotification === 'function') {
                window.showPublicNotification(`Ukuran file ${file.name} terlalu besar (maksimal 5MB).`, 'error');
            }
            return false;
        }

        return true;
    }

    static validateImage(file, maxSize = 5 * 1024 * 1024) {
        return this.validate(file, {
            maxSize: maxSize,
            allowedTypes: 'image/*',
            allowedTypesLabel: 'gambar (JPG, PNG, WEBP)',
            showError: true
        });
    }

    // Helper to get file key for deduplication
    static getFileKey(file) {
        return `${file.name}_${file.size}_${file.lastModified}`;
    }
}
