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
}
add_action('after_setup_theme', 'vision_setup');

/**
 * Enqueue Scripts and Styles
 */
function vision_scripts() {
    // WordPress automatically loads style.css from theme root
    // No need to enqueue it manually, but we can add it with a version for cache busting
    wp_enqueue_style('vision-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Add admin bar styles to ensure it's always visible and properly positioned
    $admin_bar_css = '
        /* Ensure admin bar is never hidden */
        #wpadminbar,
        #wpadminbar.hidden {
            z-index: 999999 !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            width: 100% !important;
            min-width: 600px !important;
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            height: 32px !important;
        }
        #wpadminbar * {
            visibility: visible !important;
        }
        #wpadminbar .ab-item,
        #wpadminbar .ab-empty-item,
        #wpadminbar li {
            display: block !important;
            visibility: visible !important;
        }
        @media screen and (max-width: 782px) {
            #wpadminbar,
            #wpadminbar.hidden {
                height: 46px !important;
            }
        }
        /* Adjust header position when admin bar is present */
        body.admin-bar header.fixed,
        body.admin-bar .fixed.inset-x-0.top-0,
        body.admin-bar header {
            top: 32px !important;
        }
        @media screen and (max-width: 782px) {
            body.admin-bar header.fixed,
            body.admin-bar .fixed.inset-x-0.top-0,
            body.admin-bar header {
                top: 46px !important;
            }
        }
    ';
    wp_add_inline_style('vision-style', $admin_bar_css);
    
    // Enqueue Alpine.js (CDN version auto-initializes)
    wp_enqueue_script('alpinejs', get_template_directory_uri() . '/assets/js/alpine.min.js', array(), '3.14.1', false);
    wp_script_add_data('alpinejs', 'defer', true);
    
    // Enqueue JavaScript (depends on Alpine.js for some components)
    wp_enqueue_script('vision-script', get_template_directory_uri() . '/assets/js/main.js', array('alpinejs'), wp_get_theme()->get('Version'), true);
    
    // Localize script for AJAX
    wp_localize_script('vision-script', 'visionAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('vision-nonce'),
    ));
    
    // Add x-cloak CSS to prevent flash of unstyled content
    $alpine_css = '[x-cloak] { display: none !important; }';
    wp_add_inline_style('vision-style', $alpine_css);
}
add_action('wp_enqueue_scripts', 'vision_scripts');

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


function isVideo(string $url) {

    return false;
}