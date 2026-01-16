import { initPageFeature } from '../../utils/init-helper.js';

/**
 * Agenda (Kegiatan) Index Logic
 * Entry point untuk halaman daftar Agenda Kegiatan.
 * Menginisialisasi sistem pencarian real-time dan filtering status.
 *
 * Dipanggil di: resources/views/admin/pages/agenda/index.blade.php
 */
initPageFeature({
    containerId: 'schedule-container',
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
