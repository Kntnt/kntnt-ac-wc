<?php

namespace Kntnt\AC_Wc\Title;

require_once __DIR__ . '/../utilities/utilities.php';

use function \Kntnt\AC_Wc\Utilities\count_text;

class Column extends \AC_Column {

	public function __construct() {
		$this->set_type( 'kntnt-wc-title' );
		$this->set_label( __( 'Title Word Count', 'kntnt-ac-wc' ) );
	}

	public function register_settings() {
		include_once __DIR__ . '/class_settings.php';
		$this->add_setting( new Settings( $this ) );
	}

	public function get_raw_value( $pid ) {
		$value = get_post_field( 'post_title', $pid );
		$count_type = $this->get_options()['count_type'];
		return count_text( $value, $count_type );
	}

}