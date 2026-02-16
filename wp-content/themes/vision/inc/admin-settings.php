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
    ));
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

    $active_tab = isset($_GET['tab']) ? sanitize_key($_GET['tab']) : 'general';
    if (!in_array($active_tab, array('general', 'eng', 'ukr', 'ara'), true)) {
        $active_tab = 'general';
    }
    $active_subtab = (isset($_GET['subtab']) && $_GET['subtab'] === 'mobile') ? 'mobile' : 'desktop';

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_add_inline_script('wp-color-picker', 'jQuery(function($){ $(".vision-color-picker").wpColorPicker(); });');
    ?>
    <div class="wrap vision-settings-wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

        <nav class="nav-tab-wrapper vision-nav-tabs" aria-label="<?php esc_attr_e('Secondary menu', 'vision'); ?>">
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=general')); ?>" class="nav-tab <?php echo $active_tab === 'general' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('General', 'vision'); ?></a>
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=eng')); ?>" class="nav-tab <?php echo $active_tab === 'eng' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('ENG', 'vision'); ?></a>
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=ukr')); ?>" class="nav-tab <?php echo $active_tab === 'ukr' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('UKR', 'vision'); ?></a>
            <a href="<?php echo esc_url(admin_url('options-general.php?page=vision-style-settings&tab=ara')); ?>" class="nav-tab <?php echo $active_tab === 'ara' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('ARA', 'vision'); ?></a>
        </nav>

        <form action="options.php" method="post" id="vision-style-settings-form">
            <?php settings_fields('vision_style_settings_group'); ?>

            <!-- Tab: General -->
            <div class="vision-tab-panel" id="vision-tab-general" data-tab="general" style="<?php echo $active_tab !== 'general' ? ' display:none;' : ''; ?>">
                <h2 class="title"><?php esc_html_e('Logos', 'vision'); ?></h2>
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
                </table>

                <h2 class="title"><?php esc_html_e('Social links', 'vision'); ?></h2>
                <table class="form-table" role="presentation">
                    <?php
                    $socials = array(
                        'social_instagram' => __('Instagram URL', 'vision'),
                        'social_youtube'   => __('YouTube URL', 'vision'),
                        'social_linkedin' => __('LinkedIn URL', 'vision'),
                        'social_facebook' => __('Facebook URL', 'vision'),
                    );
                    foreach ($socials as $key => $label) :
                        ?>
                        <tr>
                            <th scope="row"><label for="vision_<?php echo esc_attr($key); ?>"><?php echo esc_html($label); ?></label></th>
                            <td><input type="url" id="vision_<?php echo esc_attr($key); ?>" name="<?php echo esc_attr(VISION_SETTINGS_OPTION . '[' . $key . ']'); ?>" value="<?php echo esc_attr($opt[$key]); ?>" class="regular-text" placeholder="https://" /></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <h2 class="title"><?php esc_html_e('Styles', 'vision'); ?></h2>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><?php esc_html_e('Main website color', 'vision'); ?></th>
                        <td>
                            <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[main_website_color]" value="<?php echo esc_attr($opt['main_website_color']); ?>" class="vision-color-picker" data-default-color="#00012E" />
                            <p class="description"><?php esc_html_e('Primary brand color (e.g. text, backgrounds).', 'vision'); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Accent color', 'vision'); ?></th>
                        <td>
                            <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[main_color]" value="<?php echo esc_attr($opt['main_color']); ?>" class="vision-color-picker" data-default-color="#d0b135" />
                            <p class="description"><?php esc_html_e('Gold/accent for links, buttons, highlights.', 'vision'); ?></p>
                        </td>
                    </tr>
                </table>

                <h3><?php esc_html_e('Block theme presets (background &amp; text)', 'vision'); ?></h3>
                <p class="description"><?php esc_html_e('Each block can use one of these presets (white, light, or dark) via its own settings. The main page style stays the same.', 'vision'); ?></p>
                <table class="form-table" role="presentation">
                    <tr>
                        <th scope="row"><?php esc_html_e('White preset', 'vision'); ?></th>
                        <td>
                            <label><?php esc_html_e('Block background', 'vision'); ?></label> <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_white_bg]" value="<?php echo esc_attr($opt['theme_white_bg']); ?>" class="vision-color-picker" />
                            <label style="margin-left:1em"><?php esc_html_e('Text', 'vision'); ?></label> <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_white_text]" value="<?php echo esc_attr($opt['theme_white_text']); ?>" class="vision-color-picker" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Light preset', 'vision'); ?></th>
                        <td>
                            <label><?php esc_html_e('Block background', 'vision'); ?></label> <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_light_bg]" value="<?php echo esc_attr($opt['theme_light_bg']); ?>" class="vision-color-picker" />
                            <label style="margin-left:1em"><?php esc_html_e('Text', 'vision'); ?></label> <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_light_text]" value="<?php echo esc_attr($opt['theme_light_text']); ?>" class="vision-color-picker" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php esc_html_e('Dark preset', 'vision'); ?></th>
                        <td>
                            <label><?php esc_html_e('Block background', 'vision'); ?></label> <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_dark_bg]" value="<?php echo esc_attr($opt['theme_dark_bg']); ?>" class="vision-color-picker" />
                            <label style="margin-left:1em"><?php esc_html_e('Text', 'vision'); ?></label> <input type="text" name="<?php echo esc_attr(VISION_SETTINGS_OPTION); ?>[theme_dark_text]" value="<?php echo esc_attr($opt['theme_dark_text']); ?>" class="vision-color-picker" />
                        </td>
                    </tr>
                </table>
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
