<?php

function fitness_assets() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_script('dropdown-js', get_template_directory_uri() . '/js/dropdown.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'fitness_assets');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
add_theme_support('custom-logo');
add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

load_theme_textdomain('fitness-theme', get_template_directory() . '/languages');

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

// Custom widget for recent workouts
class Recent_Workouts_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'recent_workouts_widget',
            __('Recent Workouts', 'fitness-theme'),
            array('description' => __('Displays recent workout posts', 'fitness-theme'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        $query = new WP_Query(array(
            'post_type' => 'workout',
            'posts_per_page' => $instance['number'] ? $instance['number'] : 5
        ));
        
        if ($query->have_posts()) {
            echo '<ul class="recent-workouts-list">';
            while ($query->have_posts()) {
                $query->the_post();
                echo '<li class="recent-workout-item"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        }
        
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Workouts', 'fitness-theme');
        $number = !empty($instance['number']) ? $instance['number'] : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'fitness-theme'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of workouts to show:', 'fitness-theme'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 5;
        return $instance;
    }
}

function register_recent_workouts_widget() {
    register_widget('Recent_Workouts_Widget');
}
add_action('widgets_init', 'register_recent_workouts_widget');

// User profile enhancements
function fitness_user_profile_fields($user) {
    ?>
    <h3><?php _e('Fitness Information', 'fitness-theme'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="fitness_level"><?php _e('Fitness Level', 'fitness-theme'); ?></label></th>
            <td>
                <select name="fitness_level" id="fitness_level">
                    <option value="beginner" <?php selected(get_user_meta($user->ID, 'fitness_level', true), 'beginner'); ?>><?php _e('Beginner', 'fitness-theme'); ?></option>
                    <option value="intermediate" <?php selected(get_user_meta($user->ID, 'fitness_level', true), 'intermediate'); ?></option>
                    <option value="advanced" <?php selected(get_user_meta($user->ID, 'fitness_level', true), 'advanced'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="favorite_workout"><?php _e('Favorite Workout Type', 'fitness-theme'); ?></label></th>
            <td>
                <input type="text" name="favorite_workout" id="favorite_workout" value="<?php echo esc_attr(get_user_meta($user->ID, 'favorite_workout', true)); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'fitness_user_profile_fields');
add_action('edit_user_profile', 'fitness_user_profile_fields');

function fitness_save_user_profile_fields($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    
    update_user_meta($user_id, 'fitness_level', sanitize_text_field($_POST['fitness_level']));
    update_user_meta($user_id, 'favorite_workout', sanitize_text_field($_POST['favorite_workout']));
}
add_action('personal_options_update', 'fitness_save_user_profile_fields');
add_action('edit_user_profile_update', 'fitness_save_user_profile_fields');

function fitness_cpt() {
    register_post_type('workout', array(
        'labels' => array(
            'name' => 'Workouts',
            'singular_name' => 'Workout',
            'add_new' => 'Add New Workout',
            'edit_item' => 'Edit Workout'
        ),
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'),
        'capability_type' => 'post',
        'map_meta_cap' => true
    ));
}
add_action('init', 'fitness_cpt');

function fitness_taxonomy() {
    register_taxonomy('workout_type', 'workout', array(
        'label' => 'Workout Types',
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true
    ));
}
add_action('init', 'fitness_taxonomy');

// Custom fields for workouts
function fitness_add_workout_meta_boxes() {
    add_meta_box(
        'workout_details',
        __('Workout Details', 'fitness-theme'),
        'fitness_workout_meta_callback',
        'workout',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'fitness_add_workout_meta_boxes');

function fitness_workout_meta_callback($post) {
    wp_nonce_field('fitness_workout_meta_box', 'fitness_workout_meta_box_nonce');

    $duration = get_post_meta($post->ID, '_workout_duration', true);
    $difficulty = get_post_meta($post->ID, '_workout_difficulty', true);
    $equipment = get_post_meta($post->ID, '_workout_equipment', true);

    echo '<label for="workout_duration">' . __('Duration (minutes)', 'fitness-theme') . '</label>';
    echo '<input type="number" id="workout_duration" name="workout_duration" value="' . esc_attr($duration) . '" />';

    echo '<label for="workout_difficulty">' . __('Difficulty', 'fitness-theme') . '</label>';
    echo '<select id="workout_difficulty" name="workout_difficulty">';
    echo '<option value="beginner" ' . selected($difficulty, 'beginner', false) . '>' . __('Beginner', 'fitness-theme') . '</option>';
    echo '<option value="intermediate" ' . selected($difficulty, 'intermediate', false) . '>' . __('Intermediate', 'fitness-theme') . '</option>';
    echo '<option value="advanced" ' . selected($difficulty, 'advanced', false) . '>' . __('Advanced', 'fitness-theme') . '</option>';
    echo '</select>';

    echo '<label for="workout_equipment">' . __('Equipment Needed', 'fitness-theme') . '</label>';
    echo '<textarea id="workout_equipment" name="workout_equipment" rows="3">' . esc_textarea($equipment) . '</textarea>';
}

function fitness_save_workout_meta($post_id) {
    // Only process workouts
    if (get_post_type($post_id) !== 'workout') {
        return;
    }

    // Skip autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check capability
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Only process if nonce is present (but don't require it for basic post saves)
    if (isset($_POST['fitness_workout_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['fitness_workout_meta_box_nonce'], 'fitness_workout_meta_box')) {
            return;
        }

        if (isset($_POST['workout_duration'])) {
            update_post_meta($post_id, '_workout_duration', sanitize_text_field($_POST['workout_duration']));
        }

        if (isset($_POST['workout_difficulty'])) {
            update_post_meta($post_id, '_workout_difficulty', sanitize_text_field($_POST['workout_difficulty']));
        }

        if (isset($_POST['workout_equipment'])) {
            update_post_meta($post_id, '_workout_equipment', sanitize_textarea($_POST['workout_equipment']));
        }
    }
}
add_action('save_post', 'fitness_save_workout_meta');