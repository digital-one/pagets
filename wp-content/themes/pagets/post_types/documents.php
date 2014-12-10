<?php
//
// Document Post Type related functions.
//

add_action('init', 'create_cpt_document');
add_filter("manage_edit-document_columns", "add_cpt_document_columns");   
add_action("manage_document_posts_custom_column",  "add_cpt_document_custom_columns",10,2); 
add_action('init', 'add_cpt_document_rewrite_rules');
add_filter('query_vars', 'add_cpt_document_query_vars');
//add_action( 'init', 'cpt_document_taxonomies'); 

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_document') ):
function create_cpt_document(){
	$labels = array(
		'name' => _x('REF Documents', 'post type general name', 'dc_theme'),
		'singular_name' => _x('document', 'post type singular name', 'pagets_theme'),
		'add_new' => __('New document', 'dc_theme'),
		'add_new_item' => __('Add New document', 'pagets_theme'),
		'edit_item' => __('Edit document', 'pagets_theme'),
		'new_item' => __('New document', 'pagets_theme'),
		'view_item' => __('View document', 'pagets_theme'),
		'search_items' => __('Search documents', 'pagets_theme'),
		'not_found' =>  __('No documents Found', 'pagets_theme'),
		'not_found_in_trash' => __('No documents found in the trash', 'pagets_theme'), 
		'parent_item_colon' => __('Parent document Item:', 'pagets_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('document', 'pagets_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => array('slug' => 'document/archive'),
		'menu_position' => 20,
		'taxonomies' => array('document_category'),
		'supports' => array('title', 'editor', 'page-attributes')
		
	);

	register_post_type( 'document' , $args );
}






if( !function_exists('cpt_document_taxonomies') ):
function cpt_document_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'document Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'document Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search document Categories', 'dc_theme' ),
		'all_items' => __( 'All document Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent document Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent document Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit document Category', 'dc_theme' ), 
		'update_item' => __( 'Update document Category', 'dc_theme' ),
		'add_new_item' => __( 'Add document Category', 'dc_theme' ),
		'new_item_name' => __( 'New document Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"document_category", 
		"document", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'document/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_document_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Name",
            "position" => "Position",
           "department" =>"Department",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_document_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "position":
        	echo get_field('position',$id);
        	break;
				 case "department":
                 $terms = get_the_terms( $id, 'document_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_document_rewrite_rules(){ 

add_rewrite_rule('^document/archive/pge/([^/]*)/?', 'index.php?pagename=document&pge=$matches[1]','top');

}

function add_cpt_document_query_vars($public_query_vars) {
	  $public_query_vars[] = "pge";
	return $public_query_vars; 
}

endif;

?>
