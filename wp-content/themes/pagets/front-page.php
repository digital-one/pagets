<?php get_header() ?>
<!--content-->
<!--slider-->
  <div id="slider-wrap" class="container">
<section id="slider">
<?php if(get_field('slides',$post->ID)): ?>
<?php while(the_repeater_field('slides',$post->ID)):  ?>
	<?php 
	$image_id = get_sub_field('slide_image');
	list($src,$w,$h) = wp_get_attachment_image_src($image_id,'slide-image');
$src = getRetinaSrc($src);
?>
<!--slide-->
<div class="slide">
 <div class="image" style="background-image:url('<?php echo $src ?>');"></div>
   <aside><h3><?php echo get_sub_field('slide_heading') ?></h3><p><?php echo get_sub_field('slide_text')?></p><a href="<?php echo get_sub_field('slide_button_link')?>" class="button"><?php echo get_sub_field('slide_button_label') ?></a></aside>
</div>
<!--/slide-->
<?php endwhile ?>
<?php endif ?>
</section>
</div>
<!--/slider-->
<div class="content">

<!--index-->
  <section id="index" class="arrows">
      <div class="container">
<div class="column">

<h3><?php echo get_field('quick_links_left_menu_title',$post->ID) ?></h3>
<span>
<?php
if(get_field('quick_links_left_menu_links',$post->ID)): ?>
<ul>
<?php while(the_repeater_field('quick_links_left_menu_links',$post->ID)):  ?>
<?php
$label = get_sub_field('label');
$permalink = get_sub_field('link');
$post_id =  url_to_postid($permalink);
$page = get_post($post_id);
$label = !empty($label) ? $label : $post->post_title;
?>
<li><a href="<?php echo get_sub_field('link') ?>"><?php echo $label ?></a></li>
<?php endwhile ?>
</ul>
<?php endif ?>
</span>
</div>
<div class="column">
<h3><?php echo get_field('quick_links_mid_menu_title',$post->ID) ?></h3>
<span>
<?php
if(get_field('quick_links_mid_menu_links',$post->ID)): ?>
<ul>
<?php while(the_repeater_field('quick_links_mid_menu_links',$post->ID)):  ?>
<?php
$label = get_sub_field('label');
$permalink = get_sub_field('link');
$post_id =  url_to_postid($permalink);
$page = get_post($post_id);
$label = !empty($label) ? $label : $post->post_title;
?>
<li><a href="<?php echo get_sub_field('link') ?>"><?php echo $label ?></a></li>
<?php endwhile ?>
</ul>
<?php endif ?>
</span>
</div>
<div class="column">
<h3><?php echo get_field('quick_links_right_menu_title',$post->ID) ?></h3>
<span>
<?php
if(get_field('quick_links_right_menu_links',$post->ID)): ?>
<ul>
<?php while(the_repeater_field('quick_links_right_menu_links',$post->ID)):  ?>
<?php
$label = get_sub_field('label');
$permalink = get_sub_field('link');
$post_id =  url_to_postid($permalink);
$page = get_post($post_id);
$label = !empty($label) ? $label : $post->post_title;
?>
<li><a href="<?php echo get_sub_field('link') ?>"><?php echo $label ?></a></li>
<?php endwhile ?>
</ul>
<?php endif ?>
</span>
</div>
</div>
  </section>
  <!--/index-->
</div>
<section id="news-events">
  <!--news and events -->
<div class="container">
  <h3>News &amp; Events</h3>
<div id="carousel">
	<?php
	$args = array(
		"post_type" => "news",
		"post_status" => "publish",
		"order_by" => "date",
		"order" => "DESC",
		"posts_per_page" => 10
		);
	if($articles = get_posts($args)):
		foreach($articles as $article):
			list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($article->ID),'news-carousel-tn');
		$src = getRetinaSrc($src);
			?>
<div class="article"><a href="<?php echo get_permalink($article->ID) ?>"><figure><img src="<?php echo $src ?>" /></figure><p><?php echo $article->post_title ?></p></a></div>
<?php
endforeach;
endif;
?>
</div>
<footer><a href="<?php echo get_permalink(35)?>" title="View All"><span>View All</span></a></footer>
</div>
</section>
<!--/news and events -->
</div>
<!--/content-->
<?php get_footer() ?>