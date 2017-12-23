<?php

namespace Kntnt\AC_Wc\Utilities;

function clean_str( $text ) {
	$text = trim( $text );
	$text = strip_shortcodes($text);
	$text = strip_tags( $text );
	$text = html_entity_decode( $text, ENT_HTML5, 'UTF-8');
	return $text;
}

// PHP's str_word_count can't count words.
function str_word_count( $text ) {
	return count(preg_split("/[^\p{L}\p{N}]+/um", $text, -1, PREG_SPLIT_NO_EMPTY));
}

function str_no_white_space_character_count( $string ) {
	return strlen( preg_replace( '/[\s\p{Z}]/um', '', clean_str( $string ) ) );
}

function count_text( $text, $count_type ) {
	switch ( $count_type ) {
		case 'word_count':
			$text = str_word_count( clean_str( $text ) );
			break;
		case 'char_count':
			$text = strlen( clean_str( $text ) );
			break;
		case 'non_white_char_count':
			$text = str_no_white_space_character_count( clean_str ( $text ) );
			break;
	}
	return $text;
}