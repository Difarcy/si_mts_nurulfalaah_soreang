/**
 * Highlight News Slider
 * Digunakan untuk slider berita highlight di home page
 * Dipakai di: web/pages/home/sections/latest-news.blade.php
 */

window.initHighlightSlider = function () {
    let highlightCurrentSlide = 0;
    let highlightSlideInterval = null;
    const highlightSlides = document.getElementById('highlight-slides');
    const highlightIndicators = document.getElementById('highlight-indicators');
    const highlightPrevBtn = document.getElementById('highlight-prev');
    const highlightNextBtn = document.getElementById('highlight-next');

    if (!highlightSlides) {
        return;
    }

    // Setup click & keyboard handlers untuk highlight slides
    highlightSlides.querySelectorAll('.highlight-slide').forEach(slide => {
        // Accessibility attributes
        slide.setAttribute('role', 'link');
        slide.setAttribute('tabindex', '0');
        slide.addEventListener('click', function () {
            const href = this.getAttribute('data-href');
            if (href) {
                window.location.href = href;
            }
        });
        slide.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const href = this.getAttribute('data-href');
                if (href) {
                    window.location.href = href;
                }
            }
        });
    });

    const totalSlides = highlightSlides ? highlightSlides.children.length : 0;

    function updateHighlightSlide() {
        if (!highlightSlides || totalSlides === 0) return;

        // Update slide position
        highlightSlides.style.setProperty('transform', `translateX(-${highlightCurrentSlide * 100}%)`);

        // Update indicators
        if (highlightIndicators) {
            const indicatorButtons = highlightIndicators.querySelectorAll('button');
            indicatorButtons.forEach((btn, index) => {
                btn.classList.toggle('bg-white', index === highlightCurrentSlide);
                btn.classList.toggle('bg-white/50', index !== highlightCurrentSlide);
            });
        }
    }

    function nextHighlightSlide() {
        highlightCurrentSlide = (highlightCurrentSlide + 1) % totalSlides;
        updateHighlightSlide();
    }

    function prevHighlightSlide() {
        highlightCurrentSlide = (highlightCurrentSlide - 1 + totalSlides) % totalSlides;
        updateHighlightSlide();
    }

    function goToHighlightSlide(slideIndex) {
        highlightCurrentSlide = slideIndex;
        updateHighlightSlide();
    }

    // Event listeners
    if (highlightNextBtn) {
        highlightNextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            nextHighlightSlide();
            resetHighlightAutoSlide();
        });
    }

    if (highlightPrevBtn) {
        highlightPrevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            prevHighlightSlide();
            resetHighlightAutoSlide();
        });
    }

    // Indicator click handlers
    const indicatorButtons = highlightIndicators ? highlightIndicators.querySelectorAll('button') : [];
    indicatorButtons.forEach((btn, index) => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            goToHighlightSlide(index);
            resetHighlightAutoSlide();
        });
    });

    // Auto slide functionality
    function startHighlightAutoSlide() {
        if (highlightSlideInterval) clearInterval(highlightSlideInterval);
        if (!document.hidden) {
            highlightSlideInterval = setInterval(nextHighlightSlide, 3000); // Change slide every 3 seconds
        }
    }

    function stopHighlightAutoSlide() {
        if (highlightSlideInterval) {
            clearInterval(highlightSlideInterval);
            highlightSlideInterval = null;
        }
    }

    function resetHighlightAutoSlide() {
        stopHighlightAutoSlide();
        startHighlightAutoSlide();
    }

    // Cleanup saat halaman tidak aktif
    document.addEventListener('visibilitychange', function () {
        if (document.hidden) {
            stopHighlightAutoSlide();
        } else {
            if (totalSlides > 1 && !highlightSlideInterval) {
                startHighlightAutoSlide();
            }
        }
    });

    window.addEventListener('pagehide', function () {
        stopHighlightAutoSlide();
    });

    // Initialize
    updateHighlightSlide();
    if (totalSlides > 1) {
        startHighlightAutoSlide();
    }
};

// Auto-initialize saat DOM ready
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('highlight-slides')) {
        window.initHighlightSlider();
    }
});
