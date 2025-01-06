<?php

/* 
	Sanitize :-
	sanitize_text_field
	sanitize_email
	sanitize_url
	absint
	sanitize_textarea_field
 */

class WTHEME_CUSTOMIZER {

	public function textField($wp_customize) {

	    // Section
	    $wp_customize->add_section('wtheme_section_uniqueid1', array(
	        'title' => __('Section Title', 'wtheme'),
	        'description' => __('Add custom text to display on your site.', 'wtheme'),
	        'priority' => 30,
	    ));

	    // Setting
	    $wp_customize->add_setting('wtheme_setting_uniqueid1', array(
	        'default' => 'Field Default Value',
	        'sanitize_callback' => 'sanitize_text_field', // Ensures clean text input
	    ));

	    // Control
	    $wp_customize->add_control('wtheme_control_uniqueid1', array(
	        'label' => __('Field Title', 'wtheme'),
	        'section' => 'wtheme_section_uniqueid1',
	        'settings' => 'wtheme_setting_uniqueid1',
	        'type' => 'text', // This defines it as a text field
	        'description' => 'Filed Description',
	        'priority' => '10',
	        'input_attrs' => array( // add attributes
			    'placeholder' => 'Field Placeholder',
			    'maxlength'   => 50,
			),
			'transport' => 'refresh',
	    ));
	}

	public function textTextareaFields($wp_customize) {

	    // Section
	    $wp_customize->add_section('wtheme_section_uniqueid2', array(
	        'title' => __('Section Title 2', 'wtheme'),
	        'description' => __('Add custom text to display on your site.', 'wtheme'),
	        'priority' => 31,
	    ));

	    // -----------------------------------------------------------------------------------

	    // Setting - Text
	    $wp_customize->add_setting('wtheme_setting_uniqueid2', array(
	        'default' => 'Field Default Value2',
	        'sanitize_callback' => 'sanitize_text_field', // Ensures clean text input
	    ));

	    // Control - Text
	    $wp_customize->add_control('wtheme_control_uniqueid2', array(
	        'label' => __('Field Title2', 'wtheme'),
	        'section' => 'wtheme_section_uniqueid2',
	        'settings' => 'wtheme_setting_uniqueid2',
	        'type' => 'text', // This defines it as a text field
	        'description' => 'Filed Description',
	        'priority' => '10',
	        'input_attrs' => array( // add attributes
			    'placeholder' => 'Field Placeholder',
			    'maxlength'   => 50,
			),
			'transport' => 'refresh',
	    ));

	    // -----------------------------------------------------------------------------------

	    // Setting - Textarea
	    $wp_customize->add_setting('wtheme_setting_uniqueid3', array(
	        'default' => 'Field Default Value2',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));

	    // Control - Textarea
	    $wp_customize->add_control('wtheme_control_uniqueid3', array(
	        'label' => __('Field Title2', 'wtheme'),
	        'section' => 'wtheme_section_uniqueid2',
	        'settings' => 'wtheme_setting_uniqueid3',
	        'type' => 'textarea',
	        'description' => 'Filed Description',
	        'priority' => '10',
	        'input_attrs' => array( // add attributes
			    'placeholder' => 'Field Placeholder',
			    'maxlength'   => 50,
			),
			'transport' => 'refresh',
	    ));
	}

}
	









