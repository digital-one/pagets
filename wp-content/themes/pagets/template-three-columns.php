<?php /* Template Name: Three Column */ ?>
<?php get_header() ?>
<!--content-->
<div class="content container three-column">
 <!--left sidebar -->
<aside id="left-sidebar">
<nav id="sub-nav">
	<?php $parent_id =  wp_ultimate_parent() ?>
	<?php $exclude = get_accordion_pages(); 
	    $children = wp_list_pages("title_li=&include=".$parent_id."&echo=0");
	$children .= wp_list_pages('title_li=&child_of='.$parent_id.'&echo=0&exclude='.$exclude);
  if ($children): ?>
  <ul>
  	
  <?php echo $children; ?>
  </ul>
  <?php endif ?>

</nav>
</aside>
<!--/left sidebar-->
<!--main-->
<div id="main" role="main">
	<div class="gutter-mid">
<?php echo do_shortcode($post->post_content) ?>
</div>
</div>
<!--/main-->
<!--right sidebar -->
<aside id="right-sidebar">

	 <?php
if(get_field('page_banners',$post->ID)): 
while(the_repeater_field('page_banners',$post->ID)): 
 $banner = get_sub_field('banner');
echo do_shortcode($banner->post_content);
  endwhile;
  endif;
  ?>

</aside>
<!--/right sidebar-->
</div>
<!--/content-->
<?php include_once('footer.php') ?> 