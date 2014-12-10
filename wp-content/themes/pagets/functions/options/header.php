<?php

if (isset($_POST["update_header_settings"])) {
    save_header_settings();
}

 add_submenu_page('theme_settings',  'Header', 'Header', 'manage_options', 'header', 'theme_header_settings'); 


 function save_header_settings(){
    $site_logo_svg_attachment_id = esc_attr($_POST["site_logo_svg_attachment_id"]);
    $site_logo_png_attachment_id = esc_attr($_POST["site_logo_png_attachment_id"]);
    update_option("site_logo_svg_attachment_id", $site_logo_svg_attachment_id);
    update_option("site_logo_png_attachment_id", $site_logo_png_attachment_id);
}

function theme_header_settings(){
    $site_logo_svg_attachment_id = get_option("site_logo_svg_attachment_id");
    $site_logo_png_attachment_id = get_option("site_logo_png_attachment_id");
    ?>
        <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Header</h2>
 
        <form method="POST" action="">
            <table class="form-table">
               
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
                <tr><td>
    <input type="submit" value="Save settings" class="button-primary"/></td></tr>
            </table>
            <input type="hidden" name="update_header_settings" value="Y" />
        </form>
    </div>
   <?php
}
?>