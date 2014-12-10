<?php
//enqueue admin scripts

add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');

function enqueue_admin_scripts() {
 	wp_enqueue_media(); 
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-1.10.1.min.js', array('jquery'), 0, true);
	wp_enqueue_script('admin-scripts', get_template_directory_uri().'/js/admin-scripts.js', array('jquery'), 0, true);
}

?>