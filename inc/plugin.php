<?php

class My_New_Plugin{
    

    public function __construct() {
        
    $this->load_dependencies();

    add_action('admin_enqueue_scripts' , [$this , 'my_plugin_admin_scripts']);
    add_action('wp_enqueue_scripts' , [$this , 'my_plugin_public_scripts']);
    add_action('init', [$this , 'register_projects_post_type'], 0);
    add_action('admin_menu' , [$this , 'my_plugin_menu']);


    }

    private function load_dependencies(){

        // including taxonomy
        require_once MY_PLUGIN_DIR_PATH . 'inc/taxonomy.php';

        // including short codes
        require_once MY_PLUGIN_DIR_PATH . 'inc/shortcodes.php';


        // including Meta Data
        require_once MY_PLUGIN_DIR_PATH . 'inc/meta.php';

        // including Admin menu
        require_once MY_PLUGIN_DIR_PATH . 'inc/admin-menu.php';
        require_once MY_PLUGIN_DIR_PATH . 'inc/admin-page.php';
        require_once MY_PLUGIN_DIR_PATH . 'inc/admin-settings.php';

    }

    public function my_plugin_admin_scripts(){
        wp_enqueue_style('my-plugin-admin-css' , MY_PLUGIN_DIR_URL . 'admin/css/admin.css');
        wp_enqueue_script('my-plugin-admin-js' , MY_PLUGIN_DIR_URL . 'admin/js/admin.js');
    }

    function my_plugin_public_scripts(){
        wp_enqueue_style('my-plugin-public-css' , MY_PLUGIN_DIR_URL . 'public/css/public.css');
        wp_enqueue_script('my-plugin-public-js' , MY_PLUGIN_DIR_URL . 'public/js/public.js' , true);
    }

    public function register_projects_post_type() {
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'my-basics-plugin'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'my-basics-plugin'),
        'menu_name'            => __('Projects', 'my-basics-plugin'),
        'all_items'            => __('All Projects', 'my-basics-plugin'),
        'add_new_item'         => __('Add New Project', 'my-basics-plugin'),
        'add_new'              => __('Add New', 'my-basics-plugin'),
        'edit_item'            => __('Edit Project', 'my-basics-plugin'),
        'update_item'          => __('Update Project', 'my-basics-plugin'),
        'search_items'         => __('Search Project', 'my-basics-plugin'),
    );

    $args = array(
        'label'                 => __('Project', 'my-basics-plugin'),
        'labels'                => $labels,
        'supports'              => ["title","editor","thumbnail","excerpt","author","comments","custom-fields","revisions","page-attributes"],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-admin-post',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('projects', $args);
}

public function my_plugin_menu(){
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







}

new My_New_Plugin();