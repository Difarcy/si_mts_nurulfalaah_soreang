import { initPageFeature } from '../../utils/init-helper.js';

/**
 * Achievement Index Page
 * Handles initialization of achievement search logic
 */
initPageFeature({
    containerId: 'achievement-container',
    initFunction: 'initGenericSearch',
    retry: true,
    initOptions: (container) => ({
        searchInputId: 'search-input',
        resetBtnId: 'header-reset-btn',
        filters: [
            { id: 'filter-jenis', param: 'jenis' },
            { id: 'filter-tingkat', param: 'tingkat' }
        ],
        sort: { id: 'sort-select', param: 'sort' }
    })
});
