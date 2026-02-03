<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-item">
                    <h2><?php the_title(); ?></h2>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <?php edit_post_link('Edit'); ?>
                </article>
            <?php endwhile; ?>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <article class="no-posts">
                <p>No posts were found.</p>
            </article>
        <?php endif; ?>
    </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>