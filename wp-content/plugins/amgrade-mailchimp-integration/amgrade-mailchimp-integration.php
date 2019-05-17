<?php
/*
  Plugin Name: Mailchimp integration
  Plugin URI:
  Description: Mailchimp integration by AMgrade
  Author: AMgrade Wordpress Team
  Version: 1.0
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // don't access directly
};

define( 'AM_OPT', 'amailchimp' );

define( 'AM_FILE', __FILE__ ); // this file
define( 'AM_DIR', dirname( AM_FILE ) ); // our directory

define( 'AM_ADMIN_INC',  AM_DIR . '/admin' );

require_once AM_ADMIN_INC . '/class-admin.php';

AM_Admin::init();
