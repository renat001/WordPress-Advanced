<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <header class="archive-header">
            <h1>Archive</h1>
        </header>
        
        <?php if (have_posts()) : ?>
            <div class="archive-posts">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="archive-item">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="archive-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>