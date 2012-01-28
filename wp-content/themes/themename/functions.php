<?php

// Include Rach5 functions
include 'inc/rach5.php';
include 'inc/admin.php';

// ------------------------------------------------------------ //
//
//    Website.tld custom functions
//
// ------------------------------------------------------------ //

function website_setup() {
	// Editor style
	add_theme_support('editor_style');
	add_editor_style('css/editor-style.css?' . time());
}
add_action('after_setup_theme', 'website_setup');

// Content width
if ( ! isset( $content_width ) ) {
	$content_width = 500;
}