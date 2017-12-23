<?php

namespace Kntnt\AC_Wc\Models;

class Export extends \ACP_Export_Model {

	public function get_value( $id ) {
		return $this->column->get_raw_value( $id );
	}

}
