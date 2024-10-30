<?php
    
    if( !function_exists('htevent_custom_post_register') ){

        function htevent_custom_post_register(){

            // Register Htevent Post Type
            $labels = array(
                'name'                  => _x( 'HT Events', 'Post Type General Name', 'htevent' ),
                'singular_name'         => _x( 'Ht Event', 'Post Type Singular Name', 'htevent' ),
                'menu_name'             => __( 'HT Events', 'htevent' ),
                'name_admin_bar'        => __( 'HT Eevents', 'htevent' ),
                'archives'              => __( 'Item Archives', 'htevent' ),
                'parent_item_colon'     => __( 'Parent Item:', 'htevent' ),
                'add_new_item'          => __( 'Add New Item', 'htevent' ),
                'add_new'               => __( 'Add New', 'htevent' ),
                'new_item'              => __( 'New Item', 'htevent' ),
                'edit_item'             => __( 'Edit Item', 'htevent' ),
                'update_item'           => __( 'Update Item', 'htevent' ),
                'view_item'             => __( 'View Item', 'htevent' ),
                'search_items'          => __( 'Search Item', 'htevent' ),
                'not_found'             => __( 'Not found', 'htevent' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'htevent' ),
                'featured_image'        => __( 'Featured Image', 'htevent' ),
                'set_featured_image'    => __( 'Set featured image', 'htevent' ),
                'remove_featured_image' => __( 'Remove featured image', 'htevent' ),
                'use_featured_image'    => __( 'Use as featured image', 'htevent' ),
                'insert_into_item'      => __( 'Insert into item', 'htevent' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'htevent' ),
                'items_list'            => __( 'Items list', 'htevent' ),
                'items_list_navigation' => __( 'Items list navigation', 'htevent' ),
                'filter_items_list'     => __( 'Filter items list', 'htevent' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor','elementor', 'thumbnail','tag' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'htevent',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-calendar-alt',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'htevent', $args );

           // htevent Category
           $labels = array(
            'name'              => _x( 'Categories', 'htevent' ),
            'singular_name'     => _x( 'Category', 'htevent' ),
            'search_items'      => __( 'Search Category', 'htevent' ),
            'all_items'         => __( 'All Category', 'htevent' ),
            'parent_item'       => __( 'Parent Category', 'htevent' ),
            'parent_item_colon' => __( 'Parent Category:', 'htevent' ),
            'edit_item'         => __( 'Edit Category', 'htevent' ),
            'update_item'       => __( 'Update Category', 'htevent' ),
            'add_new_item'      => __( 'Add New Category', 'htevent' ),
            'new_item_name'     => __( 'New Category Name', 'htevent' ),
            'menu_name'         => __( 'Categories', 'htevent' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'htevent_category' ),
           );
           register_taxonomy('htevent_category','htevent',$args);


            // Register speaker Post Type
            $labels = array(
                'name'                  => _x( 'Speakers', 'Post Type General Name', 'htevent' ),
                'singular_name'         => _x( 'Speaker', 'Post Type Singular Name', 'htevent' ),
                'menu_name'             => __( 'Speakers', 'htevent' ),
                'name_admin_bar'        => __( 'Speaker', 'htevent' ),
                'archives'              => __( 'Item Archives', 'htevent' ),
                'parent_item_colon'     => __( 'Parent Item:', 'htevent' ),
                'add_new_item'          => __( 'Add New Item', 'htevent' ),
                'add_new'               => __( 'Add New', 'htevent' ),
                'new_item'              => __( 'New Item', 'htevent' ),
                'edit_item'             => __( 'Edit Item', 'htevent' ),
                'update_item'           => __( 'Update Item', 'htevent' ),
                'view_item'             => __( 'View Item', 'htevent' ),
                'search_items'          => __( 'Search Item', 'htevent' ),
                'not_found'             => __( 'Not found', 'htevent' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'htevent' ),
                'featured_image'        => __( 'Featured Image', 'htevent' ),
                'set_featured_image'    => __( 'Set featured image', 'htevent' ),
                'remove_featured_image' => __( 'Remove featured image', 'htevent' ),
                'use_featured_image'    => __( 'Use as featured image', 'htevent' ),
                'insert_into_item'      => __( 'Insert into item', 'htevent' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'htevent' ),
                'items_list'            => __( 'Items list', 'htevent' ),
                'items_list_navigation' => __( 'Items list navigation', 'htevent' ),
                'filter_items_list'     => __( 'Filter items list', 'htevent' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','elementor', 'editor','thumbnail', ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'htevent',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-smiley',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'speaker', $args );

            //footer custom post
            $labels = array(
            'name'                  => _x( 'Footers', 'Post Type Gayojkemral Name', 'htevent' ),
            'singular_name'         => _x( 'Footer', 'Post Type Singular Name', 'htevent' ),
            'menu_name'             => esc_html__( 'Footer', 'htevent' ),
            'name_admin_bar'        => esc_html__( 'Footer', 'htevent' ),
            'archives'              => esc_html__( 'Item Archives', 'htevent' ),
            'parent_item_colon'     => esc_html__( 'Parent Item:', 'htevent' ),
            'all_items'             => esc_html__( 'All Items', 'htevent' ),
            'add_new_item'          => esc_html__( 'Add New Item', 'htevent' ),
            'add_new'               => esc_html__( 'Add New', 'htevent' ),
            'new_item'              => esc_html__( 'New Item', 'htevent' ),
            'edit_item'             => esc_html__( 'Edit Item', 'htevent' ),
            'update_item'           => esc_html__( 'Update Item', 'htevent' ),
            'view_item'             => esc_html__( 'View Item', 'htevent' ),
            'search_items'          => esc_html__( 'Search Item', 'htevent' ),
            'not_found'             => esc_html__( 'Not found', 'htevent' ),
            'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'htevent' ),
            'featured_image'        => esc_html__( 'Featured Image', 'htevent' ),
            'set_featured_image'    => esc_html__( 'Set featured image', 'htevent' ),
            'remove_featured_image' => esc_html__( 'Remove featured image', 'htevent' ),
            'use_featured_image'    => esc_html__( 'Use as featured image', 'htevent' ),
            'insert_into_item'      => esc_html__( 'Insert into item', 'htevent' ),
            'uploaded_to_this_item' => esc_html__( 'Uploaded to this item', 'htevent' ),
            'items_list'            => esc_html__( 'Items list', 'htevent' ),
            'items_list_navigation' => esc_html__( 'Items list navigation', 'htevent' ),
            'filter_items_list'     => esc_html__( 'Filter items list', 'htevent' ),
        );
        $args = array(
            'label'                 => esc_html__( 'Footer', 'htevent' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor','elementor' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-editor-kitchensink',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,        
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'htevent_footer', $args );
      }
          add_action( 'init', 'htevent_custom_post_register');
    }