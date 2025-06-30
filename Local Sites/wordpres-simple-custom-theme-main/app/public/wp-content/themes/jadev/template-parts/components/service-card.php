<?php
// Get data from args or use global post
$post_id = $args['post_id'] ?? get_the_ID();
$service_post = $args['post'] ?? get_post($post_id);
$col_class = $args['col_class'] ?? 'col-md-4';

if (!$service_post) {
    return;
}

// Get custom fields
$description = apply_filters('the_content', $service_post->post_content);
$featured_image = get_the_post_thumbnail_url($post_id, 'large');
$thumbnail_id = get_post_thumbnail_id($post_id);
$featured_alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$featured_title = get_the_title($thumbnail_id);
$title = get_the_title($post_id);
$permalink = get_permalink($post_id);
?>

<div class="<?php echo esc_attr($col_class); ?> p-2">
    <div class="card h-100">
        <?php if ($featured_image): ?>
            <div class="card-img-top">
                <a href="<?php echo esc_url($permalink); ?>">
                    <img
                        src="<?php echo esc_url($featured_image); ?>"
                        class="object-fit-cover h-100 w-100"
                        alt="<?php echo esc_attr($featured_alt_text); ?>"
                        title="<?php echo esc_attr($featured_title); ?>" />
                </a>
            </div>
        <?php endif; ?>

        <div class="card-body d-flex flex-column">
            <h5 class="card-title">
                <a href="<?php echo esc_url($permalink); ?>" class="text-decoration-none">
                    <?php echo esc_html($title); ?>
                </a>
            </h5>

            <?php if ($description): ?>
                <div class="card-text flex-grow-1">
                    <?php echo wp_kses_post(wpautop($description)); ?>
                </div>
            <?php endif; ?>

            <?php
            get_template_part('template-parts/components/button', null, [
                'button_info' => array(
                    "button_text" => "Learn More",
                    "button_url" => $permalink
                )
            ]);
            ?>

        </div>
    </div>
</div>