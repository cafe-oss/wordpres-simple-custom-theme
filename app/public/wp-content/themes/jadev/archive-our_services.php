<?php get_header(); ?>

        <main class="px-3 px-md-5">
            <div class="container">
                <div class="row g-3 custom-container">
                    <?php
                        if(have_posts()){
                            while(have_posts()){
                                the_post();
                                get_template_part('template-parts/components/service-card');
                            }
                        }
                    ?>
                </div>


                <?php
                    the_posts_pagination();
                ?>
            </div>
        </main>

<?php get_footer(); ?>