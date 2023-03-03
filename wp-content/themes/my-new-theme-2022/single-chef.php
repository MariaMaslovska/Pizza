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

    <div class="main-chef">
        <div class="page-position">
            <p>
                <a class="parent-link" href="<?php echo site_url('/our-chef'); ?>">
                    Back to Our Chef
                </a>

                <span class="current-page-title">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>

        <div class="chef-item">
            <div class="chef-img">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'large'); ?>" alt="<?php the_title(); ?>">
            </div>

            <h2 class="chef-header">
                <?php the_title(); ?>
            </h2>
            
            <p class="chef-content">
                <?php the_content(); ?>
            </p>
        </div>
    </div>
    
<?php 
}
get_footer(); 
?>