<?php
// Get the section data from args or directly from ACF
$section_data = $args['section_data'] ?? null;
$reverse_class = $args['reverse_class'] ?? '';

if (!$section_data) {
    return; // Don't render if no data
}

$heading = $section_data['heading'] ?? '';
$description = $section_data['description'] ?? '';
$button_info = $section_data['button_info_1'] ?? [];
$image = $section_data['image'] ?? '';
?>

<section class="row row-cols-1 row-cols-md-2 custom-container <?php echo esc_html($reverse_class); ?>">
    <div class="col mb-4">
        <div class="position-relative d-flex flex-column min-w-0 h-100">
            <img
                src="<?php echo esc_url($image['sizes']['large']); ?>"
                class="object-fit-cover h-100"
                alt="<?php echo esc_attr($image['alt']); ?>"
                title="<?php echo esc_attr($image['title']); ?>"
            />
        </div>
    </div>
    <div class="col mb-4">
        <div class="position-relative d-flex flex-column min-w-0 text-wrap">
            
                <?php if($heading): ?>
                <h2 class="card-title"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>

                <?php if($description): ?>
                <p class="card-text"><?php echo wp_kses_post(wpautop($description)); ?></p>
                <?php endif; ?>

                <?php if (!empty($button_info)): ?>
                <div >
                    <?php if($button_info['button_text'] && $button_info['button_url']): ?>
                        <a href="<?php echo esc_url($button_info['button_url']); ?>" class="btn btn-primary">
                            <?php echo esc_html($button_info['button_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            
        </div>
    </div>
    
</section>