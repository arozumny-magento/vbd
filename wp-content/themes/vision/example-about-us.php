<?php
/**
 * Example: How to access nested ACF Group fields
 * 
 * Structure:
 * - about_us (Group field)
 *   - group_1 (Group - first nested group)
 *     - field_1 (custom field)
 *     - field_2 (custom field)
 *   - group_2 (Group - second nested group)
 *     - field_1 (custom field)
 *     - field_2 (custom field)
 */

// Method 1: Get the entire group as an array
$about_us = get_field('about_us');

if ($about_us):
    // Access the first nested group
    $group_1 = isset($about_us['group_1']) ? $about_us['group_1'] : null;
    if ($group_1):
        // Access fields within group_1
        $group_1_field_1 = isset($group_1['field_1']) ? $group_1['field_1'] : '';
        $group_1_field_2 = isset($group_1['field_2']) ? $group_1['field_2'] : '';
        
        // Use the fields
        echo '<div class="group-1">';
        echo '<h3>' . esc_html($group_1_field_1) . '</h3>';
        echo '<p>' . esc_html($group_1_field_2) . '</p>';
        echo '</div>';
    endif;
    
    // Access the second nested group
    $group_2 = isset($about_us['group_2']) ? $about_us['group_2'] : null;
    if ($group_2):
        // Access fields within group_2
        $group_2_field_1 = isset($group_2['field_1']) ? $group_2['field_1'] : '';
        $group_2_field_2 = isset($group_2['field_2']) ? $group_2['field_2'] : '';
        
        // Use the fields
        echo '<div class="group-2">';
        echo '<h3>' . esc_html($group_2_field_1) . '</h3>';
        echo '<p>' . esc_html($group_2_field_2) . '</p>';
        echo '</div>';
    endif;
endif;

// Method 2: Direct access using field names (if you know the exact field names)
$group_1_title = get_field('about_us')['group_1']['title'] ?? '';
$group_1_description = get_field('about_us')['group_1']['description'] ?? '';

$group_2_title = get_field('about_us')['group_2']['title'] ?? '';
$group_2_description = get_field('about_us')['group_2']['description'] ?? '';

// Method 3: Loop through if you have multiple groups with the same structure
$about_us = get_field('about_us');
if ($about_us):
    // Assuming your groups are named 'group_1', 'group_2', etc.
    for ($i = 1; $i <= 2; $i++):
        $group_key = 'group_' . $i;
        if (isset($about_us[$group_key])):
            $current_group = $about_us[$group_key];
            ?>
            <div class="about-group-<?php echo $i; ?>">
                <?php if (isset($current_group['title'])): ?>
                    <h3><?php echo esc_html($current_group['title']); ?></h3>
                <?php endif; ?>
                
                <?php if (isset($current_group['description'])): ?>
                    <p><?php echo esc_html($current_group['description']); ?></p>
                <?php endif; ?>
                
                <?php if (isset($current_group['image'])): ?>
                    <img src="<?php echo esc_url($current_group['image']); ?>" alt="">
                <?php endif; ?>
            </div>
            <?php
        endif;
    endfor;
endif;
?>
