<?php
/**
 * The main template file
 *
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="section-single">
    <div class="container">
        <div class="row">
            <div class="col-lg">

                <h1 class="section-title"><?php the_title(); ?></h1>

                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        the_content();
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
