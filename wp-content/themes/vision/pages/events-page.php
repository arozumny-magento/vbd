<?php
/**
 * Template Name: Events
 */

get_header();

$theme = get_stylesheet_directory_uri();
$current_lang = pll_current_language();
?>

    <div class="search-page__wrapper">
        <div class="default__container">
            <div class="title-page__default">
                <div>
                    <h1><?=pll_e('EVENTS')?></h1>
                </div>
                <div><?php get_search_form(); ?></div>
            </div>
        </div>
    </div>

<?php
// Get the latest 2 posts using WP_Query
$events = new WP_Query(array(
    'post_type' => 'event',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
));

if ($events->have_posts()) :
    $pod = pods( 'event', get_the_ID() );
    $today = date( 'Y-m-d H:i:s' );

    $is_expired = strtotime($pod->field('event_date_time')) <= strtotime($today);
    $exp_class = $is_expired ? 'expired' : '';
    $evenEnded = $is_expired ? '<span class="event-over">(Event Ended)</span>' : '';
    $buttonText = $is_expired ? 'Get Recordings' : 'Register';
    ?>

    <div class="w-full relative content-grid project-grid">
        <div class="mx-auto md:grid grid-cols-2 gap-0">
            <?php while ($events->have_posts()) : $events->the_post(); ?>
                <div class="block cursor-pointer"
                     onclick="location.href='<?= get_the_permalink() ?>'">
                    <div class="">
                        <div class="mb-5 lg:mb-8 !text-xl !lg:text-3xl aos-init aos-animate block-header">
                            <h3 class="uppercase !text-xl !lg:text-3xl font-bold"><?php the_title() ?> <?= $evenEnded ?></h3>

                        </div>
                        <div class="mb-3 lg:mb-8 lg:text-lg aos-init aos-animate block-text gap-4 flex flex-col" data-aos="fade-up"
                             data-aos-delay="200">
                            <div class="text-xl flex gap-2">
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2m0-5c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3m-7 2.602c0-3.517 3.271-6.602 7-6.602s7 3.085 7 6.602c0 3.455-2.563 7.543-7 14.527-4.489-7.073-7-11.072-7-14.527m7-7.602c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602"/></svg>
                                <span class="font-bold"><?php the_field('event_place') ?></span>
                            </div>
                            <div class="text-xl flex gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 20h-4v-4h4v4zm-6-10h-4v4h4v-4zm6 0h-4v4h4v-4zm-12 6h-4v4h4v-4zm6 0h-4v4h4v-4zm-6-6h-4v4h4v-4zm16-8v22h-24v-22h3v1c0 1.103.897 2 2 2s2-.897 2-2v-1h10v1c0 1.103.897 2 2 2s2-.897 2-2v-1h3zm-2 6h-20v14h20v-14zm-2-7c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-14 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2z"/></svg>
                                <span class="font-bold"><?php the_field('event_date_time') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>