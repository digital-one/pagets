<?php
add_action('after_setup_theme', 'load_custom_post_types');
if( !function_exists('load_custom_post_types')):
function load_custom_post_types(){
	$cpt_files = apply_filters('load_custom_post_type_files', array(
		'post_types/news',
		'post_types/banners',
		'post_types/centres',
		'post_types/treatments',
		'post_types/documents',
		'post_types/people',
		'post_types/newsletters',
		'post_types/products',
		'post_types/memorials'
	));
	foreach($cpt_files as $cpt_file) get_template_part($cpt_file);
	}
endif;
?>