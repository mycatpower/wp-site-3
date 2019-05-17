<?php
/**
 * Restrict mime types
 *
 */

if ( ! function_exists( 'dfind_restrict_mime_types' ) ) {

    add_filter( 'upload_mimes', 'dfind_restrict_mime_types' );
    /**
     * Retrun allowed mime types
     *
     * @see     function get_allowed_mime_types in wp-includes/functions.php
     * @param   array Array of mime types
     * @return  array Array of mime types keyed by the file extension regex corresponding to those types.
     */
    function dfind_restrict_mime_types( $mime_types ) {

        $mime_types = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'svg'          => 'image/svg+xml',
            'webm'         => 'video/webm',
            'ogv'          => 'video/ogg',
            'flv'          => 'video/x-flv',
            'mp4|m4v'      => 'video/mp4',
            'pdf'          => 'application/pdf',
            'eps'          => 'application/postscript',
            'ico'          => 'image/x-icon'
        );

        return $mime_types;
    }
}
