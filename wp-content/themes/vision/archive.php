<?php get_header(); ?>

<?php
$theme = get_stylesheet_directory_uri();
$current_lang = pll_current_language();
?>

    <div class="search-page__wrapper">
        <div class="default__container">
            <div class="title-page__default">
                <div>
                    <h1><?php echo single_cat_title('', false); ?></h1>
                </div>
                <div><?php get_search_form(); ?></div>
            </div>
        </div>
    </div>

<?php if (single_cat_title('', false) === 'Projects' || single_cat_title('', false) === 'مشاريع'): ?>
    <div class="w-full relative content-grid project-grid">
        <div class="mx-auto md:grid grid-cols-2 gap-0">
            <?php while (have_posts()) : the_post(); ?>
                <div class="block cursor-pointer" style="padding: 0;">
                    <a href="<?= get_the_permalink() ?>" style="display: flex; padding:0; margin: 0;">
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
                    </a>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
<?php else : ?>
    <?php get_template_part('template-parts/archive-posts-list'); ?>
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