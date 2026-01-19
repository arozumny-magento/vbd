<?php
/**
 * Template Name: Vision Home
 */

get_header();
?>

<main>
    <div class="umb-block-list">
        <section class="hero">
            <div class="relative isolate overflow-hidden bg-white">
                <div class="mx-auto max-w-7xl px-4 py-4 lg:py-10 lg:px-20 lg:pb-10">
                    <div class="mx-auto max-w-7xl text-center">
                        <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="100"><h1 class="text-xl lg:text-4xl"></h1>
                            <h1><?php the_field('main_slogan') ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="flex aspect-16/9 w-full media hero-banner-block">
            <?php
                $heroBanner = get_field('hero_banner');
            ?>
            <?php if (isVideo($heroBanner)) :?>
                    <video autoplay="true" loop="true" muted="true" class="w-auto min-w-full min-h-full max-w-none">
                        <source src="<?php echo get_template_directory_uri(); ?>/assets/hero_banner_1920x600_web2.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
            <?php else: ?>
            <img src="<?php the_field('hero_banner') ?>" />
            <?php endif; ?>
        </div>

        <div class="w-full relative content-grid EN">
            <div class="mx-auto md:grid grid-cols-2 gap-0 services">
                    <?php 
                    if (have_rows('services')): 
                        while (have_rows('services')) : the_row();
                            
                            // Get the left_block group as an array
                            $left_block = get_sub_field('left_block');
                            if ($left_block):
                                $leftBlockTheme = isset($left_block['block_theme']) ? strtolower($left_block['block_theme']) : '';
                                $leftHeader = isset($left_block['header']) ? $left_block['header'] : '';
                                $leftText = isset($left_block['text']) ? $left_block['text'] : '';
                                $leftLink = isset($left_block['link']) ? $left_block['link'] : '';
                            endif;
                            
                            // Get the right_block group as an array
                            $right_block = get_sub_field('right_block');
                            if ($right_block):
                                $rightBlockTheme = isset($right_block['block_theme']) ? strtolower($right_block['block_theme']) : '';
                                $rightHeader = isset($right_block['header']) ? $right_block['header'] : '';
                                $rightText = isset($right_block['text']) ? $right_block['text'] : '';
                                $rightLink = isset($right_block['link']) ? $right_block['link'] : '';
                            endif;
                            ?>

                            <div class="bg-<?=$leftBlockTheme?>-blue block-<?=$leftBlockTheme?> English border-r border-b lg:border-b-0" style="border-color:#373b61;">
                                <div class="text-white p-6 py-10 md:p-10 lg:px-20 lg:py-24 list-trident" style="padding: 6rem 6rem;">
                                    <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header">
                                        <a href="<?=$leftLink?>"
                                           class="flex flex-row gap-6 items-center">
                                            <h3 class="!text-xl !lg:text-3xl !plaakBold uppercase pb-2  after:bg-white">
                                                <?=$leftHeader?></h3>
                                        </a>
                                    </div>
                                    <div class="lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="100">
                                        <?=$leftText?>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-<?=$rightBlockTheme?>-blue block-<?=$rightBlockTheme?> English border-r border-b lg:border-b-0" style="border-color:#373b61;">
                                <div class="text-white p-6 py-10 md:p-10 lg:px-20 lg:py-24 list-trident" style="padding: 6rem 6rem;">
                                    <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header">
                                        <a href="<?=$rightLink?>"
                                           class="flex flex-row gap-6 items-center">
                                            <h3 class="!text-xl !lg:text-3xl !plaakBold uppercase pb-2  after:bg-white">
                                                <?=$rightHeader?></h3>
                                        </a>
                                    </div>
                                    <div class="lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="100">
                                        <?=$rightText?>
                                    </div>
                                </div>
                            </div>

                <?php
                        endwhile; 
                    else : 
                        // No rows found
                    endif; 
                    ?>

            </div>
        </div>

        <!-- ABOUT US -->
        <?php
        $aboutUs = get_field('about_us');
        $aboutUsStyle = $aboutUs['left_block']['style'] ? strtolower($aboutUs['left_block']['style']) : 'light';
        $rightBlockStyle = $aboutUsStyle == 'light' ? 'dark' : 'light';
        if ($aboutUs):
        ?>
        <div class="w-full relative content-grid" id="about-us">
            <div class="mx-auto md:grid grid-cols-2 gap-0">
                <div class="bg-<?=$aboutUsStyle?>-blue block-<?=$aboutUsStyle?>">
                    <div class="p-6 md:p-10 lg:px-20 lg:py-24 list-trident" >
                        <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl aos-init aos-animate block-header" data-aos="fade-up"
                             data-aos-delay="100">
                            <h3 class="!text-xl !lg:text-3xl !plaakBold"><?= $aboutUs['left_block']['header'] ?? '' ?></h3>
                        </div>
                        <div class="mb-3 lg:mb-8 lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="200">
                            <p>Assistance to international companies in securing investment from leading funds, family offices, and institutional investors worldwide.</p>
                            <p>Support for companies in entering and growing in international markets through tailored go-to-market strategies, regulatory navigation, and strategic local partnerships.</p>
                            <p>Advisory for international investors and businesses in identifying, assessing, and accessing opportunities in international markets, aligning with their strategic and sectoral priorities.</p>
                            <p>Backed by over 15 years of hands-on experience in business development, government relations, and cross-border investment advisory.</p>
                        </div>

                    </div>
                </div>

                <div class="bg-<?=$rightBlockStyle?>-blue block-<?=$rightBlockStyle?> relative flex aspect-16/9">
                    <?php if(isset($aboutUs['right_block']['background'])):?>
                    <img style="max-height: 100%" src="<?= $aboutUs['right_block']['background']?>" alt="About Us" class="object-center object-cover w-full">
                    <?php endif;?>
                </div>

            </div>
        </div>

        <?php endif; ?>

        <!-- NEWS -->
        <?php
        // Get the latest 2 posts using WP_Query
        $news_query = new WP_Query(array(
            'posts_per_page' => 2,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ));
        
        if ($news_query->have_posts()) :
            ?>

        <div class="w-full relative content-grid" id="news">
            <div class="mx-auto md:grid grid-cols-2 gap-0">

        <?php
            $newsStyle = 'light';
            while ($news_query->have_posts()) : $news_query->the_post();
                $newsStyle = $newsStyle == 'light' ? 'dark' : 'light';
                ?>

                <div class="bg-<?=$newsStyle?>-blue block-<?=$newsStyle?> ">
                    <div class="text-white p-6 md:p-10 lg:px-20 lg:py-24 list-trident">
                        <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl aos-init aos-animate block-header" data-aos="fade-up"
                             data-aos-delay="100">
                            <h3 class="!text-xl !lg:text-3xl !plaakBold"><?php the_title() ?></h3>

                        </div>
                        <div class="mb-3 lg:mb-8 lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="200">
                            <?php the_excerpt(); ?>
                        </div>
                        <ul role="list" class="mt-0 space-y-2 !list-none !pl-0 aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="300">
                            <div class="flex flex-col lg:flex-row lg:items-center justify-between pt-0 lg:pt-5 gap-5 links-icon-row aos-init aos-animate"
                                 data-aos="fade-up" data-aos-delay="300">
                                <li><a href="<?= get_the_permalink() ?>"
                                       class=" text-sm lg:text-lg pb-1 link-underline-animation plaakBold block-text">Read More</a></li>
                            </div>
                        </ul>
                    </div>
                </div>

        <?php
            endwhile;
            wp_reset_postdata();
            ?>
            </div>
        </div>
        <?php endif; ?>


        <?php
            if (have_rows('partners')):
        ?>
         <!-- PARTNERS -->
          <div class="bg-dark-blue border-b border-t border-bright-blue partners" id="partners" style="">
             <h3><?php esc_html_e('PARTNERS', 'vision'); ?></h3>
            <ul>
                <?php  while (have_rows('partners')) : the_row(); ?>
                <li><a href="<?= get_sub_field('link')?>"><img src="<?= get_sub_field('logo')?>" title="<?= get_sub_field('title')?>"/></a></li>
        <?php endwhile; ?>
            </ul>
        </div>
        <?php endif; ?>
        <!-- END PARTNERS -->

        <!-- TESTIMONIALS -->
        <?php
        $testimonials = new WP_Query(array(
            'post_type' => 'testimonial',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        // Testimonials slider configuration
        $testimonials_slider_config = array(
            'autoplay' => true,
            'autoplaySpeed' => 5000, // 5 seconds
            'arrows' => true,
            'fade' => true,
            'adaptiveHeight' => true,
            'infinite' => $testimonials->found_posts > 1,
            'dots' => false,
            'pauseOnHover' => true,
            'appendArrows' => '.testimonials-navigation',
            'prevArrow' => '<button type="button" class="slick-prev" aria-label="Previous"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg></button>',
            'nextArrow' => '<button type="button" class="slick-next" aria-label="Next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></button>'
        );

        if ($testimonials->have_posts()) :
        $testimonialsSettings = get_field('testimonials_section');
        ?>
        <div class="w-full relative" id="testimonials">
            <div class="mx-auto md:grid grid-cols-2 gap-0">
                <div class="left-side bg-light-blue">
                    <div class="text-dark-blue p-6 md:p-10 lg:px-20 lg:py-24" style="padding: 3rem 6rem;">
                        <div class="uppercase mb-10 news-container-nav">
                            <span class="text-lg whitespace-nowrap py-4 px-1 max-w-fit lg:text-xl" style="font-size: 1.5rem">Testimonials</span>
                            <div class="testimonials-navigation flex justify-between items-center gap-4"></div>
                        </div>
                        <div class="testimonials-container">
                            <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
                            <div class="slide overflow-hidden">
                                <div class="mb-5 lg:mb-8 text-xl lg:text-3xl aos-init aos-animate"
                                     data-aos="fade-up" data-aos-delay="100">
                                    <h2 class="" style="margin-bottom: 1rem; font-size: 1.5rem"><?= get_field('company')?></h2>
                                    <h3 class="" style="font-size: 1.2rem;">
                                        <?= get_field('feedback')?></h3>
                                </div>
                                <div class="flex justify-end aos-init aos-animate" data-aos="fade-up"
                                     data-aos-delay="300">
                                    <a href="<?= get_permalink()?>"
                                       class="text-sm lg:text-lg uppercase text-dark-blue plaakBold group transition-all duration-300 ease-in-out">
                                        <span class="text-dark-blue after:bg-dark-blue pb-2"><?= get_field('testimonial_author')?></span>
                                    </a>
                                </div>
                            </div>
                            <?php endwhile; 
                            wp_reset_postdata(); ?>
                        </div>
                        
                        <script>
                        // Initialize testimonials slider with configuration
                        jQuery(document).ready(function($) {
                            if ($('.testimonials-container').length && typeof $.fn.slick !== 'undefined') {
                                const $testimonialsContainer = $('.testimonials-container');
                                
                                // Check if already initialized
                                if ($testimonialsContainer.hasClass('slick-initialized')) {
                                    return;
                                }
                                
                                const slideCount = $testimonialsContainer.find('.slide').length;
                                
                                if (slideCount > 0) {
                                    const config = <?php echo json_encode($testimonials_slider_config); ?>;
                                    // Override infinite based on actual slide count
                                    config.infinite = slideCount > 1;
                                    
                                    $testimonialsContainer.slick(config);
                                }
                            }
                        });
                        </script>
                    </div>
                </div>
                <div class="hidden md:block bg-white relative right-side" style="max-height: 100%">
                    <?php if (isset($testimonialsSettings['right_block'])): ?>
                    <img src="<?= $testimonialsSettings['right_block']['background']?>" alt="" class="w-full object-cover">
                    <div class="absolute bottom-[1px] w-full h-2 z-30 aos-init aos-animate" data-aos="fade-in"
                         data-aos-delay="300">
                        <svg version="1.1" id="line_2" class="rotate-180" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="10"
                             xml:space="preserve">
                                    <path class="path2" fill="#f0f7ff" stroke-width="14" stroke="#f0f7ff"
                                          d="M0 0 l1120 0"></path>
                                </svg>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- END TESTIMONIALS -->
    </div>
</main>

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

                    <div class="wpcf7 js" id="wpcf7-f7-o1" lang="en-US" dir="ltr" data-wpcf7-id="7">
                        <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
                        <form action="/#wpcf7-f7-o1" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                            <fieldset class="hidden-fields-container"><input type="hidden" name="_wpcf7" value="7"><input type="hidden" name="_wpcf7_version" value="6.1.4"><input type="hidden" name="_wpcf7_locale" value="en_US"><input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f7-o1"><input type="hidden" name="_wpcf7_container_post" value="0"><input type="hidden" name="_wpcf7_posted_data_hash" value="">
                            </fieldset>
                            <div class="form-default">
                                <div class="input-group">
                                    <div class="input">
                                        <span class="wpcf7-form-control-wrap" data-name="text-779"><input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="First Name" value="" type="text" name="text-779"></span>
                                    </div>
                                    <div class="input">
                                        <span class="wpcf7-form-control-wrap" data-name="text-772"><input size="40" maxlength="400" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Last Name" value="" type="text" name="text-772"></span>
                                    </div>
                                </div>
                                <div class="input">
                                    <span class="wpcf7-form-control-wrap" data-name="email-323"><input size="40" maxlength="400" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your E-Mail" value="" type="email" name="email-323"></span>
                                </div>
                                <div class="input">
                                    <span class="wpcf7-form-control-wrap" data-name="textarea-123"><textarea cols="40" rows="10" maxlength="2000" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Write your message" name="textarea-123"></textarea></span>
                                </div>
                                <div class="checkbox">
                                    <label for="checkbox-form">
                                        <span>Please check your Inbox and Spam folders for the confirmation message after submitting your request.</span>
                                    </label>
                                </div>
                                <div class="submit">
                                    <button type="submit">
                                        SEND
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 23.93 24.007">
                                            <g id="Group_1490" data-name="Group 1490" transform="translate(6208.208 8977.801)">
                                                <line id="Line_478" data-name="Line 478" y1="22.301" x2="22.222" transform="translate(-6207.5 -8976.801)" fill="none" stroke="#fff" stroke-width="2"></line>
                                                <line id="Line_479" data-name="Line 479" x2="19" transform="translate(-6203.778 -8976.801)" fill="none" stroke="#fff" stroke-width="2"></line>
                                                <line id="Line_480" data-name="Line 480" x2="19" transform="translate(-6185.278 -8977.301) rotate(90)" fill="none" stroke="#fff" stroke-width="2"></line>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <input class="wpcf7-form-control wpcf7-hidden" value="" type="hidden" name="page_url"><div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER BOTTOM! -->
    <div class="mx-auto md:px-6 md:py-8 lg:px-20 border-t border-bright-blue">
        <div class="footer-bottom">
            <div class="social">
                <div class="flex">
                    <a href="https://www.linkedin.com/company/trident-trust/" target="_blank"
                       class="text-white hover:text-bright-blue">
                        <span class="sr-only">linkedIn</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20.15" height="20.105"
                             viewBox="0 0 20.15 20.105">
                            <g id="XMLID_801_" transform="translate(0 -0.341)">
                                <path id="XMLID_802_"
                                      d="M9.3,99.73H5.252a.325.325,0,0,0-.325.325v13a.325.325,0,0,0,.325.325H9.3a.325.325,0,0,0,.325-.325v-13A.325.325,0,0,0,9.3,99.73Z"
                                      transform="translate(-4.607 -92.929)" fill="currentColor"></path>
                                <path id="XMLID_803_"
                                      d="M2.669.341A2.667,2.667,0,1,0,5.336,3.007,2.671,2.671,0,0,0,2.669.341Z"
                                      fill="currentColor"></path>
                                <path id="XMLID_804_"
                                      d="M114.254,94.761a4.751,4.751,0,0,0-3.554,1.492v-.844a.325.325,0,0,0-.325-.325H106.5a.325.325,0,0,0-.325.325v13a.325.325,0,0,0,.325.325h4.036a.325.325,0,0,0,.325-.325v-6.43c0-2.167.589-3.011,2.1-3.011,1.645,0,1.776,1.353,1.776,3.122V108.4a.325.325,0,0,0,.325.325H119.1a.325.325,0,0,0,.325-.325v-7.128C119.424,98.054,118.81,94.761,114.254,94.761Z"
                                      transform="translate(-99.275 -88.283)" fill="currentColor"></path>
                            </g>
                        </svg>
                    </a>

                    <a href="https://x.com/TridentTrustInt" target="_blank" class="text-white hover:text-bright-blue">
                        <span class="sr-only">X</span>
                        <svg viewBox="0 0 1200 1227" height="20" width="20">
                            <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"
                                  fill="currentColor"></path>
                        </svg>
                    </a>

                    <a href="https://visionbusinessdevelopment.com/follow-us-on-wechat"
                       class="text-white hover:text-bright-blue">
                        <span class="sr-only">weixin</span>
                        <svg width="30" height="30" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
                            <g fill="currentColor">
                                <path d="M200.803 111.88c-24.213 1.265-45.268 8.605-62.362 25.188-17.271 16.754-25.155 37.284-23 62.734-9.464-1.172-18.084-2.462-26.753-3.192-2.994-.252-6.547.106-9.083 1.537-8.418 4.75-16.488 10.113-26.053 16.092 1.755-7.938 2.891-14.889 4.902-21.575 1.479-4.914.794-7.649-3.733-10.849-29.066-20.521-41.318-51.232-32.149-82.85 8.483-29.25 29.315-46.989 57.621-56.236 38.635-12.62 82.054.253 105.547 30.927 8.485 11.08 13.688 23.516 15.063 38.224zm-111.437-9.852c.223-5.783-4.788-10.993-10.74-11.167-6.094-.179-11.106 4.478-11.284 10.483-.18 6.086 4.475 10.963 10.613 11.119 6.085.154 11.186-4.509 11.411-10.435zm58.141-11.171c-5.974.11-11.022 5.198-10.916 11.004.109 6.018 5.061 10.726 11.204 10.652 6.159-.074 10.83-4.832 10.772-10.977-.051-6.032-4.981-10.79-11.06-10.679z"></path>
                                <path d="M255.201 262.83c-7.667-3.414-14.7-8.536-22.188-9.318-7.459-.779-15.3 3.524-23.104 4.322-23.771 2.432-45.067-4.193-62.627-20.432-33.397-30.89-28.625-78.254 10.014-103.568 34.341-22.498 84.704-14.998 108.916 16.219 21.129 27.24 18.646 63.4-7.148 86.284-7.464 6.623-10.15 12.073-5.361 20.804.884 1.612.985 3.653 1.498 5.689zm-87.274-84.499c4.881.005 8.9-3.815 9.085-8.636.195-5.104-3.91-9.385-9.021-9.406-5.06-.023-9.299 4.318-9.123 9.346.166 4.804 4.213 8.69 9.059 8.696zm56.261-18.022c-4.736-.033-8.76 3.844-8.953 8.629-.205 5.117 3.772 9.319 8.836 9.332 4.898.016 8.768-3.688 8.946-8.562.19-5.129-3.789-9.364-8.829-9.399z"></path>
                            </g>
                        </svg>
                    </a>
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
                <a href="/" ><img src="<?php echo get_template_directory_uri(); ?>/assets/vision_logo_white.svg"></a>
            </div>

            <div class="copyright">
                <span class="">©2026 Vision Business Development</span>
            </div>
        </div>
    </div>
</footer>
<div></div>

<!---->
<!--<script type="text/javascript" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/jquery-migrate.min.js"></script>-->
<!--<script type="text/javascript" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/jquery.validate.min.js"></script>-->
<!--<script integrity="sha512-xq+Vm8jC94ynOikewaQXMEkJIOBp7iArs3IhFWSWdRT3Pq8wFz46p+ZDFAR7kHnSFf+zUv52B3prRYnbDRdgog=="-->
<!--        crossorigin="anonymous" referrerpolicy="no-referrer" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/jquery.validate.unobtrusive.min.js"></script>-->
<!--<script type="text/javascript" defer="" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/slick.min.js"></script>-->
<!--<script defer="" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/in-view.min.js"></script>-->
<!--<script defer="" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/isotope.pkgd.min.js"></script>-->
<!--<script src="--><?php //echo get_template_directory_uri(); ?><!--/assets/aos.js"></script>-->
<!--<script integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="" defer=""-->
<!--        src="--><?php //echo get_template_directory_uri(); ?><!--/assets/leaflet.js"></script>-->
<!--<script type="module" src="--><?php //echo get_template_directory_uri(); ?><!--/assets/custom.js"></script>-->

<script async="async" type="application/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/eloisa.js"></script>

<?php wp_footer(); ?>

<div id="quick-start-container"></div>
</body>
</html>