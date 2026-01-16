/**
 * Character Count Helper
 * Dipakai di: admin forms dengan character limit
 * Handles both single span (counter updates full text) and split span patterns
 */
window.updateCharCount = function (inputId, maxLength, explicitCounterId = null) {
    const input = document.getElementById(inputId);
    
    // Determine counter element
    let counter = null;
    if (explicitCounterId) {
        counter = document.getElementById(explicitCounterId);
    } else {
        // Try standard hyphen convention first
        counter = document.getElementById(inputId + '-count');
        // Fallback to underscore convention if not found
        if (!counter) {
            counter = document.getElementById(inputId + '_count');
        }
    }

    if (!input || !counter) return;

    const currentLength = input.value.length;
    const remaining = maxLength - currentLength;

    counter.textContent = `${currentLength}/${maxLength}`;

    // Remove any sibling static span that might contain /max (to prevent "0/50/50" duplication)
    // Instead of hiding, completely remove the duplicate sibling
    let nextSpan = counter.nextElementSibling;
    while (nextSpan) {
        if (nextSpan.tagName === 'SPAN' && nextSpan.textContent.trim().startsWith('/')) {
            nextSpan.remove();
            break;
        }
        nextSpan = nextSpan.nextElementSibling;
    }

    // Standard display without dynamic coloring
    counter.classList.remove('text-green-600', 'text-yellow-600', 'text-red-600', 'dark:text-green-400', 'dark:text-yellow-400', 'dark:text-red-400');
    counter.classList.add('text-slate-400', 'dark:text-slate-500');
};

/**
 * Alias for direct calls with specific counter ID (used in many feature files)
 * Signature: (inputId, counterId, maxLength)
 */
window.updateCharCountDirect = function(inputId, counterId, maxLength) {
    window.updateCharCount(inputId, maxLength, counterId);
};

// Auto-initialize for inputs with data-char-count attribute
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-char-count]').forEach(function (input) {
        // Skip if input doesn't have an ID
        if (!input.id) {
            console.warn('[Character Counter] Input missing ID:', input);
            return;
        }

        const maxLength = parseInt(input.getAttribute('data-max-length')) || 255;
        // The helper will auto-detect -count or _count if not provided
        const counterId = input.getAttribute('data-counter-id') || null;

        // Initialize counter
        window.updateCharCount(input.id, maxLength, counterId);

        // Update on input
        input.addEventListener('input', function () {
            window.updateCharCount(this.id, maxLength, counterId);
        });
    });
});
