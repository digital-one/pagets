<?php
if (isset($_POST["update_contact_settings"])) {
    save_contact_settings();
}

 add_submenu_page('theme_settings',  'Contact Details', 'Contact Details', 'manage_options', 'general', 'theme_contact_settings'); 

function save_contact_settings(){
    $address_name = esc_attr($_POST["address_name"]);
    $address_line_1 = esc_attr($_POST["address_line_1"]);
    $address_line_2 = esc_attr($_POST["address_line_2"]);
    $address_line_3 = esc_attr($_POST["address_line_3"]);
    $address_town_city = esc_attr($_POST["address_town_city"]);
    $address_county = esc_attr($_POST["address_county"]);
    $address_postcode = esc_attr($_POST["address_postcode"]);
    $general_info_tel = esc_attr($_POST["general_info_tel"]);
    $nurse_helpline_tel = esc_attr($_POST["nurse_helpline_tel"]);
    $charity_no =  esc_attr($_POST["charity_no"]);
    update_option("address_name", $address_name);
    update_option("address_line_1", $address_line_1);
    update_option("address_line_2", $address_line_2);
    update_option("address_line_3", $address_line_3);
    update_option("address_town_city", $address_town_city);
    update_option("address_county", $address_county);
    update_option("address_postcode", $address_postcode);
    update_option("general_info_tel", $general_info_tel);
    update_option("nurse_helpline_tel", $nurse_helpline_tel);
    update_option("charity_no", $charity_no);
}

function theme_contact_settings(){
    $address_name = get_option("address_name");
    $address_line_1 = get_option("address_line_1");
    $address_line_2 = get_option("address_line_2");
    $address_line_3 = get_option("address_line_3");
    $address_town_city = get_option("address_town_city");
    $address_county = get_option("address_county");
    $address_postcode = get_option("address_postcode");
    $general_info_tel = get_option("general_info_tel");
    $nurse_helpline_tel = get_option("nurse_helpline_tel");
    $charity_no = get_option("charity_no");

    ?>
        <div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Contact Details</h2>
 
        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="address_name">
                            Address Name:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="address_name" size="46" value="<?php echo $address_name;?>"  />
                    </td>
                </tr>
                  <tr valign="top">
                    <th scope="row">
                        <label for="address_line_1">
                            Address:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="address_line_1" size="46" value="<?php echo $address_line_1;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="address_line_2">
                           &nbsp;
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="address_line_2" size="46" value="<?php echo $address_line_2;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="address_line_3">
                          &nbsp;
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="address_line_3" size="46" value="<?php echo $address_line_3;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="address_town_city">
                            Town/City:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="address_town_city" size="46" value="<?php echo $address_town_city;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="address_county">
                            County:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="address_county" size="46" value="<?php echo $address_county;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="address_postcode">
                            Postcode:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="address_postcode" size="46" value="<?php echo $address_postcode;?>"  />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="general_info_tel">
                            General Info Telephone:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="general_info_tel" size="46" value="<?php echo $general_info_tel;?>"  />
                    </td>
                </tr>
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
                        <label for="charity_no">
                            Charity Number:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="charity_no" size="46"  value="<?php echo $charity_no;?>"  />
                    </td>
                </tr>
                <tr><td>
    <input type="submit" value="Save settings" class="button-primary"/></td></tr>
            </table>
            <input type="hidden" name="update_contact_settings" value="Y" />
        </form>
    </div>
<?php
}
?>