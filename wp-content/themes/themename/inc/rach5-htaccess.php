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

// Ditch /wp-content/themes/themename/ and /wp-content/plugins/
function rach5_add_rewrites($content) {
	global $wp_rewrite;
	$rach5_new_non_wp_rules = array(
		'css/(.*)'      => THEME_PATH . '/css/$1',
		'js/(.*)'       => THEME_PATH . '/js/$1',
		'img/(.*)'      => THEME_PATH . '/img/$1',
		'plugins/(.*)'  => RELATIVE_PLUGIN_PATH . '/$1'
	);
	$wp_rewrite->non_wp_rules = $rach5_new_non_wp_rules;
	return $content;
}

function rach5_clean_urls($content) {
	if (strpos($content, FULL_RELATIVE_PLUGIN_PATH) === 0) {
		return str_replace(FULL_RELATIVE_PLUGIN_PATH, WP_BASE . '/plugins', $content);
	} else {
		return str_replace('/' . THEME_PATH, '', $content);
	}
}

// Only use clean URLs if the theme isn't a child or a multisite install
if (!is_multisite() && !is_child_theme()) {
	add_action('generate_rewrite_rules', 'rach5_add_rewrites');
	if (!is_admin()) {
		$tags = array(
			'plugins_url',
			'bloginfo',
			'stylesheet_directory_uri',
			'template_directory_uri',
			'script_loader_src',
			'style_loader_src'
		);
		add_filters($tags, 'rach5_clean_urls');
	}
}