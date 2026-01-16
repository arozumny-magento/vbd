<?php
/**
 * Mobile Menu Template Part
 * Based on Trident Trust mobile menu style
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div 
    x-data="{ open: false }"
    @toggle-mobile-menu.window="open = !open"
    x-show="open"
    x-cloak
    data-region="global" 
    class="regional-menu mobile-menu hidden xl:hidden bg-dark-blue" 
    role="dialog"
    aria-modal="true"
    id="mobile-menu"
    style="display: none;"
>
    <div class="absolute top-16 lg:top-20 inset-0 z-50 min-h-fit overflow-y-auto px-0 py-0 w-full h-screen bg-dark-blue">
        <div class="flow-root">
            <div>
                <!-- Language Switcher -->
                <div class="flex border-b border-[#343A61] lg:px-6 xl:px-0 px-6 py-4">
                    <?php get_template_part('template-parts/header/language-switcher'); ?>
                </div>
                
                <!-- Log in Link -->
                <div class="flex border-b border-[#343A61] lg:px-6 xl:px-0">
                    <a 
                        href="<?php echo esc_url(home_url('/client-login')); ?>"
                        class="text-white uppercase py-4 px-6 flex justify-between items-center hover:text-bright-blue-500 w-full"
                    >
                        <svg id="Group_1127" data-name="Group 1127" xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5" aria-hidden="true">
                            <g id="Ellipse_330" data-name="Ellipse 330" transform="translate(0 0)" fill="none" stroke="#fff" stroke-width="1">
                                <circle cx="13.75" cy="13.75" r="13.75" stroke="none"></circle>
                                <circle cx="13.75" cy="13.75" r="13.25" fill="none"></circle>
                            </g>
                            <g id="Group_1126" data-name="Group 1126" transform="translate(5.201 5.946)">
                                <g id="Ellipse_331" data-name="Ellipse 331" transform="translate(3.845)" fill="none" stroke="#fff" stroke-width="1.5">
                                    <circle cx="4.459" cy="4.459" r="4.459" stroke="none"></circle>
                                    <circle cx="4.459" cy="4.459" r="3.959" fill="none"></circle>
                                </g>
                                <g id="Path_661" data-name="Path 661" transform="translate(0 8.547)" fill="none">
                                    <path d="M8.306,0c4.587,0,8.306,2.329,8.306,5.2S0,8.076,0,5.2,3.719,0,8.306,0Z" stroke="none"></path>
                                    <path d="M 8.305598258972168 0.999997615814209 C 4.390997886657715 0.999997615814209 1.07685375213623 2.880799293518066 1.001312255859375 5.124534606933594 C 1.150360107421875 5.280086517333984 1.76099681854248 5.648135185241699 3.29489803314209 5.944828033447266 C 4.67145824432373 6.211087703704834 6.450958251953125 6.357728004455566 8.305598258972168 6.357728004455566 C 10.16023826599121 6.357728004455566 11.93973827362061 6.211087703704834 13.31629848480225 5.944828033447266 C 14.85019874572754 5.648135185241699 15.46083641052246 5.280086517333984 15.60988426208496 5.124534606933594 C 15.53434276580811 2.880799293518066 12.2201976776123 0.999997615814209 8.305598258972168 0.999997615814209 M 8.305598258972168 -1.9073486328125e-06 C 12.89265823364258 -1.9073486328125e-06 16.61119842529297 2.329327583312988 16.61119842529297 5.20269775390625 C 16.61119842529297 8.076077461242676 -1.9073486328125e-06 8.076078414916992 -1.9073486328125e-06 5.20269775390625 C -1.9073486328125e-06 2.329327583312988 3.718547821044922 -1.9073486328125e-06 8.305598258972168 -1.9073486328125e-06 Z" stroke="none" fill="#fff"></path>
                                </g>
                            </g>
                        </svg>
                        <span class="pl-3"><?php esc_html_e('Log in', 'vision'); ?></span>
                    </a>
                </div>
                
                <!-- Navigation Menu -->
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
