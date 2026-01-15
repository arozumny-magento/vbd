/**
 * Vision Theme - Main JavaScript
 */

(function() {
    'use strict';

    // Mobile menu toggle
    const navToggler = document.querySelector('.nav-toggler');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (navToggler && mobileMenu) {
        navToggler.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Language dropdown toggle
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdown = this.nextElementSibling;
            if (dropdown) {
                dropdown.classList.toggle('hidden');
            }
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.custom-dropdown')) {
            document.querySelectorAll('.dropdown-menu').forEach(function(menu) {
                menu.classList.add('hidden');
            });
        }
    });

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

})();
