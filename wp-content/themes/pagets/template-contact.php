<?php /* Template Name: Contact */ ?>
<?php get_header() ?>
<!--content-->
<div id="contact" class="content container">
  <section id="intro">
<h1>Contact us</h1>
</section>
<div class="alpha">
  <div class="box tint">
<!--<h2>Make an enquiry</h2>-->
 <?php echo do_shortcode('[gravityform id="1" title="true" ajax="true"]') ?>
</div>
</div>
<div class="beta">
  <div class="box tint">
    <h2>Find us</h2>
    <div class="alpha"><address>
<?php if(get_option('address_name')):?><?php echo get_option('address_name')?><br /> <?php endif ?>
<?php if(get_option('address_line_1')):?><?php echo get_option('address_line_1')?><br /> <?php endif ?>
<?php if(get_option('address_line_2')):?><?php echo get_option('address_line_2')?><br /> <?php endif ?>
<?php if(get_option('address_line_3')):?><?php echo get_option('address_line_3')?><br /> <?php endif ?>
<?php if(get_option('address_town_city')):?><?php echo get_option('address_town_city')?><br /> <?php endif ?>  
<?php if(get_option('address_county')):?><?php echo get_option('address_county')?><br /> <?php endif ?>  
<?php if(get_option('address_postcode')):?><?php echo get_option('address_postcode')?><?php endif ?>
</address>
<?php if(get_option('address_google_map_url')):?><a href="<?php echo get_option('address_google_map_url') ?>"  target="_blank" class="map">Open in Google Maps</a><?php endif ?>  

</div>
    <div class="beta"><p>
      <?php if(get_option('general_info_tel')):?><strong>General Info:</strong> <a href="tel:<?php echo str_replace(' ','',get_option('general_info_tel')) ?>"><?php echo get_option('general_info_tel') ?></a><br /><?php endif ?>
<?php if(get_option('nurse_helpline_tel')):?><strong>Nurse Helpline:</strong> <a href="tel:<?php echo str_replace(' ','',get_option('nurse_helpline_tel')) ?>"><?php echo get_option('nurse_helpline_tel') ?></a><?php endif ?></p></div>

  </div>
     <?php
if(get_field('page_banners',$post->ID)): 
while(the_repeater_field('page_banners',$post->ID)): 
 $banner = get_sub_field('banner');
echo do_shortcode($banner->post_content);
  endwhile;
  endif;
  ?>
</div>
</div>
<!--/content-->
<?php get_footer() ?>