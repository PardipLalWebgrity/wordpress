<?php

	class WTHEME {

		public $homeURL;
		public $assetsURL;
		public $libraryURL;
		public $themeversion;


		public function __construct() {
				$this->homeURL = home_url();
				$this->assetsURL = get_stylesheet_directory_uri() . '/assets';
				$this->libraryURL = get_stylesheet_directory_uri() . '/library';
				$this->themeversion = wp_get_theme()->get('Version')/*.microtime()*/;
		}

		// enqueue CSS and JS
		public function enqueCSSJS() {
				// jQuery
				wp_enqueue_script( 'wtheme-jquery-script', $this->libraryURL.'/jquery-3.7.1/js/jquery.min.js', array(), '1.0', true );

				// Custom Scroll
				wp_enqueue_style('wtheme-custom-scroll-css', $this->libraryURL.'/custom-scroll/css/custom-scroll.css', array(), '1.0', 'all');
				wp_enqueue_script( 'wtheme-custom-scroll-script', $this->libraryURL.'/custom-scroll/js/custom-scroll.js', array(), '1.0', true );	

				// Owl Carousel
				wp_enqueue_style('wtheme-owl-main-css', $this->libraryURL.'/OwlCarousel-2-2.3.4/css/owl.carousel.min.css', array(), '1.0', 'all');
				wp_enqueue_style('wtheme-owl-theme-css', $this->libraryURL.'/OwlCarousel-2-2.3.4/css/owl.theme.default.min.css', array(), '1.0', 'all');
				wp_enqueue_script( 'wtheme-owl-script', $this->libraryURL.'/OwlCarousel-2-2.3.4/js/owl.carousel.js', array(), '1.0', true );

				// Bootstrap
				wp_enqueue_style('wtheme-bootstrap-css', $this->libraryURL.'/bootstrap-5.3.3/css/bootstrap.min.css', array(), '1.0', 'all');
				wp_enqueue_script( 'wtheme-bootstrap-script', $this->libraryURL.'/bootstrap-5.3.3/js/bootstrap.bundle.min.js', array(), '1.0', true );
				
				
				// Assets
				wp_enqueue_style('wtheme-font-css', $this->assetsURL.'/css/font.css', array(), $this->themeversion, 'all');
				wp_enqueue_style('wtheme-style-css', get_stylesheet_uri(), array(), $this->themeversion, 'all');
				wp_enqueue_script('load-more-posts', $this->assetsURL.'/js/load-more.js', array('wtheme-jquery-script'), null, true);		
				wp_localize_script('load-more-posts', 'loadmore', array(// Localize the script with the Ajax URL and nonce for security
					'ajaxurl' => admin_url('admin-ajax.php'),
					'nonce'   => wp_create_nonce('load_more_nonce')
				));					
				wp_enqueue_script( 'wtheme-main-script', $this->assetsURL.'/js/script.js', array(), $this->themeversion, true );
				
		}

		// register menu
		public function registerMenus(){
			register_nav_menus(
					array(
							'wtheme_header_menu' => 'Header Menu',
							'wtheme_footer_menu' => 'Footer Menu'
					)
			);
		}

		// theme support
		public function themeSupport() {
				add_theme_support( 'custom-logo' );
				add_theme_support('post-thumbnails');
				add_theme_support( 'title-tag' );
				add_theme_support( 'menus' );
				add_theme_support( 'title-tag' );
		}

		// create theme customizer fields - email, phone, address, social links
		public function contactInformationThemeCustomizer($wp_customize) {
			// Add a section for contact and social information
			$wp_customize->add_section('my_custom_section', array(
					'title'       => __('Contact & Social Links', 'wtheme'),
					'description' => __('Add contact details and social media links for your site.', 'wtheme'),
					'priority'    => 30,
			));

			// Phone Number
			$wp_customize->add_setting('my_custom_phone', array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_text_field', // Sanitize phone number
					'transport'         => 'refresh', // Refresh live preview when changed
			));

			$wp_customize->add_control('my_custom_phone', array(
					'label'    => __('Phone Number', 'wtheme'),
					'section'  => 'my_custom_section',
					'type'     => 'text', // Input type for phone number
			));

			// Email Address
			$wp_customize->add_setting('my_custom_email', array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_email', // Sanitize email input
					'transport'         => 'refresh',
			));

			$wp_customize->add_control('my_custom_email', array(
					'label'    => __('Email Id', 'wtheme'),
					'section'  => 'my_custom_section',
					'type'     => 'email', // Input type for email
			));

			// Address
			$wp_customize->add_setting('my_custom_address', array(
					'default'           => '',
					'sanitize_callback' => 'sanitize_textarea_field', // Sanitize textarea input
					'transport'         => 'refresh',
			));

			$wp_customize->add_control('my_custom_address', array(
					'label'    => __('Address', 'wtheme'),
					'section'  => 'my_custom_section',
					'type'     => 'textarea', // Input type for textarea
			));

			// Facebook Link
			$wp_customize->add_setting('my_custom_facebook', array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw', // Sanitize URL input
					'transport'         => 'refresh',
			));

			$wp_customize->add_control('my_custom_facebook', array(
					'label'    => __('Facebook Link', 'wtheme'),
					'section'  => 'my_custom_section',
					'type'     => 'url', // Input type for URL
			));

			// Twitter Link
			$wp_customize->add_setting('my_custom_twitter', array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
					'transport'         => 'refresh',
			));

			$wp_customize->add_control('my_custom_twitter', array(
					'label'    => __('Twitter Link', 'wtheme'),
					'section'  => 'my_custom_section',
					'type'     => 'url',
			));

			// LinkedIn Link
			$wp_customize->add_setting('my_custom_linkedin', array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
					'transport'         => 'refresh',
			));

			$wp_customize->add_control('my_custom_linkedin', array(
					'label'    => __('LinkedIn Link', 'wtheme'),
					'section'  => 'my_custom_section',
					'type'     => 'url',
			));

			// Instagram Link
			$wp_customize->add_setting('my_custom_instagram', array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
					'transport'         => 'refresh',
			));

			$wp_customize->add_control('my_custom_instagram', array(
					'label'    => __('Instagram Link', 'wtheme'),
					'section'  => 'my_custom_section',
					'type'     => 'url',
			));
		}		

		// Posts row-column
		public function postsRowColumnShortcode($args) {			
			$postsObject = new WP_Query(array(		
				'posts_per_page' => isset($args['posts']) ? $args['posts'] : 9,
			));
			
			if ($postsObject->have_posts()) {
				$str = '<div class="post_row">';
				while ($postsObject->have_posts()) {
					$postsObject->the_post();
					$post_title = get_the_title();
					$post_excerpt = get_the_excerpt();
					$post_img = get_the_post_thumbnail_url();
					$post_permalink = get_the_permalink();
					$str .= '
						<div class="post_item">
							<figure class="post_img">
								<img src="'.$post_img.'" alt="">
							</figure>
							<div class="post_content">
								<h4 class="post_title">'.$post_title.'</h4>
								<p class="post_excerpt">'.$post_excerpt.'</p>
								<a class="post_read_more" href="'.$post_permalink.'">Read More</a>
							</div>
							<a href="'.$post_permalink.'" class="post_whole_link"></a>
						</div>
					';
				}

				$str .= '</div>';	

				/* Restore original Post Data */
				wp_reset_postdata();
				
			} else {
				// no posts found
			}
			return $str;	
		}

		// Posts row-column with pagination
		public function postsRowColumnPaginationShortcode($args) {	
		
			$postsObject = new WP_Query(array(		
				'posts_per_page' => isset($args['posts']) ? $args['posts'] : 9,
				'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
			));
			
			if ($postsObject->have_posts()) {
				$str = '<div class="post_row">';
				while ($postsObject->have_posts()) {
					$postsObject->the_post();
					$post_title = get_the_title();
					$post_excerpt = get_the_excerpt();
					$post_img = get_the_post_thumbnail_url();
					$post_permalink = get_the_permalink();
					$str .= '
						<div class="post_item">
							<figure class="post_img">
								<img src="'.$post_img.'" alt="">
							</figure>
							<div class="post_content">
								<h4 class="post_title">'.$post_title.'</h4>
								<p class="post_excerpt">'.$post_excerpt.'</p>
								<a class="post_read_more" href="'.$post_permalink.'">Read More</a>
							</div>
							<a href="'.$post_permalink.'" class="post_whole_link"></a>
						</div>
					';
				}

				$str .= '</div>';	

				// pagination
				if($args['pagination']){
					
					$str .= '<div class="pagination">';
					$str .= paginate_links(array(
							'total'        => $postsObject->max_num_pages,
							'current'      => max(1, get_query_var('paged')),
							'prev_text'    => __('« Previous'),
							'next_text'    => __('Next »'),
					));
					$str .= '</div>';
				}

				/* Restore original Post Data */
				wp_reset_postdata();
				
			} else {
				// no posts found
			}
			return $str;	
		}

		// Posts row-column Load More Button - Buggy
		public function postsRowColumnLoadMoreButtonShortcode($args) {
			$postsObject = new WP_Query(array(		
				'posts_per_page' => $args['posts'] ? $args['posts'] : 10,
			));
			
			if ($postsObject->have_posts()) {
				$str = '<div class="post_row">';
				while ($postsObject->have_posts()) {
					$postsObject->the_post();
					$post_title = get_the_title();
					$post_excerpt = get_the_excerpt();
					$post_img = get_the_post_thumbnail_url();
					$post_permalink = get_the_permalink();
					$str .= '
						<div class="post_item">
							<figure class="post_img">
								<img src="'.$post_img.'" alt="">
							</figure>
							<div class="post_content">
								<h4 class="post_title">'.$post_title.'</h4>
								<p class="post_excerpt">'.$post_excerpt.'</p>
								<a class="post_read_more" href="'.$post_permalink.'">Read More</a>
							</div>
							<a href="'.$post_permalink.'" class="post_whole_link"></a>
						</div>
					';
				}

				$str .= '
					</div>
					<button id="load-more" data-page="1" data-max-pages="'.$postsObject->max_num_pages.'">Load More</button>
				';				

				/* Restore original Post Data */
				wp_reset_postdata();

			} else {
				// no posts found
			}
			return $str;	
		}

		// Set excerpt length
		public function custom_excerpt_length() {
			return 20;
		}

		// ACF - global option
		public function globalACFOption() {
			if ( class_exists( 'ACF' ) ) {
				acf_add_options_page(array(
						'page_title' => 'Global Settings',
						'menu_title' => 'Global Settings',
						'menu_slug'  => 'global_acf',
						'capability' => 'edit_posts',
						'redirect'   => false
				));
			}
		}
	}








































