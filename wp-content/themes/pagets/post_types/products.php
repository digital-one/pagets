<?php
//
// Product Post Type related functions.
//

add_action('init', 'create_cpt_product');
add_filter("manage_edit-product_columns", "add_cpt_product_columns");   
//add_action("manage_product_posts_custom_column",  "add_cpt_product_custom_columns",10,2); 
//add_action('init', 'add_cpt_product_rewrite_rules');
//add_filter('query_vars', 'add_cpt_product_query_vars');
//add_action( 'init', 'cpt_product_taxonomies'); 

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_product') ):
function create_cpt_product(){
	$labels = array(
		'name' => _x('Shop', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Product', 'post type singular name', 'pagets_theme'),
		'add_new' => __('New Product', 'dc_theme'),
		'add_new_item' => __('Add New Product', 'pagets_theme'),
		'edit_item' => __('Edit Product', 'pagets_theme'),
		'new_item' => __('New Product', 'pagets_theme'),
		'view_item' => __('View Product', 'pagets_theme'),
		'search_items' => __('Search Products', 'pagets_theme'),
		'not_found' =>  __('No Products Found', 'pagets_theme'),
		'not_found_in_trash' => __('No products found in the trash', 'pagets_theme'), 
		'parent_item_colon' => __('Parent Product Item:', 'pagets_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('product', 'pagets_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => array('slug' => 'product/archive'),
		'menu_position' => 20,
		'taxonomies' => array('product_category'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail','post-thumbnails')
		
	);

	register_post_type( 'product' , $args );
}






if( !function_exists('cpt_product_taxonomies') ):
function cpt_product_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'Product Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'Product Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search Product Categories', 'dc_theme' ),
		'all_items' => __( 'All Product Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent Product Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent Product Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit Product Category', 'dc_theme' ), 
		'update_item' => __( 'Update Product Category', 'dc_theme' ),
		'add_new_item' => __( 'Add Product Category', 'dc_theme' ),
		'new_item_name' => __( 'New Product Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"product_category", 
		"product", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'product/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_product_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Product",
           "price" => "Price",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_product_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "price":
        	echo get_field('product_price',$id);
        	break;           
 				}
			} 

function add_cpt_product_rewrite_rules(){ 

add_rewrite_rule('^product/archive/pge/([^/]*)/?', 'index.php?pagename=product&pge=$matches[1]','top');

}

function add_cpt_product_query_vars($public_query_vars) {
	  $public_query_vars[] = "pge";
	return $public_query_vars; 
}

endif;

?>
