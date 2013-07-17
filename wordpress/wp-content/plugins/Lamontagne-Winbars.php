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
		'name' 							=> __( 'Wine Bars', 'winebars' ),
		'singular_name' 				=> __( 'Wine Bar', 'winebars' ),
		'search_items'					=> __( 'Search Wine Bars', 'winebars' ),
		'all_items'						=> __( 'All Wine Bars', 'winebars' ),
		'edit_item'						=> __( 'Edit Wine Bars', 'winebars' ),
		'update_item' 					=> __( 'Update Wine Bars', 'winebars' ),
		'add_new_item' 					=> __( 'Add New Wine Bars', 'winebars' ),
		'new_item_name' 				=> __( 'New Wine Bar', 'winebars' ),
		'menu_name' 					=> __( 'Wine Bars', 'winebars' ),
	);
	
	$args = array (
		'labels' 		=> $labels,
		'public' 		=> true,
		'menu_position' => 20,
		'has_archive' 	=> true,
		'rewrite'		=> array( 'slug' => 'winebars' ),
		'supports' 		=> array( 'title', 'thumbnail', 'editor' ),
		'taxonomies' 	=> array( 'category' )
	);
	register_post_type( 'cl_winebars', $args );
}

add_action( 'init', 'cl_create_winebars_taxonomies', 0 );

function cl_create_winebars_taxonomies() {
	// Add new taxonomy, keep it non-hierarchical (like tags)
	$labels = array(
		'name' 							=> __( 'Neighborhoods', 'winebars' ),
		'singular_name' 				=> __( 'Neighborhood', 'winebars' ),
		'search_items' 					=> __( 'Search Neighborhoods', 'winebars' ),
		'all_items' 					=> __( 'All Neighborhoods', 'winebars' ),
		'edit_item' 					=> __( 'Edit Neighborhood', 'winebars' ), 
		'update_item' 					=> __( 'Update Neighborhood', 'winebars' ),
		'add_new_item' 					=> __( 'Add New Neighborhood', 'winebars' ),
		'new_item_name' 				=> __( 'New Neighborhood Name', 'winebars' ),
		'separate_items_with_commas' 	=> __( 'Separate neighborhoods with commas', 'winebars' ),
		'choose_from_most_used' 		=> __( 'Choose from the most used neighborhoods', 'winebars' ),
		'menu_name' 					=> __( 'Neighborhoods', 'winebars' ),
	); 	

register_taxonomy( 'wine-bars-neighborhood', array( 'cl_winebars' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'wine-bars-neighborhood' ),
	));

	$labels = array(
		'name' 							=> __( 'Type', 'winebars' ),
		'singular_name' 				=> __( 'Type', 'winebars' ),
		'search_items' 					=> __( 'Search type', 'winebars' ),
		'all_items' 					=> __( 'All Type', 'winebars' ),
		'edit_item' 					=> __( 'Edit type', 'winebars' ), 
		'update_item' 					=> __( 'Update type', 'winebars' ),
		'add_new_item' 					=> __( 'Add New type', 'winebars' ),
		'new_item_name' 				=> __( 'New type Name', 'winebars' ),
		'separate_items_with_commas' 	=> __( 'Separate type with commas', 'winebars' ),
		'choose_from_most_used' 		=> __( 'Choose from the most used type', 'winebars' ),
		'menu_name' 					=> __( 'type', 'winebars' ),
	); 
		
	
		
	register_taxonomy( 'wine-bars-type', array( 'cl_winebars' ), array(
		'hierarchical' 		=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'wine-bars-type' ),
	));
}

add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {
	if ( is_home() && false == $query->query_vars['suppress_filters'] )
		$query->set( 'post_type', array( 'cl_winebars' ) );
		return $query;
}

?>