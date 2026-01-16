/**
 * Header Search (Manual)
 * Digunakan untuk search di header secara manual (Enter to search)
 * Dipakai di: semua halaman website
 */

window.initHeaderSearch = function () {
    const headerNormal = document.getElementById('header-normal');
    const headerSearch = document.getElementById('header-search');
    const searchToggle = document.getElementById('search-toggle');
    const searchClose = document.getElementById('search-close');
    const searchInput = document.getElementById('search-input');
    // Cari container yang punya data-search-url (wrapper input)
    const searchWrapper = searchInput ? searchInput.closest('[data-search-url]') : null;

    if (!headerNormal || !headerSearch || !searchToggle || !searchClose || !searchInput || !searchWrapper) return;

    const searchUrl = searchWrapper.getAttribute('data-search-url');

    // Toggle ke mode search
    searchToggle.addEventListener('click', function () {
        headerNormal.classList.add('hidden');
        headerSearch.classList.remove('hidden');
        headerSearch.classList.add('flex');
        setTimeout(function () {
            searchInput.focus();
        }, 100);
    });

    // Kembali ke header normal
    searchClose.addEventListener('click', function () {
        headerSearch.classList.add('hidden');
        headerSearch.classList.remove('flex');
        headerNormal.classList.remove('hidden');
        searchInput.value = '';
    });

    // ESC key untuk menutup search
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && headerSearch && !headerSearch.classList.contains('hidden')) {
            searchClose.click();
        }
    });

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

