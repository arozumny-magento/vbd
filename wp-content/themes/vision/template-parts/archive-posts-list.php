<?php
/**
 * Template part for displaying archive/search posts in list layout.
 * Used by archive.php (default layout) and search.php.
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="archive-page__section">
    <div class="default__container">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="column">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>">
                        <span class="img"
                              style="background: url('<?php echo esc_url(get_the_post_thumbnail_url() ?: ''); ?>');"></span>
                        <span class="txt">
                            <span class="author">
                                <span class="author-image">
                                    <img src="/wp-content/uploads/2025/07/znimok-ekrana-2025-07-17-o-14.05.07.png"
                                         alt="Konstantin Gridin">
                                </span>
                                <span class="author-descr">
                                    <span class="author-descr__name"><?php pll_e('Konstantin Gridin'); ?></span>
                                    <span class="author-descr__time">
                                        <?php echo esc_html(get_the_date()); ?> | <span class="time"><?php the_field('time_to_read'); ?></span>
                                    </span>
                                </span>
                            </span>
                            <span class="txt-content">
                                <span class="txt-content__main">
                                    <span class="txt-content__title">
                                        <?php the_title(); ?>
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
