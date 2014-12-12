<?php //$login = new loginclass() ?>

<div class="gform_wrapper">
<form id="login" method="post" action="">
  <div class="gform_heading">
<h3 class="gform_title">Login</h3>
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
  <li><label class='gfield_label' for="user_email">Password<span class='gfield_required'>*</span></label>
<div class='ginput_container'><input name='user_pass' id='user_pass' type='password' value='' class='medium'  /></div>
</li>
</ul>
<a href="<?php echo get_permalink(429) ?>?action=lostpassword">Forgotten Password?</a>
 </div>
 <div class='gform_footer top_label'>
  <button type="submit" class="button">Log in</button>
 <input name="action" type="hidden" value="login" />
</div>
  </form>
</div>