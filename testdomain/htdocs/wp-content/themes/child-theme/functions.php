<?php



/*

* Twenty Seventeen Child Theme functions file

*/

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10);


function my_custom_post_type() {
  $labels = array(
    'name'               => 'Books',
    'singular_name'      => 'Book',
    'all_items'          => 'All Books',
    'menu_name'          => 'Books'
  );
  $args = array(
    'labels'        => $labels,
    'public'        => true,
    'show_ui'       => true,
    'menu_position' => 5,
    'capability_type' => 'post',
    'hierarchical'  => false,
    'rewrite'       => array('slug' => 'book'),
    'query_var'     => true,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
    'taxonomies'    => array('genre')
  );
  register_post_type( 'book', $args ); 
}
add_action( 'init', 'my_custom_post_type' );

function create_book_taxonomies() {
	$labels = array(
		'name'              => 'Genres',
		'singular_name'     => 'Genre',
		'search_items'      => 'Search Genre',
		'all_items'         => 'All Genres',
		'parent_item'       => 'Parent Genre',
		'parent_item_colon' => 'Parent Genre:',
		'edit_item'         => 'Edit Genre',
		'update_item'       => 'Update Genre',
		'add_new_item'      => 'Add New Genre',
		'new_item_name'     => 'New Genre',
		'menu_name'         => 'Genre',
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', array( 'book' ), $args );
}
add_action( 'init', 'create_book_taxonomies');