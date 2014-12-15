<?php

if (isset($_POST["update_footer_settings"])) {
    save_footer_settings();
}

 add_submenu_page('theme_settings',  'Footer', 'Footer', 'manage_options', 'footer', 'theme_footer_settings'); 


 function save_footer_settings(){
   // $site_logo_svg_attachment_id = esc_attr($_POST["site_logo_svg_attachment_id"]);
  //  $site_logo_png_attachment_id = esc_attr($_POST["site_logo_png_attachment_id"]);
    $footer_text = esc_attr($_POST["footer_text"]);
    $footer_logo_1_attachment_id= esc_attr($_POST["footer_logo_1_attachment_id"]);

    $footer_logo_1_url = esc_attr($_POST["footer_logo_1_url"]);
    $footer_logo_1_strapline = esc_attr($_POST["footer_logo_1_strapline"]);
    $footer_logo_2_attachment_id = esc_attr($_POST["footer_logo_2_attachment_id"]);
    $footer_logo_2_url = esc_attr($_POST["footer_logo_2_url"]);
    $footer_logo_2_strapline = esc_attr($_POST["footer_logo_2_strapline"]);
    update_option("footer_logo_1_attachment_id", $footer_logo_1_attachment_id);
      update_option("footer_logo_1_url", $footer_logo_1_url);
       update_option("footer_logo_1_strapline", $footer_logo_1_strapline);
       update_option("footer_logo_2_attachment_id", $footer_logo_2_attachment_id);
      update_option("footer_logo_2_url", $footer_logo_2_url);
       update_option("footer_logo_2_strapline", $footer_logo_2_strapline);
    update_option("footer_text", $footer_text);
}

function theme_footer_settings(){
    $footer_text = get_option("footer_text");
    $footer_logo_1_attachment_id = get_option("footer_logo_1_attachment_id");
    $footer_logo_1_url = get_option("footer_logo_1_url");
    $footer_logo_1_strapline = get_option("footer_logo_1_strapline");
    $footer_logo_2_attachment_id = get_option("footer_logo_2_attachment_id");
    $footer_logo_2_url = get_option("footer_logo_2_url");
    $footer_logo_2_strapline = get_option("footer_logo_2_strapline");
   // $site_logo_svg_attachment_id = get_option("site_logo_svg_attachment_id");
   // $site_logo_png_attachment_id = get_option("site_logo_png_attachment_id");
    ?>
        <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Footer</h2>
 
        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="footer_text">
                            Footer Text:
                        </label> 
                    </th>
                    <td>
                        <textarea name="footer_text" rows="8"  style="width:80%;"><?php echo $footer_text ?></textarea>
                    </td>
                </tr>
                
                 <tr valign="top">
                    <th scope="row">
                        <label for="footer_logo_1_attachment_id">
                           Footer Logo 1:
                        </label> 
                    </th>
                    <td>
                        <?php
                        $display='none';
                        $src='';
                        if($footer_logo_1_attachment_id):
                            $display='block';
                        list($src,$w,$h) = wp_get_attachment_image_src($footer_logo_1_attachment_id,'full');
                        endif;
                        ?>
                        <img src="<?php echo $src; ?>" class="attachment-icon" style="display:<?php echo $display?>"  /><br />
                        <button type="button" class="attachment-select">Select File</button>
                        <input type="hidden" class="attachment-id" name="footer_logo_1_attachment_id" value="<?php echo $footer_logo_1_attachment_id ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="footer_logo_1_strapline">
                            Footer Logo 1 Strapline:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="footer_logo_1_strapline" style="width:80%;" value="<?php echo $footer_logo_1_strapline ?>" />
                    </td>
                </tr>

                  <tr valign="top">
                    <th scope="row">
                        <label for="footer_logo_1_url">
                            Footer Logo 1 URL:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="footer_logo_1_url"  style="width:80%;" width="100%" value="<?php echo $footer_logo_1_url ?>" />
                    </td>
                </tr>


                <tr valign="top">
                    <th scope="row">
                        <label for="footer_logo_2_attachment_id">
                           Footer Logo 2:
                        </label> 
                    </th>
                    <td>
                        <?php
                        $display='none';
                        $src='';
                        if($footer_logo_2_attachment_id):
                            $display='block';
                        list($src,$w,$h) = wp_get_attachment_image_src($footer_logo_2_attachment_id,'full');
                        endif;
                        ?>
                        <img src="<?php echo $src; ?>" class="attachment-icon" style="display:<?php echo $display?>"  /><br />
                        <button type="button" class="attachment-select">Select File</button>
                        <input type="hidden" class="attachment-id" name="footer_logo_2_attachment_id" value="<?php echo $footer_logo_2_attachment_id ?>" />
                    </td>
                </tr>
  <tr valign="top">
                    <th scope="row">
                        <label for="footer_logo_2_strapline">
                            Footer Logo 2 Strapline:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="footer_logo_2_strapline"  style="width:80%;"  value="<?php echo $footer_logo_2_strapline ?>" />
                    </td>
                </tr>
                  <tr valign="top">
                    <th scope="row">
                        <label for="footer_logo_2_url">
                            Footer Logo 2 URL:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="footer_logo_2_url"  style="width:80%;"  value="<?php echo $footer_logo_2_url ?>" />
                    </td>
                </tr>
                <tr><td>
    <input type="submit" value="Save settings" class="button-primary"/></td></tr>
            </table>
            <input type="hidden" name="update_footer_settings" value="Y" />
        </form>
    </div>
   <?php
}
?>