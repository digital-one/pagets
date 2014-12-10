<?php
add_action("admin_menu", "setup_theme_admin_menus");

function setup_theme_admin_menus() {

    add_menu_page('Theme settings', 'Theme Settings', 'manage_options',  'theme_settings', 'theme_settings_page');
    get_template_part('functions/options/contact');
    get_template_part('functions/options/header');
    get_template_part('functions/options/footer'); 
    get_template_part('functions/options/social');
}


// We also need to add the handler function for the top level menu
function theme_settings_page() {
    echo "Settings home page";
}

?>