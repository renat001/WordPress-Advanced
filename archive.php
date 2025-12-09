<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            the_archive_title('<h1 class="archive-title">', '</h1>');
            ?>
            <?php the_archive_description('<div class="archive-description">','</div>'); ?>
            <div class="conainer">
                <div class="archive-item">
                    <?php
                        if(have_posts()):
                           while(have_posts()): the_post();
                           get_template_part('parts/content');
                        endwhile;
                    ?>
                    <div class="wpdevs-pagination">
                        <div clas="pages new">
                            <?php previous_posts_link("<< Newer posts")?>
                        </div>
                        <?php next_posts_link("<< Older posts")?>
                    </div>
                </div>
                <?php
                else:
                ?>
                <p>Nothing yet to be displayed</p>
                <?php endif;?>
            </div>
            <?php get_sidebar(); ?>

        </main>
    </div>

</div>

<?php get_footer(); ?>
