<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <div class="wtheme_page">
        <header class="header_sec"> 
            <div class="container">
                <div class="header_content">
                    <?php 
                        $logo_url = '';                   
                        $logo_id = get_theme_mod( 'custom_logo' );                
                        if ( $logo_id ) {
                            $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );                 
                        }
                    ?>   
                    <a href="/" class="brand_logo">
                        <img src="<?php echo $logo_url; ?>" alt="Logo">
                    </a>

                    <?php wp_nav_menu( array( 
                            'theme_location' => 'wtheme_header_menu' , 
                            'depth' => 1,
                            'menu_class'=> 'menu_sec',                        
                        )); 
                    ?>
                    <a href="tel:(248) 858-2255" class="call_link"> <i class="mask-icon phone-icon"></i> (248) 858-2255</a>
                </div>           
            </div>
            
            
        </header>
        