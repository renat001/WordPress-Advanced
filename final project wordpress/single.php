<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article class="single-post">
                <header class="entry-header">
                    <h1><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <?php edit_post_link('Edit this post'); ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>