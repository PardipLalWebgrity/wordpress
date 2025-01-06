<?php

function wtheme_customizer_custom_html( $wp_customize ) {
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