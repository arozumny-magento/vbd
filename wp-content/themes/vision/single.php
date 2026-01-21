<?php
/**
 * The template for displaying all single posts
 *
 * @package Vision
 */

get_header();
?>

    <main id="main" class="site-main">
<?php
while (have_posts()) :
    the_post();
    ?>

        <div class="umb-block-list">

            <div class="w-full relative" >
                <div class="mx-auto md:grid grid-cols-2 overflow-hidden gap-0">
                    <div class="bg-light-blue" style="padding: 6rem;">
                        <h1 style="text-align: left"><?php the_title() ?></h1>
                    </div>

                    <?php if (has_post_thumbnail()) : ?>
                    <div class="hidden md:block bg-white relative" style="max-height: 600px;">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="" class="w-full h-full object-cover">
                        <div class="absolute bottom-[1px] w-full h-2 z-30 aos-init aos-animate" data-aos="fade-in" data-aos-delay="300">
                            <svg version="1.1" id="line_2" class="rotate-180" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="10" xml:space="preserve">
                                    <path class="path2" fill="#f0f7ff" stroke-width="14" stroke="#f0f7ff" d="M0 0 l1120 0"></path>
                                </svg>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="w-full relative" >
                <div class="card-grid relative bg-white p-6 md:p-10 lg:py-20 lg:px-20 white-bg">
                    <div class="max-auto">
                        <div class="uppercase mb-10 text-xl lg:text-3xl plaakBold text-dark-blue aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <p>Saudi Market Entry</p>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-10">

                            <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                    <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                        <h3>Online meetings with local partners</h3>
                                    </div>
                                    <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                        <p><span>Organization of meetings with trusted contacts in target industries and companies; Strategic communication support and negotiation advice</span></p>
                                    </div>
                                </div>
                            </div>


                            <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                    <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                        <h3>Go-to-market strategy</h3>
                                    </div>
                                    <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                        <p><span>Validation of ideas from the previous meetings; localization of value propositions; creation of an ideal client profile; development of product road maps and promotion plans<br></span></p>
                                    </div>
                                </div>
                            </div>


                            <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                    <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                        <h3>Online Visibility</h3>
                                    </div>
                                    <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                        <p class="MsoNormal">Organization of online presentations & conferences; Creation of digital content to attract attention of target customers; Online engagement and lead generation</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                    <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                        <h3>Business trips & Offline Presence</h3>
                                    </div>
                                    <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                        <p>Business trips to target markets; Meetings with partners and potential clients; Participation in offline exhibitions and conferences; Establishment of local legal entities</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="w-full relative">
                    <div class="mx-auto md:grid grid-cols-2 gap-0 overflow-hidden">
                        <div class="bg-white">
                            <div class="text-dark-blue p-6 md:p-10 lg:px-20 lg:py-24" style="padding: 3rem 6rem; background: #00012e; color:#fff;">
                                <div class="uppercase mb-10 news-container-nav slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track" style="opacity: 1; width: 100%; text-align: left; font-weight: bold; transform: translate3d(0px, 0px, 0px);">
                                    <span class="text-lg whitespace-nowrap py-4 px-1 max-w-fit lg:text-xl active
                                    plaakBold news-indicators cursor-pointer slick-slide slick-current slick-active"
                                          data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 278px;">
                                        Getting first sale on a new market is the hardest
                                    </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="news-container slick-initialized slick-slider">
                                    <div class="slick-list draggable">
                                        <div class="slick-track" style="opacity: 1; width: 1192px;">
                                            <div class="slide overflow-hidden slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 596px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                                <div class="mb-5 lg:mb-8 text-lg aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                                    <p>The Vision Business Development Saudi market expansion team has experience of assisting B2B companies willing to get into the GCC markets since 2008. The initial business model that worked up until 2020 was to get clients in-person meetings with their potential clients and partners in the region to establish trust, leading them to signing deals.</p>
                                                    <p>After 2020, the world has changed, and so has the Arab Gulf. Shortly after COVID-19, the business culture from the Arab Gulf started adopting video calls as a means of communication. Relying on our previous in-person experience and networks, we started connecting our clients with their counterparts in the region via digital channels. Our team is committed to helping its clients  succeed in the region by making the first sales deals through online networking, virtual events, video calls, and ad campaigns.</p>
                                                    <p>Saudi Market Expansion program enables B2B companies from outside of the Kingdom to explore this market via digital tools: meet partners, have sales calls, and sign clients without business trips and local establishments. It aims at creating foundations for further expansion into this fast-growing market.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block bg-white relative" style="max-height: 100%;">
                            <img src="<?= get_template_directory_uri()?>/assets/ekrem-osmanoglu-uor3rznhz9e-unsplash-scaled.jpg" alt="" class="w-full h-full object-cover">
                            <div class="absolute bottom-[1px] w-full h-2 z-30 aos-init aos-animate" data-aos="fade-in" data-aos-delay="300">
                                <svg version="1.1" id="line_2" class="rotate-180" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="10" xml:space="preserve">
                                    <path class="path2" fill="#00012e" stroke-width="14" stroke="#00012e" d="M0 0 l1120 0"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-grid relative bg-white p-6 md:p-10 lg:py-20 lg:px-20 white-bg">
                    <div class="max-auto">
                        <div class="uppercase mb-10 text-xl lg:text-3xl plaakBold text-dark-blue aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <p>Expected Results</p>
                        </div>

                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-10">

                            <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                    <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                        <h3>Sales meetings</h3>
                                    </div>
                                    <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                        <p><span>Online and offline<br></span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white text-dark-blue card list-trident aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <div class="group block  mb-6 mt-6 py-3 lg:py-5 text-dark-blue">

                                    <div class="uppercase text-lg text-dark-blue mb-5 lg:mb-8">
                                        <h3>New RFPs</h3>
                                    </div>
                                    <div class="text-dark-blue  mb-3 lg:mb-5 ">
                                        <p>Tender participation or individual company requests</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endwhile ?>

    </main>

<?php
//get_sidebar();
get_footer();
