<?php
/**
 * Template Name: VBD Home
 *
 * Structure: 6 sections. Each section has header and rows; each row has block-left and block-right.
 * One class per tag. No Tailwind.
 */

get_header();

?>
    <main class="main">

        <!-- 1. Hero -->
        <?php if ($heroBlock = get_field('hero_block')) : ?>
            <section class="section" id="hero">
                <header class="header">
                    <h1><?= $heroBlock['main_title'] ?></h1>
                </header>
                <div class="row">
                    <div class="block-right">
                        <?php if (!empty($heroBlock['hero_video'])) : ?>
                            <video autoplay loop muted disablepictureinpicture
                                   poster="<?php echo esc_url($heroBlock['hero_image'] ?? '') ?>"
                                   src="<?php echo esc_url($heroBlock['hero_video']) ?>"
                            >
                                <source src="<?php echo esc_url($heroBlock['hero_video']) ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- 2. About -->
        <?php
        $about_us = get_field('about_section');
        if ($about_us) :
            $row = null;
            $row = $about_us['section_row'];

            if (isset($row)):
                $block = $row['left_block'] ?? array();
                $blockSettings = $block['block_settings'] ?? array();
                $blockType = strtolower($blockSettings['block_type']) ?? '';
                $blockTheme = strtolower($blockSettings['block_theme']) ?? '';
                $blockLink = strtolower($blockSettings['block_link']) ?? '';
                $blockOrder = $blockSettings['order'] ?? '';
                $customStyles = $blockTheme == 'custom' ?
                    "background-color:" . $block['custom_styles']['background_color'] .";" .
                    "color:" . $block['custom_styles']['text_color'] .";" : "";

                $rightBlock = $row['right_block'] ?? array();

                $link = $blockLink == 'Page' ? $block['link_to_page'] : $block['block_url'];
                ?>
                <section class="section" id="about">
                    <header class="header">
                        <?php if (isset($about_us['section_label'])) : ?>
                            <h2><?= $about_us['section_label'] ?></h2>
                        <?php endif; ?>
                    </header>
                    <?php if ($row): ?>
                        <div class="row two-col">
                            <!-- LEFT BLOCK -->
                            <!-- Type Media -->
                            <?php if ($blockType == 'media'): ?>
                                <?php if($link): ?>
                                    <a href="#">
                                <?php endif; ?>
                                    <div class="block-type-<?=$blockType?> block-style-<?=$blockTheme?>"
                                            style="
                                                    background: url: (<?= $block['media_block']['background_image'] ?>);
                                                    <?= $customStyles ?>
                                                    "
                                    >
                                    </div>
                                <?php if($link): ?>
                                </a>
                                    <?php endif; ?>
                            <?php endif; ?>

                            <!-- Type Text -->
                            <?php if ($blockType == 'text'): ?>
                                <?php if($link): ?>
                                    <a href="#">
                                <?php endif; ?>
                                    <div class="block-type-<?=$blockType?> block-style-<?=$blockTheme?>" style="<?= $customStyles ?>">
                                        <?php if (!empty($block['text_block']['header'])) : ?>
                                            <h3><?=$block['text_block']['header'] ?></h3>
                                        <?php endif; ?>

                                        <?php echo wp_kses_post(wpautop($block['text_block']['text'] ?? '')); ?>

                                        <?php if (!empty($block['text_block']['read_more'])) : ?>
                                            <span><?php pll_e('Read More'); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php if($link): ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <!-- END LEFT BLOCK -->

                            <div class="block-right">
                                <?php if (!empty($ar['header'])) : ?>
                                    <h3><?php echo esc_html($ar['header']); ?></h3><?php endif; ?>
                                <?php echo wp_kses_post(wpautop($ar['description'] ?? '')); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>
        <?php endif; ?>

        <!-- 3. Services -->
        <?php if (have_rows('services')) : ?>
            <section class="section" id="services">
                <header class="header">
                    <h2><?php esc_html_e('Services', 'vision'); ?></h2>
                </header>
                <?php
                while (have_rows('services')) :
                    the_row();
                    $sl = get_sub_field('left_block');
                    $sr = get_sub_field('right_block');
                    ?>
                    <div class="row">
                        <div class="block-left">
                            <?php if (!empty($sl['link'])) : ?><a
                                    href="<?php echo esc_url($sl['link']); ?>"><?php endif; ?>
                                <?php if (!empty($sl['header'])) : ?>
                                    <h3><?php echo esc_html($sl['header']); ?></h3><?php endif; ?>
                                <?php echo wp_kses_post($sl['text'] ?? ''); ?>
                                <?php if (!empty($sl['link'])) : ?>
                                    <span><?php pll_e('Read More'); ?></span><?php endif; ?>
                                <?php if (!empty($sl['link'])) : ?></a><?php endif; ?>
                        </div>
                        <div class="block-right">
                            <?php if (!empty($sr['link'])) : ?><a
                                    href="<?php echo esc_url($sr['link']); ?>"><?php endif; ?>
                                <?php if (!empty($sr['header'])) : ?>
                                    <h3><?php echo esc_html($sr['header']); ?></h3><?php endif; ?>
                                <?php echo wp_kses_post($sr['text'] ?? ''); ?>
                                <?php if (!empty($sr['link'])) : ?>
                                    <span><?php pll_e('Read More'); ?></span><?php endif; ?>
                                <?php if (!empty($sr['link'])) : ?></a><?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <!-- 4. Testimonials -->
        <?php
        $testimonials_query = new WP_Query(array(
            'post_type' => 'testimonial',
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ));
        if ($testimonials_query->have_posts()) :
            ?>
            <section class="section" id="testimonials">
                <header class="header">
                    <h2><?php esc_html_e('Testimonials', 'vision'); ?></h2>
                </header>
                <?php
                $row_count = 0;
                while ($testimonials_query->have_posts()) :
                    $testimonials_query->the_post();
                    if ($row_count % 2 === 0) {
                        echo '<div class="row">';
                    }
                    $logo = get_field('testimonial_logo');
                    $logo_url = is_array($logo) ? ($logo['url'] ?? '') : (is_numeric($logo) ? wp_get_attachment_image_url((int)$logo, 'full') : (string)$logo);
                    ?>
                    <div class="<?php echo ($row_count % 2 === 0) ? 'block-left' : 'block-right'; ?>">
                        <h3><?php echo esc_html(get_field('company')); ?></h3>
                        <span><?php echo esc_html(get_field('testimonial_author')); ?></span>
                        <?php if ($logo_url) : ?><img src="<?php echo esc_url($logo_url); ?>" alt=""><?php endif; ?>
                        <?php echo wp_kses_post(wpautop(get_field('feedback'))); ?>
                    </div>
                    <?php
                    if ($row_count % 2 === 1) {
                        echo '</div>';
                    }
                    $row_count++;
                endwhile;
                if ($row_count % 2 === 1) {
                    echo '</div>';
                }
                wp_reset_postdata();
                ?>
            </section>
        <?php endif; ?>

        <!-- 5. Partners -->
        <?php if (have_rows('partners')) : ?>
            <section class="section" id="partners">
                <header class="header">
                    <h2><?php pll_e('PARTNERS'); ?></h2>
                </header>
                <div class="row">
                    <div class="block-left"></div>
                    <div class="block-right">
                        <ul>
                            <?php
                            while (have_rows('partners')) :
                                the_row();
                                ?>
                                <li><a href="<?php echo esc_url(get_sub_field('link')); ?>"><img
                                                src="<?php echo esc_url(get_sub_field('logo')); ?>"
                                                title="<?php echo esc_attr(get_sub_field('title')); ?>" alt=""></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- 6. News -->
        <?php
        $news_query = new WP_Query(array(
            'lang' => 'eng',
            'posts_per_page' => 2,
            'category_name' => 'updates',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ));
        if ($news_query->have_posts()) :
            ?>
            <section class="section" id="news">
                <header class="header">
                    <h2><?php esc_html_e('News', 'vision'); ?></h2>
                </header>
                <?php
                while ($news_query->have_posts()) :
                    $news_query->the_post();
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <div class="row">
                        <div class="block-left">
                            <?php if ($thumb) : ?><a href="<?php the_permalink(); ?>"><img
                                        src="<?php echo esc_url($thumb); ?>" alt=""></a><?php endif; ?>
                        </div>
                        <div class="block-right">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                                <span><?php pll_e('Read More'); ?></span>
                            </a>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </section>
        <?php endif; ?>

    </main>
<?php
get_footer();
