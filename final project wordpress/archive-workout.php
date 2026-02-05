<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <header class="archive-header">
            <h1><?php post_type_archive_title(); ?></h1>
            <?php the_archive_description(); ?>
        </header>
        
        <?php if (have_posts()) : ?>
            <div class="archive-posts">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="archive-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="archive-thumbnail">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="archive-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="workout-meta">
                            <span>Type: <?php the_terms( get_the_ID(), 'workout_type', '', ', ' ); ?></span>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p>No workouts found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>