<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <header class="search-header">
            <h1>Search Results</h1>
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
                <p>No results found for your search.</p>
            </article>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>