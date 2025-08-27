<?php
function vote_post_callback() {
    global $wpdb;
    $table_votes = $wpdb->prefix . 'votes';

    $post_id   = intval($_POST['pid']);
    $user_id   = intval($_POST['uid']);
    $vote_type = sanitize_text_field($_POST['vote_type']);

    if (!empty($post_id) && !empty($user_id)) {
        // Check if user already voted on this post
        $existing_vote = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM $table_votes WHERE post_id = %d AND user_id = %d",
                $post_id,
                $user_id
            )
        );

        if ($existing_vote) {
            // Case 1: Same reaction already exists → block
            if ($existing_vote->reaction === $vote_type) {
                wp_send_json_error(['message' => 'You have already ' . $vote_type . 'd this post']);
            } 
            // Case 2: Opposite reaction → update
            else {
                $updated = $wpdb->update(
                    $table_votes,
                    array('reaction' => $vote_type),
                    array('id' => $existing_vote->id),
                    array('%s'),
                    array('%d')
                );

                if ($updated !== false) {
                    wp_send_json_success(['message' => 'Your vote has been changed to ' . $vote_type]);
                } else {
                    wp_send_json_error(['message' => 'Could not update your vote']);
                }
            }
        } else {
            // Case 3: No vote yet → insert
            $inserted = $wpdb->insert(
                $table_votes,
                array(
                    'post_id'  => $post_id,
                    'user_id'  => $user_id,
                    'reaction' => $vote_type,
                ),
                array('%d','%d','%s')
            );

            if ($inserted) {
                wp_send_json_success(['message' => 'Your vote has been submitted']);
            } else {
                wp_send_json_error(['message' => 'There was an error submitting your vote']);
            }
        }
    } else {
        wp_send_json_error(['message' => 'Invalid request']);
    }
}

add_action('wp_ajax_vote_post' , 'vote_post_callback');