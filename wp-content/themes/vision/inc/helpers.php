<?php
/**
 * Helper Functions
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get language switcher links
 *
 * @return array Array of language links
 */
function vision_get_language_links() {
    return apply_filters('vision_language_links', array(
        'en' => array(
            'url' => home_url('/'),
            'code' => 'EN',
            'name' => 'English',
            'active' => true,
        ),
        'es' => array(
            'url' => home_url('/es'),
            'code' => 'ES',
            'name' => 'Spanish',
            'active' => false,
        ),
        'pt' => array(
            'url' => home_url('/pt'),
            'code' => 'PT',
            'name' => 'Portuguese',
            'active' => false,
        ),
        'zh' => array(
            'url' => home_url('/zh'),
            'code' => 'ZH',
            'name' => 'Chinese',
            'active' => false,
        ),
    ));
}

/**
 * Get current language code
 *
 * @return string Current language code
 */
function vision_get_current_language() {
    return apply_filters('vision_current_language', 'en');
}

/**
 * Get site logo URL
 *
 * @return string Logo URL
 */
function vision_get_logo_url() {
    $logo_url = get_template_directory_uri() . '/assets/logo_gold.png';
    return apply_filters('vision_logo_url', $logo_url);
}

/**
 * Get site logo alt text
 *
 * @return string Logo alt text
 */
function vision_get_logo_alt() {
    $alt = get_bloginfo('name') . ' ' . __('logo', 'vision');
    return apply_filters('vision_logo_alt', $alt);
}

/**
 * Get social media links
 *
 * @return array Array of social media links
 */
function vision_get_social_links() {
    return apply_filters('vision_social_links', array(
        'linkedin' => array(
            'url' => 'https://www.linkedin.com/company/trident-trust/',
            'label' => __('LinkedIn', 'vision'),
            'icon' => 'linkedin',
        ),
        'twitter' => array(
            'url' => 'https://x.com/TridentTrustInt',
            'label' => __('X (Twitter)', 'vision'),
            'icon' => 'twitter',
        ),
        'wechat' => array(
            'url' => home_url('/follow-us-on-wechat'),
            'label' => __('WeChat', 'vision'),
            'icon' => 'wechat',
        ),
    ));
}

/**
 * Get copyright text
 *
 * @return string Copyright text
 */
function vision_get_copyright() {
    $year = date('Y');
    $text = sprintf(
        __('©%s %s', 'vision'),
        $year,
        get_bloginfo('name')
    );
    return apply_filters('vision_copyright', $text);
}

/**
 * Get asset URL
 *
 * @param string $path Asset path relative to assets directory
 * @return string Full asset URL
 */
function vision_get_asset_url($path) {
    $url = get_template_directory_uri() . '/assets/' . ltrim($path, '/');
    return apply_filters('vision_asset_url', $url, $path);
}
