<?php

// ------------------------------------------------------------ //
//
//    Rach5 Functions
//    Customize wp-admin
//    http://github.com/vanpattenmedia/rach5
//
// ------------------------------------------------------------ //

// Disable admin bar
add_filter( 'show_admin_bar', '__return_false' );

// Custom admin CSS
function custom_admin() { 
	echo '<link rel="stylesheet" type="text/css" href="http://cdn.vanpattenmedia.com/css/wp-admin.css" />'; 
}
add_action('login_head', 'custom_admin');
add_action('admin_head', 'custom_admin');

// Custom admin footer
function filter_footer_admin() {
	echo 'Built by <a href="http://www.vanpattenmedia.com/" id="vpm">Van Patten Media</a> with <a href="http://wordpress.org">WordPress</a>. &bull; <a href="' . admin_url() . 'freedoms.php">Freedoms</a> &bull; <a href="' . admin_url() . 'credits.php">Credits</a>';
}
add_filter('admin_footer_text', 'filter_footer_admin');

// Custom admin dashboard widgets
function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	
	remove_action( 'wp_version_check', 'wp_version_check' );
	remove_action( 'admin_init', '_maybe_update_core' );
	add_filter( 'pre_transient_update_core', create_function( '$a', "return null;" ) );
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

// Hide TinyMCE status bar
function __my_tiny_mce( $config ) {
    $config['theme_advanced_statusbar_location'] = none;
    return $config;
}
add_filter('tiny_mce_before_init', '__my_tiny_mce');

// Disable online plugin and theme edits
define('DISALLOW_FILE_EDIT',true);