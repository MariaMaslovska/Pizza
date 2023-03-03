<?php
    get_header();
    ?>
        <div class="headings">
            <h1 class="page-header archive"><?php the_archive_title(); ?></h1>
            <p class="page-subtitle">The Best Pizzeria!</p>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>

<main class="archive-page">
    <?php
        while (have_posts()) {
            the_post();
    ?>
    <article class="archive-post post-item">
        <div class="archive-baner">
            <div class="card-img">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'menu-card'); ?>">
            </div>
        </div>

        <div class="archive-desc">
            <h2 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="post-content">
                <?php the_excerpt(); ?>
            </div>
            <footer class="post-footer">
                <a href="<?php the_permalink(); ?>">Continue reading</a>
            </footer>
        </div>
    </article>
    <?php
    } 
    ?>
    <div class="pagination-links">
        <?php
        echo paginate_links();
        ?>
    </div>

    <div class="page-position">
        <p>
        <a class="parent-link" href="<?php echo get_site_url('/home'); ?>">
                Home /
            </a>
            <a class="parent-link" href="<?php echo site_url('/blog'); ?>">
                Home Blog /
            </a>
            <a class="parent-link" href="<?php echo site_url('/menu'); ?>">
                Menu
            </a>
            <span class="current-page-title">
                Archive
            </span>
        </p>
    </div>
</main>
<?php
    get_footer();
?>