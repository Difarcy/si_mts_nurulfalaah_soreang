/**
 * Public Search AJAX
 * Digunakan untuk search dengan AJAX tanpa reload halaman
 * Dipakai di: berita.blade.php, artikel.blade.php
 */

window.initPublicSearch = function (options = {}) {
    const {
        formId = 'public-search-form',
        containerId = 'public-posts-list'
    } = options;

    let searchTimeout = null;
    let isSubmitting = false;

    const form = document.getElementById(formId);
    const input = form ? form.querySelector('input[name="q"]') : null;
    const container = document.getElementById(containerId);

    // Only proceed if form and input exist (container might be missing if empty page, but usually required)
    if (!form || !input) return;

    input.addEventListener('input', function () {
        if (searchTimeout) clearTimeout(searchTimeout);
        searchTimeout = setTimeout(submitSearchAjax, 500);
    });

    input.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            // Prevent default form submit, let AJAX handle it or debounce will handle it
            // If user enforces enter, we can trigger immediate ajax
            if (searchTimeout) clearTimeout(searchTimeout);
            submitSearchAjax();
        }
    });

    function submitSearchAjax() {
        const currentContainer = document.getElementById(containerId);
        if (!currentContainer || !form || !input || isSubmitting) return;
        isSubmitting = true;

        const url = new URL(window.location.href);
        const q = input.value.trim();
        if (q) url.searchParams.set('q', q);
        else url.searchParams.delete('q');

        // Reset page to 1 on new search
        url.searchParams.delete('page');

        // Show loading state if desired (optional)
        currentContainer.style.opacity = '0.5';

        fetch(url.toString(), {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            }
        })
            .then(r => r.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContainer = doc.getElementById(containerId);
                if (newContainer) {
                    currentContainer.innerHTML = newContainer.innerHTML;
                    currentContainer.style.opacity = '1';
                    window.history.pushState({}, '', url.toString());

                    // Re-focus input to prevent loose focus
                    setTimeout(function () {
                        const currentInput = document.getElementById(formId).querySelector('input[name="q"]');
                        if (currentInput) {
                            currentInput.focus();
                            // const len = currentInput.value.length; // Optional: cursor pos
                        }
                    }, 10);
                } else {
                    currentContainer.style.opacity = '1';
                }
            })
            .catch(err => {
                // console.error('Search error:', err);
                currentContainer.style.opacity = '1';
            })
            .finally(() => {
                isSubmitting = false;
            });
    }
};

