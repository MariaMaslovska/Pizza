<?php
    get_header();
    while (have_posts()) {
        the_post();
    ?>
        <div class="headings">
            <h1 class="page-header"><?php the_title(); ?></h1>
            <p class="page-subtitle">The Best Pizzeria!</p>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>

    <div class="main-blogs">
        <div class="page-position">
            <p>
                <a class="parent-link" href="<?php echo site_url('/blog'); ?>">
                    Back to Home Blog
                </a>

                <span class="current-page-title">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>

        <div class="post-item">
            <div class="post-pic">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'large-medium'); ?>">
            </div>

            <h2 class="post-title">
                <?php the_title(); ?>
            </h2>

            <div class="post-meta">
                Posted by <?php the_author_posts_link(); ?> on
                <time datetime="<?php the_time('Y-d-m'); ?>">
                    <?php the_time('d/m/Y'); ?>
                </time> in <?php echo get_the_category_list(', '); ?>
            </div>

            <p class="post-content">
                <?php the_content(); ?>
            </p>
        </div>
    </div>
    
<?php 
}
get_footer(); 
?>