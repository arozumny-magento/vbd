<?php
/**
 * Template Name: Programs
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

            <div class="w-full relative" >
                <div class="mx-auto md:grid grid-cols-2 overflow-hidden gap-0">
                        <div class="bg-lightblue" style="padding: 6rem;">
                            <h1 style="text-align: left"><?php the_field('page_title'); ?></h1>
                        </div>

                    <?php if (has_post_thumbnail()) : ?>
                    <div class="hidden md:block bg-white relative" style="max-height: 310px;">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="" class="w-full h-full object-cover">
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w-full relative" >

                <?php if (have_rows('top_columns')): ?>
                <?php while (have_rows('top_columns')): the_row(); ?>
                        <div class="card-grid relative bg-white p-6 md:p-10 lg:py-20 lg:px-20 white-bg">
                            <div class="max-auto text-xl">

                                <div class="uppercase mb-10 text-xl lg:text-3xl plaakBold text-dark-blue aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                    <p><?= get_sub_field('add_title') ?></p>
                                </div>

                                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-10">

                                    <?php if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                                    <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                        <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                            <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                                <h3><?= get_sub_field('title') ?></h3>
                                            </div>
                                            <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                                <?= get_sub_field('descr')?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; endif; ?>

                                </div>
                            </div>
                        </div>
                <?php endwhile; endif; ?>

                <?php if (have_rows('bot_columns')): ?>
                <?php while (have_rows('bot_columns')): the_row();
                    ?>
                        <div class="card-grid relative bg-white p-6 md:p-10 lg:pb-20 lg:px-20 white-bg">
                            <div class="max-auto">
                                <div class="uppercase mb-10 text-xl lg:text-3xl plaakBold text-dark-blue aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                    <p><?=get_sub_field('add_title')?></p>
                                </div>

                                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-10">

                    <?php if (have_rows('add_block')): while (have_rows('add_block')) : the_row();
                        ?>
                                    <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                        <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                            <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                                <h3><?= get_sub_field('title')?></h3>
                                            </div>
                                            <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                                <p><span><?= get_sub_field('descr')?></span></p>
                                            </div>
                                        </div>
                                    </div>
                    <?php endwhile; endif; ?>
                                </div>
                            </div>
                        </div>
                <?php endwhile; ?>
                <?php endif; ?>

                <?php if (have_rows('info_section')): ?>
                <?php while (have_rows('info_section')): the_row(); ?>
                        <div class="w-full relative" >
                            <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                                <div class="bg-white">
                                    <div class="text-dark-blue p-6 md:p-10 lg:px-20 lg:py-24" style="padding: 3rem 6rem; background: #00012e; color:#fff;">
                                        <div class="uppercase mb-10 news-container-nav slick-initialized slick-slider">
                                            <div class="slick-list draggable">
                                                <div class="slick-track" style="opacity: 1; width: 100%; text-align: left; font-weight: bold; transform: translate3d(0px, 0px, 0px);">
                                            <span class="text-lg whitespace-nowrap py-4 px-1 max-w-fit lg:text-xl active
                                            plaakBold news-indicators cursor-pointer slick-slide slick-current slick-active"
                                                  data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 278px;">
                                                <?= get_sub_field('title_h2'); ?>
                                            </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="news-container slick-initialized slick-slider">
                                            <div class="slick-list draggable">
                                                <div class="slick-track" style="opacity: 1; width: 1192px;">
                                                    <div class="slide overflow-hidden slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 596px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                        <div class="mb-5 lg:mb-8 text-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                                           <?= get_sub_field('contant_page') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                                    <img src="<?=get_sub_field('content_image')?>" alt="" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>

                    <?php endwhile; endif; ?>

            </div>
        </div>
    <?php endwhile; ?>
    </main>
    <?php
}
//get_sidebar();
get_footer();
