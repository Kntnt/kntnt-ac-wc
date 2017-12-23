<?php

namespace Kntnt\AC_Wc\Custom_Fields;

class Column extends \AC_Column {

	public function __construct() {
		$this->set_type( 'kntnt-wc-custom-field' );
		$this->set_label( __( 'Custom Field Word Count', 'kntnt-ac-wc' ) );
	}

	public function register_settings() {
		include_once __DIR__ . '/class_settings.php';
		$this->add_setting( new Settings( $this ) );
	}

	public function get_raw_value( $pid ) {
		$field = $this->get_options()['field'];
		$value = get_post_meta( $pid, $field, true);
		$count_type = $this->get_options()['count_type'];
		return \Kntnt\AC_Wc\Utilities\count_text( $value, $count_type );
	}

}
