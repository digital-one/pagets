<!--footer-->
<footer id="footer">
	<div class="container">
		  <?php dynamic_sidebar('newsletter-banner'); ?>
<?php
/*
<!--newsletter-->
<a href="" id="newsletter">
<h4><strong>Free</strong> paget’s newsletter</h4>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
<span class="button">Find out more</span>
</a>
<!--/newsletter-->
*/
?>

<!--social-->
<nav class="social-links">
  <h5>Follow us</h5>
<ul>
 <?php if(get_option('gplus_url')): ?> <li><a href="<?php echo get_option('gplus_url') ?>" target="_blank">Google Plus</a></li><?php endif ?>
    <?php if(get_option('facebook_url')): ?> <li><a href="<?php echo get_option('facebook_url') ?>" target="_blank" class="facebook">Facebook</a></li><?php endif ?>
    <?php if(get_option('twitter_url')): ?>   <li><a href="<?php echo get_option('twitter_url') ?>" target="_blank" class="twitter">Twitter</a></li><?php endif ?>
     <?php if(get_option('pinterest_url')): ?>    <li><a href="<?php echo get_option('pinterest_url') ?>" target="_blank" class="pinterest">Pinterest</a></li><?php endif ?>
     <?php if(get_option('linkedin_url')): ?>      <li><a href="<?php echo get_option('linkedin_url') ?>" target="_blank" class="linkedin">Linkedin</a></li><?php endif ?>
        </ul>
      </nav>
<!--/social-->
</div>
	<div id="bottom">
<div class="container">
  <!--left column-->
  <div class="top">
<div class="column left">
<nav id="footer-nav">
 <?php
  wp_nav_menu( array(
        'menu'=>'Footer Navigation',
        'container' => false, 
        'fallback_cb' => 'wp_page_menu'//,
        //'walker' => new subMenu()
        //'menu_class' => 'inline',
        //'link_after' => '<span></span>'
        )
    );
    ?>

	<!--<ul><li><a href="">Site Map</a></li><li><a href="">Privacy Policy</a></li><li><a href="">Terms of Use</a></li></ul>--></nav>
<p><?php echo get_option('footer_text')?></p>
</div>
<div class="column right">
  <div id="logos" class="row">
<a href=""><span class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/the-best-of-salford.png" alt="the best of salford" /></span></a>
<a href=""><span class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/health-unlocked.jpg" alt="Health Unlocked" /></span><span>Connect with others who understand Paget’s disease - <strong>Join today!</strong></span></a>
</div>
  </div>
</div>
<div class="base">
<div class="copyright fit-to-base">
<small>&copy; <?php bloginfo('name'); ?> Charity No: <?php echo get_option('charity_no') ?></small>
<address>
<?php if(get_option('address_name')):?><?php echo get_option('address_name')?>, <?php endif ?>
<?php if(get_option('address_line_1')):?><?php echo get_option('address_line_1')?>, <?php endif ?>
<?php if(get_option('address_line_2')):?><?php echo get_option('address_line_2')?>, <?php endif ?>
<?php if(get_option('address_line_3')):?><?php echo get_option('address_line_3')?>, <?php endif ?>
<?php if(get_option('address_town_city')):?><?php echo get_option('address_town_city')?>, <?php endif ?>	
<?php if(get_option('address_county')):?><?php echo get_option('address_county')?>, <?php endif ?>	
<?php if(get_option('address_postcode')):?><?php echo get_option('address_postcode')?><?php endif ?>
</address>
</div>
<div class="share-links">
<a href="" class="ama">AMA</a>
</div>
</div>
</div>
</div>
</footer>
<!--/footer-->
<!--scripts-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!-- Load jQuery from a local copy if loading from Google fails -->
<script>window.jQuery || document.write('<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.1.min.js"><\/script>')</script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<!-- Load jQuery UI from a local copy if loading from Google fails -->
<script>window.jQuery || document.write('<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"><\/script>')</script>
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.selectbox.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5476fa7267076160" async="async"></script>
<!--/scripts-->
<?php wp_footer() ?>
</body>
</html>