<?php 
// Add new styles to the TinyMCE "formats" menu dropdown
if ( ! function_exists( 'theme_styles_dropdown' ) ) {
    function theme_styles_dropdown( $settings ) {

        // Create array of new styles
        $new_styles = array(
            array(
                'title' => __( 'Paget Theme Styles', 'pagets' ),
                'items' => array(
                    array(
                        'title'     => __('Theme Button','pagets'),
                        'selector'  => 'a',
                        'classes'   => array('button')
                    ),
                    array(
                        'title'     => __('Full Width Theme Button','pagets'),
                        'selector'    => 'a',
                        'classes'   => array('button','full-width')
                    ),
                    array(
                        'title'     => __('Dashed List','pagets'),
                        'selector'    => 'ul',
                        'classes'   => array('dashed-list')
                    ),
                    array(
                        'title'     => __('Bullet List','pagets'),
                        'selector'    => 'ul',
                        'classes'   => array('bullet-list')
                    ),
                    array(
                        'title'     => __('Arrow List','pagets'),
                        'selector'    => 'ul',
                        'classes'   => array('arrow-list')
                    ),
                    array(
                        'title'     => __('Keyline Box','pagets'),
                        'selector'    => 'div',
                        'classes'   => array('box','keyline')
                    ),
                    array(
                        'title'     => __('Orange Box','pagets'),
                        'selector'    => 'div',
                        'classes'   => array('box','fill')
                    ),
                ),
            ),
        );

        // Merge old & new styles
        $settings['style_formats_merge'] = true;

        // Add new styles
        $settings['style_formats'] = json_encode( $new_styles );

        // Return New Settings
        return $settings;

    }
}
add_filter( 'tiny_mce_before_init', 'theme_styles_dropdown' );

?>