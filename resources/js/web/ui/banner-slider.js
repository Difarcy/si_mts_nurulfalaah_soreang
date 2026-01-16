/**
 * Banner Slider UI
 * Menangani fungsi slide otomatis dan navigasi manual pada banner utama
 */

window.initBannerSlider = function () {
    const sliderContainer = document.querySelector('[data-banner-slider]');
    if (!sliderContainer) return;

    // Get slides and indicators dynamically to detect changes
    const getSlides = () => Array.from(sliderContainer.querySelectorAll('[data-banner-slide]'));
    const getIndicators = () => Array.from(sliderContainer.querySelectorAll('[data-banner-dot]'));

    let slides = getSlides();
    let indicators = getIndicators();

    // Jika tidak ada slide atau hanya 1, tidak perlu slider
    if (slides.length <= 1) return;

    let currentIndex = 0;
    let slideInterval;
    const intervalTime = 5000; // 5 detik per slide

    // Fungsi ganti slide
    function goToSlide(index) {
        // Re-fetch slides and indicators to detect any DOM changes
        slides = getSlides();
        indicators = getIndicators();

        // Reset interval saat manual change
        resetInterval();

        // Validasi index
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;

        // Update state
        currentIndex = index;

        // Update slides classes - Linear Effect (Rewind to start)
        slides.forEach((slide, i) => {
            // Hitung offset relatif terhadap current slide
            // Jika i=0, current=0 -> offset=0
            // Jika i=1, current=0 -> offset=1 (kanan 100%)
            // Jika i=2, current=0 -> offset=2 (kanan 200%)

            // Linear offset tanpa wrap-around
            let offset = i - currentIndex;

            // Terapkan posisi
            slide.style.transform = `translateX(${offset * 100}%)`;

            // Pastikan transition aktif
            slide.style.transition = 'transform 1000ms ease-in-out';
            slide.classList.remove('invisible');
            slide.classList.add('visible');

            // Set z-index: slide aktif paling atas (opsional, tapi bagus untuk konsistensi)
            if (i === currentIndex) {
                slide.classList.add('z-10');
                slide.classList.remove('z-0');
            } else {
                slide.classList.add('z-0');
                slide.classList.remove('z-10');
            }
        });

        // Update indicators classes
        // Update indicators classes
        indicators.forEach((dot, i) => {
            if (i === currentIndex) {
                dot.classList.remove('bg-white/50', 'hover:bg-white/80');
                dot.classList.add('bg-white');
            } else {
                dot.classList.remove('bg-white');
                dot.classList.add('bg-white/50', 'hover:bg-white/80');
            }
        });
    }

    // Fungsi next slide otomatis
    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    // Start interval
    function startInterval() {
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    // Reset interval (stop & start)
    function resetInterval() {
        clearInterval(slideInterval);
        startInterval();
    }

    // Event listeners untuk indicators (dots)
    indicators.forEach((dot, index) => {
        dot.addEventListener('click', (e) => {
            e.stopPropagation();
            goToSlide(index);
        });
    });

    // Pause saat hover (opsional, saat ini tidak diaktifkan agar tetap jalan)
    // sliderContainer.addEventListener('mouseenter', () => clearInterval(slideInterval));
    // sliderContainer.addEventListener('mouseleave', startInterval);

    // Mulai slider dengan posisi awal yang benar
    goToSlide(0);
    startInterval();
};

// Auto-initialize (backup if web.js fails)
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => window.initBannerSlider());
} else {
    window.initBannerSlider();
}

