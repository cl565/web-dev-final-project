<?php

/*
Plugin Name: Lamontagne Wine Bars
Description: Tracks DC Wine bars
Author: Charlotte
Version: 0.1
Author URI: http://stateofthevinedc.com
*/

add_action( 'init', 'rl_create_post_type' );

function rl_create_post_type() {
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
	register_post_type( 'rl_wineBars', $args );

}

?>