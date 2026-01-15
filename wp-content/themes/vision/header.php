<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class('body-padding-top home global'); ?> data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0">

<header class="fixed inset-x-0 top-0 z-50 border-b border-solid border-slate-200 bg-white">
    <nav class="mx-auto px-6 pb-0 lg:px-20 bg-white" aria-label="Global">
        <div class="flex justify-between">
            <div class="py-1 lg:py-3 xl:py-5 bg-white flex justify-between items-center w-full xl:w-fit">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="max-w-fit" rel="home">
                    <span class="sr-only"><?php echo esc_html(get_bloginfo('name')); ?></span>
                    <img src="<?php echo esc_url(vision_get_logo_url()); ?>" alt="<?php echo esc_attr(vision_get_logo_alt()); ?>"
                         class="lg:-left-[45px] xl:-left-[15px] max-w-[170px] md:max-w-[200px] relative lg:max-w-[200px] xl:max-w-[200px]"
                         width="200" height="auto" loading="eager">
                </a>
                <div class="xl:hidden flex items-center gap-2 md:gap-6 w-fit">
                    <div class="block">


                        <div class="flex flex-row gap-2 md:gap-6 justify-between items-center relative">
                            <!-- Language selector -->
                            <div class="custom-dropdown relative inline-block w-full lg:w-auto">
                                <!-- Toggle button -->
                                <button type="button"
                                        class="dropdown-toggle w-full bg-white text-dark-blue uppercase plaakBold py-4 px-1 md:px-4 flex justify-between items-center cursor-pointer gap-4">
                                    <span class="border-b-4 border-b-bright-blue text-sm md:text-base">EN</span>
                                    <svg id="language-picker-icon" xmlns="http://www.w3.org/2000/svg" width="9.719"
                                         height="5.719" viewBox="0 0 9.719 5.719">
                                        <path id="Path_3602" data-name="Path 3602" d="M.018-1.029l4.5,4.652,4.5-4.652"
                                              transform="translate(0.342 1.377)" fill="none" stroke="#00022e"
                                              stroke-width="1"></path>
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div class="dropdown-menu hidden absolute -left-[250px] md:-left-[120px] lg:-left-[120px] 2xl:-left-[81px] top-[63px] md:top-[65px] lg:top-[73px] xl:top-[85px] bg-dark-blue border-[#343A61] border z-50 shadow-lg w-[500px] md:w-96 px-6 py-4">
                                    <p class="px-6 pt-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center plaakBold w-96 cursor-auto text-sm">
                                        Select Language</p>
                                    <?php
                                    $language_links = vision_get_language_links();
                                    $current_lang = vision_get_current_language();
                                    foreach ($language_links as $lang_code => $lang_data) :
                                        $is_active = ($lang_code === $current_lang);
                                    ?>
                                    <a href="<?php echo esc_url($lang_data['url']); ?>"
                                       class="px-6 py-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center hover:text-bright-blue w-96 text-sm <?php echo $is_active ? 'opacity-50 !opacity-100' : 'opacity-50 hover:!opacity-100 hover:text-bright-blue'; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.122 11.294"
                                             class="w-3 h-3 fill-current <?php echo $is_active ? 'fill-bright-blue' : ''; ?>">
                                            <path d="M26.1,37.409,37.222,26.116H26.1Z"
                                                  transform="translate(-26.1 -26.115)"></path>
                                        </svg>
                                        <span><?php echo esc_html($lang_data['name'] . ' | ' . $lang_data['code']); ?></span>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button"
                            class="inline-flex items-center justify-center rounded-md p-2.5 text-dark-blue nav-toggler mt-0"
                            data-culture="EN" data-region="global">
                        <span class="sr-only">Open main menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="41.557" height="16" viewBox="0 0 41.557 16"
                             class="h-10 w-10">
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


            <div class="hidden xl:py-6 lg:px-8 bg-white border-r border-slate-200 xl:flex items-center justify-end w-full xl:gap-8">


                <div class="group about-group">
                    <a href="<?php echo esc_url(home_url('/about-us')); ?>"
                       class="uppercase text-sm font-normal leading-8 text-gray-900 nav-link">About</a>
                    <div class="hidden mx-auto w-screen group-hover:block absolute z-50 pt-[25px] inset-x-0 transform hover-nav">
                        <div class="bg-light-blue text-dark-blue from-dark-blue-300 to-dark-blue-500">
                            <div class="grid gap-0 grid-cols-3 ">
                                <div class="px-20 py-20 flex flex-col justify-center global-reach-nav">
                                    <div>
                                        <h5 class="uppercase mb-5 block text-2xl">About</h5>
                                        <p class="mb-5 text-lg">We are an international business advisory, incorporated in Abu Dhabi, United Arab Emirates, operating under the New Investment Paradigm.</p>
                                        <p>The core of the concept is our focus on the essential sectors that continue growing even in the most turbulent regions and in the most critical times.</p>
                                        <a href="<?php echo esc_url(home_url('/about-us')); ?>"
                                           class="text-lg uppercase plaakRegular group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto link-underline-animation after:bg-bright-blue">
                                            <span class="text-white block pb-1">Find out more</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-span-2 relative">
                                    <div class="grid gap-0 grid-cols-2">
                                        <div class="bg-light-blue border-l border-r border-t border-slate-200 grid">
                                            <a href="<?php echo esc_url(home_url('/about-us/vision')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-slate-200  flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Tactics</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/about-us/people')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-slate-200  flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Online Visibility</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/about-us/careers')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-slate-200  flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Strategies</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/about-us/our-community')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-slate-200 flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Investment</span>
                                            </a>
                                        </div>
                                        <div class="bg-light-blue">
                                            <div class="nav-article">
                                                <div class="max-h-[285px] overflow-hidden">
                                                    <img src="<?php echo esc_url(vision_get_asset_url('mask-group-34.jpg')); ?>" alt="<?php echo esc_attr__('Mask Group 34', 'vision'); ?>"
                                                         class="w-full h-full object-cover">
                                                </div>
                                                <div class="px-10 py-12">
                                                    <p class="uppercase mb-4 plaakBold">Latest News</p>
                                                    <p class="mb-4 text-lg">Ukraine–US Strategic Framework for Post-War Reconstruction</p>


                                                    <a href="<?php echo esc_url(home_url('/knowledge/news/mauritius-key-measures-of-finance-act-2025')); ?>"
                                                       class="text-sm uppercase plaakRegular group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto pb-1 link-underline-animation after:bg-bright-blue">
                                                        <span class="text-white block pb-1">Read more</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>

                    .group:hover .link-underline-animation::after {
                        background-color: var(--region-color); /* dynamic color on hover */
                    }
                </style>


                <div class="group about-group">
                    <a href="<?php echo esc_url(home_url('/services')); ?>"
                       class="uppercase text-sm font-normal leading-8 text-gray-900 nav-link">Services</a>
                    <div class="hidden mx-auto w-screen group-hover:block absolute z-50 pt-[25px] inset-x-0 transform hover-nav">
                        <div class="text-white bg-gradient-to-b from-dark-blue-300 to-dark-blue-500">
                            <div class="grid gap-0 grid-cols-3 ">
                                <div class="px-20 py-20 flex flex-col justify-center global-reach-nav">
                                    <div>
                                        <h5 class="uppercase mb-5 block text-2xl">Services</h5>
                                        <p class="mb-5 text-lg">The Vision Business Development Saudi market expansion team has experience of assisting
                                            B2B companies willing to get into the GCC markets since 2008. The initial business model that worked up until 2020
                                            was to get clients in-person meetings with their potential clients and partners in the region to establish trust,
                                            leading them to signing deals.</p>
                                        <a href="<?php echo esc_url(home_url('/services')); ?>"
                                           class="text-lg uppercase plaakRegular group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto link-underline-animation after:bg-bright-blue">
                                            <span class="text-white block pb-1">Find out more</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-span-2 relative">
                                    <div class="grid gap-0 grid-cols-2">
                                        <div class="bg-dark-blue border-l border-r border-t border-[#343A61] grid">
                                            <a href="<?php echo esc_url(home_url('/services/fund-administration')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Saudi Market Entry</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/services/private-clients')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>B2B Expansion Worldwide</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/services/corporate-clients')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Investment Strategy</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/services/marine')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Ukraine Investment</span>
                                            </a>
                                        </div>
                                        <div class="bg-dark-blue">
                                            <div class="nav-article">
                                                <div class="max-h-[285px] overflow-hidden">
                                                    <img src="<?php echo esc_url(vision_get_asset_url('city-buildings.jpg')); ?>" alt="<?php echo esc_attr__('City Buildings', 'vision'); ?>"
                                                         class="w-full h-full object-cover">
                                                </div>
                                                <div class="px-10 py-12">
                                                    <p class="uppercase mb-4 plaakBold">Latest News</p>
                                                    <p class="mb-4 text-lg">Mauritius Key Measures of Finance Act
                                                        2025</p>


                                                    <a href="<?php echo esc_url(home_url('/knowledge/news/mauritius-key-measures-of-finance-act-2025')); ?>"
                                                       class="text-sm uppercase plaakRegular group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto pb-1 link-underline-animation after:bg-bright-blue">
                                                        <span class="text-white block pb-1">Read full story</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>

                    .group:hover .link-underline-animation::after {
                        background-color: var(--region-color); /* dynamic color on hover */
                    }
                </style>


                <div class="group about-group">
                    <a href="#resources"
                       class="uppercase text-sm font-normal leading-8 text-gray-900 nav-link">Resources</a>
                    <div class="hidden mx-auto w-screen group-hover:block absolute z-50 pt-[25px] inset-x-0 transform hover-nav">
                        <div class="text-white bg-gradient-to-b from-dark-blue-300 to-dark-blue-500">
                            <div class="grid gap-0 grid-cols-3 ">
                                <div class="px-20 py-20 flex flex-col justify-center global-reach-nav">
                                    <div>
                                        <h5 class="uppercase mb-5 block text-2xl">Resources</h5>
                                        <p class="mb-5 text-lg">We have been present for more than 20 years in over half
                                            of the jurisdictions in which we operate, developing a global knowledge base
                                            that few can match.</p>
                                        <a href="<?php echo esc_url(home_url('/knowledge')); ?>"
                                           class="text-lg uppercase plaakRegular group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto link-underline-animation after:bg-bright-blue">
                                            <span class="text-white block pb-1">Find out more</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-span-2 relative">
                                    <div class="grid gap-0 grid-cols-2">
                                        <div class="bg-dark-blue border-l border-r border-t border-[#343A61] grid">
                                            <a href="<?php echo esc_url(home_url('/knowledge/news')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>News</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/knowledge/insights')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Testimonials</span>
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/knowledge/brochures-fact-sheets')); ?>"
                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">
                                                <span>Events</span>
                                            </a>
                                            <!--                                            <a href="<?php echo esc_url(home_url('/knowledge/awards-accolades')); ?>"-->
                                            <!--                                               class="uppercase p-10 border-b border-l-4 border-[#343A61] border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]">-->
                                            <!--                                                <span>Awards &amp; Accolades</span>-->
                                            <!--                                            </a>-->
                                        </div>
                                        <div class="bg-dark-blue">
                                            <div class="nav-article">
                                                <div class="max-h-[285px] overflow-hidden">
                                                    <img src="<?php echo esc_url(vision_get_asset_url('about-our-leadership.jpeg')); ?>"
                                                         alt="<?php echo esc_attr__('About Our Leadership', 'vision'); ?>" class="w-full h-full object-cover">
                                                </div>
                                                <div class="px-10 py-12">
                                                    <p class="uppercase mb-4 plaakBold">Latest News</p>
                                                    <p class="mb-4 text-lg">Mauritius Key Measures of Finance Act
                                                        2025</p>


                                                    <a href="<?php echo esc_url(home_url('/knowledge/news/mauritius-key-measures-of-finance-act-2025')); ?>"
                                                       class="text-sm uppercase plaakRegular group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto pb-1 link-underline-animation after:bg-bright-blue">
                                                        <span class="text-white block pb-1">Read full story</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>

                    .group:hover .link-underline-animation::after {
                        background-color: var(--region-color); /* dynamic color on hover */
                    }
                </style>


                <div class="group about-group">
                    <a href="#partners"
                       class="uppercase text-sm font-normal leading-8 text-gray-900 nav-link">Partners</a>
                </div>


                <div class="group about-group">
                    <a href="#contact"
                       class="uppercase text-sm font-normal leading-8 text-gray-900 nav-link">Contact</a>
                </div>

            </div>
            <div class="global bg-white hidden lg:py-6 relative xl:flex xl:items-center xl:justify-evenly xl:gap-10 xl:px-6 2xl:px-20">


                <div class="flex flex-row gap-2 md:gap-6 justify-between items-center relative">
                    <!-- Language selector -->
                    <div class="custom-dropdown relative inline-block w-full lg:w-auto">
                        <!-- Toggle button -->
                        <button type="button"
                                class="dropdown-toggle w-full bg-white text-dark-blue uppercase plaakBold py-4 px-1 md:px-4 flex justify-between items-center cursor-pointer gap-4">
                            <span class="border-b-4 border-b-bright-blue text-sm md:text-base">EN</span>
                            <svg id="language-picker-icon" xmlns="http://www.w3.org/2000/svg" width="9.719"
                                 height="5.719" viewBox="0 0 9.719 5.719">
                                <path id="Path_3602" data-name="Path 3602" d="M.018-1.029l4.5,4.652,4.5-4.652"
                                      transform="translate(0.342 1.377)" fill="none" stroke="#00022e"
                                      stroke-width="1"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div class="dropdown-menu hidden absolute -left-[250px] md:-left-[120px] lg:-left-[120px] 2xl:-left-[81px] top-[63px] md:top-[65px] lg:top-[73px] xl:top-[85px] bg-dark-blue border-[#343A61] border z-50 shadow-lg w-[500px] md:w-96 px-6 py-4">
                            <p class="px-6 pt-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center plaakBold w-96 cursor-auto text-sm">
                                Select Language</p>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               class="px-6 py-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center hover:text-bright-blue w-96 text-sm opacity-50 !opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.122 11.294"
                                     class="w-3 h-3 fill-current fill-bright-blue">
                                    <path d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)"></path>
                                </svg>
                                <span>English | EN</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/es')); ?>"
                               class="px-6 py-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center hover:text-bright-blue w-96 text-sm opacity-50 hover:!opacity-100 hover:text-bright-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.122 11.294"
                                     class="w-3 h-3 fill-current ">
                                    <path d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)"></path>
                                </svg>
                                <span>Spanish | ES</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/pt')); ?>"
                               class="px-6 py-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center hover:text-bright-blue w-96 text-sm opacity-50 hover:!opacity-100 hover:text-bright-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.122 11.294"
                                     class="w-3 h-3 fill-current ">
                                    <path d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)"></path>
                                </svg>
                                <span>Portuguese | PT</span>
                            </a>
                            <a href="<?php echo esc_url(home_url('/zh')); ?>"
                               class="px-6 py-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center hover:text-bright-blue w-96 text-sm opacity-50 hover:!opacity-100 hover:text-bright-blue">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11.122 11.294"
                                     class="w-3 h-3 fill-current ">
                                    <path d="M26.1,37.409,37.222,26.116H26.1Z"
                                          transform="translate(-26.1 -26.115)"></path>
                                </svg>
                                <span>Chinese | ZH</span>
                            </a>
                        </div>
                    </div>
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
