<?php
/**
 * The footer template file
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Fires before the footer element
 *
 * @since 1.0.0
 */
do_action('vision_before_footer');
?>

<footer id="colophon" class="site-footer bg-dark-blue-500 pb-8 md-pb-0 relative" role="contentinfo" aria-labelledby="footer-heading">
    <div class="w-full relative" id="contact">
        <div class="mx-auto md:grid grid-cols-2 overflow-hidden gap-0">
            <div class="hidden md:block bg-white relative" style="max-height: 600px;">
                <?php
                $footer_image = get_template_directory_uri() . '/assets/pexels-olly.jpg';
                $footer_image = apply_filters('vision_footer_image', $footer_image);
                ?>
                <img 
                    src="<?php echo esc_url($footer_image); ?>" 
                    alt="<?php esc_attr_e('Footer image', 'vision'); ?>" 
                    class="w-full h-full object-cover"
                    loading="lazy"
                >
                <div class="absolute bottom-[1px] w-full h-2 z-30 aos-init aos-animate" data-aos="fade-in" data-aos-delay="300">
                    <svg version="1.1" id="line_2" class="rotate-180" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="10" xml:space="preserve" aria-hidden="true">
                        <path class="path2" fill="#f0f7ff" stroke-width="14" stroke="#f0f7ff" d="M0 0 l1120 0"></path>
                    </svg>
                </div>
            </div>
            <div class="bg-dark-blue">
                <div class="form-group">
                    <div class="title-default">
                        <h2 id="footer-heading"><?php esc_html_e('CONTACT US', 'vision'); ?></h2>
                    </div>
                    <?php
                    /**
                     * Contact form area
                     * 
                     * @since 1.0.0
                     */
                    do_action('vision_footer_contact_form');
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="mx-auto md:px-6 md:py-8 lg:px-20 border-t border-bright-blue">
        <div class="footer-bottom">
            <div class="social">
                <div class="flex">
                    <?php
                    $social_links = vision_get_social_links();
                    foreach ($social_links as $platform => $social) :
                        if (empty($social['url'])) {
                            continue;
                        }
                        ?>
                        <a 
                            href="<?php echo esc_url($social['url']); ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-white hover:text-bright-blue"
                            aria-label="<?php echo esc_attr($social['label']); ?>"
                        >
                            <span class="sr-only"><?php echo esc_html($social['label']); ?></span>
                            <?php
                            /**
                             * Social media icon
                             * 
                             * @param string $platform Platform name
                             * @param array  $social   Social link data
                             * 
                             * @since 1.0.0
                             */
                            do_action('vision_social_icon', $platform, $social);
                            ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                
                <?php
                /**
                 * Footer Menu
                 */
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'footer-menu',
                        'fallback_cb' => false,
                        'depth' => 1,
                    ));
                } else {
                    // Fallback menu
                    ?>
                    <ul class="footer-menu">
                        <li><a href="<?php echo esc_url(home_url('/about-us')); ?>"><?php esc_html_e('About Us', 'vision'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/services')); ?>"><?php esc_html_e('Services', 'vision'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/knowledge')); ?>"><?php esc_html_e('Resources', 'vision'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/#partners')); ?>"><?php esc_html_e('Partners', 'vision'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'vision'); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
            
            <div class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php
                    $footer_logo = get_template_directory_uri() . '/assets/vision_logo_white.svg';
                    $footer_logo = apply_filters('vision_footer_logo', $footer_logo);
                    ?>
                    <img 
                        src="<?php echo esc_url($footer_logo); ?>" 
                        alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                        width="150"
                        height="auto"
                        loading="lazy"
                    >
                </a>
            </div>

            <div class="copyright">
                <span><?php echo esc_html(vision_get_copyright()); ?></span>
            </div>
        </div>
    </div>
</footer>

<?php
/**
 * Fires after the footer element
 *
 * @since 1.0.0
 */
do_action('vision_after_footer');

wp_footer();
?>
</body>
</html>
