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
<p>Typi non habent claritatem insitam est usus legentis in is qui facit eorum claritatem. Investigationes demon straverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. </p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. </p>
<p>Typi non habent claritatem insitam; est usus legentis in is qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes.
</p>
</div>
</div>

</section>


<!--/main-->

</div>
<!--/content-->
<?php get_footer() ?> 