<?php

function my_plugin_reaction_table(){

    global $wpdb;
	$db_version = MY_PLUGIN_DB_VERSION;

	$table_name = $wpdb->prefix . 'reactions';
	$table_votes = $wpdb->prefix . 'votes';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql_votes = "CREATE TABLE IF NOT EXISTS $table_votes (
		id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id BIGINT UNSIGNED NOT NULL,
    user_id BIGINT UNSIGNED NOT NULL,
    reaction TINYINT NOT NULL COMMENT '1 = like, -1 = dislike',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    UNIQUE KEY unique_reaction (post_id, user_id), -- 1 reaction per user per post
    INDEX idx_post (post_id),
    INDEX idx_user (user_id)
) $charset_collate;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql_votes );

	add_option( 'my_plugin_db_version', $db_version );

}