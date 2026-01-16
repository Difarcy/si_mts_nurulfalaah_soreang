/**
 * Image Fallback Utility
 * Handles broken images by replacing them with a default fallback.
 */

window.initImageFallback = function (defaultFallbackUrl, selector = 'img') {
    const imgs = document.querySelectorAll(selector);
    imgs.forEach(function (img) {
        // Skip if already has fallback handlers or manually excluded
        if (img.dataset.fallbackInit) return;

        const fallback = img.dataset.fallbackSrc || defaultFallbackUrl;
        if (!fallback) return;

        function onError() {
            img.onerror = null;
            if (img.src !== fallback) {
                img.src = fallback;
                img.classList.add('img-fallback-applied');
            }
        }

        if (img.complete) {
            if (img.naturalWidth === 0) { onError(); }
        } 
        
        img.addEventListener('error', onError);

        img.dataset.fallbackInit = 'true';
    });
};
