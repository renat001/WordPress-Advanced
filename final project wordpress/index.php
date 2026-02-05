<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <!-- Hero/Featured Section -->
        <section class="hero-section">
            <div class="hero-image-container">
                <div class="image-placeholder-large">
                    <svg class="placeholder-icon" viewBox="0 0 400 200"><rect x="20" y="20" width="360" height="160" fill="none" stroke="#ccc" stroke-width="2"/><circle cx="100" cy="70" r="30" fill="none" stroke="#ccc" stroke-width="2"/><path d="M 40 160 L 150 90 L 240 130 L 360 40" fill="none" stroke="#ccc" stroke-width="2"/></svg>
                    <p><img src="running.jpg" alt="Workout" /></p>
            </div>
            <div class="hero-content">
                <h1>Welcome to Fitness Blog</h1>
                <p>Your ultimate guide to workouts, fitness tips, and healthy living. Explore our collection of workout routines and fitness advice from industry experts.</p>
            </div>
        </section>

        <!-- Featured Search Section -->
        <div class="featured-search-section">
            <h2>Find Your Perfect Workout</h2>
            <p class="search-description">Search through our library of workouts and fitness guides to find exactly what you need</p>
            <?php get_search_form(); ?>
        </div>

        <!-- About Section -->
        <section class="about-section">
            <h2>About Our Fitness Blog</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Welcome to your go-to resource for comprehensive fitness information. Whether you're a beginner just starting your fitness journey or an experienced athlete looking to optimize your training, you'll find valuable content here. Our expert-curated workouts cover all fitness levels and goals.</p>
                    <p>From high-intensity interval training to strength building, flexibility exercises to cardio routines – we've got everything you need to achieve your fitness goals. Each workout comes with detailed instructions, modifications for different fitness levels, and tips to maximize results.</p>
                    <p>Join thousands of fitness enthusiasts who have transformed their health with our guidance and support. Our community is dedicated to helping you achieve your fitness dreams.</p>
                </div>
                <div class="about-image-placeholder">
                        <div class="image-placeholder">
                        <svg class="placeholder-icon" viewBox="0 0 300 300"><circle cx="150" cy="100" r="40" fill="none" stroke="#ccc" stroke-width="2"/><rect x="80" y="150" width="140" height="100" fill="none" stroke="#ccc" stroke-width="2"/><circle cx="120" cy="180" r="15" fill="none" stroke="#ccc" stroke-width="2"/><circle cx="180" cy="180" r="15" fill="none" stroke="#ccc" stroke-width="2"/><line x1="150" y1="210" x2="150" y2="250" stroke="#ccc" stroke-width="2"/><line x1="150" y1="230" x2="120" y2="250" stroke="#ccc" stroke-width="2"/><line x1="150" y1="230" x2="180" y2="250" stroke="#ccc" stroke-width="2"/></svg>
                        <p><img src="https://images.unsplash.com/photo-1549576490-b0b4831ef60a?auto=format&fit=crop&w=1200&q=80" alt="Equipment" /></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Workouts Section -->
        <section class="latest-workouts">
            <h2>Latest Workouts & Articles</h2>
            <p class="section-description">Discover our newest fitness content and expert-written guides</p>

            <?php if (have_posts()) : ?>
                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="post-item">
                            <!-- Featured Image -->
                            <div class="post-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'post-image')); ?>
                                    </a>
                                <?php else : ?>
                                    <!-- Image Placeholder for user to add image -->
                                    <a href="<?php the_permalink(); ?>" class="post-image-placeholder">
                                        <div class="image-placeholder-box">
                                            <svg class="placeholder-icon" viewBox="0 0 200 150"><rect x="10" y="10" width="180" height="130" fill="none" stroke="#ddd" stroke-width="2"/><circle cx="50" cy="50" r="20" fill="none" stroke="#ddd" stroke-width="2"/><path d="M 30 130 L 80 70 L 150 100 L 190 40" fill="none" stroke="#ddd" stroke-width="2"/></svg>
                                            <p><img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&w=800&q=80" alt="Placeholder" /></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Post Content -->
                            <div class="post-header">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="post-meta">
                                    <span class="post-date">📅 <?php echo get_the_date('M d, Y'); ?></span>
                                    <span class="post-author">👤 <?php the_author(); ?></span>
                                </div>
                            </div>
                            
                            <!-- Extended Description -->
                            <div class="post-content">
                                <div class="post-excerpt">
                                    <p><strong>Overview:</strong></p>
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <!-- Additional Info Boxes -->
                                <div class="post-details">
                                    <p><strong>In This Article You'll Learn:</strong></p>
                                    <ul>
                                        <li>✓ Proper exercise form and technique demonstrations</li>
                                        <li>✓ Workout tips and helpful modifications for all levels</li>
                                        <li>✓ Progress tracking guidance and success tips</li>
                                        <li>✓ Safety tips and best practices to avoid injury</li>
                                        <li>✓ Nutrition and recovery recommendations</li>
                                    </ul>
                                </div>

                                <!-- CTA Link -->
                                <a href="<?php the_permalink(); ?>" class="read-more">Read Full Article & More Details →</a>
                            </div>
                            
                            <?php edit_post_link('✏️ Edit this post', '<div class="edit-link">', '</div>'); ?>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <div class="pagination">
                    <?php the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '← Previous Posts',
                        'next_text' => 'Next Posts →',
                    )); ?>
                </div>
            <?php else : ?>
                <article class="no-posts">
                    <h3>No Posts Yet - Let's Get Started!</h3>
                    <p>We're currently building our fitness content library. Check back soon for amazing workouts, fitness tips, and expert guides!</p>
                    <p>In the meantime, start creating your first fitness post to kick off the blog. Share your favorite workout routines and fitness knowledge with our community.</p>
                </article>
            <?php endif; ?>
        </section>

        <!-- Stats/Community Section -->
        <section class="stats-section">
            <h2>Join Our Growing Community</h2>
            <p class="stats-description">See why fitness enthusiasts choose our blog</p>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">👥</div>
                    <div class="stat-number">1000+</div>
                    <p>Active Community Members</p>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">💪</div>
                    <div class="stat-number">500+</div>
                    <p>Workouts Available</p>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">📚</div>
                    <div class="stat-number">50+</div>
                    <p>Expert Fitness Guides</p>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">⭐</div>
                    <div class="stat-number">4.9</div>
                    <p>Average Community Rating</p>
                </div>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="cta-section">
            <div class="cta-content">
                <h2>Ready to Start Your Fitness Journey?</h2>
                <p>Explore our comprehensive guides, workout plans, and fitness resources. All content is free and available to everyone interested in improving their health and fitness.</p>
                <button class="cta-button" onclick="document.querySelector('.search-input') && document.querySelector('.search-input').focus()">
                    🔍 Explore Workouts Now
                </button>
            </div>
        </section>
    </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
