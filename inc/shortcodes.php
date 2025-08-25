<?php

add_shortcode('wporg', 'wporg_shortcode');
function wporg_shortcode( ) {
    // do something to $content
    
    // always return
    return 'This is test short code';
}



function my_first_shortcode_pram( $atts = array(), ) {
   
    $attr = shortcode_atts(
		array(
			'label' => 'Label Required',
            'link' => 'wordpress.org'
		), $atts
	);
    ?>
    <a href=<?php echo $attr['link']  ?>>
<?php echo $attr['label'] ?>
    </a>
    <?php
    return ;
}
add_shortcode( 'pram_shortcode', 'my_first_shortcode_pram' );




function my_first_shortcode_pram_dynamic( $atts = array(), ) {
   
    $attr = shortcode_atts(
		array(
			'id' => get_the_id(),
            
		), $atts, 'my_first_shortcode_pram_dynamic'
	);

    $project_url = get_post_meta($attr['id'] , 'project_url' , true);
    $project_industry = get_post_meta($attr['id'] , 'project_industry' , true)
    ?>
    
    <div>
        Project Url = <?php echo $project_url ?>
        Project Industry = <?php echo $project_industry ?>
    </div>
    <?php
    return ;
}
add_shortcode( 'my_first_shortcode_pram_dynamic', 'my_first_shortcode_pram_dynamic' );