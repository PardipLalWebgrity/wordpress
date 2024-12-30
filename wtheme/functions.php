<?php

	require_once get_template_directory() . '/classes/class-wtheme.php';
	require_once get_template_directory() . '/classes/class-wtheme-customizer.php';
	$wtheme_instance = new WTHEME();
	$wtheme_customizer_instance = new WTHEME_CUSTOMIZER();
 

	// Enque CSS & JS
	add_action('wp_enqueue_scripts', [$wtheme_instance, 'enqueCSSJS']);

	// Register Menu
	$wtheme_instance->registerMenus();

	// Theme Support
	add_action( 'after_setup_theme', [$wtheme_instance, 'themeSupport'] );

	// theme customizer - contact information (Phone, Email, Address, Facebook, Twitter, Linkedin, Instagram)
	add_action('customize_register', [$wtheme_instance, 'contactInformationThemeCustomizer'] );

	// Posts row-column
	add_shortcode('posts_row_column_shortcode', [$wtheme_instance, 'postsRowColumnShortcode'] );

	// Posts row-column pagination
	add_shortcode('posts_row_column_pagination_shortcode', [$wtheme_instance, 'postsRowColumnPaginationShortcode'] );

	// Posts row-column load more button - buggy
	add_shortcode('posts_row_column_load_more_button_shortcode', [$wtheme_instance, 'postsRowColumnLoadMoreButtonShortcode'] );

	// Set excerpt length
	add_filter('excerpt_length', [$wtheme_instance, 'custom_excerpt_length'] );

	// Global ACF
	add_action('acf/init', [$wtheme_instance, 'globalACFOption'] );

	// Theme Customizer - Text Field
	add_action('customize_register', [$wtheme_customizer_instance, 'textField'], 10 );

	// Theme Customizer - Text & Textarea Fields
	add_action('customize_register', [$wtheme_customizer_instance, 'textTextareaFields'], 10 );

	// Custom Theme Customizer
	add_action( 'customize_register', 'customMarkupThemeCustomizer' );










