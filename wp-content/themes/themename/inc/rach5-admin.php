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