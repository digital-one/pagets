<?php
//
// Centres Post Type related functions.
//

add_action('init', 'create_cpt_centres');
add_filter("manage_edit-centres_columns", "add_cpt_centres_columns");   
add_action("manage_centres_posts_custom_column",  "add_cpt_centres_custom_columns",10,2); 
//add_action('init', 'add_cpt_centres_rewrite_rules');
//add_filter('query_vars', 'add_cpt_centres_query_vars');

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_centres') ):
function create_cpt_centres(){
	$labels = array(
		'name' => _x('Centres of Excellence', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Centre', 'post type singular name', 'br_theme'),
		'add_new' => __('New Centre', 'dc_theme'),
		'add_new_item' => __('Add New Centre', 'br_theme'),
		'edit_item' => __('Edit Centre', 'br_theme'),
		'new_item' => __('New Centre', 'br_theme'),
		'view_item' => __('View Centre', 'br_theme'),
		'search_items' => __('Search Centres', 'br_theme'),
		'not_found' =>  __('No Centres Found', 'br_theme'),
		'not_found_in_trash' => __('No Centres found in the trash', 'br_theme'), 
		'parent_item_colon' => __('Parent Centres Item:', 'br_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('centres', 'br_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'rewrite' => array('slug' => 'centres/archive'),
		'menu_position' => 5,
		'taxonomies' => array('centres-category'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail','post-thumbnails','page-attributes')
		
	);

	register_post_type( 'centres' , $args );
}



add_action( 'init', 'cpt_centres_taxonomies');


if( !function_exists('cpt_centres_taxonomies') ):
function cpt_centres_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'Centre Categories', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'Centre Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search Centre Categories', 'dc_theme' ),
		'all_items' => __( 'All Centre Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent Centre Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent Centre Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit Centre Category', 'dc_theme' ), 
		'update_item' => __( 'Update Centre Category', 'dc_theme' ),
		'add_new_item' => __( 'Add Centre Category', 'dc_theme' ),
		'new_item_name' => __( 'New Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"centres_category", 
		"centres", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'centres/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_centres_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Project",
           "client" => "Client",
           "sector" =>"Categories/Sectors",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_centres_custom_columns($column,$id){
        global $post;
        switch ($column){
        		case "client":
        		echo get_field('client',$id);
        		break;
				 case "sector":
                 $terms = get_the_terms( $id, 'centres_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_centres_rewrite_rules(){ 

add_rewrite_rule('^news-centress/centress/archive/yr/([^/]*)/?', 'index.php?pagename=news-centress/centress&yr=$matches[1]','top');

}

function add_cpt_centres_query_vars($public_query_vars) {
	  $public_query_vars[] = "yr";
	return $public_query_vars; 
}

endif;

?>
