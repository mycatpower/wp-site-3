<?php

/**
 * Get image caption
 */
add_action('wp_ajax_image_caption', 'getImageCaption');
add_action('wp_ajax_nopriv_image_caption', 'getImageCaption');

function getImageCaption()
{
    $attach_id = (isset($_POST['attach_id'])) ? $_POST['attach_id'] : null;
    $output = '';

    $photocaption = get_post($attach_id)->post_excerpt;
    $photocredit = get_post_meta($attach_id, '_wp_attachment_source_name', true);

    if (!$photocredit)
        wp_die();

    $output .= '<span class="description-img">';
    $output .= "<span class='description-img__item'>$photocaption</span>";
    $output .= "<span class='description-img__item'>". __('Photo by') ." / $photocredit</span>";
    $output .= '</span>';

    echo $output;

    wp_die();
}

/**
 * Get more articles on Blog page
 */
add_action('wp_ajax_more_articles', 'dfMoreArticles');
add_action('wp_ajax_nopriv_more_articles', 'dfMoreArticles');

function dfMoreArticles() {
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

    $args = [
        'posts_per_page' => 1,
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'offset'         => $offset,
    ];

    if (isset($_POST['term']) && $_POST['term'] !== 'all') {
        $termId = intval($_POST['term']);

        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $termId,
            ],
        ];
    }

    $articles = new WP_Query($args);

    if ($articles->have_posts()) :
        while ($articles->have_posts()) :
            $articles->the_post();

            $img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

            // display articles
            echo get_post_preview($img, true);
        endwhile;
        wp_reset_postdata();
    endif;

    wp_die();
}

/**
 * Filter articles by category
 */
add_action('wp_ajax_filter_articles', 'dfFilterArticles');
add_action('wp_ajax_nopriv_filter_articles', 'dfFilterArticles');

function dfFilterArticles()
{
    $data = [
        'html' => '',
        'found_posts' => '',
    ];
    $args = [
        'posts_per_page' => 1,
        'post_type'      => 'post',
        'post_status'    => 'publish',
    ];

    if (isset($_POST['term']) && $_POST['term'] !== 'all') {
        $termId = intval($_POST['term']);

        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $termId,
            ],
        ];
    }

    $articles = new WP_Query($args);

    if ($articles->have_posts()) :
        while ($articles->have_posts()) :
            $articles->the_post();

            $img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

            // display articles
            $data['html'] .= get_post_preview($img, true);
        endwhile;
        $data['found_posts'] = $articles->found_posts;
        wp_reset_postdata();

        echo json_encode($data);
    endif;

    wp_die();
}
