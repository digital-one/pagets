<?php
function social_links_shortcode( $atts, $content = null ) {
   return '<nav class="social">
<ul><li><a href="" class="facebook">Facebook</a></li>
    <li><a href="" class="twitter">Twitter</a></li>   
    <li><a href="" class="linkedin">Linkedin</a></li>
</ul>
</nav>';
}

add_shortcode( 'social-links', 'social_links_shortcode' );



function centres_accordion_shortcode($atts,$content=null){
	$args = array(
		"post_type" => "centres",
		"post_status" => "publish",
		"order_by" => "name",
		"order" => "ASC",
		"posts_per_page" => -1
		);
if($centres = get_posts($args)):
$content='<dl>';
		 $c=1;
		foreach($centres as $centre):
$class="";
  if(isset($_GET['active']) and $centre->ID == $_GET['active']) $class = ' class="active"';
  if(!isset($_GET['active']) and $c==1) $class = ' class="active"';
 $content.='<dt'.$class.'>'.$centre->post_title.'</dt>';
  $content.='<dd'.$class.'>'.$centre->post_content;
  $content.='<address>';
  $content.='<h2>Centre address details:</h2>';
  if(get_field('centre_building',$centre->ID)) $content.= get_field('centre_building',$centre->ID).'<br />';
  if(get_field('centre_street',$centre->ID)) $content.= get_field('centre_street',$centre->ID).'<br />';
  if(get_field('centre_town_city',$centre->ID)) $content.= get_field('centre_town_city',$centre->ID).'<br />';
  if(get_field('centre_county',$centre->ID)) $content.= get_field('centre_county',$centre->ID).'<br />';
  if(get_field('centre_postcode',$centre->ID)) $content.= get_field('centre_postcode',$centre->ID).'<br />';
  if(get_field('centre_telephone',$centre->ID)) $content.= 'Tel: <a href="tel:'.str_replace(' ','',get_field('centre_telephone',$centre->ID)).'">'.get_field('centre_telephone',$centre->ID).'</a><br />';
  if(get_field('centre_email',$centre->ID)) $content.= 'Email: <a href="mailto:'.get_field('centre_email',$centre->ID).'">'.get_field('centre_email',$centre->ID).'</a>';
  $content.='</address>';
if(get_field('centre_google_maps_url',$centre->ID)) $content.= '<p><a class="map" href="'.get_field('centre_google_maps_url',$centre->ID).'" target="_blank">Open in Google Maps</a></p>';
$content.='</dd>';
 $c++;
  endforeach;
$content.='</dl>';
endif;
return $content;
}

add_shortcode( 'centres-accordion', 'centres_accordion_shortcode' );
?>