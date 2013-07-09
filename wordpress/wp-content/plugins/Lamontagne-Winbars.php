<?php

/*
Plugin Name: Lamontagne Wine Bars
Description: Tracks DC Wine bars
Author: Charlotte
Version: 0.1
Author URI: http://stateofthevinedc.com
*/

add_action( 'init', 'cl_create_post_type' );

function cl_create_post_type() {
	$labels = array(
		'name' 							=> __( 'Wine Bars', 'wineBars' ),
		'singular_name' 				=> __( 'Wine Bar', 'wineBars' ),
		'search_items'					=> __( 'Search Wine Bars', 'wineBars' ),
		'all_items'						=> __( 'All Wine Bars', 'wineBars' ),
		'edit_item'						=> __( 'Edit Wine Bars', 'wineBars' ),
		'update_item' 					=> __( 'Update Wine Bars', 'wineBars' ),
		'add_new_item' 					=> __( 'Add New Wine Bars', 'wineBars' ),
		'new_item_name' 				=> __( 'New Wine Bar', 'wineBars' ),
		'menu_name' 					=> __( 'Wine Bars', 'wineBars' ),
	);
	
	$args = array (
		'labels' 		=> $labels,
		'public' 		=> true,
		'menu_position' => 20,
		'has_archive' 	=> true,
		'rewrite'		=> array( 'slug' => 'books' ),
		'supports' 		=> array( 'title', 'thumbnail', 'editor' )
	);
	register_post_type( 'cl_wineBars', $args );
}

/* Hook in to the init action and call cl_create_book_taxonomies when it fires. */
add_action( 'init', 'cl_create_book_taxonomies', 0 );

function cl_create_book_taxonomies() {
	// Add new taxonomy, keep it non-hierarchical (like tags)
	$labels = array(
		'name' 							=> __( 'Neighborhoods', 'wineBars' ),
		'singular_name' 				=> __( 'Neighborhood', 'wineBars' ),
		'search_items' 					=> __( 'Search Neighborhoods', 'wineBars' ),
		'all_items' 					=> __( 'All Neighborhoods', 'wineBars' ),
		'edit_item' 					=> __( 'Edit Neighborhood', 'wineBars' ), 
		'update_item' 					=> __( 'Update Neighborhood', 'wineBars' ),
		'add_new_item' 					=> __( 'Add New Neighborhood', 'wineBars' ),
		'new_item_name' 				=> __( 'New Neighborhood Name', 'wineBars' ),
		'separate_items_with_commas' 	=> __( 'Separate neighborhoods with commas', 'wineBars' ),
		'choose_from_most_used' 		=> __( 'Choose from the most used neighborhoods', 'wineBars' ),
		'menu_name' 					=> __( 'Neighborhoods', 'wineBars' ),
	); 	
		
	register_taxonomy( 'wineBar-neighborhood', array( 'cl_wineBars' ), array(
		'hierarchical' 		=> false,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'wineBar-neighborhood' ),
	));
}
?>