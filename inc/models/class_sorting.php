<?php

namespace Kntnt\AC_Wc\Models;

class Sorting extends \ACP_Sorting_Model {

	public function get_sorting_vars() {
		$ids = [];
		foreach ( $this->strategy->get_results() as $id ) {
			$ids[ $id ] = $this->column->get_raw_value( $id );
		}

		return [ 'ids' => $this->sort( $ids ) ];
	}

}
