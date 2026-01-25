<?php
/**
 * Template Name: Vision Home
 */

get_header();

// Check if Elementor is being used for this page
$elementor_active = class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID());

if ($elementor_active) {
    // Elementor template - let Elementor handle the content
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
} else {
    // Fallback to custom template
    ?>
<main>
    <div class="umb-block-list">
        <!-- HERO SECTION -->
        <section class="hero">
            <div class="relative isolate overflow-hidden bg-white">
                <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
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
            <?php if (isset($heroBanner)) :?>
                    <video
                            autoplay="true"
                            loop="true"
                            muted="true"
                            class="w-auto min-w-full min-h-full max-w-none"
                            poster="<?= $heroBanner['background'] ?? '' ?>"
                            src="<?= $heroBanner['video'] ?>" type="video/mp4"
                    >
                        <source src="<?= $heroBanner['video'] ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
            <?php endif; ?>
        </div>
        <!-- END HERO SECTION -->

        <!-- ABOUT US -->
        <?php
        $aboutUs = get_field('about_us');
        $aboutUsStyle = $aboutUs['left_block']['style'] ? strtolower($aboutUs['left_block']['style']) : 'light';
        $rightBlockStyle = $aboutUsStyle == 'light' ? 'dark' : 'light';
        if ($aboutUs):
        ?>
        <div class="w-full relative content-grid" id="about">
            <div class="mx-auto md:grid grid-cols-2 gap-0">
                <div class="bg-<?=$aboutUsStyle?>-blue block-<?=$aboutUsStyle?>">
                    <div class="p-6 md:p-10 lg:px-20 lg:py-24 list-trident" style="padding: 4rem 6rem">
                        <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl aos-init aos-animate block-header" data-aos="fade-up"
                             data-aos-delay="100">
                            <h3 class="!text-xl !lg:text-3xl !plaakBold"><?= $aboutUs['left_block']['header'] ?? '' ?></h3>
                        </div>
                        <div class="mb-3 lg:mb-8 lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="200">
                            <?= wpautop($aboutUs['left_block']['description'] ?? '') ?>
                        </div>
                    </div>
                </div>

                <div class="bg-lightblue block-<?=$aboutUsStyle?>">
                    <div class="p-6 md:p-10 lg:px-20 lg:py-24 list-trident" style="padding: 4rem 6rem">
                        <div class="mb-3 lg:mb-8 lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="200">
                            <?= wpautop($aboutUs['right_block']['description'] ?? '') ?>
                        </div>
                    </div>
                </div>

<!--                <div class="bg---><?php //=$rightBlockStyle?><!---blue block---><?php //=$rightBlockStyle?><!-- relative flex aspect-16/9">-->
<!--                    --><?php //if(isset($aboutUs['right_block']['background'])):?>
<!--                    <img style="max-height: 100%" src="--><?php //= $aboutUs['right_block']['background']?><!--" alt="About Us" class="object-center object-cover w-full">-->
<!--                    --><?php //endif;?>
<!--                </div>-->

            </div>
        </div>
        <?php endif; ?>
        <!-- END ABOUT US -->

        <!-- SERVICES -->
        <div class="w-full relative content-grid EN" id="services">
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

                        <div class="bg-<?=$leftBlockTheme?>-blue block-<?=$leftBlockTheme?> English border-r border-b lg:border-b-0" style="border-color:#373b61;" onclick="location.href='<?=$leftLink?>'">
                            <div class="text-white p-6 py-10 md:p-10 lg:px-20 lg:py-24 list-trident">
                                <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header">
                                    <a href="<?=$leftLink?>"
                                       class="flex flex-row gap-6 items-center">
                                        <h3 class="!text-xl !lg:text-3xl !plaakBold uppercase pb-2  after:bg-white">
                                            <?=$leftHeader?></h3>
                                    </a>
                                </div>
                                <div class="flex flex-col justify-between gap-20">
                                    <div class="lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="100">
                                        <?=$leftText?>
                                    </div>
                                    <a href="<?=$leftLink?>"
                                       class="read-more text-sm uppercase group transition-all duration-300 ease-in-out overflow-hidden inline pb-1 link-underline-animation after:bg-bright-blue">
                                        <span class="block pb-1">Read more</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="bg-<?=$rightBlockTheme?>-blue block-<?=$rightBlockTheme?> English border-r border-b lg:border-b-0" style="border-color:#373b61;" onclick="location.href='<?=$rightLink?>'">
                            <div class="text-white p-6 py-10 md:p-10 lg:px-20 lg:py-24 list-trident">
                                <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header">
                                    <a href="<?=$rightLink?>"
                                       class="flex flex-row gap-6 items-center">
                                        <h3 class="!text-xl !lg:text-3xl !plaakBold uppercase pb-2  after:bg-white">
                                            <?=$rightHeader?></h3>
                                    </a>
                                </div>

                                <div class="flex flex-col justify-between gap-20">
                                    <div class="lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="100">
                                        <?=$rightText?>
                                    </div>
                                    <a href="<?=$rightLink?>"
                                       class="read-more text-sm uppercase group transition-all duration-300 ease-in-out overflow-hidden inline pb-1 link-underline-animation after:bg-bright-blue">
                                        <span class="block pb-1">Read more</span>
                                    </a>
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
        <!-- END SERVICES -->

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

        <!-- TESTIMONIALS BLOCKS -->
        <div class="w-full relative content-grid" id="testimonials">
            <div class="mx-auto md:grid grid-cols-2 gap-0 testimonials-one">
                <?php
                    while ($testimonials->have_posts()) : $testimonials->the_post();
                        ?>
                        <div class="block-light" >
                            <div class="text-white p-6 py-10 md:p-10 lg:px-20 lg:py-10 list-trident" style="padding: 4rem 6rem">
                                <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header flex justify-between">
                                    <div>
                                        <a href="<?=$leftLink?>"
                                           class="flex flex-row gap-6 items-center">
                                            <h3 class="!text-xl !lg:text-3xl uppercase pb-2  after:bg-white">
                                                <?= get_field('company')?></h3>
                                        </a>
                                        <span class="testimonial-author text-sm capitalize font-normal block pb-1"><?= get_field('testimonial_author')?></span>
                                    </div>
                                    <div>
                                        <?php
                                        $testimonial_logo = get_field('testimonial_logo');
                                        $logo_url = '';
                                        if ($testimonial_logo) {
                                            if (is_array($testimonial_logo)) {
                                                // Return format is "Image Array"
                                                $logo_url = $testimonial_logo['url'] ?? '';
                                            } elseif (is_numeric($testimonial_logo)) {
                                                // Return format is "Image ID"
                                                $logo_url = wp_get_attachment_image_url($testimonial_logo, 'full');
                                            } else {
                                                // Return format is "Image URL"
                                                $logo_url = $testimonial_logo;
                                            }
                                        }
                                        if ($logo_url) :
                                            ?>
                                            <span class="testimonial-logo"><img src="<?= esc_url($logo_url) ?>" alt="<?= esc_attr(get_field('testimonial_author') ?: '') ?>" /></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-between gap-20">
                                    <div class="lg:text-lg aos-init aos-animate block-text" data-aos="fade-up" data-aos-delay="100">
                                        <?= wpautop(get_field('feedback'))?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                ?>

            </div>
        </div>
        <!-- END TESTIMONIALS BLOCKS -->

        <!-- TESTIMONIALS SLIDER -->
        <div class="w-full relative testimonials" style="display: none;">
            <div class="mx-auto md:grid grid-cols-2 gap-0">
                <div class="left-side bg-light-blue">
                    <div class="text-dark-blue p-6 md:p-10 lg:px-20 lg:py-24">
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
        <!-- TESTIMONIALS SLIDER END -->
        <?php endif; ?>
        <!-- END TESTIMONIALS -->

        <!-- PARTNERS -->
        <?php if (have_rows('partners')): ?>
            <div class="bg-dark-blue border-b border-t border-bright-blue partners" id="partners" style="">
                <h3 style="font-weight: 500"><?php esc_html_e('PARTNERS', 'vision'); ?></h3>
                <ul>
                    <?php  while (have_rows('partners')) : the_row(); ?>
                        <li><a href="<?= get_sub_field('link')?>"><img src="<?= get_sub_field('logo')?>" title="<?= get_sub_field('title')?>"/></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
        <!-- END PARTNERS -->

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
            <div class="w-full relative content-grid" id="updates">
                <div class="mx-auto md:grid grid-cols-2 gap-0">
                    <?php
                    $newsStyle = 'light';
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $newsStyle = $newsStyle == 'light' ? 'dark' : 'light';
                        ?>

                        <div class="bg-<?=$newsStyle?>-blue block-<?=$newsStyle?> cursor-pointer" onclick="location.href='<?= get_the_permalink() ?>'">
                            <div class="text-white p-6 md:p-10 lg:px-20 lg:py-24 list-trident" style="padding: 4rem 6rem">
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
        <!-- END NEWS -->

        </div>
    </main>
    <?php
}
get_footer(); ?>