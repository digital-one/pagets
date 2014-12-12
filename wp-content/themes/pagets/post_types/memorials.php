<?php
//
// Memorial Post Type related functions.
//

add_action('init', 'create_cpt_memorial');
add_filter("manage_edit-memorial_columns", "add_cpt_memorial_columns");   
add_action("manage_memorial_posts_custom_column",  "add_cpt_memorial_custom_columns",10,2); 
add_action('init', 'add_cpt_memorial_rewrite_rules');
add_filter('query_vars', 'add_cpt_memorial_query_vars');
//add_action( 'init', 'cpt_memorial_taxonomies'); 

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_memorial') ):
function create_cpt_memorial(){
	$labels = array(
		'name' => _x('Remembrance Garden', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Memorial', 'post type singular name', 'pagets_theme'),
		'add_new' => __('New Memorial', 'dc_theme'),
		'add_new_item' => __('Add New Memorial', 'pagets_theme'),
		'edit_item' => __('Edit Memorial', 'pagets_theme'),
		'new_item' => __('New Memorial', 'pagets_theme'),
		'view_item' => __('View Memorial', 'pagets_theme'),
		'search_items' => __('Search Memorials', 'pagets_theme'),
		'not_found' =>  __('No Memorial Found', 'pagets_theme'),
		'not_found_in_trash' => __('No memorials found in the trash', 'pagets_theme'), 
		'parent_item_colon' => __('Parent memorial Item:', 'pagets_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('memorial', 'pagets_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'rewrite' => array('slug' => 'memorial/archive'),
		'menu_position' => 20,
		'taxonomies' => array('memorial_category'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail','post-thumbnails')
		
	);

	register_post_type( 'memorial' , $args );
}






if( !function_exists('cpt_memorial_taxonomies') ):
function cpt_memorial_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'Memorial Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'Memorial Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search Memorial Categories', 'dc_theme' ),
		'all_items' => __( 'All Memorial Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent Memorial Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent Memorial Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit Memorial Category', 'dc_theme' ), 
		'update_item' => __( 'Update Memorial Category', 'dc_theme' ),
		'add_new_item' => __( 'Add Memorial Category', 'dc_theme' ),
		'new_item_name' => __( 'New Memorial Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"memorial_category", 
		"memorial", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'memorial/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_memorial_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Name",
            "job_title" => "Position",
           "category" =>"Category",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_memorial_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "job_title":
        	echo get_field('job_title',$id);
        	break;
				 case "category":
                 $terms = get_the_terms( $id, 'memorial_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_memorial_rewrite_rules(){ 

add_rewrite_rule('^remember-someone/remembrance-garden/enter-remembrance-garden/memorials/pge/([^/]*)/?', 'index.php?pagename=remember-someone/remembrance-garden/enter-remembrance-garden&pge=$matches[1]','top');

}

function add_cpt_memorial_query_vars($public_query_vars) {
	  $public_query_vars[] = "pge";
	return $public_query_vars; 
}

endif;

?>
