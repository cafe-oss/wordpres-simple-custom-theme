<?php get_header(); ?>

<main class="px-3 px-md-5">
    <div class='container'>

        <?php
        $two_column_text_text_section = get_field('two_column_text_text_section');
        if ($two_column_text_text_section){
            get_template_part('template-parts/components/two-column-text-text', null, [
                'section_data' => $two_column_text_text_section,
                'reverse_class' => 'flex-column-reverse flex-md-row',
            ]);
        }
        ?>

    </div>
</main>

<?php get_footer(); ?>