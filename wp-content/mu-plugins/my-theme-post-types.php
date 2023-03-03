<?php
    function my_post_types() {
        register_post_type(
            'menu', array(
                'show_in_rest' => true,
                'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
                'has_archive' => true,
                'public' => true,
                'menu_icon' => 'dashicons-editor-table',
                'rewrite' => array('slug' => 'menu'),
                'labels' => array(
                    'name' => 'Menu',
                    'add_new_item' => 'Add Item',
                    'edit_item' => 'Edit Item',
                    'singular_name' => 'Item',
                    'all_items' => 'All Items'
                )
            )
        );

        register_post_type(
            'chef', array(
                'show_in_rest' => true,
                'supports' => array('title', 'editor', 'thumbnail'),
                'public' => true,
                'menu_icon' => 'dashicons-superhero-alt',
                'rewrite' => array('slug' => 'chefs'),
                'labels' => array(
                    'name' => 'Chef',
                    'add_new_item' => 'Add Chef',
                    'edit_item' => 'Edit Chef',
                    'singular_name' => 'Chef',
                    'all_items' => 'All Chefs'
                )
            )
        );

		register_post_type(
            'proposition', array(
                'show_in_rest' => true,
                'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
                'has_archive' => true,
                'public' => true,
                'menu_icon' => 'dashicons-media-document',
                'rewrite' => array('slug' => 'propositions'),
                'labels' => array(
                    'name' => 'Propositions',
                    'add_new_item' => 'Add Proposition',
                    'edit_item' => 'Edit Proposition',
                    'singular_name' => 'Proposition',
                    'all_items' => 'All Propositions'
                )
            )
        );

		register_post_type(
            'careers', array(
                'show_in_rest' => true,
                'supports' => array('title', 'thumbnail', 'editor'),
                'public' => true,
                'menu_icon' => 'dashicons-open-folder',
                'rewrite' => array('slug' => 'careers'),
                'labels' => array(
                    'name' => 'Vacancies',
                    'add_new_item' => 'Add Vacancy',
                    'edit_item' => 'Edit Vacancy',
                    'singular_name' => 'Vacancy',
                    'all_items' => 'All Vacancies'
                )
            )
        );

		register_post_type(
            'message', array(
                'show_in_rest' => true,
                'supports' => array('title', 'editor'),

                'public' => true,
                'publicly_queryable' => false,

                'menu_icon' => 'dashicons-email-alt',
                'rewrite' => array('slug' => 'messages'),
                'labels' => array(
                    'name' => 'Messages',
                    'add_new_item' => 'Add Message',
                    'edit_item' => 'Edit Message',
                    'singular_name' => 'Message',
                    'all_items' => 'All Messages'
                )
            )
        );
    }

    add_action('init', 'my_post_types');

    /**
 * Create two taxonomies, categories and tags for the post type "menu".
 *
 * @see register_post_type() for registering custom post types.
 */

    add_action( 'init', 'create_menu_taxonomies', 0 );

function create_menu_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Menu-Categories', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Menu-Category', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Menu-Category', 'textdomain' ),
		'all_items'         => __( 'All Menu-Categories', 'textdomain' ),
		'parent_item'       => __( 'Parent Menu-Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Menu-Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Menu-Category', 'textdomain' ),
		'update_item'       => __( 'Update Menu-Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Menu-Category', 'textdomain' ),
		'new_item_name'     => __( 'New Menu-Category Name', 'textdomain' ),
		'menu_name'         => __( 'Menu-Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_rest' 		=> true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'menu-category' ),
	);

	register_taxonomy( 'menu-category', array( 'menu' ), $args );
	

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Menu-Tags', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Menu-Tag', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Menu-Tag', 'textdomain' ),
		'popular_items'              => __( 'Popular Menu-Tags', 'textdomain' ),
		'all_items'                  => __( 'All Menu-Tags', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Menu-Tag', 'textdomain' ),
		'update_item'                => __( 'Update Menu-Tag', 'textdomain' ),
		'add_new_item'               => __( 'Add New Menu-Tag', 'textdomain' ),
		'new_item_name'              => __( 'New Menu-Tag Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate menu-tags with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove menu-tag', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used menu-tags', 'textdomain' ),
		'not_found'                  => __( 'No menu-tags found.', 'textdomain' ),
		'menu_name'                  => __( 'Menu-Tag', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_in_rest' 			=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'menu-tag' ),
	);

	register_taxonomy( 'menu-tag', array('menu'), $args );
}