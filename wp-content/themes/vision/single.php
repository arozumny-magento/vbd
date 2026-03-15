<?php
/**
 * The template for displaying all single posts
 *
 * @package Vision
 */

get_header();

// Check if Elementor is being used for this post
$elementor_active = class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID());

if ($elementor_active) {
    // Elementor template - let Elementor handle the content
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
} else {
    // Fallback to custom template
    ?>
    <main id="main" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>

        <div class="umb-block-list">

            <div class="w-full relative" >
                <div class="mx-auto md:grid grid-cols-2 overflow-hidden gap-0">
                    <div class="bg-lightblue flex justify-center items-start flex-col p-6 md:p-10 lg:py-20 lg:px-20">
                        <h1 class="w-full text-3xl text-center md:text-sm text-left"><?php the_title() ?></h1>
                        <?php if (has_category('project')) : ?>
                            <div class="default__container mt-8">
                                <div class="project-columns__post flex flex-col gap-2">
                                        <span class="txt-block flex gap-4">
                                            <span class="txt-name"><?php pll_e('Industry'); ?></span>
                                            <span class="txt-title font-bold"><?php the_field('industry'); ?></span>
                                        </span>
                                        <span class="txt-block flex gap-4">
                                            <span class="txt-name"><?php pll_e('Project Type'); ?></span>
                                            <span class="txt-title font-bold"><?php the_field('type'); ?></span>
                                        </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                    <div class="block bg-white relative" style="max-height: 310px;">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="" class="w-full h-full object-cover">
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w-full relative" >
                <div class="card-grid relative bg-white p-6 md:p-10 lg:py-20 lg:px-20 white-bg">
                    <div class="max-auto text-xl" style="max-width: 1024px; margin: 0 auto">
                        <?php the_content(); ?>

                        <div class="single-post__section">
                            <div class="default__container">

                                <div class="single-post__content">

                                    <?php if (has_category('project')) { ?>

                                        <?php
                                        $sub_value4 = get_field('project_description');
                                        $sub_value5 = get_field('project_objectives');
                                        $sub_value6 = get_field('success_criteria');
                                        $sub_value7 = get_field('accomplishments');
                                        ?>

                                        <div class="panel-column">
                                            <div class="col">
                                                <p class="title"><?php pll_e('Project Description and Objectives'); ?></p>
                                                <p class="descr"><?php echo $sub_value4 ?></p>
                                            </div>
                                            <div class="col">
                                                <p class="title"><?php pll_e('Accomplishments'); ?></p>
                                                <p class="descr"><?php echo $sub_value7 ?></p>
                                            </div>
                                            <div class="col">
                                                <p class="title"><?php pll_e('Project objectives met'); ?></p>
                                                <p class="descr"><?php echo $sub_value5 ?></p>
                                            </div>
                                            <div class="col">
                                                <p class="title"><?php pll_e('Success criteria met'); ?></p>
                                                <p class="descr"><?php echo $sub_value6 ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </main>
    <?php
}
//get_sidebar();
get_footer();
