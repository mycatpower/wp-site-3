<?php

/**
 * Theme Custom actions
 *
 */

add_action('dfind/social_sharing', 'df_social_sharing');

function df_social_sharing($wrap_class)
{
    $html = '';

    $socials = get_field('sharing', 'option');

    if ($socials && is_array($socials)) {
        $html .= '<ul class="'.$wrap_class.'">';
        foreach ($socials as $social) {
            $socialName = get_social_name($social['label']);
            $socialUrl  = get_social_share_url($socialName);

            $html .= '<li>';
            $html .= '<a href="'. $socialUrl .'" class="social__link '. $socialName .'" target="_blank">';
            $html .= '<i class="df df-'. $social['value'] .'"></i>';
            $html .= '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
    }

    echo $html;
}
