<?php
// Hooks your functions into the correct filters
function add_tinymce_buttons() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'add_tinymce_video_plugin' );
		add_filter( 'mce_buttons', 'register_tinymce_video_button' );
	}
}
add_action('admin_head', 'add_tinymce_buttons');

// Declare script for new button
function add_tinymce_video_plugin( $plugin_array ) {
	$plugin_array['tinymce_video_button'] = get_template_directory_uri() .'/js/tinymce-video-button.js';
	return $plugin_array;
}

// Register new button in the editor
function register_tinymce_video_button( $buttons ) {
	array_push( $buttons, 'tinymce_video_button' );
	return $buttons;
}

?>
