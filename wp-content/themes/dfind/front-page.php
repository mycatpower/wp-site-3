<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage dFind
 * @since 1.0
 * @version 1.0
 */

get_header();

    if (have_rows('home_page')) {
        while( have_rows('home_page') ) : the_row();

            $layout = get_row_layout();

            switch ( $layout ) {
                case 'first_block':
                    get_template_part('template-parts/banner');
                    break;

                case 'second_block':
                    get_template_part('template-parts/facts');
                    break;

                case 'what_you_find_section' :
                    get_template_part('template-parts/what-you-find');
                    break;

                case 'our_team_section' :
                    get_template_part('template-parts/our-team');
                    break;

                case 'other_employees_section' :
                    get_template_part('template-parts/other-employees');
                    break;

                case 'digital_section' :
                    get_template_part('template-parts/digital');
                    get_template_part('template-parts/reviews');
                    break;

                case 'interne_section' :
                    get_template_part('template-parts/interne');
                    break;

                case 'reviews_waves' :
                    get_template_part('template-parts/reviews-waves');
                    break;

                case 'who_we_find_section' :
                    get_template_part('template-parts/who-we-find');
                    break;

                case 'ready_section' :
                    get_template_part('template-parts/ready');
                    break;

                case 'how_we_find_section' :
                    get_template_part('template-parts/how-we-find');
                    break;

                case 'ready_section1' :
                    get_template_part('template-parts/ready1');
                    break;

                case 'blog_section' :
                    get_template_part('template-parts/blog');
                    break;

                case 'find_us_section' :
                    get_template_part('template-parts/find-us');
                    break;

                case 'subscribe' :
                    get_template_part('template-parts/subscribe');
                    break;

                default:
                    break;
            }

        endwhile;
    }

get_footer();
