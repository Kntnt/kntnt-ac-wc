<?php

namespace Kntnt\AC_Wc\Body;

defined( 'WPINC' ) || die;

new Add_On();

class Add_On {

	public function __construct() {
		add_action( 'ac/column_types', [ $this, 'register_column_type' ] );
		add_action( 'acp/column_types', [ $this, 'register_column_type_pro' ] );
	}

	public function register_column_type( \AC_ListScreen $list_screen ) {
		if ( 'post' === $list_screen->get_group() ) {
			require_once __DIR__ . '/class_column.php';
			$list_screen->register_column_type( new Column );
		}
	}

	public function register_column_type_pro( \AC_ListScreen $list_screen ) {
		if ( 'post' === $list_screen->get_group() ) {
			require_once __DIR__ . '/class_column.php';
			require_once __DIR__ . '/class_column_pro.php';
			$list_screen->register_column_type( new Column_Pro );
		}
	}

}
