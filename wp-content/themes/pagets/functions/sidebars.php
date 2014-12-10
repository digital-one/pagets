<?php
add_action( 'widgets_init', 'widgets_init' );
if( !function_exists('widgets_init') ):
function widgets_init() {

	register_sidebar(array(
		'name' => __( 'Newsletter Banner', 'pagets_theme'),
		'id' => 'newsletter-banner',
		'description' => __( 'Newsletter banner in footer', 'pagets_theme'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
	register_sidebar(array(
		'name' => __( 'Footer Signposts', 'pagets_theme'),
		'id' => 'signposts-footer',
		'description' => __( 'Signpost boxes above footer', 'pagets_theme'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));	
}
endif;
?>
