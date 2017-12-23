<?php

namespace Kntnt\AC_Wc\Custom_Fields;

class Settings extends \AC_Settings_Column {

	private $field;

	public function get_field() {
		return $this->field;
	}

	public function set_field( $field ) {
		$this->field= $field;
		return $this;
	}

	public function create_view() {
		$setting = $this
			->create_element( 'select', 'field' )
			->set_options( $this->fields() )
			->set_no_result( __( 'No fields available.', 'kntnt-ac-wc' ) );
		$view    = new \AC_View( [
			'label'   => __( 'Field', 'kntnt-ac-wc' ),
			'setting' => $setting,
		] );
		return $view;
	}

	public function get_dependent_settings() {
		return array( new Settings2( $this->column ) );
	}

	private function fields() {
		$fields = get_meta_keys();
		return array_combine( $fields, $fields );
	}

	protected function define_options() {
		return [ 'field' ];
	}

	protected function get_meta_keys() {

		$query = new \AC_Meta_Query( $this->get_meta_type() );

		$query->select( 'meta_key' )
		      ->distinct()
		      ->order_by( 'meta_key' );

		if ( $this->get_post_type() ) {
			$query->where_post_type( $this->get_post_type() );
		}

		$keys = $query->get();

		if ( empty( $keys ) ) {
			$keys = false;
		}

		return apply_filters( 'ac/column/custom_field/meta_keys', $keys, $this );

	}

	protected function get_meta_type() {
		return $this->column->get_list_screen()->get_meta_type();
	}

	protected function get_post_type() {
		return $this->column->get_post_type();
	}

}

class Settings2 extends \AC_Settings_Column {

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
