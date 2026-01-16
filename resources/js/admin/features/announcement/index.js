import { initPageFeature } from '../../utils/init-helper.js';

/**
 * Announcement (Pengumuman) Index Logic
 * Entry point untuk halaman daftar Pengumuman.
 * Menginisialisasi sistem pencarian real-time dan sorting.
 *
 * Dipanggil di: resources/views/admin/pages/announcement/index.blade.php
 */
initPageFeature({
    containerId: 'announcement-container',
    initFunction: 'initGenericSearch',
    retry: true,
    initOptions: (container) => ({
        searchInputId: 'search-input',
        resetBtnId: 'header-reset-btn',
        filters: [
            { id: 'filter-status', param: 'status' }
        ],
        sort: { id: 'sort-select', param: 'sort' }
    })
});
