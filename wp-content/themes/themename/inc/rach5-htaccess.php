<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: .htaccess rewrites    
//
// ------------------------------------------------------------ //

// Verify writable .htaccess file
function rach5_htaccess_writable() {
	if (!is_writable(get_home_path() . '.htaccess')) {
		if (current_user_can('administrator')) {
			add_action('admin_notices', create_function('', "echo '<div class=\"error\"><p>" . sprintf(__('Please make sure your <a href="%s">.htaccess</a> file is writable. ', 'rach5'), admin_url('options-permalink.php')) . "</p></div>';"));
		}
	}
}
add_action('admin_init', 'rach5_htaccess_writable');

// Rewrite /wp-content/themes/themename/css/ to /css/
// Rewrite /wp-content/themes/themename/js/  to /js/
// Rewrite /wp-content/themes/themename/img/ to /js/
// Rewrite /wp-content/plugins/ to /plugins/
function rach5_add_rewrites($content) {
	global $wp_rewrite;
	$theme_name = next(explode('/themes/', get_stylesheet_directory()));
	$rach5_new_non_wp_rules = array(
		'css/(.*)'      => 'wp-content/themes/'. $theme_name . '/css/$1',
		'js/(.*)'       => 'wp-content/themes/'. $theme_name . '/js/$1',
		'img/(.*)'      => 'wp-content/themes/'. $theme_name . '/img/$1',
		'plugins/(.*)'  => 'wp-content/plugins/$1'
	);
	$wp_rewrite->non_wp_rules = $rach5_new_non_wp_rules;
	return $content;
}

function rach5_clean_assets($content) {
	$theme_name = next(explode('/themes/', $content));
	$current_path = '/wp-content/themes/' . $theme_name;
	$new_path = '';
	$content = str_replace($current_path, $new_path, $content);
	return $content;
}

function rach5_clean_plugins($content) {
	$current_path = '/wp-content/plugins';
	$new_path = '/plugins';
	$content = str_replace($current_path, $new_path, $content);
	return $content;
}

// Only use clean URLs if the theme isn't a child or a multisite install
if (!is_multisite() && !is_child_theme()) {
	add_action('generate_rewrite_rules', 'rach5_add_rewrites');
	if (!is_admin()) {
		add_filter('plugins_url', 'rach5_clean_plugins');
		add_filter('bloginfo', 'rach5_clean_assets');
		add_filter('stylesheet_directory_uri', 'rach5_clean_assets');
		add_filter('template_directory_uri', 'rach5_clean_assets');
		add_filter('script_loader_src', 'rach5_clean_plugins');
		add_filter('style_loader_src', 'rach5_clean_plugins');
	}
}