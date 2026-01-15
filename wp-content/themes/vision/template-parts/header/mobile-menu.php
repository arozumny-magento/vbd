<?php
/**
 * Mobile Menu Template Part
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div 
    data-region="global" 
    class="regional-menu mobile-menu hidden xl:hidden bg-dark-blue" 
    role="dialog"
    aria-modal="true"
    id="mobile-menu"
>
    <div class="absolute top-16 lg:top-20 inset-0 z-50 min-h-fit overflow-y-auto px-0 py-0 w-full h-screen bg-dark-blue">
        <div class="flow-root">
            <div>
                <div class="flex border-b border-[#343A61] lg:px-6 xl:px-0">
                    <a 
                        href="<?php echo esc_url(home_url('/client-login')); ?>"
                        class="text-white uppercase py-4 px-6 flex justify-between items-center hover:text-bright-blue-500"
                    >
                        <?php
                        /**
                         * Login icon SVG
                         * 
                         * @since 1.0.0
                         */
                        do_action('vision_login_icon');
                        ?>
                        <span class="pl-3"><?php esc_html_e('Log in', 'vision'); ?></span>
                    </a>
                </div>
                <div>
                    <?php
                    /**
                     * Mobile navigation menu
                     * 
                     * @since 1.0.0
                     */
                    if (has_nav_menu('mobile')) {
                        wp_nav_menu(array(
                            'theme_location' => 'mobile',
                            'container' => false,
                            'menu_class' => 'mobile-nav-menu',
                            'fallback_cb' => false,
                        ));
                    } else {
                        // Fallback mobile menu
                        get_template_part('template-parts/header/mobile-menu-fallback');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
