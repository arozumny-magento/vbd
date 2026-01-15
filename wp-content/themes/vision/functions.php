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
    
    // Enqueue JavaScript
    wp_enqueue_script('vision-script', get_template_directory_uri() . '/assets/js/main.js', array(), wp_get_theme()->get('Version'), true);
    
    // Localize script for AJAX
    wp_localize_script('vision-script', 'visionAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('vision-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'vision_scripts');

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
