<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <header class="search-header">
            <h1><?php printf( esc_html__( 'Search Results for: %s', 'fitness-theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header>
        
        <?php if (have_posts()) : ?>
            <div class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="search-item">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="search-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <article class="no-results">
                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fitness-theme' ); ?></p>
                <?php get_search_form(); ?>
            </article>
        <?php endif; ?>
    </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>