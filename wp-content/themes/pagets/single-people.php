<?php get_header() ?>
<?php
$terms = wp_get_post_terms( $post->ID, 'people_category');
$term = $terms[0];
?>
<!--content-->
<div class="content container two-column main-left wide-sidebar"> 
<!--main-->

	<section id="single-person">
		<header>
			<div class="alpha">
<h1><?php echo $post->post_title ?></h1>
<?php
$job = get_field('job_title',$post->ID);
if(!empty($job)):
	?>
<p><small><?php echo $job ?></small></p>
<?php endif ?>
</div>
<div class="beta">
<h2><?php echo $term->name ?></h2>
</div>
</header>
<aside id="right-sidebar-wide">
	 <?php 
	 if(get_post_thumbnail_id($post->ID)):
	 list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'people-image');
	 ?>
	<figure style="background-image:url('<?php echo $src ?>');">
		<?php echo $post->post_title ?>
	</figure>
<?php endif ?>
</aside>
<div id="main" role="main"> 
	<div class="gutter-right">
<?php echo $post->post_content ?>
</div>
</div>

</section>


<!--/main-->

</div>
<!--/content-->
<?php get_footer() ?> 