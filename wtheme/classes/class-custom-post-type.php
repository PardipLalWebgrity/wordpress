<?php
    
    class WTHEME_CPT {

        function register_portfolio_post_type() {
            $labels = array(
                'name'               => 'Portfolios',
                'singular_name'      => 'Portfolio',
                'menu_name'          => 'Portfolios',
                'name_admin_bar'     => 'Portfolio',
                'add_new'            => 'Add New',
                'add_new_item'       => 'Add New Portfolio',
                'edit_item'          => 'Edit Portfolio',
                'new_item'           => 'New Portfolio',
                'view_item'          => 'View Portfolio',
                'all_items'          => 'All Portfolios',
                'search_items'       => 'Search Portfolios',
                'not_found'          => 'No portfolios found.',
                'not_found_in_trash' => 'No portfolios found in Trash.',
            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'has_archive'        => true,
                'rewrite'            => array('slug' => 'portfolio'),
                'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),                              
                'show_in_rest'       => true,
                'menu_position'      => 5,
                'menu_icon'          => get_stylesheet_directory_uri() . '/assets/images/briefcase-solid.svg',
            );

            register_post_type('portfolio', $args);
        }

        // Movies
        function register_movie_post_type() {

            register_post_type('movies',
                array(
                    'labels' => array(
                        'name' => 'Movies',
                        'singular_name' => 'Movie',
                        'add_new' => 'Add New',
                        'add_new_item' => 'Add New Movie',
                        'edit_item' => 'Edit Movie',
                        'new_item' => 'New Movie',
                        'view_item' => 'View Movie',
                        'search_items' => 'Search Movies',
                        'not_found' => 'No Movies found',
                        'not_found_in_trash' => 'No Movies found in Trash',
                        'parent_item_colon' => 'Parent Movie:',
                        'all_items' => 'All Movies',
                    ),
                    'public' => true,
                    'show_ui' => true,
                    'show_in_menu' => true,
                    'menu_icon' => 'dashicons-video-alt2',
                    'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'movies'),
                    'show_in_rest' => true,
                )
            );
        }
        function create_movie_category_taxonomy() {
            $args = array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => __('Movie Categories'),
                    'singular_name' => __('Category'),
                    'search_items' => __('Search Movie Category'),
                    'all_items' => __('All Movie Categories'),
                    'parent_item' => __('Parent Category'),
                    'parent_item_colon' => __('Parent Category:'),
                    'edit_item' => __('Edit Category'),
                    'update_item' => __('Update Category'),
                    'add_new_item' => __('Add Category'),
                    'new_item_name' => __('New Category Name'),
                    'menu_name' => __('Movie Category'),
                ),
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array(
                    'slug' => 'movie-category',
                    'with_front' => false,
                    'hierarchical' => true,
                ),
            );

            register_taxonomy('movie_category', array('movies'), $args);
        }
        function create_movie_tags_taxonomy() {

            $args = array(
                'hierarchical' => false,
                'labels' => array(
                    'name' => __('Movie Tags'),
                    'singular_name' => __('Movie Tag'),
                    'search_items' => __('Search Movie Tags'),
                    'all_items' => __('All Movie Tags'),
                    'edit_item' => __('Edit Movie Tag'),
                    'update_item' => __('Update Movie Tag'),
                    'add_new_item' => __('Add New Movie Tag'),
                    'new_item_name' => __('New Movie Tag Name'),
                    'menu_name' => __('Movie Tags'),
                ),
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array(
                    'slug' => 'movie-tag',
                    'with_front' => false,
                    'hierarchical' => false,
                ),
            );

            register_taxonomy('movie_tags', array('movies'), $args);
        }
        


        


    }






