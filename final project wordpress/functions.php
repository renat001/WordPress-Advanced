<?php

function fitness_assets() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'fitness_assets');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'gallery'));

register_nav_menus(array(
    'main-menu' => 'Main Menu'
));

function fitness_sidebar() {
    register_sidebar(array(
        'name' => 'Fitness Sidebar',
        'id' => 'sidebar-1'
    ));
}
add_action('widgets_init', 'fitness_sidebar');

function fitness_cpt() {
    register_post_type('workout', array(
        'labels' => array('name' => 'Workouts'),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'tags')
    ));
}
add_action('init', 'fitness_cpt');

function fitness_taxonomy() {
    register_taxonomy('workout_type', 'workout', array(
        'label' => 'Workout Types',
        'hierarchical' => true
    ));
}
add_action('init', 'fitness_taxonomy');