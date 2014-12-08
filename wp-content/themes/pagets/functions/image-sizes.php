<?php
// Theme support
add_theme_support('post-thumbnails');
add_image_size('slide-image', 904, 426, true);
add_image_size('slide-image-tn', 250, 118, true);
add_image_size('news-carousel-tn', 326, 216, true);
add_image_size('news-tn', 360, 240, true);
add_image_size('news-gallery', 1280, 426, true);
add_image_size('news-gallery-tn', 250, 83, true);
set_post_thumbnail_size( 200, 139,true); 

function custom_image_sizes($sizes) {
      unset( $sizes['medium']);
      unset( $sizes['large']);
	 //unset( $sizes['full'] ); // removes full size if needed
$myimgsizes = array(
	"slide-image" => __("Slide Image" ),
  "slide-image-tn" => __("Slide Image Thumbnail" ),
  "news-carousel-tn" => __("News Carousel Thumbnail" ),
  "news-tn" => __("News Thumbnail" ),
  "news-gallery" => __("News Gallery" ),
  "news-gallery-tn" => __("News Gallery Thumbnail" )
  );
     
       $newimgsizes = array_merge($sizes, $myimgsizes);
	    return $newimgsizes;
}
add_filter('image_size_names_choose', 'custom_image_sizes');

?>