<?php
/**
 * Custom Navigation Walker
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom Walker for Navigation Menu
 */
class Vision_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    /**
     * Start the element output.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
        
        // Check if this is a logo menu item
        $is_logo = (strtolower(trim($title)) === 'logo');

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Only add group classes if it's not a logo item
        if (!$is_logo) {
            $classes[] = 'group about-group';
        }
        
        // Add logo-specific class
        if ($is_logo) {
            $classes[] = 'menu-item-logo';
        }

        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        if ('_blank' === $item->target && empty($item->xfn)) {
            $atts['rel'] = 'noopener noreferrer';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href'] = !empty($item->url) ? $item->url : '';
        
        // Different classes for logo vs regular menu items
        if ($is_logo) {
            $atts['class'] = 'max-w-fit';
        } else {
            $atts['class'] = 'uppercase text-sm font-normal leading-8 text-gray-900 nav-link';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        
        // Check if this menu item is the logo (title = "Logo")
        if ($is_logo) {
            // Display logo image instead of text
            $logo_url = vision_get_logo_url();
            $logo_alt = vision_get_logo_alt();
            $item_output .= '<span class="sr-only">' . esc_html(get_bloginfo('name')) . '</span>';
            $item_output .= '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr($logo_alt) . '"';
            $item_output .= ' class="lg:-left-[45px] xl:-left-[15px] max-w-[170px] md:max-w-[200px] relative lg:max-w-[200px] xl:max-w-[200px]"';
            $item_output .= ' width="200" height="auto" loading="eager" />';
        } else {
            // Display normal menu item text
            $item_output .= (isset($args->link_before) ? $args->link_before : '') . $title . (isset($args->link_after) ? $args->link_after : '');
        }
        
        $item_output .= '</a>';
        
        // Add dropdown menu if has children (but not for logo items)
        if (in_array('menu-item-has-children', $classes) && !$is_logo) {
            $item_output .= '<div class="hidden mx-auto w-screen group-hover:block absolute z-50 pt-[25px] inset-x-0 transform hover-nav">';
            $item_output .= '<div class="bg-light-blue text-dark-blue from-dark-blue-300 to-dark-blue-500">';
            $item_output .= '<div class="grid gap-0 grid-cols-3">';
            $item_output .= '<div class="px-20 py-20 flex flex-col justify-center global-reach-nav">';
            $item_output .= '<div>';
            $item_output .= '<h5 class="uppercase mb-5 block text-2xl">' . esc_html($title) . '</h5>';
            $item_output .= '<p class="mb-5 text-lg">' . esc_html($item->description) . '</p>';
            $item_output .= '<a href="' . esc_url($item->url) . '" class="text-lg uppercase group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto link-underline-animation after:bg-bright-blue">';
            $item_output .= '<span class="text-white block pb-1">' . esc_html__('Find out more', 'vision') . '</span>';
            $item_output .= '</a>';
            $item_output .= '</div>';
            $item_output .= '</div>';
            $item_output .= '</div>';
            $item_output .= '</div>';
            $item_output .= '</div>';
        }
        
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
