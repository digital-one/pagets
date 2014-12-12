<?php $login = new loginclass(); ?>
<?php /* Template Name: Register/Login */ ?>
<?php get_header() ?>
<?php 
/*
$args = array(
        'echo' => true,
        //'redirect' => site_url( $_SERVER['REQUEST_URI'] ), 
        'redirect' => get_permalink( get_page( 1 )),
        'form_id' => 'loginform',
        'label_username' => __( 'Registered email address' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'id_username' => 'user_login',
        'id_password' => 'user_pass',
        'id_remember' => 'rememberme',
        'id_submit' => 'wp-submit',
        'remember' => true,
        'value_username' => NULL,
        'value_remember' => false );


*/


?>
<!--content-->
<div id="contact" class="content container">
  <section id="intro">
<h1>Member Area Access</h1>
</section>
<div class="alpha">
  <header><p>Please complete the registration form below, once registered you will receive our FREE Paget’s Newsletter via email.</p></header>
  <div class="box tint">
<!--<h2>Register</h2>-->
  <?php echo do_shortcode('[gravityform id="2" title="true" ajax="false"]') ?>

</div>
</div>
<div class="beta">
 <header> <p>Please login to the Paget’s Association Members Area below</p></header>
  <div class="box tint">
<?php get_template_part('login-form') ?>
</div>
  <div class="box keyline">
<h4>Alternative to online registration</h4>
  <p>To receive information by post please download a membership form.</p>
  <p><a href="#" class="button">DOwnload</a></p>
  </div>
</div>
</div>
<!--/content-->
<?php get_footer() ?> 