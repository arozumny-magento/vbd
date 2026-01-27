<?php get_header();
// Template Name: Landing Page
// Template Post Type: landing
?>

<?php

$theme = get_stylesheet_directory_uri();
$current_lang = pll_current_language();

?>

<?php if( have_rows('langing_page') ): ?>
    <?php while( have_rows('langing_page') ): the_row(); ?>

        <?php if( get_row_layout() == 'Home_Hero' ): ?>
            <div class="hero-home__wrapper" style="background-image: url(<?php the_sub_field('hero_image'); ?>);">
                <div class="default__container">
                    <div class="heading">
                        <h1><?php the_sub_field('hero_h1'); ?></h1>
                        <h2><?php the_sub_field('hero_h2'); ?></h2>
                        <h3><?php the_sub_field('hero_h3'); ?></h3>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'Home_Topics' ): ?>
            <div class="topics-home__wrapper margin-top" id="topics">
                <div class="default__container">
                    <div class="row-1_3">
                        <div class="column">
                            <h2 class="title-main_h2"><?php the_sub_field('topics_h2'); ?></h2>
                            <h3><?php the_sub_field('topics_desc'); ?></h3>
                        </div>
                        <div class="column row-1_2">
                            <?php if( have_rows('add_block') ): while( have_rows('add_block') ) : the_row();?>
                                <div class="col" style="background-image: url(<?php the_sub_field('background'); ?>">
                                    <div class="title" style="color: <?php the_sub_field('text_color'); ?>"><?php the_sub_field('block_title'); ?></div>
                                    <div class="descr" style="color: <?php the_sub_field('text_color'); ?>">
                                        <?php the_sub_field('block_descr'); ?>
                                    </div>
                                </div>
                            <?php endwhile; else : endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'Home_About' ): ?>
            <div class="about-home__wrapper margin-top" id="about">
                <div class="image-default" style="background-image: url(<?php the_sub_field('add_image');?>);">
                    <div class="clear"></div>
                </div>
                <div class="about-home__content">
                    <div class="about-home__section">
                        <div class="about-home__body">
                            <?php the_sub_field('add_content');?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'Events_For' ): ?>
            <div class="ivent-home__wrapper margin-top">
                <div class="default__container">
                    <h2 class="title-main_h2"><?php the_sub_field('events_h2');?></h2>
                </div>
                <div class="ivent-slider">
                    <?php if( have_rows('add_block') ): while( have_rows('add_block') ) : the_row();?>
                        <div class="ivent-slider__item" style="background-image: url(<?php the_sub_field('background'); ?>);">
                            <div class="ivent-slider__item-content">
                                <span style="color: <?php the_sub_field('text_color'); ?>"><?php the_sub_field('block_title'); ?></span>
                            </div>
                        </div>
                    <?php endwhile; else : endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'Speakers_Home' ): ?>
            <div class="speakers-home__wrapper margin-top" id="speakers">
                <div class="default__container">
                    <div class="row-1_3">
                        <div class="column">
                            <h2 class="title-main_h2"><?php the_sub_field('speakers_h2');?></h2>
                            <h3><?php the_sub_field('speakers_desc');?></h3>
                        </div>
                        <div class="column row-1_1">
                            <?php if( have_rows('add_block') ): while( have_rows('add_block') ) : the_row();

                                global $user1;
                                $user1++;

                                ?>
                                <div class="col">
                                    <div class="col-image">
                                        <img src="<?php the_sub_field('background'); ?>" alt="<?php the_sub_field('block_title'); ?>">
                                    </div>
                                    <div class="col-descr">
                                        <div class="col-descr__user">
                                            <span class="name"><?php the_sub_field('block_title'); ?></span>
                                            <span class="text"><?php the_sub_field('user_position'); ?></span>
                                        </div>
                                        <div class="col-descr__text">
                                            <p><?php the_sub_field('user_description'); ?></p>
                                        </div>
                                        <div class="col-descr__link">
                                            <a rel="modal:open" href="#ex<?php echo $user1 ?>"><?php pll_e('Read more ...');?></a>
                                        </div>
                                    </div>
                                </div>

                                <div id="ex<?php echo $user1 ?>" class="modal modal-user__default">
                                    <div class="modal-user__content">
                                        <div class="modal-user__row">
                                            <div class="column img">
                                                <img src="<?php the_sub_field('background'); ?>" alt="<?php the_sub_field('block_title'); ?>">
                                            </div>
                                            <div class="column txt">
                                                <div class="txt-name"><?php the_sub_field('block_title'); ?></div>
                                                <div class="txt-desc"><?php the_sub_field('user_position'); ?></div>
                                                <div class="text">
                                                    <?php the_sub_field('user_content'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; else : endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'Partners_Home' ): ?>
            <div class="partners-home__wrapper margin-top" id="partners">
                <div class="default__container">
                    <h2 class="title-main_h2"><?php the_sub_field('partners_h2');?></h2>
                </div>
                <div class="default__container">
                    <div class="partners-slider">
                        <?php if( have_rows('add_block') ): while( have_rows('add_block') ) : the_row();?>
                            <div class="ivent-slider__item">
                                <div class="ivent-slider__item-content">
                                    <a target="_blank" href="<?php the_sub_field('add_url'); ?>">
                                        <img src="<?php the_sub_field('background'); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; else : endif; ?>
                    </div>
                    <div class="slider-arrows">
                        <div class="slider-arrow slider-prev prev">
                            <i class="bi bi-arrow-left-short"></i>
                        </div>
                        <div class="slider-arrow slider-next next">
                            <i class="bi bi-arrow-right-short"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'Agenda_Home' ): ?>
            <div class="agenda-home__wrapper margin-top" id="agenda">
                <div class="default__container">
                    <div class="row-1_3">
                        <div class="column">
                            <h2 class="title-main_h2"><?php the_sub_field('agenda_h2');?></h2>
                            <h3><?php the_sub_field('agenda_desc');?></h3>
                        </div>
                        <div class="column row-1_1">
                            <?php if( have_rows('add_block') ): while( have_rows('add_block') ) : the_row();?>
                                <div class="col">
                                    <div class="col-image">
                                        <img src="<?php the_sub_field('background'); ?>" alt="<?php the_sub_field('title'); ?>">
                                        <div class="date">
                                            <span class="date-numb"><?php the_sub_field('add_url'); ?></span>
                                            <div class="time-numb"><?php the_sub_field('time'); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-descr">
                                        <div class="col-descr__text">
                                            <p class="title"><?php the_sub_field('title'); ?></p>
                                            <p class="descr"><?php the_sub_field('descr'); ?></p>
                                        </div>
                                        <div class="col-descr__user">
                                            <div class="user-image">
                                                <img src="<?php the_sub_field('user_image'); ?>" alt="<?php the_sub_field('user_name'); ?>">
                                            </div>
                                            <div class="user-info">
                                                <span class="name"><?php the_sub_field('user_name'); ?></span>
                                                <span class="text"><?php the_sub_field('user_position'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; else : endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( get_row_layout() == 'Register_Block' ): ?>
            <div class="register-home__wrapper margin-top" id="register">
                <div class="image-default" style="background-image: url(<?php the_sub_field('background'); ?>">
                    <div class="clear"></div>
                </div>
                <div class="register-home__content">
                    <div class="register-home__section">
                        <div class="register-home__body">
                            <h2 class="title-main_h2"><?php the_sub_field('add_title'); ?> aa</h2>
                            <div class="form-main__section">
                                <?php echo do_shortcode('[contact-form-7 id="dd85203" title="Contact form - Main"]');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>