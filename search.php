<?php get_header(); ?>


<div id="primary">
    <div id="main">
        <div class="container">


        <h1>Search: <?php echo get_search_query();?></h1>

        <?php

        get_search_form();

        while( have_posts()):
            the_posts();
            get_template_part('parts/content','search');
        endwhile;
        the_posts_pagination();
        ?>
        </div>
    </div>
</div>