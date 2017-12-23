<?php
/*
 * Plugin Name: Kntnt's word count add-on for Admin Columns
 * Plugin URI:  https://www.kntnt.com/
 * Description: Extends Admin Columns with word count of title, excerpt, body and custom fields.
 * Version:     1.0.0
 * Author:      Thomas Barregren
 * Author URI:  https://www.kntnt.com/
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: kntnt-ac-wc
*/


namespace Kntnt\AC_Wc;

defined( 'WPINC' ) || die;

new Plugin();

final class Plugin {

	public function __construct() {
		load_plugin_textdomain( 'kntnt-ac-wc', false, 'languages' );
		add_action( 'plugins_loaded', [ $this, 'run' ] );
	}

	public function run() {
		include_once __DIR__ . '/inc/title/class_add_on.php';
		include_once __DIR__ . '/inc/body/class_add_on.php';
		include_once __DIR__ . '/inc/excerpt/class_add_on.php';
		include_once __DIR__ . '/inc/custom-fields/class_add_on.php';
	}

}
