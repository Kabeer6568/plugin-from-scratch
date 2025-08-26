<?php

function my_plugin_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'myplugin' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'myplugin' );
        // output save settings button
        submit_button( __( 'Save Settings', 'my-basics-plugin' ) );
        ?>
      </form>
    </div>
    <?php

}


function my_plugin_submenu_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post" id = "shortcode_form">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'myplugin_submenu' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'myplugin_submenu' );
        // output save settings button
        submit_button( __( 'Save Settings', 'my-basics-plugin' ) );
        ?>
      </form>
      <div class="output_shortcode" style = "display: none">
        <h3>
            Use the short code given below
        </h3>
        <p>
            [pram_shortcode label = '<?php echo get_option('my_plugin_label_txt') ?>' link = '<?php echo get_option('my_plugin_link_txt') ?>']
        </p>
      </div>
    </div>
    <?php
}