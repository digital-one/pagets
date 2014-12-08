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
  <li><a href="">Google Plus</a></li>
    <li><a href="" class="facebook">Facebook</a></li>
      <li><a href="" class="twitter">Twitter</a></li>
        <li><a href="" class="pinterest">Pinterest</a></li>
          <li><a href="" class="linkedin">Linkedin</a></li>
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
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
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
<small>&copy; Paget's Association Charity No: 266071</small>
<address>Suite 5, Moorfield House, Moorside Road, Swinton, Manchester M27 0EW</address>
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
</body>
</html>