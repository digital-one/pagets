<?php /* Template Name: Accordion Section Page */ ?>
<?php get_header() ?>
<!--content-->
<div class="content container two-column main-left"> 
<!--main-->
<div id="main" role="main"> 
  <div class="gutter-right">
	<section id="intro">
<?php echo $post->post_content ?>
</section>
<section class="accordion">
  <?php
  $args = array(
    "post_type" => "page",
    "post_status" => "publish",
    "order_by" => "menu_order",
    "order" => "ASC",
    'posts_per_page' => -1,
    "child_of" => $post->ID,
    "post_parent" => $post->ID
    );
  if($children = get_posts($args)):
?>
<dl>
  <?php $c=1 ?>
  <?php foreach($children as $child): ?>
  <?php 
  $class="";
  if(isset($_GET['active']) and $child->ID == $_GET['active']) $class = ' class="active"';
  if(!isset($_GET['active']) and $c==1) $class = ' class="active"';
  ?>
  <dt<?php echo $class ?>><?php echo $child->post_title ?></dt>
  <dd<?php echo $class ?>><?php echo $child->post_content ?></dd>
  <?php $c++ ?>
  <?php endforeach ?>
</dl>
<?php endif ?>
  </section>
</div>
</div>
<!--/main-->
<!--right sidebar -->
<aside id="right-sidebar">
	<?php
if(get_field('page_banners',$post->ID)): 
while(the_repeater_field('page_banners',$post->ID)): 
 $banner = get_sub_field('banner');
echo $banner->post_content;
  endwhile;
  endif;
  ?>
</aside>
<!--/right sidebar-->
</div>
<!--/content-->
<?php include_once('footer.php') ?> 