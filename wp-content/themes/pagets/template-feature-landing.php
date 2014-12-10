<?php /* Template Name: Featured Image Landing */ ?>
<?php get_header() ?>
<!--content-->
<div id="professionals" class="content container two-column main-left">

<!--main-->
<div id="main" role="main" class="professionals">
	<div class="gutter-right">
		<section id="intro">
<?php echo $post->post_content ?> 
</section>
<nav id="featured-list">
	<?php
	/*$args = array(
		'post_type' => 'page',
		'post_status' => 'publish',
		'post_parent' => $post->ID,
		'order_by' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1
		);
	if($children = get_posts($args)):
	*/
	if(get_field('featured_list_rptr')):
		?>
	<ul>
		<?php
while(the_repeater_field('featured_list_rptr',$post->ID)): 
$permalink = get_sub_field('list_page_link_url');
$label = get_sub_field('list_page_link_label');
$file_link = get_sub_field('list_page_link_file');
$image = get_sub_field('list_page_link_image');

if(!empty($permalink)):
$postid = url_to_postid($permalink);
$page = get_post($postid);
$imageid = !empty($image) ? $image : get_post_thumbnail_id($postid);

$linklabel = !empty($label) ? $label : $page->post_title;
$linkhref = $permalink;
$target="_parent";
endif;

if(!empty($file_link) and empty($permalink)):
$linklabel = !empty($label) ? $label : 'File Download';
$linkhref = $file_link;
$target="_blank";
$imageid = $image;
endif;

list($src,$w,$h) = wp_get_attachment_image_src($imageid,'page-featured-image');
?>
<li><a href="<?php echo $linkhref ?>" target="<?php echo $target ?>"><figure style="background-image:url('<?php echo $src ?>');"></figure><h4><?php echo $linklabel ?></h4></a></li>
<?php endwhile ?>
</ul>
<?php endif ?>
</nav>
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