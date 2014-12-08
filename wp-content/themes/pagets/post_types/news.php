<?php
//
// News Post Type related functions.
//

add_action('init', 'create_cpt_news');
add_filter("manage_edit-news_columns", "add_cpt_news_columns");   
//add_action("manage_news_posts_custom_column",  "add_cpt_news_custom_columns",10,2); 
add_action('init', 'add_cpt_news_rewrite_rules');
add_filter('query_vars', 'add_cpt_news_query_vars');

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_news') ):
function create_cpt_news(){
	$labels = array(
		'name' => _x('News', 'post type general name', 'dc_theme'),
		'singular_name' => _x('News', 'post type singular name', 'dc_theme'),
		'add_new' => __('New Article', 'dc_theme'),
		'add_new_item' => __('Add New news', 'dc_theme'),
		'edit_item' => __('Edit Article', 'dc_theme'),
		'new_item' => __('New Article', 'dc_theme'),
		'view_item' => __('View Article', 'dc_theme'),
		'search_items' => __('Search News', 'dc_theme'),
		'not_found' =>  __('No Articles found', 'dc_theme'),
		'not_found_in_trash' => __('No Articles found in the trash', 'dc_theme'), 
		'parent_item_colon' => __('Parent News Item:', 'dc_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('news', 'dc_theme'),
		'public' => true,
		'show_ui' => true,
		'menu_icon' =>'dashicons-megaphone',
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'rewrite' => array('slug' => 'news/archive'),
		'menu_position' => 5,
		'taxonomies' => array('news-category'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail','post-thumbnails')
		
	);

	register_post_type( 'news' , $args );
}



add_action( 'init', 'cpt_news_taxonomies');


if( !function_exists('cpt_news_taxonomies') ):
function cpt_news_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$article_type_labels = array(
		'name' => _x( 'Article Types', 'taxonomy general name', 'pagets_theme' ),
		'singular_name' => _x( 'Article Type', 'taxonomy singular name', 'pagets_theme' ),
		'search_items' =>  __( 'Search Article Types', 'pagets_theme' ),
		'all_items' => __( 'All Article Types', 'pagets_theme' ),
		'parent_item' => __( 'Parent Article Types', 'pagets_theme' ),
		'parent_item_colon' => __( 'Parent Article Types:', 'pagets_theme' ),
		'edit_item' => __( 'Edit Article Types', 'pagets_theme' ), 
		'update_item' => __( 'Update Article Type', 'pagets_theme' ),
		'add_new_item' => __( 'Add Article Type', 'pagets_theme' ),
		'new_item_name' => __( 'New Article Type', 'pagets_theme' ),
	); 

	$article_category_labels = array(
		'name' => _x( 'Article Categories', 'taxonomy general name', 'pagets_theme' ),
		'singular_name' => _x( 'Article Category', 'taxonomy singular name', 'pagets_theme' ),
		'search_items' =>  __( 'Search Article Categories', 'pagets_theme' ),
		'all_items' => __( 'All Article Categories', 'pagets_theme' ),
		'parent_item' => __( 'Parent Article Categories', 'pagets_theme' ),
		'parent_item_colon' => __( 'Parent Article Categories:', 'pagets_theme' ),
		'edit_item' => __( 'Edit Article Categories', 'pagets_theme' ), 
		'update_item' => __( 'Update Article Category', 'pagets_theme' ),
		'add_new_item' => __( 'Add Article Category', 'pagets_theme' ),
		'new_item_name' => __( 'New Article Category', 'pagets_theme' ),
	); 	


	register_taxonomy(
		"article-type", 
		"news", 
		array(
			"hierarchical" => true, 
			"labels" => $article_type_labels,
			'rewrite' => array('slug' => 'article-type/category'),
			'query_var' => true
		));

	register_taxonomy(
		"article-category", 
		"news", 
		array(
			"hierarchical" => true, 
			"labels" => $article_category_labels,
			'rewrite' => array('slug' => 'article-category/category'),
			'query_var' => true
		));

}
endif;


function add_cpt_news_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Headline",
           "date" => "Date"
        );  
	return $columns;
}

function add_cpt_news_custom_columns($column,$id){
        global $post;
        switch ($column){
				 case "district":
                echo get_field('district',$id);
                break;	
                case "town_city":
                echo get_field('town_city',$id);
                break;
                case "category":
                $terms = get_the_terms( $id, 'news-category');
                $list="";
                foreach($terms as $term):
                	if(!empty($list)) $list.=", ";
                	$list.= $term->name;
                endforeach;
                echo $list;
                break;
                case "price":
                echo '&pound;'.get_field("price",$id);
                break;
                case "status":
                echo get_field("status",$id);
                break;
                case "image":
               	echo get_the_post_thumbnail($id,'thumbnail');         
 }
} 

function add_cpt_news_rewrite_rules(){ 

add_rewrite_rule('^media-latest-news/latest-news/archive/([^/]*)/?', 'index.php?pagename=media-latest-news/latest-news&yr=$matches[1]','top');

/*
	//add_rewrite_rule('^latest-news/archive/cat/([^/]*)/year/([^/]*)/month/([^/]*)/page/([^/]*)/?','index.php?post_type=news&&category=$matches[1]&y=$matches[2]&m=$matches[3]&paged=$matches[4]','top');
	//add_rewrite_rule('^latest-news/archive/year/([^/]*)/month/([^/]*)/page/([^/]*)?','index.php?post_type=news&y=$matches[1]&m=$matches[2]&paged=$matches[3]','top');
	add_rewrite_rule('^latest-news/articles/cat/([^/]*)/year/([^/]*)/month/([^/]*)/page/([^/]*)/?','index.php?pagename=latest-news&category=$matches[1]&year=$matches[2]&month=$matches[3]&paged=$matches[4]','top');
	add_rewrite_rule('^latest-news/articles/year/([^/]*)/month/([^/]*)/page/([^/]*)/?','index.php?pagename=latest-news&year=$matches[1]&month=$matches[2]&paged=$matches[3]','top');
	add_rewrite_rule('^latest-news/articles/cat/([^/]*)/page/([^/]*)/?','index.php?pagename=latest-news&category=$matches[1]&paged=$matches[2]','top');
	add_rewrite_rule('^latest-news/articles/cat/([^/]*)/?','index.php?pagename=latest-news&category=$matches[1]','top');
	//add_rewrite_rule('^latest-news/archive/page/([^/]*)/?','index.php?post_type=news&paged=$matches[1]','top');

		//add_rewrite_rule('^latest-news/category/([^/]*)/page/([^/]*)/?','index.php?post_type=news&category=$matches[1]&paged=$matches[2]','top');
    	//add_rewrite_rule('^latest-news/category/([^/]*)/?','index.php?post_type=news&category=$matches[1]','top');
		
  */
}

function add_cpt_news_query_vars($public_query_vars) {
	  $public_query_vars[] = "yr";
	 // $public_query_vars[] = "mo";
	return $public_query_vars; 
}

endif;

?>
