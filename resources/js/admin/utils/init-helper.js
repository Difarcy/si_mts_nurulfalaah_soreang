/**
 * Initialization Helper
 * Standardizes how page features are initialized (wait for DOM, check container, call init function)
 */

export function initPageFeature(config) {
    const {
        containerId,
        initFunction, // String name of the window function, or the function itself
        initOptions = {}, // Object or Function returning object
        retry = false,
        retryMax = 5,
        retryIntervalMs = 200
    } = config;

    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById(containerId);

        if (!container) {
            return; // Feature not present on this page
        }

        const getOptions = () => {
            const baseOptions = typeof initOptions === 'function' ? initOptions(container) : initOptions;

            // Auto-detect routeUrl from data attribute if not provided
            if (!baseOptions.routeUrl && container.dataset.routeUrl) {
                baseOptions.routeUrl = container.dataset.routeUrl;
            }

            // Inject containerId default
            if (!baseOptions.containerId) {
                baseOptions.containerId = containerId;
            }

            return baseOptions;
        };

        const executeInit = () => {
            let fn = typeof initFunction === 'function' ? initFunction : window[initFunction];

            if (typeof fn === 'function') {
                fn(getOptions());
                return true;
            }
            return false;
        };

        if (!executeInit() && retry) {
            let attempts = 0;

            const interval = setInterval(() => {
                attempts++;
                if (executeInit()) {
                    clearInterval(interval);
                } else if (attempts >= retryMax) {
                    // console.warn(`[InitHelper] Failed to initialize ${initFunction} for #${containerId} after ${attempts} attempts - this is normal if the function doesn't exist on this page`);
                    clearInterval(interval);
                }
            }, retryIntervalMs);
        }
    });
}
