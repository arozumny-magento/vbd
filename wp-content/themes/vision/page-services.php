<?php
/**
 * Template Name: Services
 */

get_header();

// Check if Elementor is being used for this post
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
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            ?>

            <div class="umb-block-list">

                <!-- HERO SECTION -->
                <section class="hero">
                    <div class="relative isolate overflow-hidden bg-white">
                        <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
                            <div class="mx-auto max-w-7xl text-center">
                                <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                                     data-aos="fade-up" data-aos-delay="100">
                                    <h1><?php the_field('page_title'); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="flex aspect-16/9 w-full media hero-banner-img"
                     style="background: url('<?php the_post_thumbnail_url() ?>') center; min-height: 400px;">
                </div>
                <!-- END HERO SECTION -->


                <!-- START ASSET -->
                <?php if (have_rows('top_columns')): ?>
                    <?php while (have_rows('top_columns')): the_row(); ?>
                        <section class="hero">
                            <div class="relative isolate overflow-hidden bg-white">
                                <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
                                    <div class="mx-auto max-w-7xl text-center">
                                        <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                                             data-aos="fade-up" data-aos-delay="100">
                                            <h1><?= get_sub_field('add_title'); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- TESTIMONIALS BLOCKS -->
                        <div class="w-full relative content-grid" id="testimonials">
                            <div class="mx-auto md:grid grid-cols-2 gap-0 testimonials-one">
                                <?php if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                                    <div class="block-light">
                                        <div class="text-white p-6 py-10 md:p-10 lg:px-20 lg:py-10 list-trident"
                                             style="padding: 4rem 6rem">
                                            <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header flex justify-between">
                                                <div>
                                                    <h3 class="!text-xl !lg:text-3xl uppercase pb-2  after:bg-white">
                                                        <?= get_sub_field('title') ?></h3>
                                                </div>
                                            </div>
                                            <div class="flex flex-col justify-between gap-20">
                                                <div class="lg:text-lg aos-init aos-animate block-text"
                                                     data-aos="fade-up" data-aos-delay="100">
                                                    <?= get_sub_field('descr') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                <!-- END ASSET -->


                <!-- START RESULTS -->
                <?php if (have_rows('bot_columns')): ?>
                    <?php while (have_rows('bot_columns')): the_row(); ?>
                        <section class="hero">
                            <div class="relative isolate overflow-hidden bg-white">
                                <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
                                    <div class="mx-auto max-w-7xl text-center">
                                        <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                                             data-aos="fade-up" data-aos-delay="100">
                                            <h1><?= get_sub_field('add_title'); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="w-full relative content-grid EN" id="services">
                            <div class="mx-auto md:grid grid-cols-2 gap-0 services">

                                <?php
                                $theme = 'dark';
                                $i = 1;
                                if (have_rows('add_block')): while (have_rows('add_block')) : the_row();
                                    $theme = $theme == 'light' ? 'dark' : 'light';
                                    if ($i == 3 || $i ==5 || $i ==7 ) {
                                        $theme = $theme == 'dark' ? 'light' : 'dark';
                                    }
                                    $i++;
                                    ?>

                                    <div class="bg-<?= $theme ?>-blue block-<?= $theme ?> English border-r border-b lg:border-b-0"
                                         style="border-color:#373b61;">
                                        <div class="text-white p-6 py-10 md:p-10 lg:px-20 lg:py-24 list-trident">
                                            <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header">
                                                <h3 class="!text-xl !lg:text-3xl !plaakBold uppercase pb-2  after:bg-white">
                                                    <?= get_sub_field('title') ?></h3>
                                            </div>
                                            <div class="flex flex-col justify-between gap-20">
                                                <div class="lg:text-lg aos-init aos-animate block-text"
                                                     data-aos="fade-up" data-aos-delay="100">
                                                    <?= get_sub_field('descr') ?>
                                                </div>
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
                    <?php endwhile; endif; ?>
                <!-- END RESULTS -->


                <!-- INFO SECTION -->
                <?php if (have_rows('info_section')): ?>
                    <?php while (have_rows('info_section')): the_row(); ?>
                        <div class="w-full relative">
                            <div class="w-full relative">
                                <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                                    <div class="bg-white">
                                        <div class="text-dark-blue p-6 md:p-10 lg:px-20 lg:py-24"
                                             style="padding: 3rem 6rem; background: #00012e; color:#fff; height: 100%;">
                                            <div class="uppercase mb-10 news-container-nav slick-initialized slick-slider">
                                                <div class="slick-list draggable">
                                                    <div class="slick-track"
                                                         style="opacity: 1; width: 100%; text-align: left; font-weight: bold; transform: translate3d(0px, 0px, 0px);">
                                            <span class="text-lg whitespace-nowrap py-4 px-1 max-w-fit lg:text-xl active
                                            plaakBold news-indicators cursor-pointer slick-slide slick-current slick-active"
                                                  data-slick-index="0" aria-hidden="false" tabindex="0"
                                                  style="width: 278px;">
                                                <?= get_sub_field('title_h2') ?>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="news-container slick-initialized slick-slider">
                                                <div class="slick-list draggable">
                                                    <div class="slick-track" style="opacity: 1; width: 1192px;">
                                                        <div class="slide overflow-hidden slick-slide slick-current slick-active"
                                                             data-slick-index="0" aria-hidden="false" tabindex="0"
                                                             style="width: 596px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                            <div class="mb-5 lg:mb-8 text-lg aos-init aos-animate"
                                                                 data-aos="fade-up" data-aos-delay="100">
                                                                <?= get_sub_field('contant_page') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                                        <img src="<?= get_sub_field('content_image') ?>" alt=""
                                             class="w-full h-full object-cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                <!-- END INFO SECTION -->
            </div>
        <?php endwhile; ?>
    </main>
    <?php
}
//get_sidebar();
get_footer();
