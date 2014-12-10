<?php

if (isset($_POST["update_social_links_settings"])) {
    save_social_links_settings();
}

    add_submenu_page('theme_settings',  'Social Links', 'Social Links', 'manage_options', 'social-links', 'theme_social_links_settings'); 

function save_social_links_settings(){
	$facebook_url = esc_attr($_POST["facebook_url"]);  
	$twitter_url = esc_attr($_POST["twitter_url"]); 
	$linkedin_url = esc_attr($_POST["linkedin_url"]); 
    $gplus_url = esc_attr($_POST["gplus_url"]); 
    $pinterest_url = esc_attr($_POST["pinterest_url"]); 
	update_option("facebook_url", $facebook_url);
	update_option("twitter_url", $twitter_url);
	update_option("linkedin_url", $linkedin_url);
    update_option("gplus_url", $gplus_url);
    update_option("pinterest_url", $pinterest_url);
    //header options
    
}

function theme_social_links_settings(){
	$facebook_url = get_option("facebook_url");
	$twitter_url = get_option("twitter_url");
	$linkedin_url = get_option("linkedin_url");
	$gplus_url = get_option("gplus_url");
    $pinterest_url = get_option("pinterest_url");
	?>
	<div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Social Links</h2>
 
        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook_url">
                            Facebook:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="facebook_url" size="46" value="<?php echo $facebook_url;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="twitter_url">
                            Twitter:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="twitter_url" size="46"  value="<?php echo $twitter_url;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="linkedin_url">
                            LinkedIn:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="linkedin_url" size="46" value="<?php echo $linkedin_url;?>"  />
                    </td>
                </tr>
               
                 <tr valign="top">
                    <th scope="row">
                        <label for="gplus_url">
                            Google Plus:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="gplus_url" size="46" value="<?php echo $gplus_url;?>"  />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="pinterest_url">
                            Pinterest:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="pinterest_url" size="46" value="<?php echo $pinterest_url;?>"  />
                    </td>
                </tr>
                <tr><td>
    <input type="submit" value="Save settings" class="button-primary"/></td></tr>
            </table>
            <input type="hidden" name="update_social_links_settings" value="Y" />
        </form>
    </div>

    <?php
}

    ?>