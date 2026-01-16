// Smooth scroll for anchor links
document.addEventListener('DOMContentLoaded', function () {
    const helpPage = document.querySelector('.help-page-container'); // Need to identify if this is help page or generic
    // Since this is just anchor scrolling, it's safe to run globally or check for specific links
    
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    if (anchorLinks.length > 0) {
        anchorLinks.forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
});
