<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class('body-padding-top home global'); ?> data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0">
    <?php wp_body_open(); ?>

<header class="top-header admin-bar-offset">
    <div class="header-social">
        <a class="mobile-logo" href="/">
            <img src="<?= vision_get_logo_url() ?>" alt="<?= vision_get_logo_alt()?> " title="<?= esc_html(get_bloginfo('name')) ?>"/>
        </a>
        <div class="flex justify-center gap-4 social-links">
            <?php
            $social_links = vision_get_social_links();
            foreach ($social_links as $key => $social) :
                if ($key !== 'instagram' && $key !== 'youtube')
                    continue;
            ?>
                <a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer"
                   class="header-social-link">
                    <span class="sr-only"><?php echo esc_html($social['label']); ?></span>
                    <?php if ($key === 'instagram') : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><path d="M10.202,2.098c-1.49,.07-2.507,.308-3.396,.657-.92,.359-1.7,.84-2.477,1.619-.776,.779-1.254,1.56-1.61,2.481-.345,.891-.578,1.909-.644,3.4-.066,1.49-.08,1.97-.073,5.771s.024,4.278,.096,5.772c.071,1.489,.308,2.506,.657,3.396,.359,.92,.84,1.7,1.619,2.477,.779,.776,1.559,1.253,2.483,1.61,.89,.344,1.909,.579,3.399,.644,1.49,.065,1.97,.08,5.771,.073,3.801-.007,4.279-.024,5.773-.095s2.505-.309,3.395-.657c.92-.36,1.701-.84,2.477-1.62s1.254-1.561,1.609-2.483c.345-.89,.579-1.909,.644-3.398,.065-1.494,.081-1.971,.073-5.773s-.024-4.278-.095-5.771-.308-2.507-.657-3.397c-.36-.92-.84-1.7-1.619-2.477s-1.561-1.254-2.483-1.609c-.891-.345-1.909-.58-3.399-.644s-1.97-.081-5.772-.074-4.278,.024-5.771,.096m.164,25.309c-1.365-.059-2.106-.286-2.6-.476-.654-.252-1.12-.557-1.612-1.044s-.795-.955-1.05-1.608c-.192-.494-.423-1.234-.487-2.599-.069-1.475-.084-1.918-.092-5.656s.006-4.18,.071-5.656c.058-1.364,.286-2.106,.476-2.6,.252-.655,.556-1.12,1.044-1.612s.955-.795,1.608-1.05c.493-.193,1.234-.422,2.598-.487,1.476-.07,1.919-.084,5.656-.092,3.737-.008,4.181,.006,5.658,.071,1.364,.059,2.106,.285,2.599,.476,.654,.252,1.12,.555,1.612,1.044s.795,.954,1.051,1.609c.193,.492,.422,1.232,.486,2.597,.07,1.476,.086,1.919,.093,5.656,.007,3.737-.006,4.181-.071,5.656-.06,1.365-.286,2.106-.476,2.601-.252,.654-.556,1.12-1.045,1.612s-.955,.795-1.608,1.05c-.493,.192-1.234,.422-2.597,.487-1.476,.069-1.919,.084-5.657,.092s-4.18-.007-5.656-.071M21.779,8.517c.002,.928,.755,1.679,1.683,1.677s1.679-.755,1.677-1.683c-.002-.928-.755-1.679-1.683-1.677,0,0,0,0,0,0-.928,.002-1.678,.755-1.677,1.683m-12.967,7.496c.008,3.97,3.232,7.182,7.202,7.174s7.183-3.232,7.176-7.202c-.008-3.97-3.233-7.183-7.203-7.175s-7.182,3.233-7.174,7.203m2.522-.005c-.005-2.577,2.08-4.671,4.658-4.676,2.577-.005,4.671,2.08,4.676,4.658,.005,2.577-2.08,4.671-4.658,4.676-2.577,.005-4.671-2.079-4.676-4.656h0"></path></svg>
                    <?php elseif ($key === 'youtube') : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><path d="M31.331,8.248c-.368-1.386-1.452-2.477-2.829-2.848-2.496-.673-12.502-.673-12.502-.673,0,0-10.007,0-12.502,.673-1.377,.37-2.461,1.462-2.829,2.848-.669,2.512-.669,7.752-.669,7.752,0,0,0,5.241,.669,7.752,.368,1.386,1.452,2.477,2.829,2.847,2.496,.673,12.502,.673,12.502,.673,0,0,10.007,0,12.502-.673,1.377-.37,2.461-1.462,2.829-2.847,.669-2.512,.669-7.752,.669-7.752,0,0,0-5.24-.669-7.752ZM12.727,20.758V11.242l8.364,4.758-8.364,4.758Z"></path></svg>
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <nav class="" aria-label="Global">
            <?php
            /**
             * Desktop Navigation
             * Uses WordPress menu system with Max Mega Menu support
             * 
             * @since 1.0.0
             */
            if (has_nav_menu('primary')) {
                // Check if Max Mega Menu is enabled
                $mega_menu_enabled = function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary');
                
                $menu_args = array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'hidden xl:py-6 lg:px-8 bg-white border-r border-slate-200 xl:flex items-center justify-around w-full xl:gap-8',
                    'fallback_cb' => false,
                );
                
                // Only use custom walker if Max Mega Menu is not enabled
                if (!$mega_menu_enabled) {
                    $menu_args['walker'] = new Vision_Walker_Nav_Menu();
                } else {
                    // Apply same classes to Max Mega Menu via filters
                    add_filter('megamenu_nav_menu_args', function($args, $menu_id, $location) use ($menu_args) {
                        // Apply the same menu_class
                        if (isset($menu_args['menu_class'])) {
                            $args['menu_class'] = $menu_args['menu_class'] . ' ' . (isset($args['menu_class']) ? $args['menu_class'] : '');
                        }
                        return $args;
                    }, 10, 3);
                    
                    // Add group and about-group classes to menu items (same as walker)
                    add_filter('megamenu_nav_menu_css_class', function($classes, $item, $args) {
                        $title = strtolower(trim($item->title));
                        // Add group classes except for logo items
                        if ($title !== 'logo') {
                            $classes[] = 'group';
                            $classes[] = 'about-group';
                        } else {
                            $classes[] = 'menu-item-logo';
                        }
                        return $classes;
                    }, 10, 3);
                    
                    // Add nav-link class and typography classes to links (same as walker)
                    add_filter('megamenu_nav_menu_link_attributes', function($atts, $item, $args) {
                        $title = strtolower(trim($item->title));
                        if ($title === 'logo') {
                            // Logo item - same classes as walker
                            if (isset($atts['class'])) {
                                $atts['class'] .= ' max-w-fit';
                            } else {
                                $atts['class'] = 'max-w-fit';
                            }
                        } else {
                            // Regular menu item - same classes as walker
                            if (isset($atts['class'])) {
                                $atts['class'] .= ' uppercase text-sm font-normal leading-8 text-gray-900 nav-link';
                            } else {
                                $atts['class'] = 'uppercase text-sm font-normal leading-8 text-gray-900 nav-link';
                            }
                        }
                        return $atts;
                    }, 10, 3);
                    
                    // Replace logo menu item title with logo image for Max Mega Menu
                    add_filter('megamenu_the_title', function($title, $item_id) {
                        // Check if this is a logo menu item
                        if (strtolower(trim($title)) === 'logo') {
                            // Replace title with logo image
                            $logo_url = vision_get_logo_url();
                            $logo_alt = vision_get_logo_alt();
                            $title = '<span class="sr-only">' . esc_html(get_bloginfo('name')) . '</span>';
                            $title .= '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr($logo_alt) . '"';
                            $title .= ' class="relative logo"';
                            $title .= ' width="auto" height="auto" loading="eager" />';
                        }
                        return $title;
                    }, 10, 2);
                }
                
                wp_nav_menu($menu_args);
            } else {
                // Fallback navigation if menu not set
                get_template_part('template-parts/header/navigation-fallback');
            }
            ?>
    </nav>
    <div class="language-switcher">
        <div class="flex flex-row gap-2 md:gap-6 justify-between items-center">
            <?php get_template_part('template-parts/header/language-switcher'); ?>
        </div>
    </div>
</header>
