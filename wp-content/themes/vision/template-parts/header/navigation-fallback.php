<?php
/**
 * Navigation Fallback Template Part
 * Used when primary menu is not set in WordPress admin
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="hidden xl:py-6 lg:px-8 bg-white border-r border-slate-200 xl:flex items-center justify-end w-full xl:gap-8">
    <?php
    /**
     * Navigation menu items
     * Can be customized via filter: vision_navigation_items
     */
    $nav_items = apply_filters('vision_navigation_items', array(
        'about' => array(
            'url' => home_url('/about-us'),
            'label' => __('About', 'vision'),
            'has_dropdown' => true,
        ),
        'services' => array(
            'url' => home_url('/services'),
            'label' => __('Services', 'vision'),
            'has_dropdown' => true,
        ),
        'resources' => array(
            'url' => home_url('/#resources'),
            'label' => __('Resources', 'vision'),
            'has_dropdown' => true,
        ),
        'partners' => array(
            'url' => home_url('/#partners'),
            'label' => __('Partners', 'vision'),
            'has_dropdown' => false,
        ),
        'contact' => array(
            'url' => home_url('/#contact'),
            'label' => __('Contact', 'vision'),
            'has_dropdown' => false,
        ),
    ));

    foreach ($nav_items as $key => $item) :
        ?>
        <div class="group about-group">
            <a 
                href="<?php echo esc_url($item['url']); ?>"
                class="uppercase text-sm font-normal leading-8 text-gray-900 nav-link"
            >
                <?php echo esc_html($item['label']); ?>
            </a>
            <?php
            /**
             * Mega menu dropdown
             * 
             * @param string $key Menu item key
             * @param array  $item Menu item data
             * 
             * @since 1.0.0
             */
            if ($item['has_dropdown']) {
                do_action('vision_navigation_dropdown', $key, $item);
            }
            ?>
        </div>
    <?php endforeach; ?>
</div>
