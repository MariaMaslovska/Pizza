<?php
    get_header();
    ?>
        <div class="headings">
            <h1 class="page-header">Menu</h1>
            <p class="page-subtitle">Bon appetit!</p>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>

<div class="main-page">
    <section class="pizza-menu"><h2><a href="<?php echo site_url('/menu-category/pizza/'); ?>">Pizza</a></h2>
        
        <div class="pizza-list">
            <?php 
            $pizza_posts = new WP_Query(array(
                'post_type' => 'menu',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array (
                        'taxonomy' => 'menu-category',
                        'field' => 'slug',
                        'terms' => 'pizza',
                    )
                ),
            ));
                
            while ($pizza_posts->have_posts()) {
                $pizza_posts->the_post();
                ?>
                
                    <div class="menu-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-img">
                                <?php echo get_the_post_thumbnail(0, 'menu-card'); ?>
                            </div>
                        </a>
                        <p class="card-title">
                            <?php the_title(); ?>
                            <span><?php echo get_the_term_list( 
                                    get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                            </span>
                        </p>
                        <p class="card-subtitle">$
                            <?php 
                            $price_values = get_post_custom_values( 'price' );
                            foreach ( $price_values as $key => $price ) {
                                echo "$price"; 
                            }?>
                        </p>
                        <button class="card-more"><a href="<?php the_permalink(); ?>">Read more</a></button>              
                    </div>

                <?php
            } wp_reset_postdata();
            ?>
        </div>
    </section>

    <section class="salads-menu">
        <h2><a href="<?php echo site_url('/menu-category/salad/'); ?>">Salads</a></h2>
        <div class="salads-list">
            <?php 
            $salads_posts = new WP_Query(array(
                'post_type' => 'menu',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array (
                        'taxonomy' => 'menu-category',
                        'field' => 'slug',
                        'terms' => 'salad',
                    )
                ),
            ));
    
            while ($salads_posts->have_posts()) {
                $salads_posts->the_post();
                ?>

                    <div class="menu-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-img">
                                <?php echo get_the_post_thumbnail(0, 'menu-card'); ?>
                            </div>
                        </a>
                        <p class="card-title">
                            <?php the_title(); ?>
                            <span><?php echo get_the_term_list( 
                                    get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                            </span>
                        </p>
                        <p class="card-subtitle">$
                            <?php 
                            $price_values = get_post_custom_values( 'price' );
                            foreach ( $price_values as $key => $price ) {
                                echo "$price"; 
                            }?>
                        </p>
                        <button class="card-more"><a href="<?php the_permalink(); ?>">Read more</a></button>     
                    </div>
                
                <?php
            } wp_reset_postdata();
            ?>
        </div>
    </section>

    <section class="starter-menu">
        <h2><a href="<?php echo site_url('/menu-category/starter/'); ?>">Starter</a></h2>
        <div class="starter-list">
            <?php 
            $starter_posts = new WP_Query(array(
                'post_type' => 'menu',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array (
                        'taxonomy' => 'menu-category',
                        'field' => 'slug',
                        'terms' => 'starter',
                    )
                ),
            ));
    
            while ($starter_posts->have_posts()) {
                $starter_posts->the_post();
                ?>

                    <div class="menu-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-img">
                                <?php echo get_the_post_thumbnail(0, 'menu-card'); ?>
                            </div>
                        </a>
                        <p class="card-title">
                            <?php the_title(); ?>
                            <span><?php echo get_the_term_list( 
                                    get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                            </span>
                        </p>
                        <p class="card-subtitle">$
                            <?php 
                            $price_values = get_post_custom_values( 'price' );
                            foreach ( $price_values as $key => $price ) {
                                echo "$price"; 
                            }?>
                        </p>
                        <button class="card-more"><a href="<?php the_permalink(); ?>">Read more</a></button>     
                    </div>
                
                <?php
            } wp_reset_postdata();
            ?>
        </div>
    </section>

    <section class="drink-menu">
        <h2><a href="<?php echo site_url('/menu-category/drink/'); ?>">Drinks</a></h2>
        <div class="drink-list">
            <?php 
            $drink_posts = new WP_Query(array(
                'post_type' => 'menu',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array (
                        'taxonomy' => 'menu-category',
                        'field' => 'slug',
                        'terms' => 'drink',
                    )
                ),
            ));
    
            while ($drink_posts->have_posts()) {
                $drink_posts->the_post();
                ?>

                    <div class="menu-card">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-img">
                                <?php echo get_the_post_thumbnail(0, 'menu-card'); ?>
                            </div>
                        </a>
                        <p class="card-title">
                            <?php the_title(); ?>
                            <span><?php echo get_the_term_list( 
                                    get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                            </span>
                        </p>
                        <p class="card-subtitle">$
                            <?php 
                            $price_values = get_post_custom_values( 'price' );
                            foreach ( $price_values as $key => $price ) {
                                echo "$price"; 
                            }?>
                        </p>
                        <button class="card-more"><a href="<?php the_permalink(); ?>">Read more</a></button>     
                    </div>
                
                <?php
            } wp_reset_postdata();
            ?>
        </div>
    </section>

    <div class="page-position">
        <p>
            <a class="parent-link" href="<?php echo get_site_url('/home'); ?>">
                Back to Home
            </a>
            <span class="current-page-title">
                Menu
            </span>
        </p>
    </div>
</div>

<?php
    get_footer();
?>