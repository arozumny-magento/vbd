<?php
/**
 * Vision Theme Functions
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function vision_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // We handle admin bar positioning with CSS, so we don't need theme support
    // Removing theme support prevents the array offset error
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'vision'),
        'footer' => __('Footer Menu', 'vision'),
        'mobile' => __('Mobile Menu', 'vision'),
    ));
    
    // Add Elementor support
    if (did_action('elementor/loaded')) {
        // Elementor is active
        add_theme_support('elementor');
        
        // Enable Elementor for all post types
        add_theme_support('elementor', array(
            'header-footer' => true,
        ));
    }
}
add_action('after_setup_theme', 'vision_setup');

/**
 * Disable WordPress emoji script (prevents console error when loader returns HTML)
 */
function vision_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'vision_disable_emojis');

add_filter('tiny_mce_plugins', function ($plugins) {
    return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : array();
});

add_filter('wp_resource_hints', function ($urls, $relation_type) {
    if ('dns-prefetch' === $relation_type) {
        $urls = array_filter($urls, function ($url) {
            return strpos($url, 'https://s.w.org/images/core/emoji') !== 0;
        });
    }
    return $urls;
}, 10, 2);

/**
 * Register Elementor Locations (Header, Footer, etc.)
 */
function vision_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'vision_register_elementor_locations');

/**
 * Enable Elementor for pages and posts
 */
function vision_add_elementor_support() {
    if (class_exists('\Elementor\Plugin')) {
        // Enable Elementor for posts
        add_post_type_support('post', 'elementor');
        
        // Enable Elementor for pages
        add_post_type_support('page', 'elementor');
    }
}
add_action('init', 'vision_add_elementor_support');

/**
 * Enqueue Scripts and Styles
 */
function vision_scripts() {
    // WordPress automatically loads style.css from theme root
    // No need to enqueue it manually, but we can add it with a version for cache busting
    wp_enqueue_style('vision-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // Enqueue Slick Slider CSS
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick.css', array(), '1.8.1');
    
    // Enqueue jQuery (WordPress includes it, but we need to ensure it's loaded)
    wp_enqueue_script('jquery');
    
    // Enqueue Slick Slider JS (depends on jQuery)
    // Load in footer to ensure DOM is ready, but before our main script
    $slick_path = get_template_directory_uri() . '/assets/slick.min.js';
    wp_enqueue_script('slick-js', $slick_path, array('jquery'), '1.8.1', true);
    
    // Ensure Slick loads - add fallback if enqueue fails
    add_action('wp_footer', function() use ($slick_path) {
        if (!wp_script_is('slick-js', 'enqueued')) {
            echo '<script src="' . esc_url($slick_path) . '"></script>' . "\n";
        }
    }, 5);
    
    // Enqueue Alpine.js (load in head with defer - this is the recommended approach)
    // Defer ensures it waits for DOM to be ready, but loading in head ensures it's available early
    wp_enqueue_script('alpinejs', get_template_directory_uri() . '/assets/js/alpine.min.js', array(), '3.14.1', false);
    wp_script_add_data('alpinejs', 'defer', true);
    
    // Enqueue JavaScript (depends on jQuery, Alpine.js and Slick for some components)
    wp_enqueue_script('vision-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'alpinejs', 'slick-js'), wp_get_theme()->get('Version'), true);

    // Add x-cloak CSS to prevent flash of unstyled content
    $alpine_css = '[x-cloak] { display: none !important; }';
    wp_add_inline_style('vision-style', $alpine_css);
    
    // Add dynamic scroll-margin-top for anchor targets + visionAjax (avoids wp_localize_script pipeline that can break on production)
    add_action('wp_footer', function() {
        $vision_ajax = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('vision-nonce'),
        );
        ?>
        <script>
        window.visionAjax = <?php echo wp_json_encode($vision_ajax); ?>;
        // Set scroll-margin-top dynamically based on header height
        (function() {
            function setScrollMargin() {
                let offset = 0;
                const header = document.querySelector('.top-header');
                if (header) {
                    offset += header.offsetHeight || 0;
                }
                const adminBar = document.getElementById('wpadminbar');
                if (adminBar && adminBar.offsetParent !== null) {
                    offset += adminBar.offsetHeight || 0;
                }
                
                // Apply to all elements with IDs (anchor targets)
                document.querySelectorAll('[id]').forEach(function(el) {
                    el.style.scrollMarginTop = offset + 'px';
                });
            }
            
            // Set on load and resize
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', setScrollMargin);
            } else {
                setScrollMargin();
            }
            window.addEventListener('resize', setScrollMargin);
        })();

        // Keep menu hover effect (gold line) when scrolled to the linked section
        (function() {
            var menuWrap = document.querySelector('nav #mega-menu-wrap-primary #mega-menu-primary');
            if (!menuWrap) return;

            var topLevelItems = menuWrap.querySelectorAll('#mega-menu-primary > li.mega-menu-item');
            var anchorItems = [];
            var updatesMenuItem = null;
            topLevelItems.forEach(function(li) {
                var link = li.querySelector('a.mega-menu-link');
                if (!link) return;
                var href = link.getAttribute('href');
                if (!href) return;
                var pathname = '';
                try { pathname = new URL(href, window.location.origin).pathname; } catch (e) { pathname = href; }
                var pathNorm = pathname.replace(/\/$/, '') || '/';
                if (pathNorm === '/updates' || pathNorm.endsWith('/updates')) {
                    updatesMenuItem = { li: li, link: link };
                }
                var hashIndex = href.indexOf('#');
                if (hashIndex === -1) return;
                var id = href.slice(hashIndex + 1);
                if (!id) return;
                anchorItems.push({ li: li, link: link, id: id });
            });
            if (!anchorItems.length && !updatesMenuItem) return;

            function isFrontPage() {
                var path = window.location.pathname || '/';
                return path === '/' || path === '';
            }

            function getHeaderOffset() {
                var header = document.querySelector('.top-header');
                return (header && header.offsetHeight) ? header.offsetHeight : 0;
            }

            function setActiveBySection() {
                var scrollY = window.pageYOffset || document.documentElement.scrollTop;
                var headerOffset = getHeaderOffset();
                var threshold = headerOffset + 100;

                var activeId = null;
                var activeTop = -1;

                anchorItems.forEach(function(item) {
                    var section = document.getElementById(item.id);
                    if (!section) return;

                    var rect = section.getBoundingClientRect();
                    var sectionTop = rect.top + scrollY;

                    if (scrollY >= sectionTop - threshold && sectionTop > activeTop) {
                        activeTop = sectionTop;
                        activeId = item.id;
                    }
                });

                if (isFrontPage() && updatesMenuItem && document.getElementById('updates')) {
                    var updatesSection = document.getElementById('updates');
                    var rect = updatesSection.getBoundingClientRect();
                    var sectionTop = rect.top + scrollY;
                    if (scrollY >= sectionTop - threshold && sectionTop > activeTop) {
                        activeTop = sectionTop;
                        activeId = 'updates';
                    }
                }

                anchorItems.forEach(function(item) {
                    if (item.id === activeId) {
                        item.li.classList.add('mega-menu-item-active-section');
                    } else {
                        item.li.classList.remove('mega-menu-item-active-section');
                    }
                });
                if (updatesMenuItem) {
                    if (activeId === 'updates') {
                        updatesMenuItem.li.classList.add('mega-menu-item-active-section');
                    } else {
                        updatesMenuItem.li.classList.remove('mega-menu-item-active-section');
                    }
                }
            }

            function setActiveById(id) {
                anchorItems.forEach(function(item) {
                    if (item.id === id) {
                        item.li.classList.add('mega-menu-item-active-section');
                    } else {
                        item.li.classList.remove('mega-menu-item-active-section');
                    }
                });
                if (updatesMenuItem) {
                    if (id === 'updates') {
                        updatesMenuItem.li.classList.add('mega-menu-item-active-section');
                    } else {
                        updatesMenuItem.li.classList.remove('mega-menu-item-active-section');
                    }
                }
            }

            anchorItems.forEach(function(item) {
                item.link.addEventListener('click', function() {
                    setActiveById(item.id);
                });
            });
            if (updatesMenuItem) {
                updatesMenuItem.link.addEventListener('click', function() {
                    setActiveById('updates');
                });
            }

            // Hash in URL (e.g. after click or page load with #section)
            function onHashChange() {
                var hash = window.location.hash;
                var id = hash ? hash.slice(1) : null;
                if (id) setActiveById(id);
                else setActiveBySection();
            }

            var ticking = false;
            function onScroll() {
                if (!ticking) {
                    requestAnimationFrame(function() {
                        setActiveBySection();
                        ticking = false;
                    });
                    ticking = true;
                }
            }

            function init() {
                setActiveBySection();
                if (window.location.hash) onHashChange();
                window.addEventListener('scroll', onScroll, { passive: true });
                window.addEventListener('hashchange', onHashChange);
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        })();
        </script>
        <?php
    }, 1);
}
add_action('wp_enqueue_scripts', 'vision_scripts');

/**
 * Ensure REST API is enabled (in case it was disabled)
 */
add_filter('rest_authentication_errors', function($result) {
    // Don't block REST API requests
    return $result;
}, 99);

/**
 * Fix Contact Form 7 REST API 404 errors
 * CF7 tries to fetch schema for form validation, but if REST API isn't accessible, it returns 404
 * This filter returns an empty schema instead of 404 to prevent console errors
 */
add_filter('rest_pre_dispatch', function($result, $server, $request) {
    if (!is_a($request, 'WP_REST_Request')) {
        return $result;
    }
    
    $route = $request->get_route();
    
    // Handle CF7 schema endpoint 404s
    if (preg_match('#/contact-form-7/v1/contact-forms/(\d+)/feedback/schema#', $route, $matches)) {
        $form_id = (int) $matches[1];
        
        // Check if form exists
        if (function_exists('wpcf7_contact_form')) {
            $form = wpcf7_contact_form($form_id);
            if (!$form) {
                // Form doesn't exist - return empty schema to prevent 404 error
                return new WP_REST_Response(array(
                    'type' => 'object',
                    'properties' => array()
                ), 200);
            }
        } else {
            // CF7 not active - return empty schema
            return new WP_REST_Response(array(
                'type' => 'object',
                'properties' => array()
            ), 200);
        }
    }
    
    return $result;
}, 10, 3);

/**
 * Suppress CF7 REST API errors in JavaScript
 * This handles cases where REST API isn't accessible at all
 */
add_action('wp_footer', function() {
    ?>
    <script>
    // Suppress CF7 REST API 404 errors when REST API isn't accessible
    (function() {
        if (typeof window === 'undefined' || !window.fetch) return;
        
        const originalFetch = window.fetch;
        window.fetch = function(...args) {
            const url = typeof args[0] === 'string' ? args[0] : (args[0] && args[0].url ? args[0].url : '');
            
            // Handle CF7 schema requests
            if (url && url.includes('/wp-json/contact-form-7/v1/contact-forms/') && 
                url.includes('/feedback/schema')) {
                
                return originalFetch.apply(this, args).then(function(response) {
                    // If 404 or any error, return empty schema
                    if (!response.ok) {
                        return new Response(JSON.stringify({
                            type: 'object',
                            properties: {}
                        }), {
                            status: 200,
                            statusText: 'OK',
                            headers: { 'Content-Type': 'application/json' }
                        });
                    }
                    return response;
                }).catch(function() {
                    // Network error or REST API not accessible - return empty schema
                    return new Response(JSON.stringify({
                        type: 'object',
                        properties: {}
                    }), {
                        status: 200,
                        statusText: 'OK',
                        headers: { 'Content-Type': 'application/json' }
                    });
                });
            }
            return originalFetch.apply(this, args);
        };
    })();
    </script>
    <?php
}, 999);

/**
 * Remove default admin bar padding callback
 * We handle positioning with CSS instead
 */
function vision_remove_admin_bar_bump() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('wp_head', 'vision_remove_admin_bar_bump', 0);

/**
 * Register Widget Areas
 */
function vision_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'vision'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'vision'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'vision_widgets_init');

/**
 * Load helper functions
 */
require_once get_template_directory() . '/inc/helpers.php';

/**
 * Load custom walker
 */
require_once get_template_directory() . '/inc/class-walker-nav-menu.php';


/**
 * Check if a URL is a video file or video hosting service
 * 
 * @param string $url The URL to check (can be image or video URL)
 * @return bool True if the URL is a video, false otherwise
 */
function isVideo(string $url) {
    // Return false if URL is empty
    if (empty($url)) {
        return false;
    }

    // Remove query strings and fragments for cleaner checking
    $clean_url = preg_replace('/[?#].*$/', '', $url);
    
    // Get file extension from URL
    $path = parse_url($clean_url, PHP_URL_PATH);
    $extension = $path ? strtolower(pathinfo($path, PATHINFO_EXTENSION)) : '';
    
    // Check for common video file extensions
    $video_extensions = array(
        'mp4', 'webm', 'ogv', 'ogg', 'mov', 'avi', 'mkv', 'flv', 
        'wmv', 'm4v', '3gp', '3g2', 'asf', 'rm', 'rmvb', 'vob'
    );
    
    if (in_array($extension, $video_extensions, true)) {
        return true;
    }
    
    // Use WordPress function if available (includes: mp4, m4v, webm, ogv, flv)
    if (function_exists('wp_get_video_extensions')) {
        $wp_video_extensions = wp_get_video_extensions();
        if (in_array($extension, $wp_video_extensions, true)) {
            return true;
        }
    }
    
    // Check for video hosting services
    $video_hosts = array(
        'youtube.com',
        'youtu.be',
        'vimeo.com',
        'dailymotion.com',
        'dai.ly',
        'facebook.com/video',
        'instagram.com',
        'tiktok.com',
        'twitch.tv',
        'wistia.com'
    );
    
    $host = parse_url($clean_url, PHP_URL_HOST);
    if ($host) {
        $host = strtolower($host);
        foreach ($video_hosts as $video_host) {
            if (strpos($host, $video_host) !== false) {
                return true;
            }
        }
    }
    
    // Check MIME type if URL is a local WordPress attachment
    if (function_exists('attachment_url_to_postid')) {
        $attachment_id = attachment_url_to_postid($url);
        if ($attachment_id) {
            $mime_type = get_post_mime_type($attachment_id);
            if ($mime_type && strpos($mime_type, 'video/') === 0) {
                return true;
            }
        }
    }
    
    return false;
}

/**
 * Register translatable strings for Polylang
 * This makes strings available in Languages → String translations
 */
function vision_register_strings() {
    if (function_exists('pll_register_string')) {
        // Register theme strings for translation
        pll_register_string('partners', 'PARTNERS', 'Vision Theme');
        pll_register_string('read_more', 'Read More', 'Vision Theme');
        pll_register_string('select_language', 'Select Language', 'Vision Theme');
        pll_register_string('log_in', 'Log in', 'Vision Theme');
        // Add more strings as needed
    }
}
add_action('init', 'vision_register_strings');

/**
 * Add social icons to mega menu as last item (mobile only)
 */
function vision_add_social_to_mega_menu($items, $args) {
    // Only add to primary menu location
    if ($args->theme_location !== 'primary') {
        return $items;
    }
    
    // Check if Max Mega Menu is enabled
    if (!function_exists('max_mega_menu_is_enabled') || !max_mega_menu_is_enabled('primary')) {
        return $items;
    }
    
    // Add social icons as last menu item (mobile only)
    $social_html = '<li class="mega-menu-item mega-menu-mobile-social xl:hidden">';
    $social_html .= '<div class="mega-menu-link mega-menu-mobile-social-container">';
    ob_start();
    renderSocial('dark', 24, ['linkedin', 'instagram', 'facebook', 'youtube'], 'mega-menu-social-link');
    $social_html .= ob_get_clean();
    $social_html .= '</div>';
    $social_html .= '</li>';
    
    return $items . $social_html;
}
add_filter('wp_nav_menu_items', 'vision_add_social_to_mega_menu', 10, 2);

// Add language class to the body
function add_language_body_class($classes) {
    // Get the current language (returns short language code like "en", "uk", etc.)
    $current_language = get_bloginfo('language');

    // Map the current language to a specific class
    if ($current_language) {
        $language_code = substr($current_language, 0, 2); // Take the first two letters of the language, e.g., "en"
        $classes[] = 'language-' . $language_code;
    }

    // Internal page (not front) – for menu current-item gold line
    if (!is_front_page()) {
        $classes[] = 'is-internal-page';
    }

    return $classes;
}
add_filter('body_class', 'add_language_body_class');

function enqueue_custom_scripts() {
    wp_enqueue_script(
        'menu-actions',
        get_template_directory_uri() . '/path-to-js/menu-actions.js',
        array(), // Dependencies (if needed)
        '1.0.0',
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
