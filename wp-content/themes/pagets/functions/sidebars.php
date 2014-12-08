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
	
}
endif;
?>
