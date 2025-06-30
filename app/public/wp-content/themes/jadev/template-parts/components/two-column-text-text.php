<?php
// Get the section data from args or directly from ACF
$section_data = $args['section_data'] ?? null;
$reverse_class = $args['reverse_class'] ?? '';
$additional_class_col2 = $args['additional_class_col2'] ?? '';

if (!$section_data) {
    return; // Don't render if no data
}

$heading = $section_data['heading'] ?? '';
$description = $section_data['description'] ?? '';
$button_info = $section_data['button_info_1'] ?? [];
$column2_description = $section_data['column2_description'] ?? '';
?>

<section class="row row-cols-1 mt-4 row-cols-md-2 custom-container <?php echo esc_html($reverse_class); ?>">
    <div class="col mb-4">
        <div class="position-relative d-flex flex-column min-w-0 h-100">
            <?php
            $column2_description = $section_data['column2_description'] ?? '';
            if (has_shortcode($column2_description, 'ninja_form')) {
                echo do_shortcode(wp_kses_post($column2_description));
            } else {
                echo esc_html($column2_description);
            }
            ?>
        </div>
    </div>
    <div class="col mb-4">
        <div class="position-relative d-flex flex-column min-w-0 text-wrap <?php echo esc_html($additional_class_col2) ?>">

            <?php if ($heading): ?>
                <h2 class="card-title"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if ($description): ?>
                <div class="card-text"><?php echo wp_kses_post(wpautop($description)); ?></div>
            <?php endif; ?>

            <?php
            get_template_part('template-parts/components/button', null, [
                'button_info' => $button_info
            ]);
            ?>

        </div>
    </div>
</section>