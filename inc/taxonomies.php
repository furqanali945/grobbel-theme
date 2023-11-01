<?php
// Register Product Taxonomy
function custom_product_categories() {

	$labels = array(
		'name'                       => _x( 'Product Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Product Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Product Category', 'text_domain' ),
		'all_items'                  => __( 'All Product Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Product Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Product Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Product Category', 'text_domain' ),
		'update_item'                => __( 'Update Product Category', 'text_domain' ),
		'view_item'                  => __( 'View Product Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Product Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Product Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Product Categories', 'text_domain' ),
		'search_items'               => __( 'Search Product Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Product Categories', 'text_domain' ),
		'items_list'                 => __( 'Product Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Product Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'product_categories', array( 'custom_product' ), $args );
}
add_action( 'init', 'custom_product_categories', 0 );


// Register Recipe Taxonomy
function custom_recipe_categories() {

	$labels = array(
		'name'                       => _x( 'Recipe Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Recipe Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Recipe Category', 'text_domain' ),
		'all_items'                  => __( 'All Recipe Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Recipe Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Recipe Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Recipe Category', 'text_domain' ),
		'update_item'                => __( 'Update Recipe Category', 'text_domain' ),
		'view_item'                  => __( 'View Recipe Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Recipe Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Recipe Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Recipe Categories', 'text_domain' ),
		'search_items'               => __( 'Search Recipe Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Recipe Categories', 'text_domain' ),
		'items_list'                 => __( 'Recipe Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Recipe Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'recipe_categories', array( 'custom_recipe' ), $args );
}
add_action( 'init', 'custom_recipe_categories', 0 );