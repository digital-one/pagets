<?php get_header() ?>
<? $page = get_post(516) ?>
<!--content-->
<div class="content container two-column main-left">
	<!--main-->
<div id="main" role="main" class="professionals">
	<div class="gutter-right">

  <!--intro-->
<section id="intro">
<h1>Search Results</h1>

</section>
<!--/intro-->
<section id="search-results">
<ul class="post-list">
	<?php foreach($posts as $post): ?>
	<?php
	$has_feature = get_post_thumbnail_id($post->ID);
	$class = $has_feature ? ' class="has-feature"' : '';
	?>
<li<?php echo $class ?>>
<?php if($has_feature): ?>
	<?php list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($memorial->ID),'people-image'); ?>
	<div class="beta">
<figure style="background-image:url('<?php echo $src ?>');"><?php echo $post->post_title ?></figure>
</div>
<?php endif ?>
<div class="alpha">
<h3><a href="<?php echo get_permalink($post->ID)?>"><?php echo $post->post_title ?></a></h3>
<p><?php echo $post->post_excerpt ?><br /><a href="<?php echo get_permalink($post->ID)?>">Read more</a></p>
</div>
  </li>
 <?php endforeach ?>
</ul>
</section>
</div>
</div>
<!--right sidebar -->
<aside id="right-sidebar">
	 <?php
if(get_field('page_banners',$page->ID)): 
while(the_repeater_field('page_banners',$page->ID)): 
 $banner = get_sub_field('banner');
echo do_shortcode($banner->post_content);
  endwhile;
  endif;
  ?>
</aside>
<!--/right sidebar-->
</div>
<!--/content-->
<?php get_footer() ?>