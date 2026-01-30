<?php get_header();
// Template Name: Landing Page
// Template Post Type: landing
?>

<?php

$theme = get_stylesheet_directory_uri();
$current_lang = pll_current_language();

?>
    <main id="main" class="site-main">
<?php if (have_rows('langing_page')): ?>
    <?php while (have_rows('langing_page')):
    the_row(); ?>

    <?php if (get_row_layout() == 'Home_Hero'): ?>
    <div class="umb-block-list">

    <div class="w-full relative">
        <div class="mx-auto md:grid grid-cols-2 overflow-hidden gap-0">
            <div class="bg-lightblue flex flex-col justify-between items-start gap-8" style="padding: 5rem;">
                <h1 style="text-align: left"><?php the_sub_field('hero_h1'); ?></h1>
                <div>
                    <div class="text-xl flex gap-2 mb-2">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                             clip-rule="evenodd">
                            <path d="M12 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2m0-5c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3m-7 2.602c0-3.517 3.271-6.602 7-6.602s7 3.085 7 6.602c0 3.455-2.563 7.543-7 14.527-4.489-7.073-7-11.072-7-14.527m7-7.602c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602"/>
                        </svg>
                        <span class="font-bold"><?php the_sub_field('hero_h3'); ?></span>
                    </div>
                    <div class="text-xl flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M20 20h-4v-4h4v4zm-6-10h-4v4h4v-4zm6 0h-4v4h4v-4zm-12 6h-4v4h4v-4zm6 0h-4v4h4v-4zm-6-6h-4v4h4v-4zm16-8v22h-24v-22h3v1c0 1.103.897 2 2 2s2-.897 2-2v-1h10v1c0 1.103.897 2 2 2s2-.897 2-2v-1h3zm-2 6h-20v14h20v-14zm-2-7c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-14 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2z"/>
                        </svg>
                        <span class="font-bold"><?php the_sub_field('hero_h2'); ?></span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block bg-white relative" style="max-height: 350px;">
                <img src="<?php the_sub_field('hero_image'); ?>" alt="" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (get_row_layout() == 'Home_Topics'): ?>


        <section class="hero  mt-16">
            <div class="relative isolate overflow-hidden bg-white">
                <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
                    <div class="mx-auto max-w-7xl text-center">
                        <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="100">
                            <h1><?php the_sub_field('topics_h2'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="w-full relative content-grid key-grid">
            <div class="mx-auto md:grid grid-cols-2 gap-0 ">
                <?php
                if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                    <div class="block">
                        <div>
                            <div class="uppercase mb-5 lg:mb-8 !text-xl !lg:text-3xl block-header flex justify-between">
                                <div>
                                    <h3 class="!text-xl !lg:text-3xl uppercase pb-2 ">
                                        <?php the_sub_field('block_title'); ?></h3>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between gap-20">
                                <div class="lg:text-lg aos-init aos-animate block-text"
                                     data-aos="fade-up" data-aos-delay="100">
                                    <?php the_sub_field('block_descr'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (get_row_layout() == 'Home_About'): ?>
        <div class="w-full relative info-section">
            <div class="w-full relative">
                <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                    <div class="content-text block-dark">
                        <!--                        <div class="heading">-->
                        <?php //= get_sub_field('title_h2') ?><!--</div>-->
                        <div class="full-text"><?php the_sub_field('add_content'); ?></div>
                    </div>
                    <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                        <img src="<?php the_sub_field('add_image'); ?>" alt=""
                             class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (get_row_layout() == 'Events_For'): ?>
        <section class="hero  mt-16">
            <div class="relative isolate overflow-hidden bg-white">
                <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
                    <div class="mx-auto max-w-7xl text-center">
                        <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="100">
                            <h1><?php the_sub_field('events_h2'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="w-full relative content-grid presentation-for">
            <div class="mx-auto flex no-wrap ">
                <?php
                $blockStyle = 'light';
                if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                    <?php
                    $blockStyle = $blockStyle == 'light' ? 'dark' : 'light';
                    ?>
                    <div class="bg-light-blue justify-center flex items-center block-<?= $blockStyle ?>"
                         style="padding: 4rem 2rem; width: 20%;">
                        <h3 class="!text-xl !lg:text-3xl uppercase pb-2 text-center">
                            <?php the_sub_field('block_title'); ?></h3>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- SPEAKERS SECTION -->
    <?php if (get_row_layout() == 'Speakers_Home'): ?>
        <section class="hero mt-16">
            <div class="relative isolate overflow-hidden bg-white">
                <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
                    <div class="mx-auto max-w-7xl text-center">
                        <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="100">
                            <h1><?php the_sub_field('speakers_h2'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="w-full relative info-section">
            <div class="w-full relative">
                <?php if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                    <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                        <div class="content-text block-dark">
                            <div class="heading">
                                <?php the_sub_field('block_title'); ?>
                                <div><?php the_sub_field('user_position'); ?></div>
                            </div>
                            <div class="full-text"><?php the_sub_field('user_content'); ?></div>
                        </div>
                        <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                            <img src="<?php the_sub_field('background'); ?>" alt=""
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- END SPEAKERS SECTION -->


    <?php if (get_row_layout() == 'Agenda_Home'): ?>
        <section class="hero mt-16">
            <div class="relative isolate overflow-hidden bg-white">
                <div class="mx-auto max-w-7xl px-4 py-4 lg:px-20" style="padding: 2rem 4rem">
                    <div class="mx-auto max-w-7xl text-center">
                        <div class="max-w-7xl font-normal text-dark-blue text-xl md:text-3xl lg:text-5xl uppercase text-left tracking-[.20em] aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="100">
                            <h1><?php the_sub_field('agenda_h2'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="archive-page__section" style="margin: 0 0 8rem;">
            <div class="default__container">
                <div class="row" style="gap: 6rem;">
                    <?php if (have_rows('add_block')): while (have_rows('add_block')) : the_row(); ?>
                        <div class="column">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <span class="img"
                                      style="background: url('<?php the_sub_field('background'); ?>');"></span>
                                <span class="txt" style="padding: 0 2rem;">
                                    <span class="txt-content flex flex-col justify-between py-0 px-4 gap-8">
                                        <span class="txt-content__main">
                                             <div class="flex gap-2 items-center mb-4">
                                                <div class="time-numb" style="font-size: 1.25rem; font-weight: bold"><?php the_sub_field('time'); ?></div>
                                                <span class="date-numb"><?php the_sub_field('add_url'); ?></span>
                                            </div>
                                            <span class="txt-content__title"
                                                  style="margin: 0"><?php the_sub_field('title'); ?></span>
                                            <span class="txt-content__descr"><?php the_sub_field('descr'); ?></span>
                                        </span>

                                        <span class="author">
                                            <span class="author-image"><img src="<?php the_sub_field('user_image'); ?>"
                                                                            alt="Konstantin Gridin"> </span>
                                            <span class="author-descr">
                                                <span class="author-descr__name"><?php the_sub_field('user_name'); ?></span>
                                                <span class="author-descr__time"><?php the_sub_field('user_position'); ?></span>
                                        </span>
                                    </span>
                            </span>
                    </span>
                            </a>
                        </div>
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>