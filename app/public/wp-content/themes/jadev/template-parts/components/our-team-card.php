<?php
// Get data from args or use global post
$post_id = $args['post_id'] ?? get_the_ID();
$service_post = $args['post'] ?? get_post($post_id);
$col_class = $args['col_class'] ?? 'col-md-4';

if (!$service_post) {
    return;
}

// Get custom fields
$featured_image = get_the_post_thumbnail_url($post_id, 'large');
$thumbnail_id = get_post_thumbnail_id($post_id);
$featured_alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$featured_title = get_the_title($thumbnail_id);
$title = get_the_title($post_id);
$job_title = get_field('job_title')
?>

<div class="<?php echo esc_attr($col_class); ?> p-2">
    <div class="card h-100 border-0">
        <?php if ($featured_image): ?>
            <div class="card-img-top d-flex">
                <img
                    src="<?php echo esc_url($featured_image); ?>"
                    class="object-fit-cover mx-auto h-100 w-auto rounded-circle border border-0"
                    alt="<?php echo esc_attr($featured_alt_text); ?>"
                    title="<?php echo esc_attr($featured_title); ?>" />
            </div>
        <?php endif; ?>

        <div class="card-body d-flex flex-column text-center">
            <h5 class="card-title">
                <?php echo esc_html($title); ?>
            </h5>

            <?php if ($job_title): ?>
                <div class="card-text flex-grow-1">
                    <?php echo wp_kses_post(wpautop($job_title)); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>