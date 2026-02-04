<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="single-post">
                <header class="entry-header">
                    <h1><?php the_title(); ?></h1>
                    <div class="post-meta">
                        <span class="post-date">📅 <?php echo get_the_date('M d, Y'); ?></span>
                        <span class="post-author">👤 <?php the_author(); ?></span>
                        <span class="post-categories">📂 <?php the_category(', '); ?></span>
                    </div>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <?php edit_post_link('Edit this post'); ?>
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