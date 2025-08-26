<?php

function my_plugin_admin_scripts(){
    wp_enqueue_style('my-plugin-admin-css' , MY_PLUGIN_DIR_URL . 'admin/css/admin.css');
    wp_enqueue_script('my-plugin-admin-js' , MY_PLUGIN_DIR_URL . 'admin/js/admin.js');
};
add_action('admin_enqueue_scripts' , 'my_plugin_admin_scripts');


function my_plugin_public_scripts(){
    wp_enqueue_style('my-plugin-public-css' , MY_PLUGIN_DIR_URL . 'public/css/public.css');
    wp_enqueue_script('my-plugin-public-js' , MY_PLUGIN_DIR_URL . 'public/js/public.js' , true);
}
add_action('wp_enqueue_scripts' , 'my_plugin_public_scripts');

