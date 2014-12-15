<?php
function social_links_shortcode( $atts, $content = null ) {
   $content='<nav class="social-links">
<ul>';
if(get_option('gplus_url')):
  $content.='<li><a href="'.get_option('gplus_url').'" target="_blank" class="gplus">Google Plus</a></li>';
endif;
if(get_option('facebook_url')):
  $content.='<li><a href="'.get_option('facebook_url').'" target="_blank" class="facebook">Facebook</a></li>';
endif;
if(get_option('twitter_url')):
  $content.='<li><a href="'.get_option('twitter_url').'" target="_blank" class="twitter">Twitter</a></li>';
endif;
if(get_option('pinterest_url')):
  $content.='<li><a href="'.get_option('pinterest_url').'" target="_blank" class="pinterest">Pinterest</a></li>';
endif;
if(get_option('linkedin_url')):
  $content.='<li><a href="'.get_option('linkedin_url').'" target="_blank" class="linkedin">Linkedin</a></li>';
endif;
$content.='</ul></nav>';
return $content;
}

add_shortcode( 'social-links', 'social_links_shortcode' );


function people_list_shortcode($atts,$content=""){
 
   extract( shortcode_atts( array(
      'term' => 'research'
      ), $atts ) );

   $args = array(
    "post_type" => "people",
    "order_by" => "menu_order",
    "order" => "ASC",
    "posts_per_page" => -1,
    'taxonomy' => 'people_category',
    'field' => 'slug',
    'term' => esc_attr($term)
    );
if($people = get_posts($args)):
  foreach($people as $person):
     list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($person->ID),'news-tn');
   $job = get_field('job_title',$person->ID);
$content.='<article><a href="'.get_permalink($person->ID).'">
<figure>
<div style="background-image:url(\''.$src.'\');">'.$person->post_title.'</div>
<figcaption><h4>'.$person->post_title.'</h4>';
if(!empty($job)) $content.='<p><small>'.$job.'</small></p>';
$content.='</figcaption>
</figure>
</a></article>';
    endforeach;
    endif;
    return $content;
}

add_shortcode( 'people-list', 'people_list_shortcode' );

function newsletter_list_shortcode($atts,$content=""){
  global $post;
 // echo $post->ID;
  $args = array(
    "post_type" => "newsletter",
    "post_status" => "publish",
    "order_by" => "meta_value_num",
    'meta_key' => 'newsletter_date',
    "order" => "DESC",
    "posts_per_page" => -1
    );
if($newsletters = get_posts($args)):
  $content='<ul class="child-page-list">';
  foreach($newsletters as $newsletter):
    $has_feature = get_post_thumbnail_id($newsletter->ID);
    $content.='<li';
    if($has_feature) $content.=' class="has-feature"';
    $content.= '><h3>'.$newsletter->post_title.'</h3>';
    if($has_feature):
  list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($newsletter->ID),'news-tn');
  $content.='<figure style="background-image:url(\''.$src.'\');"></figure>';
  endif;
 // $content.='<div class="alpha">';
  $content.=$newsletter->post_content;
  $link = get_field('newsletter_download_file',$newsletter->ID);
  $content.='<p><a href="'.$link.'" target="_blank">Download</a></p>';
 // $content.='</div>';
  
  $content.='</li>';
    endforeach;
     $content.='</ul>';
  endif;
  return $content;
}

add_shortcode( 'newsletter-list', 'newsletter_list_shortcode' );



function child_pages_list_shortcode($atts,$content=""){
  global $post;
 // echo $post->ID;
  $args = array(
    "post_type" => "page",
    "post_status" => "publish",
    "order_by" => "menu_order",
    "post_parent" => $post->ID,
    "order" => "ASC",
    "posts_per_page" => -1
    );
if($children = get_posts($args)):
  $content='<ul class="child-page-list">';
  foreach($children as $child):
    $has_feature = get_post_thumbnail_id($child->ID);
    $content.='<li';
    if($has_feature) $content.=' class="has-feature"';
    $content.= '><h3>'.$child->post_title.'</h3>';
    if($has_feature):
  list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($child->ID),'news-tn');
  $content.='<figure style="background-image:url(\''.$src.'\');"></figure>';
  endif;
 // $content.='<div class="alpha">';
  $content.=$child->post_content;
 // $content.='</div>';
  
  $content.='</li>';
    endforeach;
     $content.='</ul>';
  endif;
  return $content;
}

add_shortcode( 'child-pages-list', 'child_pages_list_shortcode' );


function ref_docs_shortcode($atts,$content=""){
  $args = array(
    "post_type" => "document",
    "post_status" => "publish",
    "order_by" => "menu_order",
    "order" => "ASC",
    "posts_per_page" => -1
    );
if($childre = get_posts($args)):
  foreach($docs as $doc):
    $content.='<article><h5>'.$doc->post_title.'</h5>';
  $content.=$doc->post_content;
  $content.='</article>';
    endforeach;
    $content.='</section>';
  endif;
  return $content;
}

add_shortcode( 'ref-docs', 'ref_docs_shortcode' );


function child_pages_accordion_shortcode($atts,$content=null){
  global $post;
  $args = array(
    "post_type" => "page",
    "post_status" => "publish",
    "order_by" => "menu_order",
    "post_parent" => $post->ID,
    "order" => "ASC",
    "posts_per_page" => -1
    );
if($children = get_posts($args)):
$content='<dl>';
     $c=1;
    foreach($children as $child):
$class="";
  if(isset($_GET['active']) and $centre->ID == $_GET['active']) $class = ' class="active"';
  if(!isset($_GET['active']) and $c==1) $class = ' class="active"';
 $content.='<dt'.$class.'>'.$child->post_title.'</dt>';
  $content.='<dd'.$class.'>'.do_shortcode($child->post_content);
$content.='</dd>';
 $c++;
  endforeach;
$content.='</dl>';
endif;
return $content;
}

add_shortcode( 'child-pages-accordion', 'child_pages_accordion_shortcode' );

function treatments_accordion_shortcode($atts,$content=null){
  $args = array(
    "post_type" => "treatment",
    "post_status" => "publish",
    "order_by" => "menu_order",
    "order" => "ASC",
    "posts_per_page" => -1
    );
if($treatments = get_posts($args)):
$content='<dl>';
     $c=1;
    foreach($treatments as $treatment):
$class="";
  if(isset($_GET['active']) and $centre->ID == $_GET['active']) $class = ' class="active"';
  if(!isset($_GET['active']) and $c==1) $class = ' class="active"';
 $content.='<dt'.$class.'>'.$treatment->post_title.'</dt>';
  $content.='<dd'.$class.'>'.do_shortcode($treatment->post_content);
$content.='</dd>';
 $c++;
  endforeach;
$content.='</dl>';
endif;
return $content;
}

add_shortcode( 'treatments-accordion', 'treatments_accordion_shortcode' );


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



function article_accordion_shortcode($atts, $content=null){
   extract( shortcode_atts( array(
      'term' => 'research'
      ), $atts ) );

  $args = array(
    "post_type" => "news",
    "taxonomy" => "article-category",
    "term" => esc_attr($term),
    "post_status" => "publish",
    "order_by" => "date",
    "order" => "DESC",
    "posts_per_page" => -1
    );
if($articles = get_posts($args)):
  $c=1;
  $content='<dl>';
 
  foreach($articles as $article):
     $classnames = array();
     $has_feature = get_post_thumbnail_id($article->ID) ? true : false;

if($has_feature)  array_push($classnames,'has-feature');
  if(isset($_GET['active']) and $centre->ID == $_GET['active']) $classnames[]='active';
  if(!isset($_GET['active']) and $c==1) $classnames[]='active';
$classattr="";
if(count($classnames)):
  $classes = implode(' ',$classnames);
    $classattr=' class="'.$classes.'"';
    endif;
 $content.='<dt'.$classattr.'>'.$article->post_title.'</dt>';
  $content.='<dd'.$classattr.'>';
 if($has_feature):
     list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($article->ID),'news-tn');
    $content.='<figure style="background-image:url(\''.$src.'\');"></figure>';
    endif;
    $content.= $article->post_content;
  $content.='<ul class="meta">';
 if($types = wp_get_post_terms($article->ID, 'article-type')): 
$content.='<li><strong>Types: </strong>';
$output= "";
foreach($types as $type):
  if($output!="") $output.=', ';
  $output.='<a href="/news-events/archive/type/'.$type->term_id.'/category/all/pge/1/">'.$type->name.'</a>';
  endforeach;
  $content.= $output;
$content.='</li>';
endif;
if($categories = wp_get_post_terms($article->ID, 'article-category')):
$content.='<li><strong>Categories:</strong> ';
$output= "";
foreach($categories as $category):
  if($output!="") $output.=', ';
  $output.='<a href="/news-events/archive/type/all/category/'.$category->term_id.'/pge/1/">'.$category->name.'</a>';
  endforeach;
  $content.= $output;
$content.='</li>';
endif;
  $content.='</ul>';
 
$content.='</dd>';
 $c++;
  endforeach;
$content.='</dl>';
endif;
return $content;
}

add_shortcode( 'article-accordion', 'article_accordion_shortcode' );


function youtube_embed_shortcode($atts, $content=null){
   extract( shortcode_atts( array(
      'id' => ''
      ), $atts ) );
   $content='<div class="video-outer">';
$content.='<div class="video-container">';
$content.='<iframe width="560" height="315" src="//www.youtube.com/embed/'.esc_attr($id).'" frameborder="0" allowfullscreen></iframe>';
$content.='</div></div>';
return $content;
}

add_shortcode( 'youtube-video', 'youtube_embed_shortcode' );

function vimeo_embed_shortcode($atts, $content=null){
   extract( shortcode_atts( array(
      'id' => ''
      ), $atts ) );
   $content='<div class="video-outer">';
  $content.='<div class="video-container">';
  $content.='<iframe src="//player.vimeo.com/video/'.esc_attr($id).'" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
$content.='</div></div>';
return $content;
}

add_shortcode( 'vimeo-video', 'vimeo_embed_shortcode' );




?>