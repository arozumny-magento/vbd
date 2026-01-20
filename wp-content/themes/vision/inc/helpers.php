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
 * Integrates with Polylang if available
 *
 * @return array Array of language links
 */
function vision_get_language_links() {
    // If Polylang is active, use it
    if (function_exists('pll_the_languages')) {
        $languages = pll_the_languages(array('raw' => 1));
        $current_lang = pll_current_language();
        $formatted_languages = array();
        
        foreach ($languages as $lang) {
            $formatted_languages[$lang['slug']] = array(
                'url' => $lang['url'],
                'code' => strtoupper($lang['slug']),
                'name' => $lang['name'],
                'active' => ($lang['current_lang'] == 1),
            );
        }
        
        return apply_filters('vision_language_links', $formatted_languages);
    }
    
    // Fallback to default languages
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
 * Integrates with Polylang if available
 *
 * @return string Current language code
 */
function vision_get_current_language() {
    // If Polylang is active, use it
    if (function_exists('pll_current_language')) {
        $lang = pll_current_language();
        return apply_filters('vision_current_language', $lang ? $lang : 'en');
    }
    
    // Fallback to default
    return apply_filters('vision_current_language', 'en');
}

/**
 * Get site logo URL
 *
 * @return string Logo URL
 */
function vision_get_logo_url() {
    $logo_url = get_template_directory_uri() . '/assets/logo_gold.svg';
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
        'instagram' => array(
            'url' => '#',
            'label' => __('Instagram', 'vision'),
            'icon' => 'instagram',
        ),
        'facebook' => array(
            'url' => '#',
            'label' => __('Facebook', 'vision'),
            'icon' => 'facebook',
        ),
        'youtube' => array(
            'url' => '#',
            'label' => __('YouTube', 'vision'),
            'icon' => 'youtube',
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
