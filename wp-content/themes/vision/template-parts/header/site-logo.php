<?php
/**
 * Site Logo Template Part
 *
 * @package Vision
 */

if (!defined('ABSPATH')) {
    exit;
}

$logo_url = vision_get_header_logo_url();
$logo_alt = vision_get_logo_alt();
$home_url = esc_url(home_url('/'));

// Only render if logo URL is available
if ($logo_url) :
?>

<a 
    href="<?php echo $home_url; ?>" 
    class="max-w-fit"
    rel="home"
    aria-label="<?php echo esc_attr(get_bloginfo('name')); ?>"
>
    <span class="sr-only"><?php echo esc_html(get_bloginfo('name')); ?></span>
    <img 
        src="<?php echo esc_url($logo_url); ?>" 
        alt="<?php echo esc_attr($logo_alt); ?>"
        class="lg:-left-[45px] xl:-left-[15px] max-w-[170px] md:max-w-[200px] relative lg:max-w-[200px] xl:max-w-[200px]"
        width="200"
        height="auto"
        loading="eager"
    />
</a>

<?php endif; ?>
