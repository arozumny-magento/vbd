<?php
/**
 * The header template file
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class('pt-16 md:pt-24 lg:pt-20 home global'); ?> data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0">
    <?php
    /**
     * Fires before the header element
     *
     * @since 1.0.0
     */
    do_action('vision_before_header');
    ?>

    <header id="masthead" class="site-header fixed inset-x-0 top-0 z-50 border-b border-solid border-slate-200 bg-white" role="banner">
        <nav class="mx-auto px-6 pb-0 lg:px-20 bg-white" aria-label="<?php esc_attr_e('Main navigation', 'vision'); ?>">
            <div class="flex justify-between">
                <div class="py-1 lg:py-3 xl:py-5 bg-white flex justify-between items-center w-full xl:w-fit">
                    <?php get_template_part('template-parts/header/site-logo'); ?>

                    <div class="xl:hidden flex items-center gap-2 md:gap-6 w-fit">
                        <div class="block">
                            <div class="flex flex-row gap-2 md:gap-6 justify-between items-center relative">
                                <?php get_template_part('template-parts/header/language-switcher'); ?>
                            </div>
                        </div>
                        <button 
                            type="button"
                            class="inline-flex items-center justify-center rounded-md p-2.5 text-dark-blue nav-toggler mt-0"
                            aria-label="<?php esc_attr_e('Toggle mobile menu', 'vision'); ?>"
                            aria-expanded="false"
                            aria-controls="mobile-menu"
                            data-culture="<?php echo esc_attr(vision_get_current_language()); ?>" 
                            data-region="global"
                        >
                            <span class="sr-only"><?php esc_html_e('Open main menu', 'vision'); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="41.557" height="16" viewBox="0 0 41.557 16" class="h-10 w-10" aria-hidden="true">
                                <line class="line1" id="Line_389" data-name="Line 389" x2="39.557" transform="translate(1 1)" fill="none" stroke="#00012E" stroke-linecap="round" stroke-width="2"></line>
                                <line class="line2" id="Line_390" data-name="Line 390" x2="39.557" transform="translate(1 8)" fill="none" stroke="#00012E" stroke-linecap="round" stroke-width="2"></line>
                                <line class="line3" id="Line_391" data-name="Line 391" x2="39.557" transform="translate(1 15)" fill="none" stroke="#00012E" stroke-linecap="round" stroke-width="2"></line>
                            </svg>
                        </button>
                    </div>
                </div>

                <?php
                /**
                 * Desktop Navigation
                 * 
                 * @since 1.0.0
                 */
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'hidden xl:py-6 lg:px-8 bg-white border-r border-slate-200 xl:flex items-center justify-end w-full xl:gap-8',
                        'fallback_cb' => false,
                        'walker' => new Vision_Walker_Nav_Menu(),
                    ));
                } else {
                    // Fallback navigation if menu not set
                    get_template_part('template-parts/header/navigation-fallback');
                }
                ?>

                <div class="global bg-white hidden lg:py-6 relative xl:flex xl:items-center xl:justify-evenly xl:gap-10 xl:px-6 2xl:px-20">
                    <div class="flex flex-row gap-2 md:gap-6 justify-between items-center relative">
                        <?php get_template_part('template-parts/header/language-switcher'); ?>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        /**
         * Mobile Menu
         */
        get_template_part('template-parts/header/mobile-menu');
        ?>
    </header>

    <?php
    /**
     * Fires after the header element
     *
     * @since 1.0.0
     */
    do_action('vision_after_header');
    ?>
