<?php


//function to generate the email validation url
function validate_url() {
  global $post;
  $page_url = esc_url(get_permalink( $post->ID ));
  $urlget = strpos($page_url, "?");
  if ($urlget === false) {
    $concate = "?";
  } else {
    $concate = "&";
  }
  return $page_url.$concate;
}

function sendPasswordResetEmail(){
    //send  password reset confirmation email
    $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
    $message .= get_option('siteurl') . "\r\n\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
    $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
    $message .= validate_url() . "action=reset_pwd&key=$key&login=" . rawurlencode($user_login) . "\r\n";
    if ( $message && !wp_mail($user_email, 'Password Reset Request', $message) ):
      return false;
    endif;
    return true;
}


function processLogin(){
global $wpdb, $user_ID;


 if (!$user_ID): //block logged in users

global $user;
$creds = array();

 $status = array(
  "message" => "",
  "show_form_id" => "",
  "user" => ""
  );

 //----------------------- handle login  -----------------------------//

if(isset($_POST['action']) and $_POST['action'] == "login"):
$error=false;
   $status['show_form_id'] = 'login';
  $username = $_POST['user_email'];
  $password = $_POST['user_pass'];
  if(empty($username) and empty($password)):
$error=true;
endif;
if(empty($username) and !empty($password)):
$status['message'] = "The email field is empty.";
$error=true;
endif;
if(!empty($username) and empty($password)):
$status['message'] = "The password field is empty.";
$error=true;
  endif;
  if(!$error):
$creds['user_login'] = $username;
$creds['user_password'] =  $password;
$creds['remember'] = false;
$user = wp_signon( $creds, false );
if(is_wp_error($user)):
  //login failed
  $status['message'] = $user->get_error_message();
//echo $user->get_error_message();
else:
  //login ok, redirect
wp_redirect(home_url('member-area'));
endif;
endif;
   //
endif;


//----------------------- handle password reset link from email  -----------------------------//

  if(isset($_GET['key']) && $_GET['action'] == "reset_pwd"):
    $reset_key = $_GET['key'];
    $user_login = $_GET['login'];
    $user_data = $wpdb->get_row($wpdb->prepare("SELECT ID, user_login, user_email FROM $wpdb->users WHERE user_activation_key = %s AND user_login = %s", $reset_key, $user_login));
    
    $user_login = $user_data->user_login;
    $user_email = $user_data->user_email;
    
    if(!empty($reset_key) && !empty($user_data)): //if user found
      //ok, show update password form
      $status['message'] = 'Enter your new password.';
      $status['show_form_id'] = "update_pwd";
      $status['user'] = $user_data;

      else:

      $status['message'] = 'Key expired or invalid. Please request password reset again.';
      $status['show_form_id'] = "reset_pwd";

     endif;
      /*
      $new_password = wp_generate_password(7, false);
        //echo $new_password; exit();
        wp_set_password( $new_password, $user_data->ID );
        //mailing reset details to the user
      $message = __('Your new password for the account at:') . "\r\n\r\n";
      $message .= get_option('siteurl') . "\r\n\r\n";
      $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
      $message .= sprintf(__('Password: %s'), $new_password) . "\r\n\r\n";
      $message .= __('You can now login with your new password at: ') . get_option('siteurl')."/login" . "\r\n\r\n";
      
      if ( $message && !wp_mail($user_email, 'Password Reset Request', $message) ) {
        echo "<div class='error'>Email failed to send for some unknown reason</div>";
        exit();
      }
      else {
        $redirect_to = get_bloginfo('url')."/login?action=reset_success";
        wp_safe_redirect($redirect_to);
        exit();
      }
    } 
    else exit('Not a Valid Key.');
    */
  endif;


  //----------------------- Handle update password submit  -----------------------------//

if(isset($_POST['action']) and $_POST['action'] == "update_pwd"):
       $status['show_form_id'] = "update_pwd";
     $error=false;
        $pattern = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/'; //at least 8 chars long containing an uppercase letter and number;
  if(!wp_verify_nonce( $_POST['update_pwd_nonce'], "update_pwd_nonce")):
     $status['message'] = "No trick please";
    endif; 
    $pwd = $_POST['user_pwd'];
    $user_id = $_POST['user_id'];
    $pwd_confirm = $_POST['user_pwd_confirm'];
     if(empty($_POST['user_pwd'])): //if username not entered, flag error.
     $status['message'] = "Please enter a password";
     $error=true;
     endif;
     if($pwd!=$pwd_confirm):
        $status['message'] = "Passwords does not match";
      $error=true;
      endif;
      if(!preg_match($pattern, $pwd)):
        $status['message'] = "Password must be at least 8 chars long containing at least one uppercase letter and number";
      $error=true;
        endif;
      if(!$error):
      //password ok, update user details
      wp_set_password( $pwd, $user_id);
     $status['show_form_id'] = "login";
     $status['message'] = "Your password has been successfully reset. Please login.";
      endif;
endif;


  //----------------------- Handle username submit to request password reset -----------------------------//

  if(isset($_POST['action']) and $_POST['action'] == "reset_pwd"):
     $status['show_form_id'] = "reset_pwd";
    if ( !wp_verify_nonce( $_POST['reset_pwd_nonce'], "reset_pwd_nonce")):
      $status['message'] = "No trick please";
    else: //nonce ok

    if(empty($_POST['user_email'])): //if username not entered, flag error.
     $status['message'] = "Please enter your registered email address.";
     else:
      $user_email = $wpdb->escape(trim($_POST['user_email']));
      $user_data = get_user_by_email($user_email);
      if(empty($user_data) || $user_data->caps[administrator] == 1)://delete the condition $user_data->caps[administrator] == 1, if you want to allow password reset for admins also
      $status['message'] = "No user found with that email address.";
      else:
        $user_login = $user_data->user_login;
        $user_email = $user_data->user_email;
        $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
        if(empty($key))://generate reset key
          $key = wp_generate_password(20, false);
          $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));  
          $emailSent = sendPasswordResetEmail();
          if($emailSent):
            $status['message'] = "Check your email for the confirmation link.";
            $status['show_form_id'] = "login";
          else:
            $status['message'] = "Request failed, please try again.";
            $status['show_form_id'] = "reset_pwd";
            endif;
        endif;
      endif; //end if user data
    endif;

    endif; //end nonce ok
//
endif;
return $status;
endif; //close if not user

}

?>