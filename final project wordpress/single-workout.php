<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="single-workout">
                <header class="entry-header">
                    <h1><?php the_title(); ?></h1>
                    <div class="post-meta">
                        <span class="post-date">📅 <?php echo get_the_date('M d, Y'); ?></span>
                        <span class="post-author">👤 <?php the_author(); ?></span>
                        <span class="post-categories">📂 <?php the_terms( get_the_ID(), 'workout_type', '', ', ' ); ?></span>
                    </div>
                </header>
                <div class="entry-content">
                    <?php 
                    $duration = get_post_meta(get_the_ID(), '_workout_duration', true);
                    $difficulty = get_post_meta(get_the_ID(), '_workout_difficulty', true);
                    $equipment = get_post_meta(get_the_ID(), '_workout_equipment', true);
                    
                    if ($duration || $difficulty || $equipment) {
                        echo '<div class="workout-meta">';
                        if ($duration) echo '<p><strong>' . __('Duration:', 'fitness-theme') . '</strong> ' . esc_html($duration) . ' ' . __('minutes', 'fitness-theme') . '</p>';
                        if ($difficulty) echo '<p><strong>' . __('Difficulty:', 'fitness-theme') . '</strong> ' . esc_html(ucfirst($difficulty)) . '</p>';
                        if ($equipment) echo '<p><strong>' . __('Equipment:', 'fitness-theme') . '</strong> ' . esc_html($equipment) . '</p>';
                        echo '</div>';
                    }
                    ?>
                    <?php the_content(); ?>
                </div>
                <?php edit_post_link('Edit this workout'); ?>
            </article>
            
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>