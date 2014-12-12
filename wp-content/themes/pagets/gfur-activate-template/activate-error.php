<?php

global $gw_activate_template;

$result = $gw_activate_template->result;
?>
<div id="breadcrumb"><div class="container">Breadcrumb here ></div></div> 
<div class="content container two-column main-left">
<div id="main" role="main" class="professionals">
    <div class="gutter-right">
<?php
// if the blog is already active or if the blog is taken, display respective messages
if ( $gw_activate_template->is_blog_already_active( $result ) || $gw_activate_template->is_blog_taken( $result ) ):
    $signup = $result->get_error_data();
    ?>
<h1><?php _e('Your account is now active'); ?></h1>
    <p>
        <?php
        if ( $signup->domain . $signup->path == '' ) {
            printf( __( 'Your account has been activated. You may now log in to the site using your chosen username of &#8220;%1$s&#8221;.'),$signup->user_login);
        } else {
            printf( __( 'Your site at <a href="%1$s">%2$s</a> is active. You may now log in to your site using your chosen username of &#8220;%3$s&#8221;. Please check your email inbox at %4$s for your password and login instructions. If you do not receive an email, please check your junk or spam folder. If you still do not receive an email within an hour, you can <a href="%5$s">reset your password</a>.'), 'http://' . $signup->domain, $signup->domain, $signup->user_login, $signup->user_email, wp_lostpassword_url() );
        }
        ?>
    </p>
<p><a href="<?php echo get_permalink(429) ?>" class="button">Log in</a></p>
<?php else: ?>

    <h1><?php _e('An error occurred during the activation'); ?></h1>
    <p><?php echo $result->get_error_message(); ?></p>
<p><a href="<?php echo get_permalink(62) ?>" class="button">REGISTER</a></p>
<?php endif; ?>
</div>
</div>
<aside id="right-sidebar">
     <?php
if(get_field('page_banners',421)): 
while(the_repeater_field('page_banners',421)): 
 $banner = get_sub_field('banner');
echo do_shortcode($banner->post_content);
  endwhile;
  endif;
  ?>
</aside>
</div>