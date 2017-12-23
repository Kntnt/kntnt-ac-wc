<?php

namespace Kntnt\AC_Wc\Excerpt;

class Settings extends \AC_Settings_Column {

	private $count_type;

	public function set_count_type($count_type) {
		$this->count_type = $count_type;
		return $this;
	}

	public function get_count_type() {
		return $this->count_type;
	}

	public function create_view() {

		$setting = $this->create_element( 'select');

		$setting->set_options( [
			'word_count'           => 'Word Count',
			'char_count'           => 'Character Count',
			'non_white_char_count' => 'Non-White Character Count',
		] );

		$view = new \AC_View( [
			'label'   => __( 'Unit', 'kntnt-ac-wc' ),
			'setting' => $setting,
		] );

		return $view;

	}

	protected function define_options() {
		return [ 'count_type' ];
	}

}
