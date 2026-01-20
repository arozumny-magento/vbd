<footer class="bg-dark-blue-500 pb-8 md-pb-0 relative" aria-labelledby="footer-heading">
    <div class="w-full relative" id="contact">
        <div class="mx-auto md:grid grid-cols-2 overflow-hidden gap-0">
            <div class="hidden md:block bg-white relative" style="max-height: 600px;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/pexels-olly.jpg" alt="" class="w-full h-full object-cover">
                <div class="absolute bottom-[1px] w-full h-2 z-30 aos-init aos-animate" data-aos="fade-in" data-aos-delay="300">
                    <svg version="1.1" id="line_2" class="rotate-180" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="10" xml:space="preserve">
                                    <path class="path2" fill="#f0f7ff" stroke-width="14" stroke="#f0f7ff" d="M0 0 l1120 0"></path>
                                </svg>
                </div>
            </div>
            <div class="bg-dark-blue">
                <div class="form-group">
                    <div class="title-default">
                        <h2>CONTACT US</h2>
                    </div>

                    <?php echo do_shortcode('[contact-form-7 id="8a5b653" title="Contact form - Contact US"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER BOTTOM! -->
    <div class="mx-auto md:px-6 md:py-8 lg:px-20 border-t border-bright-blue">
        <div class="footer-bottom">
            <div class="social">
                <div class="flex">
                    <?php
                    $social_links = vision_get_social_links();
                    foreach ($social_links as $key => $social) :
                    ?>
                        <a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer"
                           class="text-white hover:text-bright-blue">
                            <span class="sr-only"><?php echo esc_html($social['label']); ?></span>
                            <?php if ($key === 'linkedin') : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.15" height="20.105" viewBox="0 0 20.15 20.105">
                                    <g transform="translate(0 -0.341)">
                                        <path d="M9.3,99.73H5.252a.325.325,0,0,0-.325.325v13a.325.325,0,0,0,.325.325H9.3a.325.325,0,0,0,.325-.325v-13A.325.325,0,0,0,9.3,99.73Z" transform="translate(-4.607 -92.929)" fill="currentColor"></path>
                                        <path d="M2.669.341A2.667,2.667,0,1,0,5.336,3.007,2.671,2.671,0,0,0,2.669.341Z" fill="currentColor"></path>
                                        <path d="M114.254,94.761a4.751,4.751,0,0,0-3.554,1.492v-.844a.325.325,0,0,0-.325-.325H106.5a.325.325,0,0,0-.325.325v13a.325.325,0,0,0,.325.325h4.036a.325.325,0,0,0,.325-.325v-6.43c0-2.167.589-3.011,2.1-3.011,1.645,0,1.776,1.353,1.776,3.122V108.4a.325.325,0,0,0,.325.325H119.1a.325.325,0,0,0,.325-.325v-7.128C119.424,98.054,118.81,94.761,114.254,94.761Z" transform="translate(-99.275 -88.283)" fill="currentColor"></path>
                                    </g>
                                </svg>
                            <?php elseif ($key === 'instagram') : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            <?php elseif ($key === 'facebook') : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                                </svg>
                            <?php elseif ($key === 'youtube') : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path>
                                </svg>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <ul class="footer-menu">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Resources</a></li>
                    <li><a href="#">Partners</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" ><img src="<?php echo get_template_directory_uri(); ?>/assets/vision_logo_white.svg" alt="Vision Business Development"></a>
            </div>

            <div class="copyright">
                <span class="">©2026 Vision Business Development</span>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>
</html>