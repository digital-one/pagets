<?php /* Template Name: Two Column */ ?>
<?php get_header() ?>
<!--content-->
<div  class="content container two-column main-right">
 <!--left sidebar -->
<aside id="left-sidebar">
<nav id="sub-nav">
<ul>
<li class="current-menu-item"><a href="#">Centres of Excellence</a></li>
<li><a href="#">Talk to others who have Paget’s disease</a></li>
<li class="menu-item-has-children current-menu-item"><a href="#">Local Support</a>
  <ul class="sub-menu">
    <li><a href="">Third level nav if ever required</a></li>
<li><a href="">Third level nav if ever required</a></li></ul>
</li>
<li><a href="#">Links to other</a></li>
<li><a href="#">Organisations</a></li>
<li><a href="#">Nurse Helpline</a></li>
<li><a href="#">Paget’s Newsletter</a></li>
</ul>
</nav>
</aside>
<!--/left sidebar-->
<!--main-->
<div id="main" role="main">
<?php echo do_shortcode($post->post_content) ?>
</div>
<!--/main-->
</div>
</div>
<!--/content-->
<?php get_footer() ?>