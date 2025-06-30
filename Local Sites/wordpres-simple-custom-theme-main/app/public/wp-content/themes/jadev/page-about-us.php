<?php get_header(); ?>

<main class="px-3 px-md-5">
    <div class='container'>
        <?php
        $two_column_image_text_section = get_field('two_column_image_text_section');
        if ($two_column_image_text_section) {
            get_template_part('template-parts/components/two-column-image-text', null, [
                'section_data' => $two_column_image_text_section,
                'additional_class_col2' => 'h-100 justify-content-center p-5'
            ]);
        }
        ?>

        <?php
        get_template_part('template-parts/sections/our-team-section', null, [
            'section_title' => 'Our Team',
            'columns' => 3,
            'show_title' => true
        ]);
        ?>
    </div>
</main>

<?php get_footer(); ?>