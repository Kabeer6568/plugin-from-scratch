<?php
function my_plugin_menu(){
add_menu_page(
    'My New Plugin',
    'New Plugin',
    'manage_options',
    'new-plugin',
    'my_plugin_options_page_html',
    'dashicons-admin-site',
    20
);

add_submenu_page(
	'new-plugin',
	'My Plugin Sub Page',
	'Sub Menu',
	'manage_options',
	'sub-menu',
	'my_plugin_submenu_options_page_html'
);
}
add_action('admin_menu' , 'my_plugin_menu');