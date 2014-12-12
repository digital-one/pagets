<?php /* Template Name: Remembrance Garden */ ?>
<?php get_header() ?>
<!--content-->
<div class="content container remembrance-garden">
  <!--intro-->
<section id="intro">
<?php echo $post->post_content ?>
</section>
<!--/intro-->
<section id="memorials">
<?php

$page = !empty($wp_query->query_vars['pge']) ? $wp_query->query_vars['pge'] : 1;

 $args = array(
'post_type' => 'memorial',
'posts_per_page' => 4,
'post_status' => 'publish',
'order_by' => 'date',
'paged' => $page,
'order' => 'DESC'
);
 $query = new WP_Query($args); //number of pages
$max_num_pages = $query->max_num_pages;

 if($memorials = get_posts($args)):
?>
<ul class="post-list">
	<?php foreach($memorials as $memorial): ?>
	<?php
	$has_feature = get_post_thumbnail_id($memorial->ID);
	$class = $has_feature ? ' class="has-feature"' : '';
	?>
<li<?php echo $class ?>>
<?php if($has_feature): ?>
	<?php list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($memorial->ID),'people-image'); ?>
	<div class="beta">
<figure style="background-image:url('<?php echo $src ?>');"><?php echo $product->post_title ?></figure>
</div>
<?php endif ?>
<div class="alpha">
<h3><?php echo $memorial->post_title ?></h3>
<?php echo $memorial->post_content ?>
</div>
  </li>
 <?php endforeach ?>
</ul>
<?php endif ?>
<?php
$next_page = $page+1;
?>
<footer><a href="/remember-someone/remembrance-garden/enter-remembrance-garden/memorials/pge/<?php echo $next_page ?>" class="more-posts<?php if($next_page > $max_num_pages): ?> end<?php endif ?>"><span>View More</span></a></footer>
</section>
</div>
<!--/content-->
<?php get_footer() ?>