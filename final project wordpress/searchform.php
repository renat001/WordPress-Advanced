<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
    <label for="search-input" class="screen-reader-text"><?php _e( 'Search for:', 'fitness-theme' ); ?></label>
    <div class="search-input-wrapper">
        <input type="search" id="search-input" name="s" placeholder="<?php esc_attr_e( 'Search workouts, tips, and more...', 'fitness-theme' ); ?>" class="search-input" value="<?php echo get_search_query(); ?>">
        <button type="submit" class="search-submit"><?php _e( 'Search', 'fitness-theme' ); ?></button>
    </div>
</form>