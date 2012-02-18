<?php

// ------------------------------------------------------------ //
//
//    Rach5
//    http://labs.vanpattenmedia.com/projects/rach5/
//
//    Functions: Stuff useful outside of WordPress 
//
// ------------------------------------------------------------ //

// What year should the copyright start?
function copyright($copystart) {
	echo 'Copyright &copy; ' . $copystart;
	
	if ( date('Y') > $copystart ) {
		echo '-' . date('Y');
	}
}

// Useful word trim function
function word_trim($string, $count, $ellipsis = FALSE){
	$words = explode(' ', $string);
	if (count($words) > $count){
		array_splice($words, $count);
		$string = implode(' ', $words);
		if (is_string($ellipsis)){
			$string .= $ellipsis;
		}
		elseif ($ellipsis){
			$string .= '...';
		}
	}
	return $string;
}

// A nice tab function, if you like clean source like me.
function tab($count=1){
    for($x = 1; $x <= $count; $x++){
        $output .= "\t";
    }
    return $output;
}