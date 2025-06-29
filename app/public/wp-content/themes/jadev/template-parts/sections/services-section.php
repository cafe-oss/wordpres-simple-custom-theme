

<?php
// Get arguments
$section_title = $args['section_title'] ?? 'Our Services';
$posts_per_page = $args['posts_per_page'] ?? -1;
$columns = $args['columns'] ?? 3;
$show_section_title = $args['show_title'] ?? true;

// Query our_services posts
$services_query = new WP_Query([
    'post_type' => 'our_services',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC'
]);

if (!$services_query->have_posts()) {
    return;
}

// Calculate Bootstrap column classes
$col_classes = [
    2 => 'col-md-6',
    3 => 'col-md-4',
    4 => 'col-md-3',
    6 => 'col-md-2'
];
$col_class = $col_classes[$columns] ?? 'col-md-4';
?>

<section class="w-100 custom-container">
        <?php if ($show_section_title): ?>
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="row g-3">
            <?php 
            while ($services_query->have_posts()): 
                $services_query->the_post();
            ?>
                    <?php 
                    get_template_part('template-parts/components/service-card', null, [
                        'post_id' => get_the_ID(),
                        'post' => get_post(),
                        'col_class' => $col_class
                    ]); 
                    ?>
                
            <?php endwhile; ?>
        </div>
        
        <?php if ($services_query->found_posts > $posts_per_page && $posts_per_page > 0): ?>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="<?php echo esc_url(get_post_type_archive_link('our_services')); ?>" 
                    class="btn btn-outline-primary">
                        View All Services
                    </a>
                </div>
            </div>
        <?php endif; ?>

</section>

<?php
// Reset post data
wp_reset_postdata();
?>
