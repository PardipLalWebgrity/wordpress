<?php get_header(); ?>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="container">
                      <?php

                            echo get_theme_mod( 'wtheme_setting_uniqueid1', 'Hi' );

                       ?>
                       <?php  echo do_shortcode('[posts_row_column_shortcode]'); ?>
                       
                    </div>
                </main>
            </div>
        </div>
        
<?php get_footer(); ?>