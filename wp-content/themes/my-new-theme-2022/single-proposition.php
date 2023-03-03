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

    <div class="main-proposition">
        <div class="page-position">
            <p>
                <a class="parent-link" href="<?php echo site_url('/propositions'); ?>">
                    Back to Propositions
                </a>
                <span class="current-page-title">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>

        <div class="proposition-item">
            <div class="proposition-img">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'large'); ?>" alt="<?php the_title(); ?>">
            </div>

            <h2 class="proposition-header">
                <?php the_title(); ?>
            </h2>

            <p class="proposition-content">
                <?php 
                the_content(); 
                $relatedMenu = get_field('related_menu');
                ?>
            </p>
        </div>

        <?php if ($relatedMenu) { ?>
        <h3>The following dishes are 15% off.</h3>
        <div class="pizza-list">
            <?php 
            foreach ($relatedMenu as $item) {
            ?>

            <div class="menu-card">
                <a href="<?php echo get_the_permalink($item); ?>">
                    <div class="card-img">
                        <?php echo get_the_post_thumbnail($item,'menu-card'); ?>
                    </div>
                </a>
                <p class="card-title"><?php echo get_the_title($item); ?></p> 
                <p class="special-price"><?php echo round(get_field('price', $item) * 0.85, 2); ?></p> 
                <button class="card-more"><a href="<?php the_permalink(); ?>">Read more</a></button>  
            </div>

            <?php } ?>
        </div>
        <?php } ?>
    </div>
    
<?php 
}
get_footer(); 
?>