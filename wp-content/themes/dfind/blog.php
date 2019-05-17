<?php
/**
 * Template Name: Blog
 *
 *
 * @package    WordPress
 * @subpackage dFind
 * @since      1.0
 * @version    1.0
 */

get_header(); ?>

<?php get_template_part('template-parts/blog', 'banner-block'); ?>

<section class="section section-blog-posts">
    <div class="section-content">
        <div class="container">
            <?php
            $terms = get_terms([
                'taxonomy'   => 'category',
                'hide_empty' => false,
            ]);

            if ($terms) : ?>
                <ul class="blog-tags">
                    <li>
                        <button class="active"><?php _e('All', THEME_OPT); ?></button>
                    </li>
                    <?php foreach ($terms as $term) : ?>
                        <li>
                            <button data-id="<?php echo $term->term_taxonomy_id; ?>">
                                <?php echo $term->name; ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;

            $articles = new WP_Query([
                'posts_per_page' => 1,
                'post_type'      => 'post',
                'post_status'    => 'publish',
            ]);

            if ($articles->have_posts()) : ?>

            <div id="articles-block" data-cat="all">
                <div class="row">
                    <?php while ($articles->have_posts()) :
                        $articles->the_post();
                        $img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

                        // display articles
                        echo get_post_preview($img, true);

                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
                <?php
                if ($articles->found_posts > 1) :
                    // Show more button
                    echo get_show_more_btn($articles->found_posts);
                endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
