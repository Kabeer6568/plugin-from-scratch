<?php

add_shortcode('wporg', 'wporg_shortcode');
function wporg_shortcode( ) {
    // do something to $content
    $db_data = get_option('my_plugin_txt');
    $db_checked = get_option('my_plugin_checkbox');

    if ($db_checked == "on") {
        if (!empty($db_data)) {
       return $db_data;
    }
      else{
        return 'This is test short code';
       }
    
    }
    else{
        return 'Short Code Disabled';
    }

    
}



function my_first_shortcode_pram( $atts = array(), ) {

    $p_industry = get_option('my_plugin_label_txt');
    $p_link = get_option('my_plugin_link_txt');
   
    $attr = shortcode_atts(
		array(
			'label' => $p_industry,
            'link' => $p_link
		), $atts
	);

    if (!empty($p_industry) && !empty($p_link)) { ?>
        
        <a href=<?php echo $attr['link']  ?>>
<?php echo $attr['label'] ?>
    </a>
    
    <?php
    }
    else{
        return 'one or more fields are not filled';
    }
    ?>
    
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

    // sanitize
    $post_id = intval($attr['id']);

    if (!get_post_status( $post_id )) {
        return "Invalid id";
    };


    $project_url = get_post_meta($post_id , 'project_url' , true);
    $project_industry = get_post_meta($post_id , 'project_industry' , true)
    ?>
    
    <div>
        Project Url = <?php echo esc_url($project_url) ?>
        <br>
        Project Industry = <?php echo esc_html( $project_industry )  ?>
    </div>
    <?php
    return ;
}
add_shortcode( 'my_first_shortcode_pram_dynamic', 'my_first_shortcode_pram_dynamic' );


function vote_btn_shortcode( $atts = array()){
    $attr = shortcode_atts(
        array(
            "like" => 'Like',
            'dislike' => 'Dislike', 
        ), $atts, 'vote_btn'
    );

    $liked = strval($attr['like']);
    $disliked = strval($attr['dislike']);
    // $user_id = get_current_user_id();
    $post_id = get_the_ID();
?>
<button class="my_like"  data-post-id = <?php echo $post_id ?>>
    <?php echo $liked ?>
</button>
<button class="my_dislike"  data-post-id = <?php echo $post_id ?>>
    <?php echo $disliked ?>
</button>


<?php }

add_shortcode('vote_btn' , 'vote_btn_shortcode');