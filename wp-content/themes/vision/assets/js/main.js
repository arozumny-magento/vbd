/**
 * Vision Theme - Main JavaScript
 * Alpine.js handles most interactive components (language switcher, mobile menu)
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Alpine.js now handles:
        // - Language switcher dropdown (x-data, x-show, @click.away)
        // - Mobile menu toggle (custom event dispatch)
        // - Mobile menu submenu navigation (x-data, x-show)
        
        // Debug: Check if Slick is loaded
        if (typeof $.fn.slick === 'undefined') {
            console.warn('Slick slider not loaded. Checking script tag...');
            const slickScript = document.querySelector('script[src*="slick.min.js"]');
            if (slickScript) {
                console.warn('Slick script tag found but not initialized. Script src:', slickScript.src);
            } else {
                console.error('Slick script tag not found in DOM');
            }
        }
        
        // Initialize Slick Slider for News/Testimonials
        if ($('.news-container').length && typeof $.fn.slick !== 'undefined') {
            const $newsContainer = $('.news-container');
            const $newsNav = $('.news-container-nav');
            const slideCount = $newsContainer.find('.slide').length;
            const navItemCount = $newsNav.find('.news-indicators').length;
            
            // Only initialize if there are slides
            if (slideCount > 0) {
                const sliderOptions = {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    adaptiveHeight: true,
                    autoplay: false,
                    infinite: slideCount > 1
                };
                
                // If navigation exists and has multiple items matching slides, link them
                if ($newsNav.length && navItemCount > 1 && navItemCount === slideCount) {
                    sliderOptions.asNavFor = '.news-container-nav';
                    
                    // Initialize navigation slider (indicators)
                    $newsNav.slick({
                        slidesToShow: Math.min(2, navItemCount),
                        slidesToScroll: 1,
                        asNavFor: '.news-container',
                        dots: false,
                        centerMode: false,
                        focusOnSelect: true,
                        arrows: false
                    });
                }
                
                // Initialize main testimonials slider
                $newsContainer.slick(sliderOptions);
            }
        }
        
        // Testimonials slider is now initialized inline in page-home.php with configuration
        // No need to initialize here - it's handled in the template
        
        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            const href = $(this).attr('href');
            if (href !== '#' && href.length > 1) {
                const target = $(href);
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 600);
                }
            }
        });
    });

})(jQuery);
