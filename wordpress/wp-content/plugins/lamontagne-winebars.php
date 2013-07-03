

<?php

/*
Plugin Name: Lamontagne Wine Bars
Description: custom post for wine bars
Version: 1.0
Author: Charlotte

*/

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'Lamontagne_winebars',
		array(
			'labels' => array(
				'name' => __( 'Products' ),
				'singular_name' => __( 'Product' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
}

?>