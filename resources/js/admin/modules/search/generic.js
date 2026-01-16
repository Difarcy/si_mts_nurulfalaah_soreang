/**
 * Generic Real-Time Search System
 * Modul generik untuk menangani pencarian, filter, sort, dan paginasi AJAX.
 * Basis re-usable untuk semua fitur search di admin panel.
 */

window.initGenericSearch = function (options = {}) {
    let {
        routeUrl = null,
        containerId = "data-container",
        searchInputId = "search-input",
        // Array of filter configs: [{ id: 'status', param: 'status' }]
        filters = [],
        // Sort config: { id: 'sort-select', param: 'sort' }
        sort = { id: "sort-select", param: "sort" },
        // View config (optional): { toggleIdTable: 'btn-table', toggleIdGrid: 'btn-grid', storageKey: 'view_pref', param: 'view' }
        view = null,
        // Reset button (optional)
        resetBtnId = null,
        // Reset configuration
        resetClearsSearch = false, // Default false: reset button only clears filters, not search
        showResetForSearch = false, // Default false: search input does not trigger reset button visibility
        // Callbacks
        onSuccess = null,
        onError = null,
        onUpdateParams = null, // Hook to modify params before fetch
    } = options;

    // Auto-detect routeUrl from current URL if not provided
    if (!routeUrl) {
        // Use current page URL as fallback (without query params)
        routeUrl = window.location.pathname;
    }

    // State
    let searchTimeout = null;
    let isSubmitting = false;
    let activeSearchController = null;
    let isUpdatingFromResponse = false;
    let paginationListenerAttached = false;

    // --- Helpers ---

    function getElement(id) {
        return id ? document.getElementById(id) : null;
    }

    // --- Param Builder ---
    function buildParams(buildOpts = {}) {
        const {
            includeSearch = true,
            includeFilters = true,
            includeSort = true,
            includeView = true,
            includePage = true,
            pageOverride = null,
            resetPage = false,
        } = buildOpts;

        const params = new URLSearchParams();
        const currentUrl = new URL(window.location.href);

        // 1. Search (Global)
        if (includeSearch) {
            const el = getElement(searchInputId);
            const qVal = el ? el.value.trim() : "";
            if (qVal) {
                params.set("q", qVal);
            }
        }

        // 2. Filters
        if (includeFilters) {
            filters.forEach((f) => {
                const el = getElement(f.id);
                if (el && el.value) {
                    params.set(f.param, el.value);
                }
            });
        }

        // 3. Sort
        if (includeSort && sort.id) {
            const el = getElement(sort.id);
            if (el && el.value) {
                params.set(sort.param, el.value);
            }
        }

        // 4. View
        if (includeView && view) {
            const currentView =
                currentUrl.searchParams.get(view.param) ||
                (view.storageKey
                    ? localStorage.getItem(view.storageKey)
                    : null);
            if (currentView) {
                params.set(view.param, currentView);
            }
        }

        // 5. Page
        if (includePage) {
            if (resetPage) {
                params.set("page", "1");
            } else if (pageOverride !== null) {
                params.set("page", pageOverride.toString());
            } else {
                const currentPage = currentUrl.searchParams.get("page");
                params.set("page", currentPage || "1");
            }
        }

        if (onUpdateParams) {
            onUpdateParams(params);
        }

        return params;
    }

    // --- AJAX ---
    function performAjaxRequest(params, ajaxOpts = {}) {
        const { preserveDropdowns = true } = ajaxOpts;

        if (activeSearchController) {
            try {
                activeSearchController.abort();
            } catch (e) {}
        }

        activeSearchController = new AbortController();
        isSubmitting = true;
        document.body.style.cursor = 'wait';

        const url = routeUrl + "?" + params.toString();

        // Capture generic dropdown states
        const savedStates = {};
        if (preserveDropdowns) {
            filters.forEach((f) => {
                const el = getElement(f.id);
                if (el) savedStates[f.id] = el.value;
            });
        }

        // Add opacity to container to indicate loading
        const container = getElement(containerId);
        if (container) container.style.opacity = '0.5';

        fetch(url, {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "text/html",
            },
            signal: activeSearchController.signal,
            cache: "no-cache",
        })
            .then((response) => response.text())
            .then((html) => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");
                const newContent = doc.getElementById(containerId);
                const currentContent = document.getElementById(containerId);

                if (newContent && currentContent) {
                    isUpdatingFromResponse = true;
                    currentContent.innerHTML = newContent.innerHTML;

                    if (preserveDropdowns) {
                        filters.forEach((f) => {
                            const el = getElement(f.id);
                            if (el && savedStates[f.id] !== undefined) {
                                el.value = savedStates[f.id];
                            }
                        });
                    }

                    // Re-attach pagination
                    attachPaginationListeners();
                }

                if (currentContent) currentContent.style.opacity = '1';

                window.history.pushState({}, "", url);

                if (onSuccess) onSuccess(doc);
                if (resetBtnId) updateResetVisibility();

                isSubmitting = false;
                isUpdatingFromResponse = false;
                activeSearchController = null;
                document.body.style.cursor = 'default';
            })
            .catch((error) => {
                if (container) container.style.opacity = '1';
                isSubmitting = false;
                isUpdatingFromResponse = false;
                activeSearchController = null;
                document.body.style.cursor = 'default';
                if (error.name !== "AbortError") {
                    // console.error("Search error:", error);
                    if (onError) onError(error);
                }
            });
    }

    // --- Core Actions ---
    function triggerSearch() {
        if (isUpdatingFromResponse) return;

        const searchEl = getElement(searchInputId);
        const qVal = searchEl ? searchEl.value.trim() : "";
        const currentUrl = new URL(window.location.href);
        const prevQ = currentUrl.searchParams.get("q") || "";

        // Reset page if query changed
        const resetPage = qVal !== prevQ;

        const params = buildParams({ resetPage: resetPage });

        performAjaxRequest(params, {
            preserveDropdowns: true,
            onSuccess: () => {
                if (searchEl) {
                    setTimeout(() => {
                        searchEl.focus();
                    }, 10);
                }
            },
        });
    }

    function autoSearch() {
        if (searchTimeout) clearTimeout(searchTimeout);
        if (isUpdatingFromResponse) return;

        const el = getElement(searchInputId);
        const val = el ? el.value.trim() : "";
        const delay = val === "" ? 100 : 300; // Fast clear, debounce type

        searchTimeout = setTimeout(triggerSearch, delay);
    }

    function applyFilter() {
        if (isUpdatingFromResponse || isSubmitting) return;

        const params = buildParams({ resetPage: true });
        performAjaxRequest(params, { preserveDropdowns: false });
    }

    function applySort() {
        if (isUpdatingFromResponse || isSubmitting) return;
        const params = buildParams({ resetPage: false });
        performAjaxRequest(params, { preserveDropdowns: true });
    }

    function handlePaginationClick(e) {
        const link = e.target.closest("a");
        if (!link || !link.href) return;

        const url = new URL(link.href);
        // Basic safety check for same domain/path
        if (url.pathname !== window.location.pathname) return;

        e.preventDefault();
        e.stopPropagation();

        const page = url.searchParams.get("page");
        const params = buildParams({ pageOverride: page });

        performAjaxRequest(params, { preserveDropdowns: true });
    }

    function attachPaginationListeners() {
        const container = getElement(containerId);
        if (container) {
            if (!container.dataset.searchListenersAttached) {
                container.addEventListener("click", function (e) {
                    if (e.target.closest('a[href*="page="]')) {
                        handlePaginationClick(e);
                    }
                });
                container.dataset.searchListenersAttached = "true";
            }
        }
    }

    function clearFilters() {
        filters.forEach((f) => {
            const el = getElement(f.id);
            if (el) el.value = "";
        });

        if (resetClearsSearch) {
            const sEl = getElement(searchInputId);
            if (sEl) sEl.value = "";
        }

        const params = buildParams({ resetPage: true });
        performAjaxRequest(params, { preserveDropdowns: false });
    }

    function updateResetVisibility() {
        if (!resetBtnId) return;
        const btn = getElement(resetBtnId);
        if (!btn) return;

        let active = false;
        filters.forEach((f) => {
            const el = getElement(f.id);
            if (el && el.value) active = true;
        });

        if (showResetForSearch) {
            const sEl = getElement(searchInputId);
            if (sEl && sEl.value) active = true;
        }

        if (active) {
            btn.classList.remove("hidden");
            btn.classList.add("inline-flex");
        } else {
            btn.classList.add("hidden");
            btn.classList.remove("inline-flex");
        }
    }

    function setView(mode) {
        if (view && view.storageKey) {
            localStorage.setItem(view.storageKey, mode);
            const params = buildParams({ resetPage: false });
            // Override view param
            params.set(view.param, mode);
            window.location.href = routeUrl + "?" + params.toString();
        }
    }

    // --- Init Listeners ---
    filters.forEach((f) => {
        const el = getElement(f.id);
        if (el)
            el.addEventListener("change", () => {
                applyFilter();
                updateResetVisibility();
            });
    });

    if (sort.id) {
        const el = getElement(sort.id);
        if (el) {
            el.removeAttribute("onchange"); // Clear legacy
            el.addEventListener("change", applySort);
        }
    }

    const sEl = getElement(searchInputId);
    if (sEl) {
        let lastVal = sEl.value;
        const handler = () => {
            if (sEl.value === lastVal) return;
            lastVal = sEl.value;
            autoSearch();
            updateResetVisibility();
        };
        sEl.addEventListener("input", handler);
        sEl.addEventListener("change", handler); // For robust fallback
        sEl.addEventListener("search", () => {
            lastVal = "";
            handler();
        });
        sEl.addEventListener("keydown", function (e) {
            if (e.key === "Enter") {
                e.preventDefault();
            }
        });
    }

    // Prevent Form Submit
    let actionFragment = "";
    if (routeUrl) {
        try {
            actionFragment = new URL(routeUrl, window.location.origin).pathname
                .split("/")
                .pop();
        } catch (e) {
            const tmp = routeUrl.split("?")[0];
            actionFragment = tmp.split("/").pop();
        }
    }
    const form =
        document.querySelector(`form[action*="${actionFragment}"]`) ||
        sEl?.closest("form");
    if (form) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            triggerSearch();
        });
    }

    if (resetBtnId) {
        const btn = getElement(resetBtnId);
        if (btn) btn.addEventListener("click", clearFilters);
    }

    // View Toggles
    if (view) {
        const btnT = getElement(view.toggleIdTable);
        const btnG = getElement(view.toggleIdGrid);
        if (btnT) btnT.addEventListener("click", () => setView("table"));
        if (btnG) btnG.addEventListener("click", () => setView("grid"));
    }

    // Initial Setup
    attachPaginationListeners();
    updateResetVisibility();

    // Export API
    return {
        autoSearch,
        triggerSearch,
        applyFilter,
        applySort,
        clearFilters,
        setView,
    };
};
