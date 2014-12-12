<?php /* Template Name: Shop */ ?>
<?php get_header() ?>
<!--content-->
<div class="content container shop">
  <!--intro-->
<header>

<div class="alpha">
  <div class="gutter-right">
 <?php echo $post->post_content ?>
</div>
</div>
<aside>
		 <?php
if(get_field('page_banners',$post->ID)): 
while(the_repeater_field('page_banners',$post->ID)): 
 $banner = get_sub_field('banner');
echo do_shortcode($banner->post_content);
  endwhile;
  endif;
  ?>
</aside>
</header>
<!--/intro-->
<?php
$args = array(
	"post_type" => "product",
	"post_status" => "publish",
	"order_by" => "menu_order",
	"order" => "ASC",
	"posts_per_page" => -1
	);
if($products = get_posts($args)): ?>
<ul class="post-list">
	<?php foreach($products as $product): ?>
	<?php
	$has_feature = get_post_thumbnail_id($product->ID);
	$class = $has_feature ? ' class="has-feature"' : '';
	?>
<li<?php echo $class ?>>
<?php if($has_feature): ?>
	<?php list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($product->ID),'people-image'); ?>
	<div class="beta">
<figure style="background-image:url('<?php echo $src ?>');"><?php echo $product->post_title ?></figure>
</div>
<?php endif ?>
<div class="alpha">
<h3><?php echo $product->post_title ?></h3>
<p class="price">&pound;<?php echo get_field('product_price',$product->ID) ?> GBP</p>
<?php echo $product->post_content ?>
<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="neil@digital-one.co.uk">
<input type="hidden" name="lc" value="GB">
<input type="hidden" name="item_name" value="<?php echo $product->post_title ?>">
<input type="hidden" name="item_number" value="<?php echo 'PA'.$product->ID?>">
<input type="hidden" name="amount" value="<?php echo get_field('product_price',$product->ID) ?>">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="button_subtype" value="products">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="shipping" value="<?php echo get_field('product_shipping',$product->ID) ?>">
<input type="hidden" name="add" value="1">
<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
</div>

  </li>
<?php endforeach ?>

</ul>
<?php endif ?>
</div>
<!--/content-->
<?php include_once('footer.php') ?> 