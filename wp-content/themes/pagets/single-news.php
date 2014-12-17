<?php get_header() ?>

<!--content-->
<div id="news-single" class="content container two-column main-right">
  <!--intro-->
<header>

<div class="alpha">
  <div class="gutter-right">
  <h1><?php echo $post->post_title ?></h1>
<p><small><strong>Date posted:</strong> <time datetime="<?php echo mysql2date('Y-m-d', $post->post_date); ?>"><?php echo mysql2date('d/m/Y', $post->post_date); ?></time></small></p>
</div>
</div>
<aside>
<a href="<?php echo get_permalink(35)?>" class="button">Back to list</a>
</aside>
</header>
  <?php
if(get_field('gallery_images',$post->ID)): ?>
  <!--slider-->
<section id="slider">

<?php while(the_repeater_field('gallery_images',$post->ID)):  ?>
 <?php list($src,$w,$h) = wp_get_attachment_image_src(get_sub_field('gallery_image'),'news-gallery'); ?>
<!--slide-->
<div class="slide" style="background-image:url('<?php echo $src ?>');">
</div>
<!--/slide-->
<?php endwhile ?>

</section>
<!--/slider-->
<?php endif ?>


<div id="main" role="main">
 <?php echo $post->post_content ?>
  </div>
   <aside id="">
    <ul class="meta">
    <?php if($types = wp_get_post_terms($post->ID, 'article-type')): ?>
<li><strong>Types:</strong> 
<?php 
$output= "";
foreach($types as $type):
  if($output!="") $output.=', ';
  $output.='<a href="/news-events/archive/type/'.$type->term_id.'/category/all/pge/1/">'.$type->name.'</a>';
  endforeach;
  echo $output;
  ?>
</li>
<? endif ?>

 <?php if($categories = wp_get_post_terms($post->ID, 'article-category')): ?>
<li><strong>Categories:</strong> 
<?php 
$output= "";
foreach($categories as $category):
  if($output!="") $output.=', ';
  $output.='<a href="/news-events/archive/type/all/category/'.$category->term_id.'/pge/1/">'.$category->name.'</a>';
  endforeach;
  echo $output;
  ?>
</li>
<? endif ?>
  </ul>

<div class="addthis_native_toolbox"></div>
</aside>
  <footer>
        <?php
//next and prev navigation
    $args = array(
          'post_type' => 'news',
          'orderby' => 'date',
          'order' => 'DESC',
          'post_status' => 'publish',
          'numberposts' => -1
        );
    if($items = get_posts($args)):
      $total = count($items);
    $prev_key=0;
    $next_key=0;
    $this_key=0;
      $first_permalink = get_permalink($items[0]->ID);
      $first_title = $items[0]->post_title;
      $last_permalink = get_permalink($items[$total-1]->ID);
      $last_title = $items[$total-1]->post_title;
      $key=0;
      foreach($items as $item):
        if($item->ID == $post->ID):
          $this_key = $key;
          $prev_key = $key-1;
          $next_key = $key+1;
           endif;
        $key++;
        endforeach;
          $prev_permalink = array_key_exists($prev_key, $items) ? get_permalink($items[$prev_key]->ID) : $last_permalink;
          $next_permalink = array_key_exists($next_key, $items) ? get_permalink($items[$next_key]->ID) : $first_permalink;

          $prev_title = array_key_exists($prev_key, $items) ? $items[$prev_key]->post_title : $items[$total-1]->post_title;
          $next_title = array_key_exists($next_key, $items) ? $items[$next_key]->post_title : $items[0]->post_title;
         
      endif;
        ?>
<div class="alpha"><a href="<?php echo $prev_permalink ?>">Previous</a><span><?php echo $prev_title ?></span></div>
<div class="beta"><a href="<?php echo $next_permalink ?>">Next</a><span><?php echo $next_title ?></span></div>
</footer>
</div>
<!--/content-->
<?php get_footer() ?>