<?php

if ( !function_exists('rach5_info') ) {
	function no_rach5() {
		echo '<div class="error">';
		echo '<p>', sprintf(__('You need to <a href="%s">install the <strong>rach5-helper</strong> plugin</a>.', 'rach5'), admin_url('plugin-install.php?tab=upload') ), '</p>';
		echo '</div>';
	}
	add_action('admin_notices', 'no_rach5');
	
	return;
}


/*
 *
 * Custom functions
 *
 */

function rach5_setup() {
	// Editor style
	add_theme_support('editor_style');
	add_editor_style('css/editor-style.css?' . time());

	// Post thumbnails
	add_theme_support('post-thumbnails');

	// Use wrappers by default now
	add_rach5_support('wrappers');

	/*
	// Register nav menus
	$menus = array(
		'nav-header' => 'Header',
	);
	register_nav_menus( $menus );
	*/

	/*
	// Register widget areas
	$args = array(
		'name'          => 'Main Sidebar',
		'id'            => 'main-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget box %2$s">',
		'after_widget'  => '</aside>',
	);
	register_sidebar( $args );
	*/

	/*
	// Register widgets
	include 'inc/widgets/RfWidget.php';

	function rf_register_widgets() {
		register_widget('RfWidget');
	}
	add_action( 'widgets_init', 'rf_register_widgets' );
	*/
}
add_action('after_setup_theme', 'rach5_setup');

// Content width
if ( !isset( $content_width ) ) {
	$content_width = 500;
}
