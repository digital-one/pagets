<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title()?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="p:domain_verify" content="6402a01c093e0e45e578dc078821eb46" />
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
         <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
        <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->
        <!--[if lte IE 9]>
          <script src="js/respond.min.js"></script>
        <![endif]-->
         <?php wp_head() ?>
    </head>
    <body<?php if(is_front_page()): ?> id="home"<?php endif ?>>
<header id="header">
<div class="container">
       <? list($src,$w,$h) = wp_get_attachment_image_src(get_option('site_logo_svg_attachment_id'),'full'); ?>
    <?php if(is_front_page()): ?>

<h1 id="home-link"><img src="<?php echo $src ?>" alt="Paget's Association" /></h1>
<?php else: ?>
<a id="home-link" href="<?php echo home_url() ?>" alt="Paget's Association" /><img src="<?php echo $src ?>" alt="Paget's Association" /></a>
    <?php endif ?>
<!--secondary nav-->
<nav id="secondary-nav" role="navigation">

  <!--  <ul><li><a href="pagets-disease.php">About Us</a></li><li><a href="register-login.php">Membership / Login</a></li><li><a href="remembrance-garden.php">Remember Someone</a></li><li><a href="shop.php">Shop</a></li><li><a href="contact.php">Contact Us</a></li></ul> -->
  <?php
  wp_nav_menu( array(
        'menu'=>'Secondary Navigation',
        'container' => false, 
        'fallback_cb' => 'wp_page_menu',
        'walker' => new navWalker()
        //'menu_class' => 'inline',
        //'link_after' => '<span></span>'
        )
    );
    ?>
</nav>

<!--/secondary nav-->
<div id="ribbon"><div><span>General Info <a href="tel:<?php echo str_replace(' ','',get_option('general_info_tel'))?>"><?php echo get_option('general_info_tel')?></a></span><span>Nurse Helpline <a href="tel:<?php echo str_replace(' ','',get_option('nurse_helpline_tel'))?>"><?php echo get_option('nurse_helpline_tel')?></a></span></div></div>
</div>
</header>
<!--/header-->
<!-- mobile search panel -->
<div id="mobile-search-panel" class="panel">
<h3>What are you looking for?</h3>
<form method="post" action="">
<input type="text" name="s" id="s" placeholder="Search the site" />
    </form>
</div>
<!-- /mobile search panel-->
<div id="mobile-contact-panel" class="panel">
<h3>Contact Us</h3>
<p class="tel-numbers">
<span>General Number: <a href="tel:<?php echo str_replace(' ','',get_option('general_info_tel')) ?>"><strong><?php echo get_option('general_info_tel') ?></strong></a></span>
<span>Nurse Helpline: <a href="tel:<?php echo str_replace(' ','',get_option('nurse_helpline_tel')) ?>"><strong><?php echo get_option('nurse_helpline_tel') ?></strong></a></span>
</p>
<address>
<?php if(get_option('address_name')):?><?php echo get_option('address_name')?><br /> <?php endif ?>
<?php if(get_option('address_line_1')):?><?php echo get_option('address_line_1')?><br /> <?php endif ?>
<?php if(get_option('address_line_2')):?><?php echo get_option('address_line_2')?><br /> <?php endif ?>
<?php if(get_option('address_line_3')):?><?php echo get_option('address_line_3')?><br /> <?php endif ?>
<?php if(get_option('address_town_city')):?><?php echo get_option('address_town_city')?><br /> <?php endif ?>  
<?php if(get_option('address_county')):?><?php echo get_option('address_county')?><br /> <?php endif ?>  
<?php if(get_option('address_postcode')):?><?php echo get_option('address_postcode')?><?php endif ?>
</address>
<p><a href="#map" class="map">Open Map</a> </p>
<p><a href="#" class="full-width button">Email Us</a></p>
<nav class="social-links">
  <div>
  <h5>Follow us</h5>
<ul>
 <?php if(get_option('gplus_url')): ?> <li><a href="<?php echo get_option('gplus_url') ?>" target="_blank">Google Plus</a></li><?php endif ?>
    <?php if(get_option('facebook_url')): ?> <li><a href="<?php echo get_option('facebook_url') ?>" target="_blank" class="facebook">Facebook</a></li><?php endif ?>
    <?php if(get_option('twitter_url')): ?>   <li><a href="<?php echo get_option('twitter_url') ?>" target="_blank" class="twitter">Twitter</a></li><?php endif ?>
     <?php if(get_option('pinterest_url')): ?>    <li><a href="<?php echo get_option('pinterest_url') ?>" target="_blank" class="pinterest">Pinterest</a></li><?php endif ?>
     <?php if(get_option('linkedin_url')): ?>      <li><a href="<?php echo get_option('linkedin_url') ?>" target="_blank" class="linkedin">Linkedin</a></li><?php endif ?>
        </ul>
      </div>
      </nav>
</div>
<!-- mobile nav -->
<nav id="mobile-controls"><ul><li class="search"><a href="" rel="mobile-search-panel">Search</a></li><li class="tel"><a href="" rel="mobile-contact-panel">Telephone</a></li><li class="menu"><a href="" rel="nav">Menu</a></li></ul></nav>
<!-- /mobile nav -->
<!--main nav-->
<nav id="nav" role="navigation" class="panel">
    <a href="#" id="mobile-prev">Previous</a>
  <div class="container">
    <?php
 $nav =  wp_nav_menu( array(
        'menu'=>'Main Navigation',
        'container' => false, 
        'fallback_cb' => 'wp_page_menu',
        'echo'       => false,
        //'items_wrap' => '&nbsp;',
        'walker' => new navWalker()
        //'walker' => new subMenu()
        //'menu_class' => 'inline',
        //'link_after' => '<span></span>'
        )
    );
$nav = preg_replace(array('#^<ul[^>]*>#','#</ul>$#'), '', $nav);
if(is_user_logged_in()):
$nav .= '<li class="mobile-only"><a href="'.wp_logout_url(home_url()).'">Logout</a></li>';
    endif;
    echo '<ul>'.$nav.'</ul>';
    ?>
<!--<ul><li class="current-menu-item"><a href="/~pagetorg/">Home</a></li><li class="menu-item-has-children"><a href="info-support.php">Information &amp; Support</a><ul class="sub-menu"><li><a href="#">Sub link</a></li><li><a href="#">Sub link</a></li><li><a href="#">Sub link</a></li><li><a href="#">Sub link</a></li></ul></li><li><a href="">Research</a></li><li><a href="professionals.php">Professionals</a></li><li><a href="news-events.php">News &amp; Events</a></li><li><a href="">Get Involved</a></li></ul>-->

<?php /*<a href="<?php echo get_permalink(45) ?>" class="donate">Donate</a> */ ?>
</div>
</nav>
<!--/main nav-->
<?php if(!is_front_page()): ?>
<!--breadcrumb-->
<div id="breadcrumb"><div class="container">
  <?php if(function_exists('bcn_display')){
        bcn_display();
    }?>
    <!--<a href="">Home</a> > <a href="">Information &amp; Support</a> > Local Support--></div></div>
<!--/breadcrumb-->
<?php endif ?>