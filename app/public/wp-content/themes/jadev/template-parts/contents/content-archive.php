
<div class="post mb-5 ">
    <div class="media">
        <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="<?php esc_url(the_post_thumbnail_url('thumbnail')); ?>" alt="image">
        <div class="media-body">
            <h3 class="title mb-1"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h3>
            <div class="meta mb-1">
                <span class="date"><?php esc_html(the_time('F j, Y')); ?></span>
                <span><?php esc_html(comments_number()); ?></span></div>
            <div class="intro"><?php esc_html(the_excerpt()); ?></div>
            <a class="more-link" href="<?php esc_url(the_permalink()); ?>">Read more &rarr;</a>
        </div><!--//media-body-->
    </div><!--//media-->
</div>
