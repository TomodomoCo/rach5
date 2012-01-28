<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: Cleaning    
//
// ------------------------------------------------------------ //

// Remove spaces from wp_title without defined separator
function rach5_title_despacer($title) {
	return trim($title);
}
add_filter('wp_title', 'rach5_title_despacer');

// Fix homepage body class
function strip_page_from_body_class($classes, $class) {
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

// Hide generator tags, manifests, and extra RSS links
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links_extra', 3);

// remove WordPress version from RSS feeds
function disable_version() {
	return '';
}
add_filter('the_generator','disable_version');