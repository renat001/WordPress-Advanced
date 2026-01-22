<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article>
<h2>
    <?php the_title(); ?>
</h2>
<?php the_content(); ?>
    <?php edit_post_link('Edit'); ?>
</article>

<?php endwhile; ?>

<?php the_posts_pagination(); ?>

<?php else : ?>
<p>No posts found.</p>
<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>