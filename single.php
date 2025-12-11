<?php get_header();?>
<div id="primary">
    <div id="main">
        <div class="container">

        <?php 
        while(have_posts());
             the_post();
             get_template_party('parts/content','single');
         ?>
         <div class="wp-devs-pagination">
            <div class="page next">
                <?php next_post_link('&laquo; %link') ?>
            </div>
            <div class="pages previous">
                <?php previous_post_link('%link &raquo;'); ?>
            </div>

            <?php 
                 if(comments_open()|| get_comments_template()){
                    comments_template();
                 }

                endwhile;

             ?>

         </div>
        </div>
    </div>
</div>
<?php get_footer();?>