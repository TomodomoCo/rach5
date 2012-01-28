<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: Customize wp-admin    
//
// ------------------------------------------------------------ //

// Disable admin bar
add_filter( 'show_admin_bar', '__return_false' );

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

// Hide TinyMCE status bar
function rach5_tinymce( $config ) {
    $config['theme_advanced_statusbar_location'] = none;
    return $config;
}
add_filter('tiny_mce_before_init', 'rach5_tinymce');

// Disable online plugin and theme edits
define('DISALLOW_FILE_EDIT',true);

// Remind you to change the "Just another WordPress site" tagline
function rach5_notice_tagline() {
	global $current_user;
	$user_id = $current_user->ID;
	
	if (!get_user_meta($user_id, 'ignore_tagline_notice')) {
		echo '<div class="error">';
		echo '<p>', sprintf(__('Don\'t forget to change the <a href="%s">site tagline</a>. <a href="%s" style="float: right;">Ignore</a>', 'rach5'), admin_url('options-general.php'), '?tagline_notice_ignore=0'), '</p>';
		echo '</div>';
	}
}

if ((get_option('blogdescription') === 'Just another WordPress site') && isset($_GET['page']) != 'theme_activation_options') {
	add_action('admin_notices', 'rach5_notice_tagline');
}

function rach5_notice_tagline_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	if (isset($_GET['tagline_notice_ignore']) && '0' == $_GET['tagline_notice_ignore']) {
		add_user_meta($user_id, 'ignore_tagline_notice', 'true', true);
	}
}
add_action('admin_init', 'rach5_notice_tagline_ignore');