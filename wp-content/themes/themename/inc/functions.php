<?php

//////////////////////////////////////////////////
//
//    Rach5 custom functions.php
//    
//    http://github.com/vanpattenmedia/rach5
//
//////////////////////////////////////////////////

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

// Custom admin dashboard
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

// Fix homepage body class
function strip_page_from_body_class($classes, $class){
	global $post;
	if ( !is_front_page() ){
		return $classes;
	} else {
		foreach ($classes as &$str) {
			if (strpos($str, "page") > -1) {
				$str = "";
			}
		}
	}
	return $classes;
}
add_filter("body_class", "strip_page_from_body_class", 10, 2);

// Hide TinyMCE status bar
function __my_tiny_mce( $config )
{
    $config['theme_advanced_statusbar_location'] = none;
    return $config;
}
add_filter('tiny_mce_before_init', '__my_tiny_mce');

// Hide generator tags, manifests, and extra RSS links
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links_extra', 3);

// remove WordPress version from RSS feeds
function disable_version() { return ''; }
add_filter('the_generator','disable_version');

// Disable online plugin and theme edits
define('DISALLOW_FILE_EDIT',true);