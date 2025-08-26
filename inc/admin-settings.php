<?php

function my_plugin_admin_main_settings_init() {
	// register a new setting for "reading" page
	register_setting('myplugin', 'my_plugin_txt');
	register_setting('myplugin', 'my_plugin_checkbox');

	// register a new section in the "reading" page
	add_settings_section(
		'my_plugin_setting_section_general',
		'General Setting', 
        'my_plugin_settings_section_callback',
		'myplugin'
	);

	// register a new field in the "wporg_settings_section" section, inside the "reading" page
	add_settings_field(
		'my_plugin_settings_field_1',
		'Short Code Value', 
        'my_plugin_settings_field_callback',
		'myplugin',
		'my_plugin_setting_section_general',
	);

	add_settings_field(
		'my_plugin_settings_field_2',
		'Enable Short Code', 
        'my_plugin_settings_checkbox_field_callback',
		'myplugin',
		'my_plugin_setting_section_general',
	);
}

/**
 * register wporg_settings_init to the admin_init action hook
 */
add_action('admin_init', 'my_plugin_admin_main_settings_init');

/**
 * callback functions
 */

// section content cb
function my_plugin_settings_section_callback() {
	echo '<p> Section Introduction.</p>';
}

// field content cb
function my_plugin_settings_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('my_plugin_txt');
	
	// output the field
	?>
	<input type="text" name="my_plugin_txt" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
	
    <?php
};


function my_plugin_settings_checkbox_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('my_plugin_checkbox');
	
	// output the field
	?>
	
	<input type="checkbox" name="my_plugin_checkbox" checked>
    <?php
}





// sub menu 

function my_plugin_admin_sub_menu_settings_init() {
	// register a new setting for "reading" page
	register_setting('myplugin_submenu', 'my_plugin_label_txt');
	register_setting('myplugin_submenu', 'my_plugin_link_txt');

	// register a new section in the "reading" page
	add_settings_section(
		'my_plugin_setting_sub_menu_section',
		'Sub Menu', 
        'my_plugin_sub_menu_settings_section_callback',
		'myplugin_submenu'
	);

	// register a new field in the "wporg_settings_section" section, inside the "reading" page
	add_settings_field(
		'my_plugin_sub_menu_settings_field_1',
		'Project Industry', 
        'my_plugin_sub_menu_settings_field_callback',
		'myplugin_submenu',
		'my_plugin_setting_sub_menu_section',
	);

	add_settings_field(
		'my_plugin_sub_menu_settings_field_2',
		'Project Time Frame', 
        'my_plugin_settings_sub_menu_checkbox_field_callback',
		'myplugin_submenu',
		'my_plugin_setting_sub_menu_section',
	);
}

/**
 * register wporg_settings_init to the admin_init action hook
 */
add_action('admin_init', 'my_plugin_admin_sub_menu_settings_init');

/**
 * callback functions
 */

// section content cb
function my_plugin_sub_menu_settings_section_callback() {
	echo '<p> Section Introduction.</p>';
}

// field content cb
function my_plugin_sub_menu_settings_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('my_plugin_label_txt');
	
	// output the field
	?>
	<input type="text" name="my_plugin_label_txt" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
	
    <?php
};


function my_plugin_settings_sub_menu_checkbox_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('my_plugin_link_txt');
	
	// output the field
	?>
	<input type="text" name="my_plugin_link_txt" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">

    <?php
}


