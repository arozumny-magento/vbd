<?php
/**
 * The main template file
 *
 * @package Vision
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', get_post_format());
        }
        
        the_posts_navigation();
    } else {
        get_template_part('template-parts/content', 'none');
    }
    ?>
</main>

<?php
get_sidebar();
get_footer();
