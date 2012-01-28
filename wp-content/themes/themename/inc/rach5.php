<?php

// ------------------------------------------------------------ //
//
//    Rach5 Functions
//    Default functions set
//    http://github.com/vanpattenmedia/rach5
//
// ------------------------------------------------------------ //

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

// HTML5 compatible image caption
function my_img_caption_shortcode_filter($val, $attr, $content = null) {
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> '',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
	if ( 1 > (int) $width || empty($caption) )
		return $val;

	$capid = '';
	if ( $id ) {
		$id = esc_attr($id);
		$capid = 'id="figcaption_'. $id . '" ';
		$id = 'id="' . $id . '" ';
	}

	return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '">' . do_shortcode( $content ) . '<figcaption ' . $capid 
	. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);