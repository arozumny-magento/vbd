<?php get_header(); ?>

<?php
$theme = get_stylesheet_directory_uri();
$current_lang = pll_current_language();
?>

    <div class="search-page__wrapper">
        <div class="default__container">
            <div class="title-page__default">
                <div>
                    <h1><?php echo get_the_archive_title(); ?></h1>
                </div>
                <div><?php get_search_form(); ?></div>
            </div>
        </div>
    </div>

<?php if (single_cat_title('', false) === 'Projects'): ?>
    <div class="w-full relative content-grid project-grid">
        <div class="mx-auto md:grid grid-cols-2 gap-0">
            <?php while (have_posts()) : the_post(); ?>
                <div class="block cursor-pointer"
                     onclick="location.href='<?= get_the_permalink() ?>'">
                    <div class="list-trident">
                        <div class="mb-5 lg:mb-8 !text-xl !lg:text-3xl aos-init aos-animate block-header">
                            <span><?php pll_e('Client') ?></span>
                            <h3 class="uppercase !text-xl !lg:text-3xl font-bold"><?php the_title() ?></h3>

                        </div>
                        <div class="mb-3 lg:mb-8 lg:text-lg aos-init aos-animate block-text" data-aos="fade-up"
                             data-aos-delay="200">
                            <span><?php pll_e('Project Type') ?></span>
                            <h3 class="uppercase !text-xl !lg:text-3xl font-bold">
                                <?php the_field('type') ?></h3>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
<?php else: ?>
    <div class="archive-page__section">
        <div class="default__container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="column">
                        <a href="<?php echo get_the_permalink(); ?>">
                                <span class="img"
                                      style="background: url('<?php echo get_the_post_thumbnail_url(); ?>');"></span>
                            <span class="txt">
                                <span class="author">
                                    <span class="author-image">
                                    <img src="/wp-content/uploads/2025/07/znimok-ekrana-2025-07-17-o-14.05.07.png"
                                         alt="Konstantin Gridin">
                                </span>
                                <span class="author-descr">
                                    <span class="author-descr__name"><?php pll_e('Konstantin Gridin'); ?></span>
                                    <span class="author-descr__time">
                                        <?php echo get_the_date(); ?> | <span
                                                class="time"> <?php the_field('time_to_read'); ?></span>
                                    </span>
                                </span>
                            </span>
                            <span class="txt-content">
                                <span class="txt-content__main">
                                    <span class="txt-content__title">
                                    <?php echo get_the_title(); ?>
                                </span>
                                <span class="txt-content__descr">
                                    <?php the_excerpt(); ?>
                                </span>
                                </span>
                                <span class="txt-content__link">
                                    <?php pll_e('Read More ...'); ?>
                                </span>
                            </span>
                    </span>
                        </a>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>
    </div>
<?php endif; ?>

        <div class="news-archive__navigation">
            <?php
            the_posts_pagination([
                'mid_size' => 2,
                'end_size' => 1,
                'prev_text' => '«',
                'next_text' => '»',
                'screen_reader_text' => 'Навигация по страницам',
            ]);
            ?>
        </div>


<?php get_footer(); ?>