<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: wp-admin whitelabeling
//               (distinct from rach5-admin.php) 
//
// ------------------------------------------------------------ //

// Custom admin CSS
function rach5_admin_css() { 
	echo '<link rel="stylesheet" type="text/css" href="http://cdn.vanpattenmedia.com/css/wp-admin.css" />'; 
}
add_action('login_head', 'rach5_admin_css');
add_action('admin_head', 'rach5_admin_css');

// Custom admin footer
function rach5_admin_footer() {
	echo 'Built by <a href="http://www.vanpattenmedia.com/" id="vpm">Van Patten Media</a> with <a href="http://wordpress.org">WordPress</a>. &bull; <a href="' . admin_url() . 'freedoms.php">Freedoms</a> &bull; <a href="' . admin_url() . 'credits.php">Credits</a>';
}
add_filter('admin_footer_text', 'rach5_admin_footer');

// Custom admin dashboard widgets
function rach5_remove_dashboard_widgets() {
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
add_action('wp_dashboard_setup', 'rach5_remove_dashboard_widgets' );


// Remove items from the admin bar
function rach5_admin_bar_remove() {
	global $wp_admin_bar;
	
	$wp_admin_bar->remove_node('wp-logo');
}
add_action('wp_before_admin_bar_render', 'rach5_admin_bar_remove');