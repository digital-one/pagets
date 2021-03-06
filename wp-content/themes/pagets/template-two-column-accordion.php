<?php /* Template Name: Two Column With Accordion */ ?>
<?php get_header() ?>
<!--content-->
<div id="accordion" class="content container two-column main-right">
 <!--left sidebar -->
<aside id="left-sidebar">
<nav id="sub-nav">
	<?php $parent_id =  wp_ultimate_parent() ?>
	<?php $exclude = get_accordion_pages(); 
   $children = wp_list_pages("title_li=&include=".$parent_id."&echo=0");
	$children .= wp_list_pages('title_li=&child_of='.$parent_id.'&echo=0&exclude='.$exclude);
   if($parent_id==64):
$children .= '<li><a href="'.wp_logout_url(home_url()).'">Logout</a></li>';
    endif;
  if ($children) { ?>
  <ul>
  <?php echo $children; ?>
  </ul>
  <?php } ?>

</nav>
</aside>
<!--/left sidebar-->
<!--main-->
<div id="main" role="main">
  <div class="gutter-left">
<?php echo do_shortcode($post->post_content) ?>
</div>
</div>
<!--/main-->
</div>
</div>
<!--/content-->
<?php get_footer() ?>