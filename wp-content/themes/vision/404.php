<?php
/**
 * The template for displaying 404 (page not found).
 * Uses the same layout as the search template.
 *
 * @package Vision
 */

get_header();

$theme = get_stylesheet_directory_uri();
$current_lang = function_exists('pll_current_language') ? pll_current_language() : '';
?>

    <div class="search-page__wrapper">
        <div class="default__container">
            <div class="title-page__default">
                <div>
                    <h1><?php esc_html_e('Page not found', 'vision'); ?></h1>
                </div>
                <div><?php get_search_form(); ?></div>
            </div>
        </div>
    </div>

    <div class="archive-page__section">
        <div class="default__container">
            <p class="search-no-results">
                <?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Try searching above or go back to the homepage.', 'vision'); ?>
            </p>
            <p class="search-no-results">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go to homepage', 'vision'); ?></a>
            </p>
        </div>
    </div>

<?php get_footer(); ?>
