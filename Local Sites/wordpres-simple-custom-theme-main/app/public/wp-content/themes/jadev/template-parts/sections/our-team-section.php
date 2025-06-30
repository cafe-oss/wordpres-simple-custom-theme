<?php
// Get arguments
$section_title = $args['section_title'] ?? 'Our Team';
$posts_per_page = $args['posts_per_page'] ?? -1;
$columns = $args['columns'] ?? 3;
$show_section_title = $args['show_title'] ?? true;

// Query our_services posts
$our_teams_query = new WP_Query([
    'post_type' => 'our_teams',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC'
]);

if (!$our_teams_query->have_posts()) {
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
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
            </div>
        </div>
    <?php endif; ?>

    <div class="row g-3 justify-content-center">
        <?php
        while ($our_teams_query->have_posts()):
            $our_teams_query->the_post();
        ?>
            <?php
            get_template_part('template-parts/components/our-team-card', null, [
                'post_id' => get_the_ID(),
                'post' => get_post(),
                'col_class' => $col_class
            ]);
            ?>

        <?php endwhile; ?>
    </div>

</section>

<?php
// Reset post data
wp_reset_postdata();
?>