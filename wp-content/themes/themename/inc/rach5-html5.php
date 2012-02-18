<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: HTML5 support    
//
// ------------------------------------------------------------ //

// Remove self-closing <img> and <input> tags
function rach5_remove_self_closing_tags($input) {
	return str_replace(' />', '>', $input);
}
add_filter('get_avatar', 'rach5_remove_self_closing_tags');
add_filter('comment_id_fields', 'rach5_remove_self_closing_tags');
add_filter('post_thumbnail_html', 'rach5_remove_self_closing_tags');

function rach5_remove_self_closing_tags_2( $content ) {
    return str_replace( ' />', '>', $content );
}
add_filter( 'the_content', 'rach5_remove_self_closing_tags_2', 25 );

// HTML5 compatible image caption
function rach5_img_caption_shortcode($val, $attr, $content = null) {
	extract(shortcode_atts(array(
		'id'		=> '',
		'align'		=> '',
		'width'		=> '',
		'caption' 	=> ''
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
add_filter('img_caption_shortcode', 'rach5_img_caption_shortcode',10,3);