<?php
/**
 * Navigation Mega Menu Template Part
 *
 * @package Vision
 * 
 * @param string $menu_key Menu item key
 * @param array  $menu_data Menu item data
 */

if (!defined('ABSPATH')) {
    exit;
}

$menu_key = isset($menu_key) ? $menu_key : '';
$menu_data = isset($menu_data) ? $menu_data : array();

// Default menu configurations
$mega_menus = apply_filters('vision_mega_menu_config', array(
    'about' => array(
        'title' => __('About', 'vision'),
        'description' => __('We are an international business advisory, incorporated in Abu Dhabi, United Arab Emirates, operating under the New Investment Paradigm.', 'vision'),
        'description_2' => __('The core of the concept is our focus on the essential sectors that continue growing even in the most turbulent regions and in the most critical times.', 'vision'),
        'link_text' => __('Find out more', 'vision'),
        'link_url' => home_url('/about-us'),
        'bg_class' => 'bg-light-blue text-dark-blue from-dark-blue-300 to-dark-blue-500',
        'submenu_bg' => 'bg-light-blue',
        'border_class' => 'border-slate-200',
        'items' => array(
            array('url' => home_url('/about-us/vision'), 'label' => __('Tactics', 'vision')),
            array('url' => home_url('/about-us/people'), 'label' => __('Online Visibility', 'vision')),
            array('url' => home_url('/about-us/careers'), 'label' => __('Strategies', 'vision')),
            array('url' => home_url('/about-us/our-community'), 'label' => __('Investment', 'vision')),
        ),
        'featured_image' => get_template_directory_uri() . '/assets/mask-group-34.jpg',
        'featured_title' => __('Latest News', 'vision'),
        'featured_text' => __('Ukraine–US Strategic Framework for Post-War Reconstruction', 'vision'),
        'featured_link' => home_url('/knowledge/news/mauritius-key-measures-of-finance-act-2025'),
        'featured_link_text' => __('Read more', 'vision'),
    ),
    'services' => array(
        'title' => __('Services', 'vision'),
        'description' => __('The Vision Business Development Saudi market expansion team has experience of assisting B2B companies willing to get into the GCC markets since 2008. The initial business model that worked up until 2020 was to get clients in-person meetings with their potential clients and partners in the region to establish trust, leading them to signing deals.', 'vision'),
        'link_text' => __('Find out more', 'vision'),
        'link_url' => home_url('/services'),
        'bg_class' => 'text-white bg-gradient-to-b from-dark-blue-300 to-dark-blue-500',
        'submenu_bg' => 'bg-dark-blue',
        'border_class' => 'border-[#343A61]',
        'items' => array(
            array('url' => home_url('/services/fund-administration'), 'label' => __('Saudi Market Entry', 'vision')),
            array('url' => home_url('/services/private-clients'), 'label' => __('B2B Expansion Worldwide', 'vision')),
            array('url' => home_url('/services/corporate-clients'), 'label' => __('Investment Strategy', 'vision')),
            array('url' => home_url('/services/marine'), 'label' => __('Ukraine Investment', 'vision')),
        ),
        'featured_image' => get_template_directory_uri() . '/assets/city-buildings.jpg',
        'featured_title' => __('Latest News', 'vision'),
        'featured_text' => __('Mauritius Key Measures of Finance Act 2025', 'vision'),
        'featured_link' => home_url('/knowledge/news/mauritius-key-measures-of-finance-act-2025'),
        'featured_link_text' => __('Read full story', 'vision'),
    ),
    'resources' => array(
        'title' => __('Resources', 'vision'),
        'description' => __('We have been present for more than 20 years in over half of the jurisdictions in which we operate, developing a global knowledge base that few can match.', 'vision'),
        'link_text' => __('Find out more', 'vision'),
        'link_url' => home_url('/knowledge'),
        'bg_class' => 'text-white bg-gradient-to-b from-dark-blue-300 to-dark-blue-500',
        'submenu_bg' => 'bg-dark-blue',
        'border_class' => 'border-[#343A61]',
        'items' => array(
            array('url' => home_url('/knowledge/news'), 'label' => __('News', 'vision')),
            array('url' => home_url('/knowledge/insights'), 'label' => __('Testimonials', 'vision')),
            array('url' => home_url('/knowledge/brochures-fact-sheets'), 'label' => __('Events', 'vision')),
        ),
        'featured_image' => get_template_directory_uri() . '/assets/about-our-leadership.jpeg',
        'featured_title' => __('Latest News', 'vision'),
        'featured_text' => __('Mauritius Key Measures of Finance Act 2025', 'vision'),
        'featured_link' => home_url('/knowledge/news/mauritius-key-measures-of-finance-act-2025'),
        'featured_link_text' => __('Read full story', 'vision'),
    ),
));

$menu = isset($mega_menus[$menu_key]) ? $mega_menus[$menu_key] : array();

if (empty($menu)) {
    return;
}
?>

<div class="hidden mx-auto w-screen group-hover:block absolute z-50 pt-[25px] inset-x-0 transform hover-nav">
    <div class="<?php echo esc_attr($menu['bg_class']); ?>">
        <div class="grid gap-0 grid-cols-3">
            <div class="px-20 py-20 flex flex-col justify-center global-reach-nav">
                <div>
                    <h5 class="uppercase mb-5 block text-2xl"><?php echo esc_html($menu['title']); ?></h5>
                    <p class="mb-5 text-lg"><?php echo esc_html($menu['description']); ?></p>
                    <?php if (!empty($menu['description_2'])) : ?>
                        <p><?php echo esc_html($menu['description_2']); ?></p>
                    <?php endif; ?>
                    <a 
                        href="<?php echo esc_url($menu['link_url']); ?>"
                        class="text-lg uppercase group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto link-underline-animation after:bg-bright-blue"
                    >
                        <span class="text-white block pb-1"><?php echo esc_html($menu['link_text']); ?></span>
                    </a>
                </div>
            </div>
            <div class="col-span-2 relative">
                <div class="grid gap-0 grid-cols-2">
                    <div class="<?php echo esc_attr($menu['submenu_bg']); ?> border-l border-r border-t <?php echo esc_attr($menu['border_class']); ?> grid">
                        <?php foreach ($menu['items'] as $item) : ?>
                            <a 
                                href="<?php echo esc_url($item['url']); ?>"
                                class="uppercase p-10 border-b border-l-4 <?php echo esc_attr($menu['border_class']); ?> border-l-dark-blue flex justify-between items-center hover:border-l-[#2680EB]"
                            >
                                <span><?php echo esc_html($item['label']); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="<?php echo esc_attr($menu['submenu_bg']); ?>">
                        <div class="nav-article">
                            <div class="max-h-[285px] overflow-hidden">
                                <img 
                                    src="<?php echo esc_url($menu['featured_image']); ?>" 
                                    alt="<?php echo esc_attr($menu['featured_title']); ?>"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                >
                            </div>
                            <div class="px-10 py-12">
                                <p class="uppercase mb-4"><?php echo esc_html($menu['featured_title']); ?></p>
                                <p class="mb-4 text-lg"><?php echo esc_html($menu['featured_text']); ?></p>
                                <a 
                                    href="<?php echo esc_url($menu['featured_link']); ?>"
                                    class="text-sm uppercase group transition-all duration-300 ease-in-out overflow-hidden inline-block w-auto pb-1 link-underline-animation after:bg-bright-blue"
                                >
                                    <span class="text-white block pb-1"><?php echo esc_html($menu['featured_link_text']); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
