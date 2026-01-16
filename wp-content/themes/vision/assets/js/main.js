/**
 * Vision Theme - Main JavaScript
 * Alpine.js handles most interactive components (language switcher, mobile menu)
 */

(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        // Alpine.js now handles:
        // - Language switcher dropdown (x-data, x-show, @click.away)
        // - Mobile menu toggle (custom event dispatch)
        // - Mobile menu submenu navigation (x-data, x-show)
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    });

})();
