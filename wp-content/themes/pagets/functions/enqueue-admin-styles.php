<?php

//register admin styles

if(!function_exists('register_admin_styles')):
function register_admin_styles(){
	wp_register_style('admin-styles', get_template_directory_uri().'/css/admin.css',array(), '20140127', 'all');
}
endif;

add_action('init', 'register_admin_styles');

//enqueue the admin styles

if( !function_exists('enqueue_admin_styles') ):
function enqueue_admin_styles(){
	wp_enqueue_style('admin-styles');
	}
endif;

add_action('admin_enqueue_scripts', 'enqueue_admin_styles');

?>