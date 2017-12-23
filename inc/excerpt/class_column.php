<?php

namespace Kntnt\AC_Wc\Excerpt;

class Column extends \AC_Column {

	public function __construct() {
		$this->set_type( 'kntnt-wc-excerpt' );
		$this->set_label( __( 'Excerpt Word Count', 'kntnt-ac-wc' ) );
	}

	public function register_settings() {
		include_once __DIR__ . '/class_settings.php';
		$this->add_setting( new Settings( $this ) );
	}

	public function get_raw_value( $pid ) {
		$value = get_post_field( 'post_excerpt', $pid );
		$count_type = $this->get_options()['count_type'];
		return \Kntnt\AC_Wc\Utilities\count_text( $value, $count_type );
	}

}
