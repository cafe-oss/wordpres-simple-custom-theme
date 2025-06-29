<div class="container">
    <header class="content-header">
        <div class="meta mb-3">
            <span class="date"><?php the_date(); ?></span>

            <?php
                $tags = get_the_tags();
                if( !empty($tags)){
                    foreach($tags as $tag ){
                        $tag_result = '<span class="tag"><i class="fa fa-tag"></i>';
                        $tag_result .= '<a href="'. esc_url(get_tag_link( $tag->term_id )) . '">';
                        $tag_result .= esc_html( $tag->name) . '</a>';
                        $tag_result .= '</span>';
                        echo $tag_result;
                    }
                }
            ?>
            <?php
                $categories = get_the_category();

                if( !empty($categories)){
                    foreach($categories as $category ){
                        $category_result = '<span class="tag"><i class="fa fa-tag"></i>';
                        $category_result .= '<a href="'. esc_url(get_category_link( $category->term_id )) . '">';
                        $category_result .= esc_html( $category->name) . '</a>';
                        $category_result .= '</span>';
                        echo $category_result;
                    }
                }
            ?>
            <span class="comment"><a href="#comments"><i class="fa fa-comment"></i><?php esc_html(comments_number()); ?></a></span>
        </div>
    </header>

    <?php
    the_content();
    ?>

    <?php
        if( is_single() && get_post_type() === 'our_blogs'){
            comments_template();
        }
    ?>

</div>