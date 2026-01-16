/**
 * Tags Input with Autocomplete
 * Enhanced to support API fetching, callbacks, and array input (tags[])
 */

window.initTagInput = function (options = {}) {
    const {
        selector = '[data-tags-input]',
        apiUrl = null,
        onTagChange = null
    } = options;

    const tagsInputs = document.querySelectorAll(selector);

    tagsInputs.forEach(function (input) {
        const container = input.closest('.tags-input-container');
        if (!container) return;

        // Prevent double initialization
        if (input.dataset.tagInputInitialized === 'true') return;
        input.dataset.tagInputInitialized = 'true';

        const tagsContainer = container.querySelector('.tags-container');
        let availableTags = [];
        
        // Load initial tags from data attribute if API not used or as fallback
        try {
            availableTags = JSON.parse(input.getAttribute('data-available-tags') || '[]');
        } catch (e) {
            availableTags = [];
        }

        // Fetch tags from API if provided
        if (apiUrl) {
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Assuming API returns array of strings or objects with name property
                    availableTags = data.map(item => typeof item === 'object' ? item.name : item);
                })
                .catch(err => {});
        }

        // Create Autocomplete Dropdown
        const dropdown = document.createElement('div');
        dropdown.className = 'absolute z-10 w-full bg-white dark:bg-slate-800 border border-gray-200 dark:border-slate-700 rounded-md shadow-lg mt-1 hidden max-h-48 overflow-y-auto left-0 top-full';
        container.appendChild(dropdown);

        function addTag(tagText) {
            const text = tagText.trim();
            if (!text) return;

            // Prevent duplicates
            const currentTags = getCurrentTags();
            if (currentTags.includes(text)) {
                input.value = '';
                return;
            }

            const tag = document.createElement('div');
            tag.className = 'tag-item inline-flex items-center bg-green-50 dark:bg-green-900/30 text-green-700 dark:text-white pl-2 pr-0.5 py-0.5 rounded-md text-xs font-medium border border-green-200 dark:border-green-700';
            tag.innerHTML = `
                <span class="mr-1">${text}</span>
                <button type="button" class="text-green-600 dark:text-white hover:text-green-800 dark:hover:text-white p-0.5 rounded-r-md hover:bg-green-100 dark:hover:bg-green-800/50 flex items-center justify-center tag-remove-btn">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <input type="hidden" name="tags[]" value="${text}">
            `;

            // Add click event for remove button
            tag.querySelector('.tag-remove-btn').addEventListener('click', function() {
                tag.remove();
                notifyChange();
            });

            tagsContainer.appendChild(tag);
            input.value = '';
            dropdown.classList.add('hidden');
            
            notifyChange();
        }

        function getCurrentTags() {
            // Get values from hidden inputs
            const hiddenInputs = tagsContainer.querySelectorAll('input[name="tags[]"]');
            return Array.from(hiddenInputs).map(input => input.value);
        }

        function notifyChange() {
            // Dispatch change event on the visible input to trigger FormChangeTracker
            input.dispatchEvent(new Event('change', { bubbles: true }));
            if (typeof onTagChange === 'function') onTagChange();
        }

        function showSuggestions(value) {
            dropdown.innerHTML = '';
            if (value.length < 1) {
                dropdown.classList.add('hidden');
                return;
            }

            const filtered = availableTags.filter(tag => 
                tag.toLowerCase().includes(value.toLowerCase()) && 
                !getCurrentTags().includes(tag)
            );

            if (filtered.length === 0) {
                dropdown.classList.add('hidden');
                return;
            }

            filtered.forEach(tag => {
                const item = document.createElement('div');
                item.className = 'px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-slate-700 text-sm text-slate-700 dark:text-slate-300';
                item.textContent = tag;
                item.addEventListener('click', function() {
                    addTag(tag);
                    input.focus();
                });
                dropdown.appendChild(item);
            });

            dropdown.classList.remove('hidden');
        }

        // Handle input events
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                addTag(this.value);
            }
        });

        input.addEventListener('blur', function () {
            // Delay to allow click on dropdown item
            setTimeout(() => {
                if (this.value.trim()) {
                    addTag(this.value);
                }
                dropdown.classList.add('hidden');
            }, 200);
        });

        // Autocomplete
        input.addEventListener('input', function () {
            showSuggestions(this.value);
        });
        
        input.addEventListener('focus', function () {
            if (this.value.trim()) {
                showSuggestions(this.value);
            }
        });

        // Initial setup: Add click handlers to existing tags (server-rendered)
        // Note: existing tags in blade should match the structure or at least have button inside
        const existingRemoveBtns = tagsContainer.querySelectorAll('[data-remove-tag], .tag-remove-btn');
        existingRemoveBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Find the closest tag wrapper (e.g., .tag-item or parent div)
                const tagWrapper = this.closest('.tag-item') || this.parentElement;
                tagWrapper.remove();
                notifyChange();
            });
        });
    });
};

// Auto-init for basic usage without API
document.addEventListener('DOMContentLoaded', function () {
    // Only auto-init if not already handled by a controller
    // If you use form-controller.js, it will call initTagInput manually
    if (document.querySelectorAll('[data-tags-input]').length > 0 && !window.initTagInputManualOnly) {
        // window.initTagInput(); 
        // Disabled auto-init to avoid conflict with controller specific init
    }
});
