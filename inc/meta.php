<?php

// Register Meta Box
function add_projects_meta_data_meta_box() {
    add_meta_box(
        'projects_meta_data',
        'Project Meta Data',
        'projects_meta_data_meta_box_callback',
        ["projects"],
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_projects_meta_data_meta_box');

// Meta Box Callback
function projects_meta_data_meta_box_callback($post) {
    wp_nonce_field('projects_meta_data_meta_box', 'projects_meta_data_meta_box_nonce');
    $values = get_post_meta($post->ID);
    ?>
    <div class="meta-box-container">
        
        <div class="meta-box-field">
            <label for="project_url">Project URL</label>
            <input
                type="url"
                id="project_url"
                name="project_url"
                value="<?php echo esc_attr(isset($values['project_url'][0]) ? $values['project_url'][0] : ''); ?>"
            />
        </div>
        
        <div class="meta-box-field">
            <label for="project_industry">Project Industry</label>
            <input
                type="text"
                id="project_industry"
                name="project_industry"
                value="<?php echo esc_attr(isset($values['project_industry'][0]) ? $values['project_industry'][0] : ''); ?>"
            />
        </div>
    </div>
    <?php
}

// Save Meta Box Data
function save_projects_meta_data_meta_box_data($post_id) {
    if (!isset($_POST['projects_meta_data_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['projects_meta_data_meta_box_nonce'], 'projects_meta_data_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    
    if (isset($_POST['project_url'])) {
        update_post_meta($post_id, 'project_url', sanitize_text_field($_POST['project_url']));
    }
    
    if (isset($_POST['project_industry'])) {
        update_post_meta($post_id, 'project_industry', sanitize_text_field($_POST['project_industry']));
    }
}
add_action('save_post', 'save_projects_meta_data_meta_box_data');


// function display_project_meta_data($content) {
//     if (get_post_type() === 'projects' && is_singular('projects')) {
//         $project_url = get_post_meta(get_the_ID(), 'project_url', true);
//         $project_industry = get_post_meta(get_the_ID(), 'project_industry', true);

//         $extra = '<div class="project-meta">';
//         if ($project_url) {
//             $extra .= '<p><strong>Project URL:</strong> <a href="' . esc_url($project_url) . '" target="_blank">' . esc_html($project_url) . '</a></p>';
//         }
//         if ($project_industry) {
//             $extra .= '<p><strong>Industry:</strong> ' . esc_html($project_industry) . '</p>';
//         }
//         $extra .= '</div>';

//         return $content . $extra;
//     }
//     return $content;
// }
// add_filter('the_content', 'display_project_meta_data');
