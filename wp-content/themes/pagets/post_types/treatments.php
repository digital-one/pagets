<?php
//
// Treatment Post Type related functions.
//

add_action('init', 'create_cpt_treatment');
add_filter("manage_edit-treatment_columns", "add_cpt_treatment_columns");   
add_action("manage_treatment_posts_custom_column",  "add_cpt_treatment_custom_columns",10,2); 
add_action('init', 'add_cpt_treatment_rewrite_rules');
add_filter('query_vars', 'add_cpt_treatment_query_vars');
//add_action( 'init', 'cpt_treatment_taxonomies'); 

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_treatment') ):
function create_cpt_treatment(){
	$labels = array(
		'name' => _x('Patient Treatments', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Treatment', 'post type singular name', 'pagets_theme'),
		'add_new' => __('New Treatment', 'dc_theme'),
		'add_new_item' => __('Add New Treatment', 'pagets_theme'),
		'edit_item' => __('Edit Treatment', 'pagets_theme'),
		'new_item' => __('New Treatment', 'pagets_theme'),
		'view_item' => __('View Treatment', 'pagets_theme'),
		'search_items' => __('Search Treatments', 'pagets_theme'),
		'not_found' =>  __('No Treatments Found', 'pagets_theme'),
		'not_found_in_trash' => __('No treatments found in the trash', 'pagets_theme'), 
		'parent_item_colon' => __('Parent treatment Item:', 'pagets_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('Treatment', 'pagets_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => array('slug' => 'treatment/archive'),
		'menu_position' => 20,
		'taxonomies' => array('treatment_category'),
		'supports' => array('title', 'editor', 'page-attributes')
		
	);

	register_post_type( 'treatment' , $args );
}






if( !function_exists('cpt_treatment_taxonomies') ):
function cpt_treatment_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'treatment Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'treatment Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search treatment Categories', 'dc_theme' ),
		'all_items' => __( 'All treatment Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent treatment Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent treatment Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit treatment Category', 'dc_theme' ), 
		'update_item' => __( 'Update treatment Category', 'dc_theme' ),
		'add_new_item' => __( 'Add treatment Category', 'dc_theme' ),
		'new_item_name' => __( 'New treatment Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"treatment_category", 
		"treatment", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'treatment/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_treatment_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Name",
            "position" => "Position",
           "department" =>"Department",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_treatment_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "position":
        	echo get_field('position',$id);
        	break;
				 case "department":
                 $terms = get_the_terms( $id, 'treatment_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_treatment_rewrite_rules(){ 

add_rewrite_rule('^treatment/archive/pge/([^/]*)/?', 'index.php?pagename=treatment&pge=$matches[1]','top');

}

function add_cpt_treatment_query_vars($public_query_vars) {
	  $public_query_vars[] = "pge";
	return $public_query_vars; 
}

endif;

?>
