<?php

if ( !function_exists('rach5_info') ) {
	function no_rach5() {
		echo '<div class="error">';
		echo '<p>', sprintf(__('You need to <a href="%s">install the Rach5 plugin</a>.', 'rach5'), admin_url('plugin-install.php?tab=upload') ), '</p>';
		echo '</div>';
	}
	add_action('admin_notices', 'no_rach5');
}


/*
 *
 * Website.tld custom functions
 *
 */

function rach5_setup() {
	// Editor style
	add_theme_support('editor_style');
	add_editor_style('css/editor-style.css?' . time());

	// Post thumbnails
	// add_theme_support('post-thumbnails');

	// use /assets as the default upload path
	// update_option('upload_path', 'assets');

	// Use wrappers by default now
	add_rach5_support('wrappers');
}
add_action('after_setup_theme', 'rach5_setup');

// Content width
if ( !isset( $content_width ) ) {
	$content_width = 500;
}