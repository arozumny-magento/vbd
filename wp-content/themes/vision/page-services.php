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
                        <div class="hero-wrapper">
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
                     style="background-image: url('<?php the_post_thumbnail_url() ?>');">
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
                        <div class="w-full relative content-grid asset-container">
                            <div class="mx-auto md:grid grid-cols-2 gap-0 ">
                                <?php if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                                <?php
                                    $blockStyle = strtolower(get_sub_field('block_style')) ?? 'light';
                                    ?>
                                    <?php if (!get_sub_field('descr') && !get_sub_field('title') ): ?>
                                        <div class="hidden md:block bg-white relative" style="width: 100%; height: 100%; background-image: url('<?=get_sub_field('image')?>');">
                                        </div>
                                    <?php else: ?>
                                    <div class="block block-<?=$blockStyle?>">
                                        <div>
                                            <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header flex justify-between">
                                                <div>
                                                    <h3 class="!text-xl !lg:text-3xl uppercase pb-2 ">
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
                                <?php endif; ?>
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
                        <div class="w-full relative content-grid expected-results-container">
                            <div class="mx-auto md:grid grid-cols-2 gap-0 ">
                                <?php if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                                    <?php
                                    $blockStyle = strtolower(get_sub_field('block_style')) ?? 'light';
                                    ?>
                                    <?php if (!get_sub_field('descr') && !get_sub_field('title') ): ?>
                                        <div class="hidden md:block bg-white relative" style="width: 100%; height: 100%; background-image: url('<?=get_sub_field('image')?>');">
                                        </div>
                                    <?php else: ?>
                                        <div class="block block-<?=$blockStyle?>">
                                            <div>
                                                <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header flex justify-between">
                                                    <div>
                                                        <h3 class="!text-xl !lg:text-3xl uppercase pb-2 ">
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
                                    <?php endif; ?>
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                <!-- END RESULTS -->


                <!-- INFO SECTION -->
                <?php if (have_rows('info_section')): ?>
                    <?php while (have_rows('info_section')): the_row(); ?>
                        <div class="w-full relative info-section">
                            <div class="w-full relative">
                                <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                                    <div class="content-text block-dark">
                                        <div class="heading"><?= get_sub_field('title_h2') ?></div>
                                        <div class="full-text"><?= get_sub_field('contant_page') ?></div>
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
