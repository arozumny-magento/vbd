/**
 * Vision Theme - Main JavaScript
 * Alpine.js handles most interactive components (language switcher, mobile menu)
 */

// Immediate test - should run as soon as script loads
console.log('Vision Theme: main.js file is loading...');

(function($) {
    'use strict';
    
    console.log('Vision Theme: jQuery wrapper function executing, jQuery available:', typeof $ !== 'undefined');
    
    // Verify jQuery is available
    if (typeof $ === 'undefined' || typeof jQuery === 'undefined') {
        console.error('Vision Theme: jQuery is not loaded');
        // Try to use global jQuery
        if (typeof jQuery !== 'undefined') {
            $ = jQuery;
            console.log('Vision Theme: Using global jQuery');
        } else {
            console.error('Vision Theme: jQuery not found, script will not work');
            return;
        }
    }

    $(document).ready(function() {
        console.log('Vision Theme: main.js loaded and ready, jQuery version:', $.fn.jquery);
        // Alpine.js now handles:
        // - Language switcher dropdown (x-data, x-show, @click.away)
        // - Mobile menu toggle (custom event dispatch)
        // - Mobile menu submenu navigation (x-data, x-show)

        if ($(window).width() < 1024) {
            // Remove mega-menu-open class on click
            $('.mega-menu-wrap').on('click', '.mega-menu-item', function (e) {
                $(this).addClass('opened');


                if (!$(this).hasClass('mega-menu-item-has-children')) {
                    $('.mega-close').click();
                }
                // if ($(this).hasClass('mega-toggle-on')) {
                //     console.log('mega-toggle-on');
                //     $('.mega-close').click();
                // }
            });
        }


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
        
        // Add social icons to mega menu on mobile
        function addSocialToMegaMenu() {
            const $megaMenu = $('#mega-menu-primary');
            const $template = $('#mega-menu-social-template');
            
            if ($megaMenu.length && $template.length && !$megaMenu.find('.mega-menu-mobile-social').length) {
                // Check if we're on mobile (window width < 1280px)
                if ($(window).width() < 1280) {
                    // Create social icons container
                    const $socialItem = $('<li class="mega-menu-item mega-menu-mobile-social xl:hidden"></li>');
                    const $socialContainer = $('<div class="mega-menu-link mega-menu-mobile-social-container"></div>');
                    
                    // Clone social icons from template
                    $socialContainer.html($template.html());
                    $socialItem.append($socialContainer);
                    $megaMenu.append($socialItem);
                }
            }
        }
        
        // Run on page load and after Max Mega Menu initializes
        addSocialToMegaMenu();
        
        // Also run after a short delay to ensure Max Mega Menu is fully loaded
        setTimeout(addSocialToMegaMenu, 500);
        setTimeout(addSocialToMegaMenu, 1000);
        
        // Re-run on window resize
        let resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Remove existing social item if switching to desktop
                if ($(window).width() >= 1280) {
                    $('#mega-menu-primary .mega-menu-mobile-social').remove();
                } else {
                    addSocialToMegaMenu();
                }
            }, 100);
        });
    });

})(jQuery);
