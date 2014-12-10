<?php

if (isset($_POST["update_footer_settings"])) {
    save_footer_settings();
}

 add_submenu_page('theme_settings',  'Footer', 'Footer', 'manage_options', 'footer', 'theme_footer_settings'); 


 function save_footer_settings(){
   // $site_logo_svg_attachment_id = esc_attr($_POST["site_logo_svg_attachment_id"]);
  //  $site_logo_png_attachment_id = esc_attr($_POST["site_logo_png_attachment_id"]);
    $footer_text = esc_attr($_POST["footer_text"]);
    update_option("footer_text", $footer_text);
}

function theme_footer_settings(){
    $footer_text = get_option("footer_text");
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
                        <textarea name="footer_text" rows="8" width="100%"><?php echo $footer_text ?></textarea>
                    </td>
                </tr>
                <?php
                /*
                 <tr valign="top">
                    <th scope="row">
                        <label for="nurse_helpline_tel">
                            Nurse Helpline Telephone:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="nurse_helpline_tel" size="46"  value="<?php echo $nurse_helpline_tel;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="site_logo_svg_attachment_id">
                            Site Logo (SVG):
                        </label> 
                    </th>
                    <td>
                        <?php
                        $display='none';
                        $src='';
                        if($site_logo_svg_attachment_id):
                            $display='block';
                        list($src,$w,$h) = wp_get_attachment_image_src($site_logo_svg_attachment_id,'full');
                        endif;
                        ?>
                        <img src="<?php echo $src; ?>" class="attachment-icon" style="display:<?php echo $display?>" width="198" height="79" /><br />
                        <button type="button" class="attachment-select">Select File</button>
                        <input type="hidden" class="attachment-id" name="site_logo_svg_attachment_id" value="<?php echo $site_logo_svg_attachment_id ?>" />
                    </td>
                </tr>
               
                <tr valign="top">
                    <th scope="row">
                        <label for="site_logo_png_attachment_id">
                            Site Logo (PNG):
                        </label> 
                    </th>
                    <td>
                        <?php
                        $display='none';
                        $src='';
                        if($site_logo_png_attachment_id):
                            $display='block';
                        list($src,$w,$h) = wp_get_attachment_image_src($site_logo_png_attachment_id,'full');
                        endif;
                        ?>
                        <img src="<?php echo $src; ?>" class="attachment-icon" style="display:<?php echo $display?>" width="198" height="79" /><br />
                        <button type="button" class="attachment-select">Select File</button>
                        <input type="hidden" class="attachment-id" name="site_logo_png_attachment_id" value="<?php echo $site_logo_png_attachment_id ?>" />
                    </td>
                </tr>
                */
                ?>
                <tr><td>
    <input type="submit" value="Save settings" class="button-primary"/></td></tr>
            </table>
            <input type="hidden" name="update_footer_settings" value="Y" />
        </form>
    </div>
   <?php
}
?>