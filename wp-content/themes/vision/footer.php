<?php
$vision_opt = function_exists('vision_get_style_settings') ? vision_get_style_settings() : array();
$contact_form_shortcode = isset($vision_opt['contact_form_shortcode']) && $vision_opt['contact_form_shortcode'] !== '' ? $vision_opt['contact_form_shortcode'] : '[contact-form-7 id="8a5b653" title="Contact form - Contact US"]';
$contact_form_bg = isset($vision_opt['contact_form_bg_color']) ? esc_attr($vision_opt['contact_form_bg_color']) : '#00012E';
$contact_form_img_id = isset($vision_opt['contact_form_image']) ? (int) $vision_opt['contact_form_image'] : 0;
$contact_form_img_url = $contact_form_img_id ? wp_get_attachment_image_url($contact_form_img_id, 'full') : get_template_directory_uri() . '/assets/contact_us.jpg';
?>
<footer class="bg-white pb-8 md-pb-0 relative" aria-labelledby="footer-heading">
    <div class="w-full relative contact" id="contact">
        <div class="mx-auto md:grid grid-cols-2 overflow-hidden gap-0">
            <div class="hidden md:block bg-white relative contact-background" style="background-image: url('<?php echo esc_url($contact_form_img_url); ?>');">

            </div>
            <div class="bg-dark-blue" style="background-color: <?php echo $contact_form_bg; ?>;">
                <div class="form-group">
                    <?php
                    if (have_rows('langing_page') && !is_page('events')):
                        while (have_rows('langing_page')): the_row();
                            if (get_row_layout() == 'Register_Block'):
                                $eventContact = get_sub_field('contact_form_short_code');
                            endif;
                        endwhile;
                    endif;

                    if (isset($eventContact)) :
                        echo do_shortcode($eventContact);
                    else :
                        echo do_shortcode($contact_form_shortcode);
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER BOTTOM! -->
    <div class="mx-auto md:px-6 md:py-8 lg:px-20 ">
        <div class="footer-bottom">
            <div class="social">
                <div class="flex social-icons">
                    <?php renderSocial('dark', 20, ['linkedin', 'instagram', 'facebook', 'youtube']); ?>
                </div>
            </div>
            <?php
            $footer_logo_url = vision_get_footer_logo_url();
            if ($footer_logo_url) : ?>
                <div class="footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>" ><img src="<?php echo esc_url($footer_logo_url); ?>" alt="Vision Business Development"></a>
                    <?php
                    if (has_nav_menu('footer')) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container' => false,
                            'menu_class' => 'footer-menu',
                            'fallback_cb' => false,
                        ));
                    }
                    ?>
                </div>
            <?php endif; ?>

            <div class="copyright">
                <div class="flex social-icons">
                    <?php renderSocial('dark', 20, ['linkedin', 'instagram', 'facebook', 'youtube']); ?>
                </div>
                <span class="">©2026 Vision Business Development</span>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>
</html>