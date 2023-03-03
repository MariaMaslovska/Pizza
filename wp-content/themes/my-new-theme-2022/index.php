<?php
    get_header();
    ?>
        <div class="headings">
            <h1 class="page-header">Welcome To Our Blog!</h1>
            <p class="page-subtitle">The Latest News</p>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>

<div class="main-blogs">
<div class="page-position">
            <p>
                <a class="parent-link" href="<?php echo get_site_url('/home'); ?>">
                    Back to Home
                </a>
                <span class="current-page-title">
                    Welcome To Our Blog!
                </span>
            </p>
        </div>

    <div class="blog-items">
    <?php
        while (have_posts()) {
            the_post();
        ?>

        <article class="blog post-item">
            <div class="post-baner">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'large-medium'); ?>">
            </div>

            <div class="post-desc">
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="post-meta">
                    Posted by <?php the_author_posts_link(); ?> on
                    <time datetime="<?php the_time('Y-d-m'); ?>">
                        <?php the_time('d/m/Y'); ?>
                    </time> in <?php echo get_the_category_list(', '); ?>
                </div>
                <div class="post-content">
                    <?php the_excerpt(); ?>
                </div>
                <footer class="post-footer">
                    <a href="<?php the_permalink(); ?>">Continue reading</a>
                </footer>
            </div>
        </article>

        <?php
        } echo paginate_links();
        ?>
    </div>

</div>
<?php
    get_footer();
?>