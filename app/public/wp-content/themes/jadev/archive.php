<?php get_header(); ?>

<main class="px-3 px-md-5">
    <div class='container'>
        <div class="custom-container">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/contents/content', 'archive');
                }
            }
            ?>
        </div>
        <?php
        get_template_part('template-parts/components/pagination');
        ?>
    </div>
</main>

<?php get_footer(); ?>