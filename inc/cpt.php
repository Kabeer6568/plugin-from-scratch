<?php

// Register Custom Post Type
function register_projects_post_type() {
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
add_action('init', 'register_projects_post_type', 0);
