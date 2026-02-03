<?php get_header(); ?>

<main class="site-main">
    <div class="container">
        <article class="error-404">
            <header>
                <h1>404 – Workout Not Found</h1>
                <p>Sorry, the page you are trying to reach is unavailable. Please try again later.</p>
            </header>
            <div class="error-content">
                <p>How about trying a search?</p>
                <?php get_search_form(); ?>
            </div>
        </article>
    </div>
</main>

<?php get_footer(); ?>