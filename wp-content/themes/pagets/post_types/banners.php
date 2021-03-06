<?php
//
// Banner Post Type related functions.
//

add_action('init', 'create_cpt_banner');
add_filter("manage_edit-banner_columns", "add_cpt_banner_columns");   
add_action("manage_banner_posts_custom_column",  "add_cpt_banner_custom_columns",10,2); 
add_action('init', 'add_cpt_banner_rewrite_rules');
add_filter('query_vars', 'add_cpt_banner_query_vars');
//add_action( 'init', 'cpt_banner_taxonomies');

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_banner') ):
function create_cpt_banner(){
	$labels = array(
		'name' => _x('Banners', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Banner', 'post type singular name', 'pagets_theme'),
		'add_new' => __('New Banner', 'dc_theme'),
		'add_new_item' => __('Add new banner', 'pagets_theme'),
		'edit_item' => __('Edit Banner', 'pagets_theme'),
		'new_item' => __('New Banner', 'pagets_theme'),
		'view_item' => __('View Banner', 'pagets_theme'),
		'search_items' => __('Search Banners', 'pagets_theme'),
		'not_found' =>  __('No banners found', 'pagets_theme'),
		'not_found_in_trash' => __('No banners found in the trash', 'pagets_theme'), 
		'parent_item_colon' => __('Parent banner Item:', 'pagets_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('banner', 'pagets_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => array('slug' => 'banner/archive'),
		'menu_position' => 5,
		'taxonomies' => array('banner_category'),
		'supports' => array('title', 'editor', 'page-attributes')
		
	);

	register_post_type( 'banner' , $args );
}






if( !function_exists('cpt_banner_taxonomies') ):
function cpt_banner_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'banner Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'banner Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search banner Categories', 'dc_theme' ),
		'all_items' => __( 'All banner Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent banner Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent banner Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit banner Category', 'dc_theme' ), 
		'update_item' => __( 'Update banner Category', 'dc_theme' ),
		'add_new_item' => __( 'Add banner Category', 'dc_theme' ),
		'new_item_name' => __( 'New banner Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"banner_category", 
		"banner", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'banner/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_banner_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Name",
            "position" => "Position",
           "department" =>"Department",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_banner_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "position":
        	echo get_field('position',$id);
        	break;
				 case "department":
                 $terms = get_the_terms( $id, 'banner_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_banner_rewrite_rules(){ 

add_rewrite_rule('^banner/archive/pge/([^/]*)/?', 'index.php?pagename=banner&pge=$matches[1]','top');

}

function add_cpt_banner_query_vars($public_query_vars) {
	  $public_query_vars[] = "pge";
	return $public_query_vars; 
}

endif;

?>
