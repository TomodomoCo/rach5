<?php

// Include Rach5 functions
require_once locate_template('/inc/rach5.php');
require_once locate_template('/inc/rach5-admin.php');
require_once locate_template('/inc/rach5-clean.php');
require_once locate_template('/inc/rach5-functions.php');
require_once locate_template('/inc/rach5-htaccess.php');
require_once locate_template('/inc/rach5-html5.php');
require_once locate_template('/inc/rach5-whitelabel.php');

// ------------------------------------------------------------ //
//
//    Website.tld custom functions
//
// ------------------------------------------------------------ //

function rach5_setup() {
	// Editor style
	add_theme_support('editor_style');
	add_editor_style('css/editor-style.css?' . time());
	
	// update_option('upload_path', 'assets');
}
add_action('after_setup_theme', 'rach5_setup');

// Content width
if ( ! isset( $content_width ) ) {
	$content_width = 500;
}