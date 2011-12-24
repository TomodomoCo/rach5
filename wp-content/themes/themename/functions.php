<?php

// Include global WordPress functions
include 'inc/functions.php';

//////////////////////////////////////////////////
//
//    Website.tld custom functions
//
//////////////////////////////////////////////////

function website_setup() {
	// Editor style
	add_theme_support('editor_style');
	add_editor_style('editor-style.css?' . time());
}
add_action('after_setup_theme', 'website_setup');

// Content width
if ( ! isset( $content_width ) ) {
	$content_width = 500;
}

// HTML5 compatible image caption
function my_img_caption_shortcode_filter($val, $attr, $content = null)
{
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