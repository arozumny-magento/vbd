<?php
/**
 * Language Switcher Template Part
 * Uses Polylang for WordPress language switching
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

// Check if Polylang is active
if (function_exists('pll_the_languages') && function_exists('pll_current_language')) {
    // Get current language
    $current_lang = pll_current_language();
    $current_lang_obj = pll_current_language('object');
    
    // Get all languages
    $languages = pll_the_languages(array('raw' => 1));
    
    // Get current language code for display
    $current_lang_code = $current_lang_obj ? strtoupper($current_lang_obj->slug) : 'EN';
} else {
    // Fallback if Polylang is not active
    $languages = vision_get_language_links();
    $current_lang = vision_get_current_language();
    $current_lang_code = strtoupper($current_lang);
}
?>

<div 
    x-data="{ open: false }"
    @click.away="open = false"
    class="custom-dropdown relative inline-block w-full lg:w-auto"
>
    <button 
        type="button"
        @click="open = !open"
        :aria-expanded="open"
        class="dropdown-toggle w-full bg-white text-dark-blue uppercase plaakBold py-4 px-1 md:px-4 flex justify-between items-center cursor-pointer gap-4"
        aria-haspopup="true"
        aria-label="<?php esc_attr_e('Select Language', 'vision'); ?>"
    >
        <span class="border-b-4 border-b-bright-blue text-sm md:text-base">
            <?php echo esc_html($current_lang_code); ?>
        </span>
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            width="9.719"
            height="5.719" 
            viewBox="0 0 9.719 5.719"
            class="transition-transform duration-200"
            :class="{ 'rotate-180': open }"
            aria-hidden="true"
        >
            <path 
                id="Path_3602" 
                data-name="Path 3602" 
                d="M.018-1.029l4.5,4.652,4.5-4.652"
                transform="translate(0.342 1.377)" 
                fill="none" 
                stroke="#00022e"
                stroke-width="1"
            />
        </svg>
    </button>

    <div 
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="dropdown-menu absolute -left-[250px] md:-left-[120px] lg:-left-[120px] 2xl:-left-[81px] top-[63px] md:top-[65px] lg:top-[73px] xl:top-[85px] bg-dark-blue border-[#343A61] border z-50 shadow-lg w-[500px] md:w-96 px-6 py-4"
        role="menu"
        aria-label="<?php esc_attr_e('Language selection menu', 'vision'); ?>"
    >
        <p class="px-6 pt-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center plaakBold w-96 cursor-auto text-sm">
            <?php esc_html_e('Select Language', 'vision'); ?>
        </p>
        <?php if (function_exists('pll_the_languages')) : ?>
            <?php foreach ($languages as $lang) : 
                $is_active = ($lang['current_lang'] == 1);
                $lang_code = strtoupper($lang['slug']);
                $lang_name = $lang['name'];
            ?>
                <a 
                    href="<?php echo esc_url($lang['url']); ?>"
                    class="px-6 py-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center hover:text-bright-blue w-96 text-sm <?php echo $is_active ? 'opacity-100' : 'opacity-50 hover:!opacity-100'; ?>"
                    role="menuitem"
                    hreflang="<?php echo esc_attr($lang['slug']); ?>"
                >
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 11.122 11.294"
                        class="w-3 h-3 fill-current <?php echo $is_active ? 'fill-bright-blue' : ''; ?>"
                        aria-hidden="true"
                    >
                        <path 
                            d="M26.1,37.409,37.222,26.116H26.1Z"
                            transform="translate(-26.1 -26.115)"
                        />
                    </svg>
                    <span><?php echo esc_html($lang_name . ' | ' . $lang_code); ?></span>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <?php foreach ($languages as $lang_code => $lang_data) : ?>
                <a 
                    href="<?php echo esc_url($lang_data['url']); ?>"
                    class="px-6 py-4 text-white uppercase flex flex-row justify-start gap-8 flex-nowrap items-center hover:text-bright-blue w-96 text-sm <?php echo $lang_data['active'] ? 'opacity-100' : 'opacity-50 hover:!opacity-100'; ?>"
                    role="menuitem"
                    hreflang="<?php echo esc_attr($lang_code); ?>"
                >
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 11.122 11.294"
                        class="w-3 h-3 fill-current <?php echo $lang_data['active'] ? 'fill-bright-blue' : ''; ?>"
                        aria-hidden="true"
                    >
                        <path 
                            d="M26.1,37.409,37.222,26.116H26.1Z"
                            transform="translate(-26.1 -26.115)"
                        />
                    </svg>
                    <span><?php echo esc_html($lang_data['name'] . ' | ' . $lang_data['code']); ?></span>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
