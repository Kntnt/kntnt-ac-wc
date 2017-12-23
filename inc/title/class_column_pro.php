<?php

namespace Kntnt\AC_Wc\Title;

require_once __DIR__ . '/../models/class_sorting.php';
require_once __DIR__ . '/../models/class_export.php';

class Column_Pro extends Column implements \ACP_Column_SortingInterface, \ACP_Export_Column {

	public function sorting() {
		return new \Kntnt\AC_Wc\Models\Sorting( $this );
	}

	public function export() {
		return new \Kntnt\AC_Wc\Models\Export( $this );
	}

}
