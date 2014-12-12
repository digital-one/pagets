<?php
//$login = new loginclass();
?>
<div class="gform_wrapper">
<form id="login" method="post" action="<?php echo get_permalink(429) ?>">
  <div class="gform_heading">
<h3 class="gform_title">Reset Password</h3>
<span class="gform_description"></span>
</div>
   <?php if(!empty($login->message)): ?>
  <div class="validation_error"><?php echo $login->message ?></div>
<?php endif ?>
  <div class='gform_body'>
  <ul>
    <?php
    $email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
?>
    <li><label class='gfield_label' for="user_email">Registered Email Address<span class='gfield_required'>*</span></label>
<div class='ginput_container'><input name='user_email' id='user_email' type='text' value='<?php echo $email ?>' class='medium'    /></div>
</li>
</ul>
<a href="<?php echo get_permalink(429) ?>">Login</a>
 </div>
 <div class='gform_footer top_label'>
  <button type="submit" class="button">Submit</button>
 <input name="action" type="hidden" value="reset_pwd" />
 <input name="reset_pwd_nonce" type="hidden" value="<?php echo wp_create_nonce( 'reset_pwd_nonce' ); ?>" />
</div>
  </form>
</div>