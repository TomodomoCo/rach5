<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: Clean the source code
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

// remove WordPress version from RSS feeds
function rach5_disable_version() {
	return '';
}
add_filter('the_generator','rach5_disable_version');


// ------------------------------------------------------------ //
//
//    Root relative URLs
//    Inspired by http://bit.ly/a35LmX
//
// ------------------------------------------------------------ //

function rach5_root_relative_url($input) {
	$output = preg_replace_callback(
		'!(https?://[^/|"]+)([^"]+)?!',
		create_function(
			'$matches',
			// if full URL is site_url, return a slash for relative root
			'if (isset($matches[0]) && $matches[0] === site_url()) { return "/";' .
			// if domain is equal to site_url, then make URL relative
			'} elseif (isset($matches[0]) && strpos($matches[0], site_url()) !== false) { return $matches[2];' .
			// if domain is not equal to site_url, do not make external link relative
			'} else { return $matches[0]; };'
		),
		$input
	);
	return $output;
}

if (!is_admin() && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {
	$tags = array(
		'bloginfo_url',
		'theme_root_uri',
		'stylesheet_directory_uri',
		'template_directory_uri',
		'script_loader_src',
		'style_loader_src',
		'plugins_url',
		'the_permalink',
		'wp_list_pages',
		'wp_list_categories',
		'wp_nav_menu',
		'the_content_more_link',
		'the_tags',
		'get_pagenum_link',
		'get_comment_link',
		'month_link',
		'day_link',
		'year_link',
		'tag_link',
		'the_author_posts_link'
	);
	add_filters($tags, 'rach5_root_relative_url');
}

function rach5_root_relative_attachment_urls() {
	if (!is_feed()) {
		add_filter('wp_get_attachment_url', 'rach5_root_relative_url');
		add_filter('wp_get_attachment_link', 'rach5_root_relative_url');
	}
}
add_action('pre_get_posts', 'rach5_root_relative_attachment_urls');


// ------------------------------------------------------------ //
//
//    Clean up the head
//
// ------------------------------------------------------------ //

function rach5_rel_canonical() {
	if (!is_singular()) {
		return;
	}
	
	global $wp_the_query;
	if (!$id = $wp_the_query->get_queried_object_id()) {
		return;
	}
	
	$link = get_permalink($id);
	echo "<link rel=\"canonical\" href=\"$link\">\n";
}

function rach5_head_cleanup() {
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'noindex', 1);
	// remove_action('wp_head', 'feed_links', 2);
	
	remove_action('wp_head', 'rel_canonical');
	add_action('wp_head', 'rach5_rel_canonical');
  
	if (!is_admin()) {
		wp_deregister_script('l10n');
		wp_deregister_script('jquery');
		wp_register_script('jquery', '', '', '', true);
	}
}
add_action('init', 'rach5_head_cleanup');