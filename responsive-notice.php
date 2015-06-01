<?php
/*
Plugin Name: Responsive EU Cookie Notice
Plugin URI: http://www.wordpress.org/plugins/responsive-eu-cookie-notice/
Description: A simple, configurable notice that appears at the top of the page. Easily closed by the user. Javascript-based cookie handling is compatible with Wordpress front-end caching strategies.
Author: Robert Peake
Version: 1.0
Author URI: http://www.robertpeake.com/
Text Domain: responsive_notice
Domain Path: /languages/
*/
if ( !function_exists( 'add_action' ) ) {
    die();
}
require_once 'classes/ResponsiveNotice.php';
ResponsiveNotice::init();
