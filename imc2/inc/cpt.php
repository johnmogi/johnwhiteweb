<?php
/* CPT product */
add_action( 'init', 'product_cpt' );

function product_cpt() {
	$labels = [
		'name'               => __( 'Product', 'imc' ),
		'singular_name'      => __( 'Product', 'imc' ),
		'add_new'            => __( 'Add Product', 'imc' ),
		'add_new_item'       => __( 'Add Product', 'imc' ),
		'edit_item'          => __( 'Edit Product', 'imc' ),
		'new_item'           => __( 'New Product', 'imc' ),
		'view_item'          => __( 'View Product', 'imc' ),
		'search_items'       => __( 'Search Product', 'imc' ),
		'not_found'          => __( 'No Product found', 'imc' ),
		'not_found_in_trash' => __( 'No Product found in Trash', 'imc' ),
		'parent_item_colon'  => __( 'Parent Product:', 'imc' ),
		'menu_name'          => __( 'Products', 'imc' ),
	];

	$args = [
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => [ '' ],
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'menu_icon'           => 'dashicons-products',
		'capability_type'     => 'post',
		'supports'            => [ 'title', 'editor', 'thumbnail' ],
	];
	register_post_type( 'product', $args );
}

add_action( 'init', 'products_taxonomy_register', 0 );
function products_taxonomy_register() {

	$labels = [
		'name'                       => __( 'products Category', 'imc' ),
		'singular_name'              => __( 'products Category', 'imc' ),
		'menu_name'                  => __( 'Products Category', 'imc' ),
		'all_items'                  => __( 'All product Categories', 'imc' ),
		'parent_item'                => __( 'Parent product Category', 'imc' ),
		'parent_item_colon'          => __( 'Parent product Category:', 'imc' ),
		'new_item_name'              => __( 'New product Category', 'imc' ),
		'add_new_item'               => __( 'Add New product Category', 'imc' ),
		'edit_item'                  => __( 'Edit product Category', 'imc' ),
		'update_item'                => __( 'Update product Category', 'imc' ),
		'view_item'                  => __( 'View product Category', 'imc' ),
		'separate_items_with_commas' => __( 'Separate items with commas',
			'imc' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'imc' ),
		'choose_from_most_used'      => __( 'Choose from the most used',
			'imc' ),
		'popular_items'              => __( 'Popular Items', 'imc' ),
		'search_items'               => __( 'Search Items', 'imc' ),
		'not_found'                  => __( 'Not Found', 'imc' ),
	];
	$args   = [
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		//'rewrite'           => [ 'slug' => __( 'product', 'imc' ), 'with_front' => false ],
	];
	register_taxonomy( 'products', 'product', $args );
}

/* CPT batches */
add_action( 'init', 'batch_cpt' );

function batch_cpt() {
	$labels = [
		'name'               => __( 'batch', 'imc' ),
		'singular_name'      => __( 'Batch', 'imc' ),
		'add_new'            => __( 'Add New', 'imc' ),
		'add_new_item'       => __( 'Add New Batch', 'imc' ),
		'edit_item'          => __( 'Edit Batch', 'imc' ),
		'new_item'           => __( 'New Batch', 'imc' ),
		'view_item'          => __( 'View Batch', 'imc' ),
		'search_items'       => __( 'Search Batch', 'imc' ),
		'not_found'          => __( 'No Batch found', 'imc' ),
		'not_found_in_trash' => __( 'No Batch found in Trash', 'imc' ),
		'parent_item_colon'  => __( 'Parent Batch:', 'imc' ),
		'menu_name'          => __( 'Batches', 'imc' ),
	];

	$args = [
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => [ '' ],
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'query_var'           => false,
		'can_export'          => true,
		'rewrite'             => false,
		'menu_icon'           => 'dashicons-location-alt',
		'capability_type'     => 'post',
		'supports'            => [ 'title', 'thumbnail', 'editor' ],
	];
	register_post_type( 'batch', $args );
}
