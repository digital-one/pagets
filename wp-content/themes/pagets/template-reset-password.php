<?php /* Template Name: Reset Password */ ?>
<?php get_header() ?>
<?php $args = array(
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
    <h2>Login</h2>
   <?php
    if(isset($_GET['login']) && $_GET['login'] == 'failed'):
  ?>
    <div id="login-error" style="background-color: #FFEBE8;border:1px solid #C00;padding:5px;">
      <p>Login failed: You have entered an incorrect Username or password, please try again.</p>
    </div>
  <?php
endif;
?>
   <?php wp_login_form( $args ); ?>
<?php
/*
  <div class='gf_browser_gecko gform_wrapper' id='gform_wrapper_1' >
  <a id='gf_1' name='gf_1' class='gform_anchor' ></a>
  <form method='post' enctype='multipart/form-data' target='gform_ajax_frame_1' id='gform_1'  action='/~bowmanriley/#gf_1'>
  <div class='gform_heading'>
<div class='gform_body'>
<ul id='gform_fields_1' class='gform_fields top_label description_below'>

  

  <li id='field_1_2' class='gfield gfield_contains_required' >
    <label class='gfield_label' for='input_1_2'>Registered email address<span class='gfield_required'>*</span></label>
    <div class='ginput_container'><input name='input_2' id='input_1_2' type='text' value='' class='medium'  tabindex='1'   /></div>
  </li>
  <li id='field_1_2' class='gfield gfield_contains_required' >
    <label class='gfield_label' for='input_1_2'>Password<span class='gfield_required'>*</span></label>
    <div class='ginput_container'><input name='input_2' id='input_1_2' type='text' value='' class='medium'  tabindex='1'   /></div>
  </li>
 </ul>
 <a href="#">Forgotten Password?</a>
 </div>
 <div class='gform_footer top_label'>
  <input type='submit' id='gform_submit_button_1' class='gform_button button' value='Log in' tabindex='5' onclick='if(window["gf_submitting_1"]){return false;}  window["gf_submitting_1"]=true; '/>
</div>
 </form>
</div>
*/
?>

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