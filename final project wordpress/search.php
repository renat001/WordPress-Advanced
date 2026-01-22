<?php get_header(); ?>
<h2>Search Results</h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h3><?php the_title(); ?></h3>
<?php endwhile; else : ?>
<p>No results found.</p>
<?php endif; ?>
<?php get_footer(); ?>