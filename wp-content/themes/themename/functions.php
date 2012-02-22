<?php

if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

// Include Rach5 functions: this is the least you need to run Rach5
require_once locate_template('/inc/rach5-functions.php');

define('WP_BASE', wp_base_dir());
define('THEME_NAME', next(explode('/themes/', get_template_directory())));
define('RELATIVE_PLUGIN_PATH', str_replace(site_url() . '/', '', plugins_url()));
define('FULL_RELATIVE_PLUGIN_PATH', WP_BASE . '/' . RELATIVE_PLUGIN_PATH);
define('RELATIVE_CONTENT_PATH', str_replace(site_url() . '/', '', content_url()));
define('THEME_PATH', RELATIVE_CONTENT_PATH . '/themes/' . THEME_NAME);

require_once locate_template('/inc/rach5-admin.php');
require_once locate_template('/inc/rach5-clean.php');
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
	
	// add_theme_support('post-thumbnails');
	
	// update_option('upload_path', 'assets');
}
add_action('after_setup_theme', 'rach5_setup');

// Content width
if ( ! isset( $content_width ) ) {
	$content_width = 500;
}