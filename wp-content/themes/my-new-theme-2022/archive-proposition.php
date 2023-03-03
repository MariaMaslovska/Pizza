<?php
    get_header();
    ?>
        <div class="headings">
            <h1 class="page-header">Come to us</h1>
            <a href="<?php echo site_url('/opening-hours'); ?>"><p class="page-subtitle">We are working for you!</p></a>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>

<main class="main-page">
    <div class="proposition-cards">
        <?php
            while (have_posts()) {
                the_post();
        ?>

        <div class="proposition-card">
            <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(0, 'large'); ?>" alt="<?php the_title(); ?>">
                <span class="proposition-title">
                    <?php the_title(); ?>
                </span>
            </a>
        </div>

        <?php
        } echo paginate_links();
        ?>
    </div>

    <div class="page-position">
        <p>
            <a class="parent-link" href="<?php echo get_site_url('/home'); ?>">
                Back to Home
            </a>
            <span class="current-page-title">
                Come to us
            </span>
        </p>
    </div>
</main>
<?php
    get_footer();
?>