<?php get_header() ?>
<?php
 global $wp_query;
  $type_id = !empty($wp_query->query_vars['type']) ? $wp_query->query_vars['type'] : '';
  if($type_id=='all' or empty($type_id)){
    $type_id='all';
$type_ids = get_terms( 'article-type', array(
    'hide_empty' => 0,
    'fields' => 'ids'
) );
  } else {
    $type_ids = $type_id;
  }
   $category_id = !empty($wp_query->query_vars['category']) ? $wp_query->query_vars['category'] : '';
   if($category_id=='all' or empty($category_id)){
    $category_id='all';
$category_ids = get_terms( 'article-category', array(
    'hide_empty' => 0,
    'fields' => 'ids'
) );

   } else {
    $category_ids = $category_id;
   }

   $page = !empty($wp_query->query_vars['pge']) ? $wp_query->query_vars['pge'] : 1;
  ?>
<!--content-->
<div class="content container">
  <!--intro-->
<section id="news-events-archive">
  <header>
<h1><?php echo $post->post_title ?></h1>
<form id="filters">
<select name="type" id="type">
<?php
//get article type
$args = array(
  'orderby'     => 'name', 
  'order'       => 'ASC',
  'hide_empty'  => true
  );
?>
<option value="all">All Types</option>
<?php
if($types = get_terms( 'article-type', $args)):
foreach($types as $type):
  $selected = $type->term_id == $type_id ? ' selected="selected"' : '';
?>
<option value="<?php echo $type->term_id ?>"<?php echo $selected ?>><?php echo $type->name ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
<select name="category" id="category"><option value="all">All Categories</option>
<?php
if($categories = get_terms( 'article-category', $args)):
foreach($categories as $category): 
 $selected = $category->term_id == $category_id ? ' selected="selected"' : '';
 ?>
<option value="<?php echo $category->term_id ?>"<?php echo $selected ?>><?php echo $category->name ?></option>
<?php endforeach; ?>
<?php endif; ?>
</select>
</form>
</header>
<div id="posts">
  <?php

  $args = array(
'post_type' => 'news',
'posts_per_page' => 4,
'post_status' => 'publish',
'order_by' => 'date',
'paged' => $page,
'order' => 'DESC',
'tax_query' => array(
'relation' => 'AND',
array(
'taxonomy' => 'article-type',
'field' => 'id',
'terms' => $type_ids
),
array(
'taxonomy' => 'article-category',
'field' => 'id',
'terms' => $category_ids
)
)
);
 $query = new WP_Query($args); //number of pages
$max_num_pages = $query->max_num_pages;

if($articles = get_posts($args)):
    foreach($articles as $article):
      ?>
<article>
  <ul class="meta">
    <?php if($types = wp_get_post_terms($article->ID, 'article-type')): ?>
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

 <?php if($categories = wp_get_post_terms($article->ID, 'article-category')): ?>
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
  <h3><a href="<?php echo get_permalink($article->ID)?>"><?php echo $article->post_title ?></a></h3>

  <?php
  if(get_post_thumbnail_id($article->ID)):
  list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($article->ID),'news-tn');
  ?>
   <figure><a href="<?php echo get_permalink($article->ID)?>"><img src="<?php echo $src ?>" /></a></figure>
 <?php endif ?>
<p><?php echo $article->post_excerpt ?></p>




<p><small>Date posted: <time datetime="<?php echo mysql2date('Y-M-d', $post->post_date); ?>"><?php echo mysql2date('d/m/Y', $article->post_date); ?></time></small></p>
</article>
<?php endforeach ?>
<?php endif ?>

</div>
<?php
$next_page = $page+1;
?>
<footer><a href="/news-events/archive/type/<?php echo $type_id ?>/category/<?php echo $category_id ?>/pge/<?php echo $next_page ?>" class="more-posts<?php if($next_page > $max_num_pages): ?> end<?php endif ?>"><span>View More</span></a></footer>

</section>
<!--/intro-->

</div>
<!--/content-->
<?php get_footer() ?>