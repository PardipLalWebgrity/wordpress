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

	public function my_custom_html_in_customizer( $wp_customize ) {
	    // Add a section to the Customizer
	    $wp_customize->add_section( 'custom_html_section' , array(
	        'title'      => __( 'Custom HTML Section', 'wtheme' ),
	        'priority'   => 30,
	    ) );

	    // Add three settings to store input values
	    $wp_customize->add_setting( 'custom_html_field_1', array(
	        'default'   => '',
	        'transport' => 'refresh',
	    ) );

	    $wp_customize->add_setting( 'custom_html_field_2', array(
	        'default'   => '',
	        'transport' => 'refresh',
	    ) );

	    $wp_customize->add_setting( 'custom_html_field_3', array(
	        'default'   => '',
	        'transport' => 'refresh',
	    ) );

	    // Create a custom control that outputs the three input fields in one div
	    class Custom_HTML_Three_Inputs_Control extends WP_Customize_Control {
	        public $type = 'custom_html_three_inputs';

	        public function render_content() {
	            ?>
	            <div class="custom-html-inputs">
	            	<style>
	            		.fontsize-fields{display: flex;justify-content: flex-start;align-items: center;}
	            		.fontsize-fields input{width: 50px;flex-grow: 1;}
	            	</style>
	                <h4><?php echo esc_html__( 'Custom HTML Input Fields', 'theme_textdomain' ); ?></h4>                
	                <div class="fontsize-fields">
	                	<!-- First Input Field -->
		                
		                <input type="text" id="custom_html_field_1" value="<?php echo esc_attr( get_theme_mod( 'custom_html_field_1', '' ) ); ?>" 
		                       onchange="wp.customize('custom_html_field_1').set(this.value);" />

		                <!-- Second Input Field -->
		                
		                <input type="text" id="custom_html_field_2" value="<?php echo esc_attr( get_theme_mod( 'custom_html_field_2', '' ) ); ?>" 
		                       onchange="wp.customize('custom_html_field_2').set(this.value);" />

		                <!-- Third Input Field -->
		               
		                <input type="text" id="custom_html_field_3" value="<?php echo esc_attr( get_theme_mod( 'custom_html_field_3', '' ) ); ?>" 
		                       onchange="wp.customize('custom_html_field_3').set(this.value);" />                	
	                </div>
	            </div>
	            <?php
	        }
	    }

	    // Add the custom control to the customizer
	    $wp_customize->add_control( new Custom_HTML_Three_Inputs_Control(
	        $wp_customize,
	        'custom_html_three_inputs_control',
	        array(
	            'label'    => __( 'Custom HTML Inputs', 'theme_textdomain' ),
	            'section'  => 'custom_html_section',
	            'settings' => array( 'custom_html_field_1', 'custom_html_field_2', 'custom_html_field_3' ), // Link to the settings
	        )
	    ) );
	}

}
	









