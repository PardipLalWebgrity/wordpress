
<?php

/**
 * Manage Assets
 * 
 * @package wpresstheme
 */



class WPRESS_Assets{

	public function __construct() {

			// load class
			$this->setup_actions();
			$this->setup_filters();
	}

	public function setup_actions(){
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	public function setup_filters(){

	}

	public function register_styles(){

		// Register CSS
		wp_register_style( 'bootstrap-style', WPRESS_DIR_URI.'/assets/library/bootstrap-5.3.3/bootstrap.css', [], '5.3.3', 'all' );
		wp_register_style( 'owlcarousel-style', WPRESS_DIR_URI.'/assets/library/OwlCarousel2-2.3.4/owl.carousel.css', [], '2.3.4', 'all' );
		wp_register_style( 'main-style', get_stylesheet_uri(), [], filemtime( WPRESS_DIR_PATH.'/style.css' ), 'all' );

		// Enqueue CSS
		wp_enqueue_style('bootstrap-style');
		wp_enqueue_style('owlcarousel-style');
		wp_enqueue_style('main-style');
		
	}

	public function register_scripts(){

		// Register JS
		wp_register_script( 'bootstrap-js', WPRESS_DIR_URI.'/assets/library/bootstrap-5.3.3/bootstrap.bundle.min.js', ['jquery'], '5.3.3', true );
		wp_register_script( 'owlcarousel-js', WPRESS_DIR_URI.'/assets/library/OwlCarousel2-2.3.4/owl.carousel.js', ['jquery'], '2.3.4', true );
		wp_register_script( 'main-js', WPRESS_DIR_URI.'/assets/js/script.js', [], filemtime( WPRESS_DIR_PATH.'/assets/js/script.js' ), true );

		// Enqueue JS
		wp_enqueue_script('bootstrap-js');
		wp_enqueue_script('owlcarousel-js');
		wp_enqueue_script('main-js');
		
	}
}









	 