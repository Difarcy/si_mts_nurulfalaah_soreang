/**
 * Footer Search (Manual)
 * Digunakan untuk search di footer secara manual (Enter to search)
 * Dipakai di: footer.blade.php
 */

window.initFooterSearch = function () {
    const searchInput = document.getElementById('footer-search-input');
    const searchContainer = document.getElementById('footer-search-container');

    if (!searchInput || !searchContainer) return;

    const searchUrl = searchContainer.getAttribute('data-search-url');

    // Manual Search on Enter
    searchInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = this.value.trim();
            if (query) {
                window.location.href = searchUrl + '?q=' + encodeURIComponent(query);
            }
        }
    });
};
