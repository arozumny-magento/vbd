<?php
/**
 * Mobile Menu Fallback Template Part
 * Used when mobile menu is not set in WordPress admin
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Mobile menu items
 * Can be customized via filter: vision_mobile_menu_items
 */
$mobile_items = apply_filters('vision_mobile_menu_items', array(
    'about' => array(
        'url' => home_url('/about-us'),
        'label' => __('About', 'vision'),
        'children' => array(
            array('url' => home_url('/about-us'), 'label' => __('About', 'vision')),
            array('url' => home_url('/about-us/vision'), 'label' => __('Vision', 'vision')),
            array('url' => home_url('/about-us/people'), 'label' => __('People', 'vision')),
            array('url' => home_url('/about-us/careers'), 'label' => __('Careers', 'vision')),
            array('url' => home_url('/about-us/our-community'), 'label' => __('Community', 'vision')),
        ),
    ),
    'services' => array(
        'url' => home_url('/services'),
        'label' => __('Services', 'vision'),
        'children' => array(
            array('url' => home_url('/services'), 'label' => __('Services', 'vision')),
            array('url' => home_url('/services/fund-administration'), 'label' => __('Funds', 'vision')),
            array('url' => home_url('/services/private-clients'), 'label' => __('Private Clients', 'vision')),
            array('url' => home_url('/services/corporate-clients'), 'label' => __('Corporate Clients', 'vision')),
            array('url' => home_url('/services/marine'), 'label' => __('Marine', 'vision')),
        ),
    ),
    'partners' => array(
        'url' => home_url('/#partners'),
        'label' => __('Partners', 'vision'),
        'children' => array(
            array('url' => home_url('/#partners'), 'label' => __('Partners', 'vision')),
            array('url' => home_url('/americas-caribbean'), 'label' => __('Americas & Caribbean', 'vision')),
            array('url' => home_url('/amea'), 'label' => __('AMEA', 'vision')),
            array('url' => home_url('/europe'), 'label' => __('Europe', 'vision')),
        ),
    ),
    'resources' => array(
        'url' => home_url('/knowledge'),
        'label' => __('Resources', 'vision'),
        'children' => array(
            array('url' => home_url('/knowledge'), 'label' => __('Resources', 'vision')),
            array('url' => home_url('/knowledge/news'), 'label' => __('News', 'vision')),
            array('url' => home_url('/knowledge/insights'), 'label' => __('Insights', 'vision')),
            array('url' => home_url('/knowledge/brochures-fact-sheets'), 'label' => __('Brochures & Fact Sheets', 'vision')),
            array('url' => home_url('/knowledge/awards-accolades'), 'label' => __('Awards & Accolades', 'vision')),
        ),
    ),
    'contact' => array(
        'url' => home_url('/contact'),
        'label' => __('Contact', 'vision'),
        'children' => array(
            array('url' => home_url('/contact'), 'label' => __('Contact', 'vision')),
            array('url' => home_url('/contact'), 'label' => __('Get in touch', 'vision')),
            array('url' => home_url('/staff-directory'), 'label' => __('Staff Directory', 'vision')),
            array('url' => home_url('/locations'), 'label' => __('Find an office', 'vision')),
            array('url' => home_url('/legal'), 'label' => __('Legal', 'vision')),
        ),
    ),
));
?>

<div class="mob-locations-menu hidden">
    <a 
        href="<?php echo esc_url(home_url('/locations')); ?>"
        class="text-white flex items-center uppercase py-8 px-8 border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-light-blue-900 hover:border-l-4"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294" viewBox="0 0 11.122 11.294" class="mr-4" aria-hidden="true">
            <path d="M26.1,37.409,37.222,26.116H26.1Z" transform="translate(-26.1 -26.115)" fill="#107FFF"></path>
        </svg>
        <span><?php esc_html_e('All locations', 'vision'); ?></span>
    </a>
    <a 
        href="<?php echo esc_url(home_url('/')); ?>"
        class="text-white flex items-center uppercase py-8 px-8 border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-mid-blue hover:border-l-4"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294" viewBox="0 0 11.122 11.294" class="mr-4" aria-hidden="true">
            <path d="M26.1,37.409,37.222,26.116H26.1Z" transform="translate(-26.1 -26.115)" fill="#6CB2FF"></path>
        </svg>
        <span><?php esc_html_e('Global', 'vision'); ?></span>
    </a>
    <a 
        href="<?php echo esc_url(home_url('/americas-caribbean')); ?>"
        class="text-white flex items-center uppercase py-8 px-8 border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-[#DBFE87] hover:border-l-4"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294" viewBox="0 0 11.122 11.294" class="mr-4" aria-hidden="true">
            <path d="M26.1,37.409,37.222,26.116H26.1Z" transform="translate(-26.1 -26.115)" fill="#DBFE87"></path>
        </svg>
        <span><?php esc_html_e('Americas / Caribbean', 'vision'); ?></span>
    </a>
    <a 
        href="<?php echo esc_url(home_url('/amea')); ?>"
        class="text-white flex items-center uppercase py-8 px-8 border-b border-[#343A61] border-l-4 border-l-dark-blue hover:border-l-[#58D6C8] hover:border-l-4"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294" viewBox="0 0 11.122 11.294" class="mr-4" aria-hidden="true">
            <path d="M26.1,37.409,37.222,26.116H26.1Z" transform="translate(-26.1 -26.115)" fill="#58D6C8"></path>
        </svg>
        <span><?php esc_html_e('Asia / Middle East / Africa', 'vision'); ?></span>
    </a>
    <a 
        href="<?php echo esc_url(home_url('/europe')); ?>"
        class="text-white flex items-center uppercase py-8 px-8 border-b border-b-[#343A61] border-l-4 border-l-dark-blue hover:border-l-[#FF9456] hover:border-l-4"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294" viewBox="0 0 11.122 11.294" class="mr-4" aria-hidden="true">
            <path d="M26.1,37.409,37.222,26.116H26.1Z" transform="translate(-26.1 -26.115)" fill="#FF9456"></path>
        </svg>
        <span><?php esc_html_e('Europe', 'vision'); ?></span>
    </a>
</div>

<?php foreach ($mobile_items as $key => $item) : ?>
    <div x-data="{ showSubmenu: false }" class="nav-item-container">
        <?php if (!empty($item['children'])) : ?>
            <button 
                type="button"
                @click="showSubmenu = true"
                class="nav-item text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue w-full text-left"
            >
                <span><?php echo esc_html($item['label']); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                </svg>
            </button>
            <div 
                x-show="showSubmenu"
                x-transition
                class="sub-nav"
                style="display: none;"
            >
                <button 
                    type="button"
                    @click="showSubmenu = false"
                    class="uppercase flex justify-between items-center text-mid-blue py-4 px-6 lg:px-12 border-b border-[#343A61] cursor-pointer back-btn w-full text-left"
                >
                    <span><?php esc_html_e('Back', 'vision'); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 rotate-180" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                    </svg>
                </button>
                <?php foreach ($item['children'] as $child) : ?>
                    <a 
                        href="<?php echo esc_url($child['url']); ?>"
                        class="text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue"
                    >
                        <span><?php echo esc_html($child['label']); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"></path>
                        </svg>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <a 
                href="<?php echo esc_url($item['url']); ?>"
                class="nav-item text-white uppercase py-4 px-6 lg:px-12 border-b border-[#343A61] flex justify-between items-center hover:text-mid-blue"
            >
                <span><?php echo esc_html($item['label']); ?></span>
            </a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<div class="pt-4 pb-6 lg:px-6">
    <p class="px-6 pt-10 text-white tracking-wider uppercase text-sm mb-2"><?php esc_html_e('Quick Links', 'vision'); ?></p>
    <a 
        href="<?php echo esc_url(home_url('/services/funds')); ?>"
        class="text-white uppercase py-4 px-6 flex items-center tracking-wider text-sm hover:text-bright-blue-500"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294" viewBox="0 0 11.122 11.294" class="mr-4" aria-hidden="true">
            <path d="M26.1,37.409,37.222,26.116H26.1Z" transform="translate(-26.1 -26.115)" fill="#007cff"></path>
        </svg>
        <span><?php esc_html_e('Funds', 'vision'); ?></span>
    </a>
    <a 
        href="<?php echo esc_url(home_url('/services/private-clients')); ?>"
        class="text-white uppercase -mt-4 py-4 px-6 flex items-center tracking-wider text-sm hover:text-bright-blue-500"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="11.122" height="11.294" viewBox="0 0 11.122 11.294" class="mr-4" aria-hidden="true">
            <path d="M26.1,37.409,37.222,26.116H26.1Z" transform="translate(-26.1 -26.115)" fill="#007cff"></path>
        </svg>
        <span><?php esc_html_e('Private Clients', 'vision'); ?></span>
    </a>
</div>
