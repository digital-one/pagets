<?php /* Template Name: Quick Links Landing Page */ ?>
<?php get_header() ?>
<!--content-->
<div id="accordion" class="content container">
  <!--intro-->
<section id="intro">
<?php echo $post->post_content ?>
</section>
<!--/intro-->
<!--index-->
  <section id="index" class="arrows">
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
$label = !empty($label) ? $label : $page->post_title;
$template = get_page_template_slug( $page->post_parent);
$url = $template=='template-section-accordion.php' ? get_permalink($page->post_parent).'?active='.$page->ID : get_sub_field('link');
?>

<li><a href="<?php echo $url?>"><?php echo $label ?></a></li>
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
$label = !empty($label) ? $label : $page->post_title;
$template = get_page_template_slug( $page->post_parent);
$url = $template=='template-section-accordion.php' ? get_permalink($page->post_parent).'?active='.$page->ID : get_sub_field('link');
?>
<li><a href="<?php echo $url ?>"><?php echo $label ?></a></li>
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
$label = !empty($label) ? $label : $page->post_title;
$template = get_page_template_slug( $page->post_parent);
$url = $template=='template-section-accordion.php' ? get_permalink($page->post_parent).'?active='.$page->ID : get_sub_field('link');
?>
<li><a href="<?php echo $url ?>"><?php echo $label ?></a></li>
<?php endwhile ?>
</ul>
<?php endif ?>
</span>
</div>
  </section>
  <!--/index-->
  <!--signposts-->
<section id="signposts">
 <?php
if(get_field('page_banners',$post->ID)): 
while(the_repeater_field('page_banners',$post->ID)): 
 $banner = get_sub_field('banner');
echo $banner->post_content;
  endwhile;
  endif;
  ?>
</section>
  <!--/signposts-->

</div>
<!--/content-->
<?php get_footer() ?>