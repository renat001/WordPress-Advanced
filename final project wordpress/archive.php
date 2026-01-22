<?php get_header(); ?>
<h2>Archive</h2>
<?php while (have_posts()) : the_post(); ?>
<h3><?php the_title(); ?></h3>
<?php endwhile; ?>
<?php get_footer(); ?>