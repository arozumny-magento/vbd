<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class('body-padding-top home global'); ?> data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0">
    <?php wp_body_open(); ?>

<header class="fixed inset-x-0 top-0 z-50 border-b border-solid border-slate-200 bg-white admin-bar-offset">

    <nav class="mx-auto px-6 pb-0 lg:px-20 bg-white" aria-label="Global">
        <div class="flex justify-between">
            <div class="py-1 lg:py-3 xl:py-5 bg-white flex justify-between items-center w-full xl:w-fit">
                <?php
                // Logo in menu for desktop (via menu item with title "Logo")
                // For mobile, show logo in header area
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="max-w-fit xl:hidden flex-shrink-0" rel="home">
                    <span class="sr-only"><?php echo esc_html(get_bloginfo('name')); ?></span>
                    <img src="<?php echo esc_url(vision_get_logo_url()); ?>" alt="<?php echo esc_attr(vision_get_logo_alt()); ?>"
                         class="md:max-w-[200px] relative lg:max-w-[200px] xl:max-w-[200px]"
                         width="200" height="auto">
                </a>
                <div class="xl:hidden flex items-center gap-2 md:gap-6 flex-shrink-0">
                    <div class="block">
                        <div class="flex flex-row gap-2 md:gap-6 justify-between items-center relative">
                            <?php get_template_part('template-parts/header/language-switcher'); ?>
                        </div>
                    </div>
                    <button 
                        type="button"
                        x-data
                        @click="$dispatch('toggle-mobile-menu')"
                        class="inline-flex items-center justify-center rounded-md p-2.5 text-dark-blue nav-toggler mt-0 z-50 relative flex-shrink-0"
                        aria-label="<?php esc_attr_e('Toggle mobile menu', 'vision'); ?>"
                        aria-controls="mobile-menu"
                        data-culture="<?php echo esc_attr(vision_get_current_language()); ?>" 
                        data-region="global"
                    >
                        <span class="sr-only"><?php esc_html_e('Open main menu', 'vision'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="41.557" height="16" viewBox="0 0 41.557 16"
                             class="h-10 w-10" aria-hidden="true">
                            <line class="line1" id="Line_389" data-name="Line 389" x2="39.557"
                                  transform="translate(1 1)" fill="none" stroke="#00012E" stroke-linecap="round"
                                  stroke-width="2"></line>
                            <line class="line2" id="Line_390" data-name="Line 390" x2="39.557"
                                  transform="translate(1 8)" fill="none" stroke="#00012E" stroke-linecap="round"
                                  stroke-width="2"></line>
                            <line class="line3" id="Line_391" data-name="Line 391" x2="39.557"
                                  transform="translate(1 15)" fill="none" stroke="#00012E" stroke-linecap="round"
                                  stroke-width="2"></line>
                        </svg>
                    </button>
                </div>
            </div>


            <?php
            /**
             * Desktop Navigation
             * Uses WordPress menu system with Max Mega Menu support
             * 
             * @since 1.0.0
             */
            if (has_nav_menu('primary')) {
                // Check if Max Mega Menu is enabled
                $mega_menu_enabled = function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary');
                
                $menu_args = array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'hidden xl:py-6 lg:px-8 bg-white border-r border-slate-200 xl:flex items-center justify-around w-full xl:gap-8',
                    'fallback_cb' => false,
                );
                
                // Only use custom walker if Max Mega Menu is not enabled
                if (!$mega_menu_enabled) {
                    $menu_args['walker'] = new Vision_Walker_Nav_Menu();
                } else {
                    // Apply same classes to Max Mega Menu via filters
                    add_filter('megamenu_nav_menu_args', function($args, $menu_id, $location) use ($menu_args) {
                        // Apply the same menu_class
                        if (isset($menu_args['menu_class'])) {
                            $args['menu_class'] = $menu_args['menu_class'] . ' ' . (isset($args['menu_class']) ? $args['menu_class'] : '');
                        }
                        return $args;
                    }, 10, 3);
                    
                    // Add group and about-group classes to menu items (same as walker)
                    add_filter('megamenu_nav_menu_css_class', function($classes, $item, $args) {
                        $title = strtolower(trim($item->title));
                        // Add group classes except for logo items
                        if ($title !== 'logo') {
                            $classes[] = 'group';
                            $classes[] = 'about-group';
                        } else {
                            $classes[] = 'menu-item-logo';
                        }
                        return $classes;
                    }, 10, 3);
                    
                    // Add nav-link class and typography classes to links (same as walker)
                    add_filter('megamenu_nav_menu_link_attributes', function($atts, $item, $args) {
                        $title = strtolower(trim($item->title));
                        if ($title === 'logo') {
                            // Logo item - same classes as walker
                            if (isset($atts['class'])) {
                                $atts['class'] .= ' max-w-fit';
                            } else {
                                $atts['class'] = 'max-w-fit';
                            }
                        } else {
                            // Regular menu item - same classes as walker
                            if (isset($atts['class'])) {
                                $atts['class'] .= ' uppercase text-sm font-normal leading-8 text-gray-900 nav-link';
                            } else {
                                $atts['class'] = 'uppercase text-sm font-normal leading-8 text-gray-900 nav-link';
                            }
                        }
                        return $atts;
                    }, 10, 3);
                }
                
                wp_nav_menu($menu_args);
            } else {
                // Fallback navigation if menu not set
                get_template_part('template-parts/header/navigation-fallback');
            }
            ?>
            <div class="global bg-white hidden lg:py-6 relative xl:flex xl:items-center xl:justify-evenly xl:gap-10 xl:px-6 2xl:px-20">
                <div class="flex flex-row gap-2 md:gap-6 justify-between items-center relative">
                    <?php get_template_part('template-parts/header/language-switcher'); ?>
                </div>
            </div>
        </div>
    </nav>

    <div data-region="global" class=" regional-menu mobile-menu hidden xl:hidden bg-dark-blue" role="dialog"
         aria-modal="true">
        <div class="absolute top-16 lg:top-20 inset-0 z-50 min-h-fit overflow-y-auto  px-0 py-0 w-full h-screen bg-dark-blue">
            <div class="flow-root">
                <div>
                    <div class="flex border-b border-[#343A61] lg:px-6 xl:px-0">
                        <a href="<?php echo esc_url(home_url('/client-login/')); ?>"
                           class="text-white uppercase py-4 px-6 flex justify-between items-center hover:text-bright-blue-500">
                            <svg id="Group_1127" data-name="Group 1127" xmlns="http://www.w3.org/2000/svg" width="27.5"
                                 height="27.5" viewBox="0 0 27.5 27.5">
                                <g id="Ellipse_330" data-name="Ellipse 330" transform="translate(0 0)" fill="none"
                                   stroke="#fff" stroke-width="1">
                                    <circle cx="13.75" cy="13.75" r="13.75" stroke="none"></circle>
                                    <circle cx="13.75" cy="13.75" r="13.25" fill="none"></circle>
                                </g>
                                <g id="Group_1126" data-name="Group 1126" transform="translate(5.201 5.946)">
                                    <g id="Ellipse_331" data-name="Ellipse 331" transform="translate(3.845)" fill="none"
                                       stroke="#fff" stroke-width="1.5">
                                        <circle cx="4.459" cy="4.459" r="4.459" stroke="none"></circle>
                                        <circle cx="4.459" cy="4.459" r="3.959" fill="none"></circle>
                                    </g>
                                    <g id="Path_661" data-name="Path 661" transform="translate(0 8.547)" fill="none">
                                        <path d="M8.306,0c4.587,0,8.306,2.329,8.306,5.2S0,8.076,0,5.2,3.719,0,8.306,0Z"
                                              stroke="none"></path>
                                        <path d="M 8.305598258972168 0.999997615814209 C 4.390997886657715 0.999997615814209 1.07685375213623 2.880799293518066 1.001312255859375 5.124534606933594 C 1.150360107421875 5.280086517333984 1.76099681854248 5.648135185241699 3.29489803314209 5.944828033447266 C 4.67145824432373 6.211087703704834 6.450958251953125 6.357728004455566 8.305598258972168 6.357728004455566 C 10.16023826599121 6.357728004455566 11.93973827362061 6.211087703704834 13.31629848480225 5.944828033447266 C 14.85019874572754 5.648135185241699 15.46083641052246 5.280086517333984 15.60988426208496 5.124534606933594 C 15.53434276580811 2.880799293518066 12.2201976776123 0.999997615814209 8.305598258972168 0.999997615814209 M 8.305598258972168 -1.9073486328125e-06 C 12.89265823364258 -1.9073486328125e-06 16.61119842529297 2.329327583312988 16.61119842529297 5.20269775390625 C 16.61119842529297 8.076077461242676 -1.9073486328125e-06 8.076078414916992 -1.9073486328125e-06 5.20269775390625 C -1.9073486328125e-06 2.329327583312988 3.718547821044922 -1.9073486328125e-06 8.305598258972168 -1.9073486328125e-06 Z"
                                              stroke="none" fill="#fff"></path>
                                    </g>
                                </g>
                            </svg>
                            <span class="pl-3">Log in</span>
                        </a>
                    </div>
                    <div>
                        <div class="mob-locations-menu hidden">
                            <a href="<?php echo esc_url(home_url('/locations')); ?>"
                               class="text-white flex items-center uppercase  py-8 px-8  border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-light-blue-900 hover:border-l-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294"
                                     viewBox="0 0 11.122 11.294" class="mr-4">
                                    <path id="Path_356" data-name="Path 356" d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)" fill="#107FFF"></path>
                                </svg>
                                <span>All locations</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               class="text-white flex items-center uppercase  py-8 px-8  border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-mid-blue hover:border-l-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294"
                                     viewBox="0 0 11.122 11.294" class="mr-4">
                                    <path id="Path_356" data-name="Path 356" d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)" fill="#6CB2FF"></path>
                                </svg>
                                <span>Global</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/americas-caribbean/')); ?>"
                               class="text-white flex items-center uppercase py-8 px-8  border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-[#DBFE87] hover:border-l-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294"
                                     viewBox="0 0 11.122 11.294" class="mr-4">
                                    <path id="Path_356" data-name="Path 356" d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)" fill="#DBFE87"></path>
                                </svg>
                                <span>Americas / Caribbean</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/amea/')); ?>"
                               class="text-white flex items-center uppercase py-8 px-8  border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-[#58D6C8] hover:border-l-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294"
                                     viewBox="0 0 11.122 11.294" class="mr-4">
                                    <path id="Path_356" data-name="Path 356" d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)" fill="#58D6C8"></path>
                                </svg>
                                <span>Asia / Middle East / Africa</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/europe/')); ?>"
                               class="text-white flex items-center uppercase py-8 px-8  border-b border-b-[#343A61] border-l-4 border-l-dark-blue hover:border-l-[#FF9456] hover:border-l-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294"
                                     viewBox="0 0 11.122 11.294" class="mr-4">
                                    <path id="Path_356" data-name="Path 356" d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)" fill="#FF9456"></path>
                                </svg>
                                <span>Europe</span>
                            </a>
                        </div>


                        <div class="nav-item-container">
                            <a href="<?php echo esc_url(home_url('/#')); ?>"
                               class="nav-item text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                <span>About</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </a>
                            <div class="hidden sub-nav">
                                <div class="uppercase flex justify-between items-center text-mid-blue py-4 px-6 lg:px-12 border-b border-[#343A61] cursor-pointer back-btn">
                                    <span>Back</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </div>
                                <a href="<?php echo esc_url(home_url('/about-us')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>About</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/about-us/vision')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Vision</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/about-us/people')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>People</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/about-us/careers')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Careers</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/about-us/our-community')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Community</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>


                        <div class="nav-item-container">
                            <a href="<?php echo esc_url(home_url('/#')); ?>"
                               class="nav-item text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                <span>Services</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </a>
                            <div class="hidden sub-nav">
                                <div class="uppercase flex justify-between items-center text-mid-blue py-4 px-6 lg:px-12 border-b border-[#343A61] cursor-pointer back-btn">
                                    <span>Back</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </div>
                                <a href="<?php echo esc_url(home_url('/services')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Services</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/services/fund-administration')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Funds</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/services/private-clients')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Private Clients</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/services/corporate-clients')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Corporate Clients</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/services/marine')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Marine</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>


                        <div class="nav-item-container">
                            <a href="<?php echo esc_url(home_url('/#')); ?>"
                               class="nav-item text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                <span>Partners</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </a>
                            <div class="hidden sub-nav">
                                <div class="uppercase flex justify-between items-center text-mid-blue py-4 px-6 lg:px-12 border-b border-[#343A61] cursor-pointer back-btn">
                                    <span>Back</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </div>
                                <a href="<?php echo esc_url(home_url('/#')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Partners</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/americas-caribbean')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Americas &amp; Caribbean</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/amea')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>AMEA</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/europe')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Europe</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>


                        <div class="nav-item-container">
                            <a href="<?php echo esc_url(home_url('/#')); ?>"
                               class="nav-item text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                <span>Resources</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </a>
                            <div class="hidden sub-nav">
                                <div class="uppercase flex justify-between items-center text-mid-blue py-4 px-6 lg:px-12 border-b border-[#343A61] cursor-pointer back-btn">
                                    <span>Back</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </div>
                                <a href="<?php echo esc_url(home_url('/knowledge')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Resources</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/knowledge/news')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>News</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/knowledge/insights')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Insights</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/knowledge/brochures-fact-sheets')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Brochures &amp; Fact Sheets</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/knowledge/awards-accolades')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Awards &amp; Accolades</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>


                        <div class="nav-item-container">
                            <a href="<?php echo esc_url(home_url('/#')); ?>"
                               class="nav-item text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                <span>Contact</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </a>
                            <div class="hidden sub-nav">
                                <div class="uppercase flex justify-between items-center text-mid-blue py-4 px-6 lg:px-12 border-b border-[#343A61] cursor-pointer back-btn">
                                    <span>Back</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-180">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </div>
                                <a href="<?php echo esc_url(home_url('/contact')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Contact</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/contact')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Get in touch</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/staff-directory')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Staff Directory</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/locations')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Find an office</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/legal')); ?>"
                                   class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue">
                                    <span>Legal</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>

                    </div>
                    <div class="pt-4 pb-6 lg:px-6">
                        <p class="px-6 pt-10 text-white tracking-wider uppercase text-sm mb-2">Quick Links</p>
                        <a href="<?php echo esc_url(home_url('/services/funds')); ?>"
                           class="text-white uppercase py-4 px-6 flex items-center tracking-wider plaakBold text-sm hover:text-bright-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294"
                                 viewBox="0 0 11.122 11.294" class="mr-4">
                                <path id="Path_356" data-name="Path 356" d="M26.1,37.409,37.222,26.116H26.1Z"
                                      transform="translate(-26.1 -26.115)" fill="#007cff"></path>
                            </svg>
                            <span>Funds</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/services/private-clients')); ?>"
                           class="text-white uppercase -mt-4 py-4 px-6 flex items-center tracking-wider plaakBold text-sm hover:text-bright-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294"
                                 viewBox="0 0 11.122 11.294" class="mr-4">
                                <path id="Path_356" data-name="Path 356" d="M26.1,37.409,37.222,26.116H26.1Z"
                                      transform="translate(-26.1 -26.115)" fill="#007cff"></path>
                            </svg>
                            <span>Private Clients</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
