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
        $about = get_field('about_section');
        if ($about) :
            $row = null;
            $row = $about['section_row'];

            if (isset($row)):
                $leftBlock = $row['left_block'] ?? array();
                $rightBlock = $row['right_block'] ?? array();
                ?>
                <section class="section" id="about">
                    <header class="header">
                        <?php if ($about['section_label']) : ?>
                            <h2><?= $about['section_label'] ?></h2>
                        <?php endif; ?>
                    </header>
                    <?php if ($row): ?>
                        <div class="row two-col">
                            <?php echo vision_render_row_block($leftBlock); ?>
                            <?php echo vision_render_row_block($rightBlock); ?>
                        </div>
                    <?php endif; ?>
                </section>
            <?php endif; ?>
        <?php endif; ?>

        <!-- 3. Services -->
        <?php
        $services = get_field('services_section');
        if ( ! empty( $services ) && ! empty( $services['section_row'] ) && is_array( $services['section_row'] ) ) :
            ?>
            <section class="section" id="services">
                <header class="header">
                    <?php if ( ! empty( $services['section_label'] ) ) : ?>
                        <h2><?php echo esc_html( $services['section_label'] ); ?></h2>
                    <?php endif; ?>
                </header>
                <?php
                foreach ( $services['section_row'] as $row ) :
                    $leftBlock  = $row['left_block'] ?? array();
                    $rightBlock = $row['right_block'] ?? array();
                    ?>
                    <div class="row two-col">
                        <?php echo vision_render_row_block( $leftBlock ); ?>
                        <?php echo vision_render_row_block( $rightBlock ); ?>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <!-- Testimonials -->
        <?php
        $testimonials = get_field('testimonials_section');
        if ( ! empty( $testimonials ) && ! empty( $testimonials['section_row'] ) && is_array( $testimonials['section_row'] ) ) :
            ?>
            <section class="section" id="services">
                <header class="header">
                    <?php if ( ! empty( $testimonials['section_label'] ) ) : ?>
                        <h2><?php echo esc_html( $testimonials['section_label'] ); ?></h2>
                    <?php endif; ?>
                </header>
                <?php
                foreach ( $testimonials['section_row'] as $row ) :
                    $leftBlock  = $row['left_block'] ?? array();
                    $rightBlock = $row['right_block'] ?? array();
                    ?>
                    <div class="row two-col">
                        <?php echo vision_render_testimonials_row_block( $leftBlock ); ?>
                        <?php echo vision_render_testimonials_row_block( $rightBlock ); ?>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

        <!-- 5. Partners -->
        <?php $partners = get_field('partners_section'); if ( ! empty( $partners ) ) : ?>
            <section class="section partners" id="partners" style="background-color: <?= $partners['background_color'] ?? '' ?> ">
                <header class="header">
                    <?php if ( ! empty( $partners['section_label'] ) ) : ?>
                        <h2><?php echo esc_html( $partners['section_label'] ); ?></h2>
                    <?php endif; ?>
                </header>
                    <ul>
                        <?php foreach ($partners['partners_logo'] as $partner) : ?>
                            <li><a href="<?= $partner['link'] ?>"><img src="<?= $partner['logo'] ?>"
                                                                            title="<?= $partner['title'] ?>"/></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
            </section>
        <?php endif; ?>

        <!-- 6. News -->
        <?php
        $news = get_field('news_section');
        if ( ! empty( $news ) && ! empty( $news['section_row'] ) && is_array( $news['section_row'] ) ) :
            ?>
            <section class="section" id="services">
                <header class="header">
                    <?php if ( ! empty( $news['section_label'] ) ) : ?>
                        <h2><?php echo esc_html( $news['section_label'] ); ?></h2>
                    <?php endif; ?>
                </header>
                <?php
                foreach ( $news['section_row'] as $row ) :
                    $leftBlock  = $row['left_block'] ?? array();
                    $rightBlock = $row['right_block'] ?? array();
                    ?>
                    <div class="row two-col">
                        <?php echo vision_render_row_block( $leftBlock ); ?>
                        <?php echo vision_render_row_block( $rightBlock ); ?>
                    </div>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>

    </main>
<?php
get_footer();
