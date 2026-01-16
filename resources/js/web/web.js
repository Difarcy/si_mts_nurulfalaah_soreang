/**
 * Website JavaScript - Main Entry Point
 * Mengimport semua modul website
 */

// Import emoji picker element
import 'emoji-picker-element';

// Form Functions
import './features/comments.js';
import './features/chatbot.js';
import { initSpmbPage } from './features/spmb.js';

// Search Functions
import './search/generic.js';
import './search/header.js';
import './search/footer.js';

// UI Components
import './ui/dropdown.js';
import './ui/highlight-slider.js';
import './ui/banner-slider.js';
import './ui/calendar.js';
import './pages/calendar-auto-init.js';
import './utils/image-fallback.js';

// DateTime Functions
import './utils/datetime.js';

// Refresh Functions
import './services/refresh-posts.js';
import './pages/auto-refresh-posts.js';

// Initialize components saat DOM ready
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Post Detail
    if (typeof window.initPostDetail === 'function') {
        window.initPostDetail();
    }

    if (typeof window.initCommentForm === 'function') {
        window.initCommentForm();
    }

    if (typeof window.initCommentReplyHandlers === 'function') {
        window.initCommentReplyHandlers();
    }

    // Initialize SPMB
    initSpmbPage();

    // Initialize Scroll Animations for SPMB and other pages
    initScrollAnimations();

    const animateEls = document.querySelectorAll('.animate-on-scroll');
    if (animateEls.length) {
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            obs.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.1, rootMargin: '0px 0px -10% 0px' }
            );

            animateEls.forEach((el) => observer.observe(el));
        } else {
            animateEls.forEach((el) => el.classList.add('is-visible'));
        }
    }

    // Initialize DateTime Updater
    if (typeof window.initDateTimeUpdater === 'function') {
        window.initDateTimeUpdater();
    }

    // Initialize public search if form exists
    if (typeof window.initPublicSearch === 'function') {
        // Default for Berita & Artikel
        window.initPublicSearch();

        // Pengumuman
        window.initPublicSearch({
            formId: 'announcement-search-form',
            containerId: 'announcement-list'
        });

        // Agenda
        window.initPublicSearch({
            formId: 'schedule-search-form',
            containerId: 'schedule-list'
        });
    }

    // Initialize header search and dropdowns
    if (typeof window.initHeaderSearch === 'function') {
        window.initHeaderSearch();
    }
    if (typeof window.initFooterSearch === 'function') {
        window.initFooterSearch();
    }
    if (typeof window.initHeaderDropdowns === 'function') {
        window.initHeaderDropdowns();
    }

    // Initialize banner slider
    if (typeof window.initBannerSlider === 'function') {
        window.initBannerSlider();
    }

    // Initialize image fallback
    if (typeof window.initImageFallback === 'function') {
        window.initImageFallback(null, '.js-img-fallback');
    }

    // Setup calendar navigation buttons if they exist
    const prevBtn = document.querySelector('[data-calendar-action="prev"]');
    const nextBtn = document.querySelector('[data-calendar-action="next"]');

    if (prevBtn && typeof window.changeCalendarMonth === 'function') {
        prevBtn.addEventListener('click', function () {
            window.changeCalendarMonth(-1);
        });
    }

    if (nextBtn && typeof window.changeCalendarMonth === 'function') {
        nextBtn.addEventListener('click', function () {
            window.changeCalendarMonth(1);
        });
    }
});

/**
 * Initialize Scroll Animations
 * Triggers animations on elements with .scroll-animate classes when they come into view
 */
function initScrollAnimations() {
    const scrollElements = document.querySelectorAll(
        '.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale'
    );

    if (!scrollElements.length) return;

    if ('IntersectionObserver' in window) {
        const scrollObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('scroll-in');
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            }
        );

        scrollElements.forEach((element) => {
            scrollObserver.observe(element);
        });
    } else {
        // Fallback untuk browser yang tidak support IntersectionObserver
        scrollElements.forEach((element) => {
            element.classList.add('scroll-in');
        });
    }
}
