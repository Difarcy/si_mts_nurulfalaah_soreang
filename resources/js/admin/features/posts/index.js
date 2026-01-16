import { initPageFeature } from '../../utils/init-helper.js';

/**
 * Posts (Berita & Artikel) Index Logic
 * Entry point untuk halaman daftar Berita & Artikel.
 * Menginisialisasi sistem pencarian real-time, filtering status/tipe, dan sorting.
 *
 * Dipanggil di: resources/views/admin/pages/posts/index.blade.php
 */
initPageFeature({
    containerId: 'posts-container',
    initFunction: 'initGenericSearch',
    initOptions: (container) => ({
        searchInputId: 'search-input',
        filters: [
            { id: 'filter-status', param: 'status' },
            { id: 'filter-type', param: 'type' }
        ],
        sort: { id: 'sort-select', param: 'sort' },
        resetBtnId: 'header-reset-btn',
        view: {
            toggleIdTable: 'view-table',
            toggleIdGrid: 'view-grid',
            storageKey: 'posts_view_preference',
            param: 'view'
        }
    })
});
