<?php
/**
 * The template for displaying search results.
 * Implements the same layout as the archive template (list view).
 *
 * @package Vision
 */

get_header();

$theme = get_stylesheet_directory_uri();
$current_lang = function_exists('pll_current_language') ? pll_current_language() : '';
$search_query = get_search_query();
?>

    <div class="search-page__wrapper">
        <div class="default__container">
            <div class="title-page__default">
                <div>
                    <h1>
                        <?php
                        if ($search_query) {
                            /* translators: %s: search query */
                            printf(esc_html__('Search results for: %s', 'vision'), '<span>' . esc_html($search_query) . '</span>');
                        } else {
                            esc_html_e('Search', 'vision');
                        }
                        ?>
                    </h1>
                </div>
                <div><?php get_search_form(); ?></div>
            </div>
        </div>
    </div>

<?php if (have_posts()) : ?>

    <?php get_template_part('template-parts/archive-posts-list'); ?>

    <div class="news-archive__navigation">
        <?php
        the_posts_pagination([
            'mid_size'  => 2,
            'end_size'  => 1,
            'prev_text' => '«',
            'next_text' => '»',
            'screen_reader_text' => __('Posts navigation', 'vision'),
        ]);
        ?>
    </div>

<?php else : ?>

    <div class="archive-page__section">
        <div class="default__container">
            <p class="search-no-results">
                <?php esc_html_e('Sorry, no results were found. Please try again with different keywords.', 'vision'); ?>
            </p>
        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>
