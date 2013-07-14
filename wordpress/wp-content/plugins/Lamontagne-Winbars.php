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
		'supports' 		=> array( 'title', 'thumbnail', 'editor' )
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
		'hierarchical' 		=> false,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'rewrite' 			=> array( 'slug' => 'wine-bars-neighborhood' ),
	));
}
add_action( 'admin_init', 'my_admin' );

function my_admin() {
    add_meta_box( 'wine_bar_information_meta_box',
        'Wine Bar Information',
        'display_wine_bar_information_meta_box',
        'wine_bars', 'normal', 'high'
    );
}

/* Fire our meta box setup function on the editor screen. */
add_action( 'load-post.php', 'cl_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'cl_post_meta_boxes_setup' );

/* Our meta box set up function. */
function cl_post_meta_boxes_setup() {

	/* Add meta boxes on the 'add_meta_boxes' hook. */
	add_action( 'add_meta_boxes', 'cl_add_post_meta_boxes' );
	
	/* Save post meta on the 'save_post' hook. */
	add_action( 'save_post', 'cl_winebars_save_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function cl_add_post_meta_boxes() {

	add_meta_box(
		'cl-hours',								// Unique ID
		esc_html__( 'Hours', 'example' ),		// Title
		'cl_hours_meta_box',					// Callback function
		'cl_winebars',								// Add metabox to our custom post type
		'side',									// Context
		'default'								// Priority
	);
}

/* Display the post meta box. */
function cl_hours_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'cl_winebars_nonce' ); ?>

	<p class="howto"><label for="cl-winebars"><?php _e( "Wine Bar Info", 'example' ); ?></label></p>
	<p><input class="widefat" type="text" name="cl-winebars" id="cl-winebars" value="<?php echo esc_attr( get_post_meta( $object->ID, 'rl_pages', true ) ); ?>" size="30" /></p>
<?php }

/* Save the meta box's data. */
function cl_winebars_save_meta( $post_id, $post ) {

	/* Verify the nonce before proceeding. */
	if ( !isset( $_POST['cl_winebars_nonce'] ) || !wp_verify_nonce( $_POST['cl_winebars_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	/* Get the post type object. */
	$post_type = get_post_type_object( $post->post_type );

	/* Check if the current user has permission to edit the post. */
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	/* Get the posted data and sanitize it for use as an HTML class. */
	$new_meta_value = ( isset( $_POST['cl-winebars'] ) ? sanitize_html_class( $_POST['cl-winebars'] ) : '' );

	/* Get the meta key. */
	$meta_key = 'cl_winebars';

	/* Get the meta value of the custom field key. */
	$meta_value = get_post_meta( $post_id, $meta_key, true );

	/* If a new meta value was added and there was no previous value, add it. */
	if ( $new_meta_value && '' == $meta_value )
		add_post_meta( $post_id, $meta_key, $new_meta_value, true );

	/* If the new meta value does not match the old value, update it. */
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	/* If there is no new meta value but an old value exists, delete it. */
	elseif ( '' == $new_meta_value && $meta_value )
		delete_post_meta( $post_id, $meta_key, $meta_value );
} 

?>