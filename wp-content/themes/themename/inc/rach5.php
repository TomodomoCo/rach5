<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: Master functions    
//
// ------------------------------------------------------------ //

// "stylesheet_link_tag," borrowed from Roots, inspired by Rails
//
// Options:
//	$file		= Location of file
//	$local		= Local or remote file? (e.g. include get_template_directory_uri() or not)
//	$tabs		= Number of tabs to proceed the line
//	$newline	= Add a newline after?
//	$rel		= "stylesheet" by default, but you can change it if you want
function stylesheet_link_tag($file, $local = true, $tabs = 0, $newline = true, $rel = 'stylesheet') {
	$indent = str_repeat("\t", $tabs);
	echo $indent . '<link rel="' . $rel .'" href="' . ($local ? get_template_directory_uri() . '/css' : '') . $file . '">' . ($newline ? "\n" : "");
}