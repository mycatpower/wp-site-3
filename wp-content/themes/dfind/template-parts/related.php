<?php

$category = get_the_category();
$catSlug = $category[0]->slug;

$postID = get_the_ID();

$articles = new WP_Query([
    'posts_per_page' => 3,
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'category__in'   => wp_get_post_categories($postID),
    'post__not_in'   => [$postID],
]);

if ($articles->have_posts()) : ?>
<section class="section related-posts">
    <div class="container">
        <h2 class="h2"><?php _e('Related Posts', THEME_OPT); ?></h2>
        <div class="row">
            <?php
            while ($articles->have_posts()) :
                $articles->the_post();

                $img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

                // display articles
                echo get_post_preview($img, true);

            endwhile;
            wp_reset_postdata();

            if ($articles->found_posts > 2) : ?>
                <div class="col-12 text-center">
                    <button class="blog-show-more">
                        <?php _e('Mehr laden', THEME_OPT); ?>
                        <i class="df df-arrow-right"></i>
                    </button>
                </div>
            <?php endif; ?>

        </div><!-- .row -->
    </div>
</section>
<?php endif;
