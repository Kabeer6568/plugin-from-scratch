<?php

// Register Custom Taxonomy
function register_industry_taxonomy() {
    $labels = array(
        'name'                       => _x('Industries', 'Taxonomy General Name', 'my-basics-plugin'),
        'singular_name'              => _x('Industry', 'Taxonomy Singular Name', 'my-basics-plugin'),
        'menu_name'                  => __('Industries', 'my-basics-plugin'),
        'all_items'                  => __('All Industries', 'my-basics-plugin'),
        'parent_item'                => __('Parent Industry', 'my-basics-plugin'),
        'parent_item_colon'          => __('Parent Industry:', 'my-basics-plugin'),
        'new_item_name'              => __('New Industry Name', 'my-basics-plugin'),
        'add_new_item'               => __('Add New Industry', 'my-basics-plugin'),
        'edit_item'                  => __('Edit Industry', 'my-basics-plugin'),
        'update_item'                => __('Update Industry', 'my-basics-plugin'),
        'view_item'                  => __('View Industry', 'my-basics-plugin'),
        'search_items'               => __('Search Industries', 'my-basics-plugin'),
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'publicly_queryable'         => true,
        'show_ui'                    => true,
        'show_in_menu'               => true,
        'show_in_nav_menus'          => true,
        'show_in_rest'               => true,
        'rest_base'                  => 'industry',
        'show_tagcloud'              => true,
        'show_in_quick_edit'         => true,
        'show_admin_column'          => true,
    );

    register_taxonomy('industry', ["projects"], $args);
}
add_action('init', 'register_industry_taxonomy', 0);