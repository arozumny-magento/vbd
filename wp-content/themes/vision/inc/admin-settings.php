<?php
/**
 * Vision Theme – General Style Settings (Admin)
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

define('VISION_SETTINGS_OPTION', 'vision_style_settings');

/**
 * Default style settings
 */
function vision_get_style_settings_defaults() {
    return apply_filters('vision_style_settings_defaults', array(
        'header_logo'       => 0,
        'footer_logo'       => 0,
        'social_instagram'  => 'https://www.instagram.com/vision_business_development?igsh=bmkxMHlreXNzZ3g5',
        'social_youtube'    => 'https://www.youtube.com/@VisionBusinessDevelopment?utm_source=yourwebsite&utm_medium=website&utm_campaign=vision_channel',
        'social_facebook'   => 'https://www.facebook.com/people/Vision-Business-Development/61571892149523/',
        'social_linkedin'   => 'https://www.linkedin.com/company/vision-business-development-b2b/',
        'main_color'        => '#d0b135',
        'main_website_color'=> '#00012E',
        'theme_white_bg'     => '#FFFFFF',
        'theme_white_text'   => '#00012E',
        'theme_light_bg'     => '#f0f7ff',
        'theme_light_text'   => '#00012E',
        'theme_dark_bg'      => '#00012E',
        'theme_dark_text'    => '#FFFFFF',
        'font_en_main_size' => '1', 'font_en_main_line_height' => '1.6', 'font_en_main_weight' => '400',
        'font_en_block_heading_size' => '1.25', 'font_en_block_heading_line_height' => '1.3', 'font_en_block_heading_weight' => '600',
        'font_en_h1_size' => '2.5', 'font_en_h1_line_height' => '1.3', 'font_en_h1_weight' => '600',
        'font_en_h2_size' => '2', 'font_en_h2_line_height' => '1.3', 'font_en_h2_weight' => '600',
        'font_en_h3_size' => '1.75', 'font_en_h3_line_height' => '1.3', 'font_en_h3_weight' => '600',
        'font_en_h4_size' => '1.5', 'font_en_h4_line_height' => '1.3', 'font_en_h4_weight' => '600',
        'font_en_h5_size' => '1.25', 'font_en_h5_line_height' => '1.3', 'font_en_h5_weight' => '600',
        'font_en_h6_size' => '1', 'font_en_h6_line_height' => '1.3', 'font_en_h6_weight' => '600',
        'font_ar_main_size' => '1', 'font_ar_main_line_height' => '1.6', 'font_ar_main_weight' => '400',
        'font_ar_block_heading_size' => '1.25', 'font_ar_block_heading_line_height' => '1.3', 'font_ar_block_heading_weight' => '600',
        'font_ar_h1_size' => '2.5', 'font_ar_h1_line_height' => '1.3', 'font_ar_h1_weight' => '600',
        'font_ar_h2_size' => '2', 'font_ar_h2_line_height' => '1.3', 'font_ar_h2_weight' => '600',
        'font_ar_h3_size' => '1.75', 'font_ar_h3_line_height' => '1.3', 'font_ar_h3_weight' => '600',
        'font_ar_h4_size' => '1.5', 'font_ar_h4_line_height' => '1.3', 'font_ar_h4_weight' => '600',
        'font_ar_h5_size' => '1.25', 'font_ar_h5_line_height' => '1.3', 'font_ar_h5_weight' => '600',
        'font_ar_h6_size' => '1', 'font_ar_h6_line_height' => '1.3', 'font_ar_h6_weight' => '600',
        'font_uk_main_size' => '1', 'font_uk_main_line_height' => '1.6', 'font_uk_main_weight' => '400',
        'font_uk_block_heading_size' => '1.25', 'font_uk_block_heading_line_height' => '1.3', 'font_uk_block_heading_weight' => '600',
        'font_uk_h1_size' => '2.5', 'font_uk_h1_line_height' => '1.3', 'font_uk_h1_weight' => '600',
        'font_uk_h2_size' => '2', 'font_uk_h2_line_height' => '1.3', 'font_uk_h2_weight' => '600',
        'font_uk_h3_size' => '1.75', 'font_uk_h3_line_height' => '1.3', 'font_uk_h3_weight' => '600',
        'font_uk_h4_size' => '1.5', 'font_uk_h4_line_height' => '1.3', 'font_uk_h4_weight' => '600',
        'font_uk_h5_size' => '1.25', 'font_uk_h5_line_height' => '1.3', 'font_uk_h5_weight' => '600',
        'font_uk_h6_size' => '1', 'font_uk_h6_line_height' => '1.3', 'font_uk_h6_weight' => '600',
        // Mobile (same keys with _mobile suffix; same defaults as desktop)
        'font_en_main_size_mobile' => '1', 'font_en_main_line_height_mobile' => '1.6', 'font_en_main_weight_mobile' => '400',
        'font_en_block_heading_size_mobile' => '1.25', 'font_en_block_heading_line_height_mobile' => '1.3', 'font_en_block_heading_weight_mobile' => '600',
        'font_en_h1_size_mobile' => '2.5', 'font_en_h1_line_height_mobile' => '1.3', 'font_en_h1_weight_mobile' => '600',
        'font_en_h2_size_mobile' => '2', 'font_en_h2_line_height_mobile' => '1.3', 'font_en_h2_weight_mobile' => '600',
        'font_en_h3_size_mobile' => '1.75', 'font_en_h3_line_height_mobile' => '1.3', 'font_en_h3_weight_mobile' => '600',
        'font_en_h4_size_mobile' => '1.5', 'font_en_h4_line_height_mobile' => '1.3', 'font_en_h4_weight_mobile' => '600',
        'font_en_h5_size_mobile' => '1.25', 'font_en_h5_line_height_mobile' => '1.3', 'font_en_h5_weight_mobile' => '600',
        'font_en_h6_size_mobile' => '1', 'font_en_h6_line_height_mobile' => '1.3', 'font_en_h6_weight_mobile' => '600',
        'font_ar_main_size_mobile' => '1', 'font_ar_main_line_height_mobile' => '1.6', 'font_ar_main_weight_mobile' => '400',
        'font_ar_block_heading_size_mobile' => '1.25', 'font_ar_block_heading_line_height_mobile' => '1.3', 'font_ar_block_heading_weight_mobile' => '600',
        'font_ar_h1_size_mobile' => '2.5', 'font_ar_h1_line_height_mobile' => '1.3', 'font_ar_h1_weight_mobile' => '600',
        'font_ar_h2_size_mobile' => '2', 'font_ar_h2_line_height_mobile' => '1.3', 'font_ar_h2_weight_mobile' => '600',
        'font_ar_h3_size_mobile' => '1.75', 'font_ar_h3_line_height_mobile' => '1.3', 'font_ar_h3_weight_mobile' => '600',
        'font_ar_h4_size_mobile' => '1.5', 'font_ar_h4_line_height_mobile' => '1.3', 'font_ar_h4_weight_mobile' => '600',
        'font_ar_h5_size_mobile' => '1.25', 'font_ar_h5_line_height_mobile' => '1.3', 'font_ar_h5_weight_mobile' => '600',
        'font_ar_h6_size_mobile' => '1', 'font_ar_h6_line_height_mobile' => '1.3', 'font_ar_h6_weight_mobile' => '600',
        'font_uk_main_size_mobile' => '1', 'font_uk_main_line_height_mobile' => '1.6', 'font_uk_main_weight_mobile' => '400',
        'font_uk_block_heading_size_mobile' => '1.25', 'font_uk_block_heading_line_height_mobile' => '1.3', 'font_uk_block_heading_weight_mobile' => '600',
        'font_uk_h1_size_mobile' => '2.5', 'font_uk_h1_line_height_mobile' => '1.3', 'font_uk_h1_weight_mobile' => '600',
        'font_uk_h2_size_mobile' => '2', 'font_uk_h2_line_height_mobile' => '1.3', 'font_uk_h2_weight_mobile' => '600',
        'font_uk_h3_size_mobile' => '1.75', 'font_uk_h3_line_height_mobile' => '1.3', 'font_uk_h3_weight_mobile' => '600',
        'font_uk_h4_size_mobile' => '1.5', 'font_uk_h4_line_height_mobile' => '1.3', 'font_uk_h4_weight_mobile' => '600',
        'font_uk_h5_size_mobile' => '1.25', 'font_uk_h5_line_height_mobile' => '1.3', 'font_uk_h5_weight_mobile' => '600',
        'font_uk_h6_size_mobile' => '1', 'font_uk_h6_line_height_mobile' => '1.3', 'font_uk_h6_weight_mobile' => '600',
        'block_hover_effect'     => 'color-fade',
        'block_hover_text_color' => '#d0b135',
        'block_hover_bg_color'   => 'transparent',
        'contact_form_shortcode'   => '[contact-form-7 id="8a5b653" title="Contact form - Contact US"]',
        'contact_form_bg_color'    => '#00012E',
        'contact_form_image'       => 0,
    ));
}

/**
 * Available block hover effects (for dropdown and CSS)
 */
function vision_get_block_hover_effects() {
    return array(
        'none'           => __('None', 'vision'),
        'color-fade'     => __('Color fade', 'vision'),
        'gradient-shift' => __('Gradient shift', 'vision'),
        'slide-line'     => __('Slide line', 'vision'),
        'glow'           => __('Glow', 'vision'),
        'shine-sweep'    => __('Shine sweep', 'vision'),
        'fill-from-left' => __('Fill from left', 'vision'),
        'lighten'        => __('Subtle lighten', 'vision'),
        'scale-up'       => __('Scale up', 'vision'),
        'fade-invert'    => __('Fade invert', 'vision'),
        'soft-highlight' => __('Soft highlight', 'vision'),
    );
}

/**
 * Get CSS class to add to a block wrapper for the configured hover effect.
 * Use with theme class, e.g. class="vision-block-theme-light <?php echo esc_attr( vision_get_block_hover_effect_class() ); ?>"
 */
function vision_get_block_hover_effect_class() {
    $opt = vision_get_style_settings();
    $effect = isset($opt['block_hover_effect']) ? $opt['block_hover_effect'] : 'color-fade';
    if ($effect === 'none') {
        return '';
    }
    return 'vision-block-hover-effect--' . $effect;
}

/**
 * Get current style settings (merged with defaults)
 */
function vision_get_style_settings() {
    $saved = get_option(VISION_SETTINGS_OPTION, array());
    $defaults = vision_get_style_settings_defaults();
    return wp_parse_args(is_array($saved) ? $saved : array(), $defaults);
}

/**
 * Register admin menu and settings
 */
function vision_register_style_settings() {
    add_options_page(
        __('Vision Style Settings', 'vision'),
        __('Vision Style', 'vision'),
        'manage_options',
        'vision-style-settings',
        'vision_render_style_settings_page'
    );

    register_setting('vision_style_settings_group', VISION_SETTINGS_OPTION, array(
        'type'              => 'array',
        'sanitize_callback' => 'vision_sanitize_style_settings',
    ));
}
add_action('admin_menu', 'vision_register_style_settings');

function vision_sanitize_style_settings($input) {
    if (!is_array($input)) {
        return array();
    }
    $defaults = vision_get_style_settings_defaults();
    $out = array();

    $out['header_logo']       = isset($input['header_logo']) ? absint($input['header_logo']) : 0;
    $out['footer_logo']       = isset($input['footer_logo']) ? absint($input['footer_logo']) : 0;
    $out['contact_form_shortcode'] = isset($input['contact_form_shortcode']) ? sanitize_text_field($input['contact_form_shortcode']) : $defaults['contact_form_shortcode'];
    $out['contact_form_bg_color']  = isset($input['contact_form_bg_color']) ? sanitize_hex_color($input['contact_form_bg_color']) : $defaults['contact_form_bg_color'];
    $out['contact_form_image']     = isset($input['contact_form_image']) ? absint($input['contact_form_image']) : 0;
    $out['social_instagram']  = isset($input['social_instagram']) ? esc_url_raw(trim($input['social_instagram'])) : '';
    $out['social_youtube']    = isset($input['social_youtube']) ? esc_url_raw(trim($input['social_youtube'])) : '';
    $out['social_linkedin']  = isset($input['social_linkedin']) ? esc_url_raw(trim($input['social_linkedin'])) : '';
    $out['social_facebook']  = isset($input['social_facebook']) ? esc_url_raw(trim($input['social_facebook'])) : '';

    $out['main_color'] = isset($input['main_color']) ? sanitize_hex_color($input['main_color']) : $defaults['main_color'];
    $out['main_website_color'] = isset($input['main_website_color']) ? sanitize_hex_color($input['main_website_color']) : $defaults['main_website_color'];

    $sanitize_weight = function ($v) {
        $v = sanitize_text_field($v);
        if (in_array($v, array('normal', 'bold'), true)) {
            return $v === 'bold' ? '700' : '400';
        }
        $n = absint($v);
        if ($n >= 100 && $n <= 900 && (string) $n === $v) {
            return (string) $n;
        }
        return '';
    };

    $out['theme_white_bg']   = isset($input['theme_white_bg']) ? sanitize_hex_color($input['theme_white_bg']) : $defaults['theme_white_bg'];
    $out['theme_white_text'] = isset($input['theme_white_text']) ? sanitize_hex_color($input['theme_white_text']) : $defaults['theme_white_text'];
    $out['theme_light_bg']   = isset($input['theme_light_bg']) ? sanitize_hex_color($input['theme_light_bg']) : $defaults['theme_light_bg'];
    $out['theme_light_text'] = isset($input['theme_light_text']) ? sanitize_hex_color($input['theme_light_text']) : $defaults['theme_light_text'];
    $out['theme_dark_bg']    = isset($input['theme_dark_bg']) ? sanitize_hex_color($input['theme_dark_bg']) : $defaults['theme_dark_bg'];
    $out['theme_dark_text']  = isset($input['theme_dark_text']) ? sanitize_hex_color($input['theme_dark_text']) : $defaults['theme_dark_text'];

    $effects = array_keys(vision_get_block_hover_effects());
    $out['block_hover_effect'] = isset($input['block_hover_effect']) && in_array($input['block_hover_effect'], $effects, true)
        ? $input['block_hover_effect']
        : $defaults['block_hover_effect'];
    $out['block_hover_text_color'] = isset($input['block_hover_text_color']) ? sanitize_hex_color($input['block_hover_text_color']) : $defaults['block_hover_text_color'];
    $bg = isset($input['block_hover_bg_color']) ? trim($input['block_hover_bg_color']) : '';
    if (strtolower($bg) === 'transparent') {
        $out['block_hover_bg_color'] = 'transparent';
    } else {
        $out['block_hover_bg_color'] = $bg !== '' ? sanitize_hex_color($bg) : $defaults['block_hover_bg_color'];
        if ($out['block_hover_bg_color'] === '') {
            $out['block_hover_bg_color'] = $defaults['block_hover_bg_color'];
        }
    }

    foreach (array('en', 'ar', 'uk') as $lang) {
        $out["font_{$lang}_main_size"] = isset($input["font_{$lang}_main_size"]) ? sanitize_text_field($input["font_{$lang}_main_size"]) : $defaults["font_{$lang}_main_size"];
        $out["font_{$lang}_main_line_height"] = isset($input["font_{$lang}_main_line_height"]) ? sanitize_text_field($input["font_{$lang}_main_line_height"]) : $defaults["font_{$lang}_main_line_height"];
        $w = isset($input["font_{$lang}_main_weight"]) ? $sanitize_weight($input["font_{$lang}_main_weight"]) : '';
        $out["font_{$lang}_main_weight"] = ($w !== '') ? $w : $defaults["font_{$lang}_main_weight"];
        $out["font_{$lang}_block_heading_size"] = isset($input["font_{$lang}_block_heading_size"]) ? sanitize_text_field($input["font_{$lang}_block_heading_size"]) : $defaults["font_{$lang}_block_heading_size"];
        $out["font_{$lang}_block_heading_line_height"] = isset($input["font_{$lang}_block_heading_line_height"]) ? sanitize_text_field($input["font_{$lang}_block_heading_line_height"]) : $defaults["font_{$lang}_block_heading_line_height"];
        $w = isset($input["font_{$lang}_block_heading_weight"]) ? $sanitize_weight($input["font_{$lang}_block_heading_weight"]) : '';
        $out["font_{$lang}_block_heading_weight"] = ($w !== '') ? $w : $defaults["font_{$lang}_block_heading_weight"];
        for ($i = 1; $i <= 6; $i++) {
            $out["font_{$lang}_h{$i}_size"] = isset($input["font_{$lang}_h{$i}_size"]) ? sanitize_text_field($input["font_{$lang}_h{$i}_size"]) : $defaults["font_{$lang}_h{$i}_size"];
            $out["font_{$lang}_h{$i}_line_height"] = isset($input["font_{$lang}_h{$i}_line_height"]) ? sanitize_text_field($input["font_{$lang}_h{$i}_line_height"]) : $defaults["font_{$lang}_h{$i}_line_height"];
            $w = isset($input["font_{$lang}_h{$i}_weight"]) ? $sanitize_weight($input["font_{$lang}_h{$i}_weight"]) : '';
            $out["font_{$lang}_h{$i}_weight"] = ($w !== '') ? $w : $defaults["font_{$lang}_h{$i}_weight"];
        }
        // Mobile
        $out["font_{$lang}_main_size_mobile"] = isset($input["font_{$lang}_main_size_mobile"]) ? sanitize_text_field($input["font_{$lang}_main_size_mobile"]) : $defaults["font_{$lang}_main_size_mobile"];
        $out["font_{$lang}_main_line_height_mobile"] = isset($input["font_{$lang}_main_line_height_mobile"]) ? sanitize_text_field($input["font_{$lang}_main_line_height_mobile"]) : $defaults["font_{$lang}_main_line_height_mobile"];
        $w = isset($input["font_{$lang}_main_weight_mobile"]) ? $sanitize_weight($input["font_{$lang}_main_weight_mobile"]) : '';
        $out["font_{$lang}_main_weight_mobile"] = ($w !== '') ? $w : $defaults["font_{$lang}_main_weight_mobile"];
        $out["font_{$lang}_block_heading_size_mobile"] = isset($input["font_{$lang}_block_heading_size_mobile"]) ? sanitize_text_field($input["font_{$lang}_block_heading_size_mobile"]) : $defaults["font_{$lang}_block_heading_size_mobile"];
        $out["font_{$lang}_block_heading_line_height_mobile"] = isset($input["font_{$lang}_block_heading_line_height_mobile"]) ? sanitize_text_field($input["font_{$lang}_block_heading_line_height_mobile"]) : $defaults["font_{$lang}_block_heading_line_height_mobile"];
        $w = isset($input["font_{$lang}_block_heading_weight_mobile"]) ? $sanitize_weight($input["font_{$lang}_block_heading_weight_mobile"]) : '';
        $out["font_{$lang}_block_heading_weight_mobile"] = ($w !== '') ? $w : $defaults["font_{$lang}_block_heading_weight_mobile"];
        for ($i = 1; $i <= 6; $i++) {
            $out["font_{$lang}_h{$i}_size_mobile"] = isset($input["font_{$lang}_h{$i}_size_mobile"]) ? sanitize_text_field($input["font_{$lang}_h{$i}_size_mobile"]) : $defaults["font_{$lang}_h{$i}_size_mobile"];
            $out["font_{$lang}_h{$i}_line_height_mobile"] = isset($input["font_{$lang}_h{$i}_line_height_mobile"]) ? sanitize_text_field($input["font_{$lang}_h{$i}_line_height_mobile"]) : $defaults["font_{$lang}_h{$i}_line_height_mobile"];
            $w = isset($input["font_{$lang}_h{$i}_weight_mobile"]) ? $sanitize_weight($input["font_{$lang}_h{$i}_weight_mobile"]) : '';
            $out["font_{$lang}_h{$i}_weight_mobile"] = ($w !== '') ? $w : $defaults["font_{$lang}_h{$i}_weight_mobile"];
        }
    }

    return wp_parse_args($out, $defaults);
}

/**
 * Enqueue admin scripts (media uploader) on our settings page only
 */
function vision_admin_settings_scripts($hook) {
    if ($hook !== 'settings_page_vision-style-settings') {
        return;
    }
    wp_enqueue_media();
    wp_add_inline_script('jquery', '
        jQuery(function($) {
            function visionOpenMedia(inputId, previewId) {
                var frame = wp.media({ multiple: false, library: { type: "image" } });
                frame.on("select", function() {
                    var att = frame.state().get("selection").first().toJSON();
                    $("#" + inputId).val(att.id);
                    $("#" + previewId).attr("src", att.url).show();
                });
                frame.open();
            }
            $(".vision-upload-logo").on("click", function(e) {
                e.preventDefault();
                var btn = $(this), inputId = btn.data("input"), previewId = btn.data("preview");
                visionOpenMedia(inputId, previewId);
            });
            $(".vision-remove-logo").on("click", function(e) {
                e.preventDefault();
                var btn = $(this), inputId = btn.data("input"), previewId = btn.data("preview");
                $("#" + inputId).val("0");
                $("#" + previewId).attr("src", "").hide();
            });
        });
    ');
}
add_action('admin_enqueue_scripts', 'vision_admin_settings_scripts');

/**
 * Render the settings page
 */
function vision_render_style_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }
    $opt = vision_get_style_settings();
    $header_logo_url = $opt['header_logo'] ? wp_get_attachment_image_url($opt['header_logo'], 'medium') : '';
    $footer_logo_url = $opt['footer_logo'] ? wp_get_attachment_image_url($opt['footer_logo'], 'medium') : '';
    $contact_form_image_url = !empty($opt['contact_form_image']) ? wp_get_attachment_image_url($opt['contact_form_image'], 'medium') : '';

    $active_tab = isset($_GET['tab']) ? sanitize_key($_GET['tab']) : 'general';
    if (!in_array($active_tab, array('general', 'blocks-style', 'eng', 'ukr', 'ara'), true)) {
        $active_tab = 'general';
    }
    $active_subtab = (isset($_GET['subtab']) && $_GET['subtab'] === 'mobile') ? 'mobile' : 'desktop';

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_add_inline_script('wp-color-picker', "jQuery(function($){
        $('.vision-color-picker').wpColorPicker({
            change: function() {
                var \$input = $(this);
                var val = \$input.val();
                if (\$input.hasClass('vision-theme-color-input')) {
                    var block = \$input.data('demo-block');
                    var prop = \$input.data('demo-property');
                    if (!block || !val) return;
                    var \$block = $('.' + block);
                    if (prop === 'bg') { \$block.css('background-color', val); } else { \$block.css('color', val); \$block.find('h3, p').css('color', val); }
                }
                if (\$input.hasClass('vision-hover-demo-color')) {
                    var type = \$input.data('demo-type');
                    var \$container = $('.vision-hover-demo-blocks');
                    if (\$container.length && val) \$container.css('--vision-demo-hover-' + type, val);
                }
            }
        });
    });");
    ?>
    <div class="wrap vision-settings-wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

        <nav class="nav-tab-wrapper vision-nav-tabs" aria-label="<?php esc_attr_e('Secondary menu', 'vision'); ?>">
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=general')); ?>" class="nav-tab <?php echo $active_tab === 'general' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('General', 'vision'); ?></a>
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=blocks-style')); ?>" class="nav-tab <?php echo $active_tab === 'blocks-style' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Blocks Style', 'vision'); ?></a>
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=eng')); ?>" class="nav-tab <?php echo $active_tab === 'eng' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('ENG', 'vision'); ?></a>
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=ukr')); ?>" class="nav-tab <?php echo $active_tab === 'ukr' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('UKR', 'vision'); ?></a>
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=ara')); ?>" class="nav-tab <?php echo $active_tab === 'ara' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('ARA', 'vision'); ?></a>
        </nav>

        <form action="options.php" method="post" id="vision-style-settings-form">
            <?php settings_fields('vision_style_settings_group'); ?>

            <!-- Tab: General -->
            <div class="vision-tab-panel" id="vision-tab-general" data-tab="general" style="<?php echo $active_tab !== 'general' ? ' display:none;' : ''; ?>">
                <h2 class="title"><?php esc_html_e('Header', 'vision'); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><?php esc_html_e('Header logo', 'vision'); ?></th>
                        <td>
                            <input type="hidden" id="vision_header_logo" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[header_logo]" value="<?php echo esc_attr($opt['header_logo']); ?>" />
                            <img id="vision_header_logo_preview" src="<?php echo esc_url($header_logo_url); ?>" style="max-width:200px;<?php echo $header_logo_url ? '' : ' display:none;'; ?>" alt="" />
                            <p>
                                <button type="button" class="button vision-upload-logo" data-input="vision_header_logo" data-preview="vision_header_logo_preview"><?php esc_html_e('Select image', 'vision'); ?></button>
                                <button type="button" class="button vision-remove-logo" data-input="vision_header_logo" data-preview="vision_header_logo_preview"><?php esc_html_e('Remove', 'vision'); ?></button>
                            </p>
                        </td>
                    </tr>
                </table>

                <h2 class="title"><?php esc_html_e('Main', 'vision'); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><?php esc_html_e('Social links', 'vision'); ?></th>
                        <td>
                            <table class="form-table" role="presentation" style="margin:0;">
                                <?php
                                $socials = array(
                                    'social_instagram' => __('Instagram URL', 'vision'),
                                    'social_youtube'   => __('YouTube URL', 'vision'),
                                    'social_linkedin'  => __('LinkedIn URL', 'vision'),
                                    'social_facebook'  => __('Facebook URL', 'vision'),
                                );
                                foreach ($socials as $key => $label) :
                                    ?>
                                    <tr>
                                        <td style="padding:0 0 8px 0;"><label for="vision_<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></label></td>
                                        <td style="padding:0 0 8px 0;"><input type="url" id="vision_<?php echo esc_attr($key); ?>" name="<?php echo esc_attr(VISION_SETTINGS_OPTION . '[' . $key . ']'); ?>" value="<?php echo esc_attr($opt[$key]); ?>" class="regular-text" placeholder="https://" /></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Styles', 'vision'); ?></th>
                        <td>
                            <p><label><?php esc_html_e('Main website color', 'vision'); ?></label><br />
                            <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[main_website_color]" value="<?php echo esc_attr($opt['main_website_color']); ?>" class="vision-color-picker" data-default-color="#00012E" /></p>
                            <p><label><?php esc_html_e('Accent color', 'vision'); ?></label><br />
                            <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[main_color]" value="<?php echo esc_attr($opt['main_color']); ?>" class="vision-color-picker" data-default-color="#d0b135" /></p>
                            <p class="description"><?php esc_html_e('Primary brand and gold/accent for links, buttons, highlights.', 'vision'); ?></p>
                        </td>
                    </tr>
                </table>

                <h2 class="title"><?php esc_html_e('Footer', 'vision'); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><?php esc_html_e('Footer logo', 'vision'); ?></th>
                        <td>
                            <input type="hidden" id="vision_footer_logo" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[footer_logo]" value="<?php echo esc_attr($opt['footer_logo']); ?>" />
                            <img id="vision_footer_logo_preview" src="<?php echo esc_url($footer_logo_url); ?>" style="max-width:200px;<?php echo $footer_logo_url ? '' : ' display:none;'; ?>" alt="" />
                            <p>
                                <button type="button" class="button vision-upload-logo" data-input="vision_footer_logo" data-preview="vision_footer_logo_preview"><?php esc_html_e('Select image', 'vision'); ?></button>
                                <button type="button" class="button vision-remove-logo" data-input="vision_footer_logo" data-preview="vision_footer_logo_preview"><?php esc_html_e('Remove', 'vision'); ?></button>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="vision_contact_form_shortcode"><?php esc_html_e('Contact form shortcode', 'vision'); ?></label></th>
                        <td>
                            <input type="text" id="vision_contact_form_shortcode" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[contact_form_shortcode]" value="<?php echo esc_attr($opt['contact_form_shortcode']); ?>" class="large-text" placeholder="[contact-form-7 id=&quot;123&quot; title=&quot;Contact&quot;]" />
                            <p class="description"><?php esc_html_e('e.g. Contact Form 7 shortcode. Used in the footer contact section.', 'vision'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Contact form background color', 'vision'); ?></th>
                        <td>
                            <input type="text" id="vision_contact_form_bg_color" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[contact_form_bg_color]" value="<?php echo esc_attr($opt['contact_form_bg_color']); ?>" class="vision-color-picker" data-default-color="#00012E" />
                            <p class="description"><?php esc_html_e('Background of the footer contact form area.', 'vision'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Contact form image', 'vision'); ?></th>
                        <td>
                            <input type="hidden" id="vision_contact_form_image" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[contact_form_image]" value="<?php echo esc_attr($opt['contact_form_image']); ?>" />
                            <img id="vision_contact_form_image_preview" src="<?php echo esc_url($contact_form_image_url); ?>" style="max-width:200px;<?php echo $contact_form_image_url ? '' : ' display:none;'; ?>" alt="" />
                            <p>
                                <button type="button" class="button vision-upload-logo" data-input="vision_contact_form_image" data-preview="vision_contact_form_image_preview"><?php esc_html_e('Select image', 'vision'); ?></button>
                                <button type="button" class="button vision-remove-logo" data-input="vision_contact_form_image" data-preview="vision_contact_form_image_preview"><?php esc_html_e('Remove', 'vision'); ?></button>
                            </p>
                            <p class="description"><?php esc_html_e('Background image for the contact section (left side).', 'vision'); ?></p>
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Tab: Blocks Style -->
            <div class="vision-tab-panel" id="vision-tab-blocks-style" data-tab="blocks-style" style="<?php echo $active_tab !== 'blocks-style' ? ' display:none;' : ''; ?>">
                <h2 class="title"><?php esc_html_e('Block theme presets', 'vision'); ?></h2>
                <p class="description"><?php esc_html_e('Each block can use one of these presets (white, light, or dark) via its own settings. The main page style stays the same.', 'vision'); ?></p>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><?php esc_html_e('White preset', 'vision'); ?></th>
                        <td>
                            <label><?php esc_html_e('Block background', 'vision'); ?></label> <input type="text" id="vision_theme_white_bg" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_white_bg]" value="<?php echo esc_attr($opt['theme_white_bg']); ?>" class="vision-color-picker vision-theme-color-input" data-demo-block="vision-demo-white" data-demo-property="bg" />
                            <label style="margin-left:1em"><?php esc_html_e('Text', 'vision'); ?></label> <input type="text" id="vision_theme_white_text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_white_text]" value="<?php echo esc_attr($opt['theme_white_text']); ?>" class="vision-color-picker vision-theme-color-input" data-demo-block="vision-demo-white" data-demo-property="text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Light preset', 'vision'); ?></th>
                        <td>
                            <label><?php esc_html_e('Block background', 'vision'); ?></label> <input type="text" id="vision_theme_light_bg" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_light_bg]" value="<?php echo esc_attr($opt['theme_light_bg']); ?>" class="vision-color-picker vision-theme-color-input" data-demo-block="vision-demo-light" data-demo-property="bg" />
                            <label style="margin-left:1em"><?php esc_html_e('Text', 'vision'); ?></label> <input type="text" id="vision_theme_light_text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_light_text]" value="<?php echo esc_attr($opt['theme_light_text']); ?>" class="vision-color-picker vision-theme-color-input" data-demo-block="vision-demo-light" data-demo-property="text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Dark preset', 'vision'); ?></th>
                        <td>
                            <label><?php esc_html_e('Block background', 'vision'); ?></label> <input type="text" id="vision_theme_dark_bg" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_dark_bg]" value="<?php echo esc_attr($opt['theme_dark_bg']); ?>" class="vision-color-picker vision-theme-color-input" data-demo-block="vision-demo-dark" data-demo-property="bg" />
                            <label style="margin-left:1em"><?php esc_html_e('Text', 'vision'); ?></label> <input type="text" id="vision_theme_dark_text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_dark_text]" value="<?php echo esc_attr($opt['theme_dark_text']); ?>" class="vision-color-picker vision-theme-color-input" data-demo-block="vision-demo-dark" data-demo-property="text" />
                        </td>
                    </tr>
                </table>

                <h2 class="title"><?php esc_html_e('Block hover effect', 'vision'); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><label for="vision_block_hover_effect"><?php esc_html_e('On hover effect for block', 'vision'); ?></label></th>
                        <td>
                            <select id="vision_block_hover_effect" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[block_hover_effect]" class="vision-hover-effect-select">
                                <?php
                                foreach (vision_get_block_hover_effects() as $value => $label) {
                                    echo '<option value="' . esc_attr($value) . '" ' . selected($opt['block_hover_effect'], $value, false) . '>' . esc_html($label) . '</option>';
                                }
                                ?>
                            </select>
                            <p class="description"><?php esc_html_e('Text color effect when hovering over content blocks. Preview below.', 'vision'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('On hover text color', 'vision'); ?></th>
                        <td>
                            <input type="text" id="vision_block_hover_text_color" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[block_hover_text_color]" value="<?php echo esc_attr($opt['block_hover_text_color']); ?>" class="vision-color-picker vision-hover-demo-color" data-demo-type="text" />
                            <p class="description"><?php esc_html_e('Text color when hovering over a block. Used by the effect preview and front end.', 'vision'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('On hover background color', 'vision'); ?></th>
                        <td>
                            <input type="text" id="vision_block_hover_bg_color" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[block_hover_bg_color]" value="<?php echo esc_attr($opt['block_hover_bg_color']); ?>" class="vision-color-picker vision-hover-demo-color" data-demo-type="bg" />
                            <p class="description"><?php esc_html_e('Block background color on hover. Use transparent to keep current background.', 'vision'); ?></p>
                        </td>
                    </tr>
                </table>

                <h3><?php esc_html_e('Preview: hover over each block to see the effect', 'vision'); ?></h3>
                <?php
                $hover_effect = $opt['block_hover_effect'];
                $accent_color = $opt['main_color'];
                $block_hover_text = isset($opt['block_hover_text_color']) ? $opt['block_hover_text_color'] : $accent_color;
                $block_hover_bg = isset($opt['block_hover_bg_color']) ? $opt['block_hover_bg_color'] : 'transparent';
                $theme_light_bg = $opt['theme_light_bg'];
                $theme_light_text = $opt['theme_light_text'];
                $theme_dark_bg = $opt['theme_dark_bg'];
                $theme_dark_text = $opt['theme_dark_text'];
                $theme_white_bg = $opt['theme_white_bg'];
                $theme_white_text = $opt['theme_white_text'];
                ?>
                <style id="vision-hover-demo-css">
                .vision-hover-demo-block { padding: 1.5rem; margin-bottom: 1rem; border: 1px solid rgba(0,0,0,.1); border-radius: 6px; cursor: default; transition: color .35s ease, background-color .35s ease, box-shadow .35s ease; }
                .vision-hover-demo-block h3 { margin: 0 0 .75rem; font-size: 1.25rem; transition: color .35s ease, background .35s ease, background-size .35s ease, box-shadow .35s ease, text-shadow .35s ease, -webkit-background-clip .35s; }
                .vision-hover-demo-block p { margin: 0; font-size: 14px; line-height: 1.5; transition: color .35s ease, background .35s ease, background-size .35s ease, box-shadow .35s ease, text-shadow .35s ease, -webkit-background-clip .35s; }
                .vision-hover-demo-block.vision-demo-light { background: <?php echo esc_attr($theme_light_bg); ?>; color: <?php echo esc_attr($theme_light_text); ?>; }
                .vision-hover-demo-block.vision-demo-light h3,
                .vision-hover-demo-block.vision-demo-light p { color: <?php echo esc_attr($theme_light_text); ?>; }
                .vision-hover-demo-block.vision-demo-dark { background: <?php echo esc_attr($theme_dark_bg); ?>; color: <?php echo esc_attr($theme_dark_text); ?>; }
                .vision-hover-demo-block.vision-demo-dark h3,
                .vision-hover-demo-block.vision-demo-dark p { color: <?php echo esc_attr($theme_dark_text); ?>; }
                .vision-hover-demo-block.vision-demo-white { background: <?php echo esc_attr($theme_white_bg); ?>; color: <?php echo esc_attr($theme_white_text); ?>; }
                .vision-hover-demo-block.vision-demo-white h3,
                .vision-hover-demo-block.vision-demo-white p { color: <?php echo esc_attr($theme_white_text); ?>; }
                .vision-hover-demo-blocks { --vision-demo-hover-text: <?php echo esc_attr($block_hover_text); ?>; --vision-demo-hover-bg: <?php echo esc_attr($block_hover_bg); ?>; }
                .vision-hover-demo-block.vision-hover-effect--color-fade:hover h3,
                .vision-hover-demo-block.vision-hover-effect--color-fade:hover p { color: var(--vision-demo-hover-text) !important; }
                .vision-hover-demo-block.vision-hover-effect--color-fade:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--gradient-shift:hover h3,
                .vision-hover-demo-block.vision-hover-effect--gradient-shift:hover p { background: linear-gradient(135deg, <?php echo esc_attr($accent_color); ?> 0%, <?php echo esc_attr($theme_light_text); ?> 100%); -webkit-background-clip: text; background-clip: text; color: transparent !important; }
                .vision-hover-demo-block.vision-demo-dark.vision-hover-effect--gradient-shift:hover h3,
                .vision-hover-demo-block.vision-demo-dark.vision-hover-effect--gradient-shift:hover p { background: linear-gradient(135deg, <?php echo esc_attr($accent_color); ?> 0%, <?php echo esc_attr($theme_dark_text); ?> 100%); -webkit-background-clip: text; background-clip: text; }
                .vision-hover-demo-block.vision-hover-effect--gradient-shift:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--slide-line:hover h3,
                .vision-hover-demo-block.vision-hover-effect--slide-line:hover p { color: var(--vision-demo-hover-text) !important; box-shadow: inset 0 -2px 0 0 var(--vision-demo-hover-text); }
                .vision-hover-demo-block.vision-hover-effect--slide-line:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--glow:hover h3,
                .vision-hover-demo-block.vision-hover-effect--glow:hover p { text-shadow: 0 0 14px <?php echo esc_attr($accent_color); ?>, 0 0 28px <?php echo esc_attr($accent_color); ?>; color: var(--vision-demo-hover-text) !important; }
                .vision-hover-demo-block.vision-hover-effect--glow:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--shine-sweep:hover h3,
                .vision-hover-demo-block.vision-hover-effect--shine-sweep:hover p { background: linear-gradient(110deg, transparent 40%, <?php echo esc_attr($accent_color); ?> 50%, transparent 60%); background-size: 200% 100%; background-position: 0 0; -webkit-background-clip: text; background-clip: text; color: transparent !important; }
                .vision-hover-demo-block.vision-hover-effect--shine-sweep:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--fill-from-left:hover { position: relative; background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--fill-from-left:hover h3,
                .vision-hover-demo-block.vision-hover-effect--fill-from-left:hover p { color: var(--vision-demo-hover-text) !important; }
                .vision-hover-demo-block.vision-hover-effect--fill-from-left:hover::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 100%; background: <?php echo esc_attr($accent_color); ?>; opacity: 1; z-index: 0; border-radius: 5px; }
                .vision-hover-demo-block.vision-hover-effect--fill-from-left { position: relative; }
                .vision-hover-demo-block.vision-hover-effect--fill-from-left::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 0; background: <?php echo esc_attr($accent_color); ?>; opacity: 0; transition: width .35s ease, opacity .35s ease; z-index: 0; border-radius: 5px; }
                .vision-hover-demo-block.vision-hover-effect--fill-from-left:hover::before { width: 100%; opacity: 1; }
                .vision-hover-demo-block.vision-hover-effect--fill-from-left h3,
                .vision-hover-demo-block.vision-hover-effect--fill-from-left p { position: relative; z-index: 1; }
                .vision-hover-demo-block.vision-hover-effect--lighten:hover h3,
                .vision-hover-demo-block.vision-hover-effect--lighten:hover p { filter: brightness(1.25); color: var(--vision-demo-hover-text) !important; }
                .vision-hover-demo-block.vision-demo-dark.vision-hover-effect--lighten:hover h3,
                .vision-hover-demo-block.vision-demo-dark.vision-hover-effect--lighten:hover p { filter: brightness(1.4); }
                .vision-hover-demo-block.vision-hover-effect--lighten:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--scale-up:hover h3,
                .vision-hover-demo-block.vision-hover-effect--scale-up:hover p { color: var(--vision-demo-hover-text) !important; }
                .vision-hover-demo-block.vision-hover-effect--scale-up:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--fade-invert:hover h3,
                .vision-hover-demo-block.vision-hover-effect--fade-invert:hover p { color: var(--vision-demo-hover-text) !important; }
                .vision-hover-demo-block.vision-hover-effect--fade-invert:hover { background: var(--vision-demo-hover-bg) !important; }
                .vision-hover-demo-block.vision-hover-effect--soft-highlight:hover h3,
                .vision-hover-demo-block.vision-hover-effect--soft-highlight:hover p { color: var(--vision-demo-hover-text) !important; }
                .vision-hover-demo-block.vision-hover-effect--soft-highlight:hover { background: var(--vision-demo-hover-bg) !important; box-shadow: inset 0 0 0 2px <?php echo esc_attr($accent_color); ?>; }
                </style>
                <div class="vision-hover-demo-blocks" style="max-width: 640px;">
                    <div class="vision-hover-demo-block vision-demo-light vision-hover-effect--<?php echo esc_attr($hover_effect); ?>" data-base-class="vision-demo-light">
                        <h3><?php esc_html_e('Light theme', 'vision'); ?></h3>
                        <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'vision'); ?></p>
                    </div>
                    <div class="vision-hover-demo-block vision-demo-dark vision-hover-effect--<?php echo esc_attr($hover_effect); ?>" data-base-class="vision-demo-dark">
                        <h3><?php esc_html_e('Dark theme', 'vision'); ?></h3>
                        <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'vision'); ?></p>
                    </div>
                    <div class="vision-hover-demo-block vision-demo-white vision-hover-effect--<?php echo esc_attr($hover_effect); ?>" data-base-class="vision-demo-white">
                        <h3><?php esc_html_e('White theme', 'vision'); ?></h3>
                        <p><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 'vision'); ?></p>
                    </div>
                </div>
                <script>
                jQuery(function($) {
                    var $select = $('#vision_block_hover_effect');
                    var $blocks = $('.vision-hover-demo-block');
                    $select.on('change', function() {
                        var effect = $(this).val();
                        var effectClass = 'vision-hover-effect--' + effect;
                        $blocks.each(function() {
                            var $b = $(this);
                            $b.removeClass(function(i, c) { return (c.match(/\bvision-hover-effect--\S+/g) || []).join(' '); });
                            $b.addClass(effectClass);
                        });
                    });
                    function visionUpdateDemoFromInput($input) {
                        var block = $input.data('demo-block');
                        var prop = $input.data('demo-property');
                        var val = $input.val();
                        if (!block || !val) return;
                        var $block = $('.' + block);
                        if (prop === 'bg') { $block.css('background-color', val); } else { $block.css('color', val); $block.find('h3, p').css('color', val); }
                    }
                    $('.vision-theme-color-input').on('change input', function() { visionUpdateDemoFromInput($(this)); });
                });
                </script>
            </div>

            <?php
            $font_tabs = array(
                'eng' => array('lang' => 'en', 'title' => __('English font settings', 'vision')),
                'ukr' => array('lang' => 'uk', 'title' => __('Ukrainian font settings', 'vision')),
                'ara' => array('lang' => 'ar', 'title' => __('Arabic font settings', 'vision')),
            );
            $font_weights = array(100, 200, 300, 400, 500, 600, 700, 800, 900);
            foreach ($font_tabs as $tab_key => $tab_info) :
                $code = $tab_info['lang'];
                $is_active = ($active_tab === $tab_key);
                $base_url = admin_url('options-general.php?page=vision-style-settings&tab=' . $tab_key);
                ?>
            <!-- Tab: <?php echo esc_attr(strtoupper($tab_key)); ?> -->
            <div class="vision-tab-panel" id="vision-tab-<?php echo esc_attr($tab_key); ?>" data-tab="<?php echo esc_attr($tab_key); ?>" style="<?php echo $is_active ? '' : ' display:none;'; ?>">
                <h2 class="title"><?php echo esc_html($tab_info['title']); ?></h2>
                <p class="description"><?php esc_html_e('Size in rem (e.g. 1, 1.5, 2). Block heading applies to elements with class .vision-block-heading.', 'vision'); ?></p>

                <?php if ($is_active) : ?>
                <nav class="nav-tab-wrapper vision-subnav" style="margin:1em 0 0 0; padding:0 0 0 0;" aria-label="<?php esc_attr_e('Desktop / Mobile', 'vision'); ?>">
                    <a href="<?php echo esc_url($base_url . '&subtab=desktop'); ?>" class="nav-tab <?php echo $active_subtab === 'desktop' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Desktop', 'vision'); ?></a>
                    <a href="<?php echo esc_url($base_url . '&subtab=mobile'); ?>" class="nav-tab <?php echo $active_subtab === 'mobile' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Mobile', 'vision'); ?></a>
                </nav>
                <?php endif; ?>

                <?php foreach (array('desktop' => '', 'mobile' => '_mobile') as $sub_key => $suffix) : ?>
                <div class="vision-subtab-panel vision-subtab-<?php echo esc_attr($sub_key); ?>" data-subtab="<?php echo esc_attr($sub_key); ?>" style="<?php echo ($is_active && $active_subtab === $sub_key) ? '' : ' display:none;'; ?>">
                    <h3 class="title" style="margin-top:1em;"><?php echo $sub_key === 'desktop' ? esc_html__('Desktop font settings', 'vision') : esc_html__('Mobile font settings', 'vision'); ?></h3>
                    <table class="form-table" role="presentation">
                        <tr>
                            <th scope="row"><?php esc_html_e('Main font', 'vision'); ?></th>
                            <td>
                                <label><?php esc_html_e('Size', 'vision'); ?></label>
                                <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_main_size<?php echo esc_attr($suffix); ?>]" value="<?php echo esc_attr($opt["font_{$code}_main_size{$suffix}"]); ?>" class="small-text" style="width:5em" /> rem
                                <span style="margin-left:1.5em"></span>
                                <label><?php esc_html_e('Line height', 'vision'); ?></label>
                                <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_main_line_height<?php echo esc_attr($suffix); ?>]" value="<?php echo esc_attr($opt["font_{$code}_main_line_height{$suffix}"]); ?>" class="small-text" style="width:4em" />
                                <span style="margin-left:1.5em"></span>
                                <label><?php esc_html_e('Weight', 'vision'); ?></label>
                                <select name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_main_weight<?php echo esc_attr($suffix); ?>]" style="width:auto">
                                    <?php foreach ($font_weights as $w) : ?>
                                        <option value="<?php echo esc_attr($w); ?>" <?php selected($opt["font_{$code}_main_weight{$suffix}"], (string) $w); ?>><?php echo (int) $w; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Block Heading font', 'vision'); ?></th>
                            <td>
                                <label><?php esc_html_e('Size', 'vision'); ?></label>
                                <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_block_heading_size<?php echo esc_attr($suffix); ?>]" value="<?php echo esc_attr($opt["font_{$code}_block_heading_size{$suffix}"]); ?>" class="small-text" style="width:5em" /> rem
                                <span style="margin-left:1.5em"></span>
                                <label><?php esc_html_e('Line height', 'vision'); ?></label>
                                <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_block_heading_line_height<?php echo esc_attr($suffix); ?>]" value="<?php echo esc_attr($opt["font_{$code}_block_heading_line_height{$suffix}"]); ?>" class="small-text" style="width:4em" />
                                <span style="margin-left:1.5em"></span>
                                <label><?php esc_html_e('Weight', 'vision'); ?></label>
                                <select name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_block_heading_weight<?php echo esc_attr($suffix); ?>]" style="width:auto">
                                    <?php foreach ($font_weights as $w) : ?>
                                        <option value="<?php echo esc_attr($w); ?>" <?php selected($opt["font_{$code}_block_heading_weight{$suffix}"], (string) $w); ?>><?php echo (int) $w; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <?php for ($i = 1; $i <= 6; $i++) : ?>
                        <tr>
                            <th scope="row"><?php echo esc_html(sprintf(__('H%d Heading font', 'vision'), $i)); ?></th>
                            <td>
                                <label><?php esc_html_e('Size', 'vision'); ?></label>
                                <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_h<?php echo $i; ?>_size<?php echo esc_attr($suffix); ?>]" value="<?php echo esc_attr($opt["font_{$code}_h{$i}_size{$suffix}"]); ?>" class="small-text" style="width:5em" /> rem
                                <span style="margin-left:1.5em"></span>
                                <label><?php esc_html_e('Line height', 'vision'); ?></label>
                                <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_h<?php echo $i; ?>_line_height<?php echo esc_attr($suffix); ?>]" value="<?php echo esc_attr($opt["font_{$code}_h{$i}_line_height{$suffix}"]); ?>" class="small-text" style="width:4em" />
                                <span style="margin-left:1.5em"></span>
                                <label><?php esc_html_e('Weight', 'vision'); ?></label>
                                <select name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[font_<?php echo esc_attr($code); ?>_h<?php echo $i; ?>_weight<?php echo esc_attr($suffix); ?>]" style="width:auto">
                                    <?php foreach ($font_weights as $w) : ?>
                                        <option value="<?php echo esc_attr($w); ?>" <?php selected($opt["font_{$code}_h{$i}_weight{$suffix}"], (string) $w); ?>><?php echo (int) $w; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <?php endfor; ?>
                    </table>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>

            <p class="submit"><?php submit_button(__('Save settings', 'vision'), 'primary', 'submit', false); ?></p>
        </form>
    </div>
    <?php
}
