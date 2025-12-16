<?php
function wpdevs_customizer($wp_cutomize){
         $wp_customize->add_section(
        'sec_copyright',
        array(
            'title' => 'Copyright settings',
            'description'=> 'copyright settings'
        )
        );
           $wp_customize->add_setting(

            'set_copyright',
            array(
                'type' =>'theme_mod',
                'default'=>'copyright X -All Rights Reserved',
                'sanitize_callback' =>'sanitize_text_filed'
            )
            );
            $wp_customize->add_control(

            'set_copyright',
            array(
                'label' =>'Copyright Information',
                'default'=>'Please type your copyright',
                'section' =>'sec_copyright',
                'type' => 'text'
            )
            );
}
add_action('customize_register');
?> 