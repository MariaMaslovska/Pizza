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

    <div class="main-item">
        <div class="page-position">
            <p>
                <a class="parent-link" href="<?php echo site_url('/menu'); ?>">
                    Back to Menu
                </a>
                <span class="current-page-title">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>

        <div class="item">
            <div class="item-content">
                <h2 class="item-header">
                    <?php the_title(); ?>
                    <span><?php echo get_the_term_list( 
                            get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                    </span>
                </h2>
                <span class="item-meta"><?php echo get_the_term_list( get_the_ID(), 'menu-category', '<span class="">', ' / ', '</span>' ); ?></span>
                <?php 
                    the_content();
                    ?>
                    <p>
                        $
                        <?php 
                        $price_values = get_post_custom_values( 'price' );
                        foreach ( $price_values as $key => $price ) {
                            echo "$price"; 
                        }?>
                    </p>
                    <?php
                    $relatedDrinks = get_field('related_drinks');
                ?>
            </div>
            
            <div class="item-pic">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'menu-card'); ?>" alt="<?php the_title(); ?>">
            </div>
        </div>

        <?php if ($relatedDrinks) { ?>
        <h3>We recommend the drinks listed below to go with this menu option.</h3>
        <div class="drink-list">
            <?php 
            foreach ($relatedDrinks as $drink) {
            ?>
                <div class="menu-card">
                    <a href="<?php echo get_the_permalink($drink); ?>">
                        <div class="card-img">
                            <?php echo get_the_post_thumbnail($drink,'menu-card'); ?>
                        </div>
                    </a>
                    <p class="card-title"><?php echo get_the_title($drink); ?></p> 
                    <p><?php the_field('price', $drink) ?></p> 
                    <button class="card-more"><a href="<?php the_permalink(); ?>">Read more</a></button>   
                </div>
            <?php 
            } 
            ?>
        </div>
        <?php } ?>

        <h3 >
            Also, we have some special propositions according to our discount programs.
        </h3>
        <div class="proposition-cards">
        <?php 
            $related_propositions = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'proposition',  
                'meta_query' => array(
                    array(
                        'key' => 'related_menu',
                        'compare' => 'LIKE',
                        'value' => '"'.get_the_ID().'"'
                    )
                )      
            ));
            

            while ($related_propositions -> have_posts()) {
                $related_propositions -> the_post();  
            
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
            } wp_reset_postdata();
            ?>  
        </div>
        <p class="proposition-link">All Propositions you can look <a href="<?php echo site_url('/propositions'); ?>">here</a></p>
    </div>
    
<?php 
}
get_footer(); 
?>