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
                                    <?php
        $header_logo_url = vision_get_header_logo_url();
        if ($header_logo_url) : ?>
        <a class="mobile-logo" href="/">
            <img src="<?= esc_url($header_logo_url) ?>" alt="<?= vision_get_logo_alt()?> " title="<?= esc_html(get_bloginfo('name')) ?>"/>
        </a>
        <?php endif; ?>
        <div class="flex justify-center gap-4 social-links">
            <?php renderSocial('dark', 20, ['linkedin', 'youtube'], 'header-social-link'); ?>
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
                            $logo_url = vision_get_header_logo_url();
                            if ($logo_url) {
                                $logo_alt = vision_get_logo_alt();
                                $title = '<span class="sr-only">' . esc_html(get_bloginfo('name')) . '</span>';
                                $title .= '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr($logo_alt) . '"';
                                $title .= ' class="relative logo"';
                                $title .= ' width="auto" height="auto" loading="eager" />';
                            } else {
                                // If no logo, return empty string to hide the menu item
                                $title = '';
                            }
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

    <!-- Hidden template for mega menu social icons (mobile only) -->
    <div id="mega-menu-social-template" style="display: none;">
        <?php renderSocial('dark', 24, ['linkedin', 'instagram', 'facebook', 'youtube'], 'mega-menu-social-link'); ?>
                        </div>

    <div class="language-switcher">
        <div class="flex flex-row gap-2 md:gap-6 justify-between items-center">
            <?php get_template_part('template-parts/header/language-switcher'); ?>
        </div>
    </div>
</header>
