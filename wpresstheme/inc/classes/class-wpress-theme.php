
<?php

/**
 * Manage Theme Functionality
 * 
 * @package wpresstheme
 */

 // Load classes
 require_once WPRESS_DIR_PATH.'/inc/classes/class-assets.php';


class WPRESS_THEME{

	public function __construct() {

			// Execute Classes
			new WPRESS_Assets();

			$this->setup_actions();
			$this->setup_filters();
	}

	public function setup_actions(){
		
	}

	public function setup_filters(){

	}


}

new WPRESS_THEME();







	 