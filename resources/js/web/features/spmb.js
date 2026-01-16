/**
 * SPMB Page JavaScript
 * Menangani interaksi pada halaman landing page SPMB
 */

export function initSpmbPage() {
    // 1. FAQ Accordion Logic
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const button = item.querySelector('.faq-button');
        const content = item.querySelector('.faq-content');
        const icon = item.querySelector('.faq-icon');

        if (button && content) {
            button.addEventListener('click', () => {
                const isOpen = !content.classList.contains('hidden');

                // Close all other items
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        const otherContent = otherItem.querySelector('.faq-content');
                        const otherIcon = otherItem.querySelector('.faq-icon');
                        if (otherContent) otherContent.classList.add('hidden');
                        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                        otherItem.classList.remove('active');
                    }
                });

                // Toggle current item
                if (isOpen) {
                    content.classList.add('hidden');
                    if (icon) icon.style.transform = 'rotate(0deg)';
                    item.classList.remove('active');
                } else {
                    content.classList.remove('hidden');
                    if (icon) icon.style.transform = 'rotate(180deg)';
                    item.classList.add('active');
                }
            });
        }
    });

    // 2. Smooth Scroll for internal links
    const scrollLinks = document.querySelectorAll('.spmb-scroll-link');
    scrollLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                const headerOffset = 100;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Auto-init jika dipanggil via script tag (fallback)
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.spmb-page-container')) {
        initSpmbPage();
    }
});
