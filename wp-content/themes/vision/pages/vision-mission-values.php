<?php get_header();
// Template Name: Vision Mission Values
?>

<?php
$theme = get_stylesheet_directory_uri();
$current_lang = pll_current_language();
?>
<main id="main" class="site-main">
    <?php while (have_posts()) : the_post(); ?>
        <div class="umb-block-list">
            <!-- VISION -->
            <?php $vision = get_field('vision') ?>
            <div class="w-full relative info-section">
                <div class="w-full relative">
                    <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                        <div class="content-text block-<?= strtolower($vision['left_block']['style']) ?>">
                            <div class="heading"><?= $vision['left_block']['header'] ?></div>
                            <div class="full-text"><?= wpautop($vision['left_block']['description']) ?></div>
                        </div>
                        <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                            <img src="<?= $vision['right_block']['background_image'] ?>" alt=""
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INFO SECTION -->

            <!-- MISSION -->
            <?php $mission = get_field('mission') ?>
            <div class="w-full relative info-section">
                <div class="w-full relative">
                    <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                        <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                            <img src="<?= $mission['left_block']['background_image'] ?>" alt=""
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="content-text block-<?= strtolower($mission['right_block']['style']) ?>">
                            <div class="heading"><?= $mission['right_block']['header'] ?></div>
                            <div class="full-text"><?= wpautop($mission['right_block']['description']) ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MISSION -->

            <!-- VALUES -->
            <?php $values = get_field('values') ?>
            <div class="w-full relative info-section">
                <div class="w-full relative">
                    <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                        <div class="content-text block-<?= strtolower($values['left_block']['style']) ?>">
                            <div class="heading"><?= $values['left_block']['header'] ?></div>
                            <div class="full-text"><?= wpautop($values['left_block']['description']) ?></div>
                        </div>
                        <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                            <img src="<?= $values['right_block']['background_image'] ?>" alt=""
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END VALUES -->
        </div>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
