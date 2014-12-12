<?php
//
// Newsletter Post Type related functions.
//

add_action('init', 'create_cpt_newsletter');
add_filter("manage_edit-newsletter_columns", "add_cpt_newsletter_columns");   
//add_action("manage_newsletter_posts_custom_column",  "add_cpt_newsletter_custom_columns",10,2); 
//add_action('init', 'add_cpt_newsletter_rewrite_rules');
//add_filter('query_vars', 'add_cpt_newsletter_query_vars');
//add_action( 'init', 'cpt_newsletter_taxonomies'); 

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_newsletter') ):
function create_cpt_newsletter(){
	$labels = array(
		'name' => _x('Member Newsletters', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Newsletter', 'post type singular name', 'pagets_theme'),
		'add_new' => __('New Newsletter', 'dc_theme'),
		'add_new_item' => __('Add New Newsletter', 'pagets_theme'),
		'edit_item' => __('Edit Newsletter', 'pagets_theme'),
		'new_item' => __('New Newsletter', 'pagets_theme'),
		'view_item' => __('View Newsletter', 'pagets_theme'),
		'search_items' => __('Search Newsletter', 'pagets_theme'),
		'not_found' =>  __('No Newsletter Found', 'pagets_theme'),
		'not_found_in_trash' => __('No newsletters found in the trash', 'pagets_theme'), 
		'parent_item_colon' => __('Parent newsletter Item:', 'pagets_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('newsletter', 'pagets_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => false,
		'rewrite' => array('slug' => 'newsletter/archive'),
		'menu_position' => 20,
		'taxonomies' => array('newsletter_category'),
		'supports' => array('title', 'editor', 'page-attributes')
		
	);

	register_post_type( 'newsletter' , $args );
}






if( !function_exists('cpt_newsletter_taxonomies') ):
function cpt_newsletter_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'Newsletter Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'Newsletter Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search Newsletter Categories', 'dc_theme' ),
		'all_items' => __( 'All Newsletter Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent Newsletter Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent Newsletter Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit Newsletter Category', 'dc_theme' ), 
		'update_item' => __( 'Update Newsletter Category', 'dc_theme' ),
		'add_new_item' => __( 'Add Newsletter Category', 'dc_theme' ),
		'new_item_name' => __( 'New Newsletter Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"newsletter_category", 
		"newsletter", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'newsletter/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_newsletter_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Issue",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_newsletter_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "position":
        	echo get_field('position',$id);
        	break;
				 case "department":
                 $terms = get_the_terms( $id, 'newsletter_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_newsletter_rewrite_rules(){ 

add_rewrite_rule('^newsletter/archive/pge/([^/]*)/?', 'index.php?pagename=newsletter&pge=$matches[1]','top');

}

function add_cpt_newsletter_query_vars($public_query_vars) {
	  $public_query_vars[] = "pge";
	return $public_query_vars; 
}

endif;

?>
