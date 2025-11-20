<?php
function load_script(){
    wp_enqueue_style('style',get_stylesheet());

    wp_enqueue_script('dropdown' get_template_directory_uri(). '/js/dropdown/js', array(), '1.0',false);


}
add_action('wp_enqueue_scripts', 'load_scripts');
?>