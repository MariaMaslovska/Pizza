<?php
    get_header();
    while (have_posts()) {
        the_post();
    ?>

        <div class="headings">
            <h1 class="page-header">Welcome!</h1>
            <a href="<?php echo site_url('/menu'); ?>"><p class="page-subtitle">Let me see the menu</p></a>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>
    
    <div class="main-container">
    <section class="menu">
        <h2 class="title">The menu</h2>
        <div class="menu-wrap">
            <div class="menu-header">
                <div><button class="menu-btn tablink red" onclick="menuTab(event, 'pizza')">Pizza</button></div>
                <div><button class="menu-btn tablink" onclick="menuTab(event, 'salads')">Salads</button></div>
                <div><button class="menu-btn tablink" onclick="menuTab(event, 'starter')">Starter</button></div>
            </div>
            
            <div id="pizza" class="menu-body">
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
                    

                    <div class="menu-item">
                        <div>
                            <div class="item-title">
                                <?php the_title(); ?>
                                <span><?php echo get_the_term_list( 
                                        get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                                </span>
                            </div>
                            <div class="ingredients"><?php the_content(); ?></div>
                        </div>
                        <div class="price">$<?php 
                            $price_values = get_post_custom_values( 'price' );

                            foreach ( $price_values as $key => $price ) {
                                echo "$price"; 
                            }
                        ?>
                        </div>
                    </div>
                
                    <?php

                } wp_reset_postdata();
                ?>
            </div>

            <div id="salads" class="menu-body" style="display:none">
            <?php 
                $salad_posts = new WP_Query(array(
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
            

                while ($salad_posts->have_posts()) {
                    $salad_posts->the_post();
                    ?>

                    <div class="menu-item">
                        <div>
                            <div class="item-title">
                                <?php the_title(); ?>
                                <span><?php echo get_the_term_list( 
                                        get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                                </span>
                            </div>
                            <div class="ingredients"><?php the_content(); ?></div>
                        </div>
                        <div class="price">$<?php 
                            $price_values = get_post_custom_values( 'price' );

                            foreach ( $price_values as $key => $price ) {
                                echo "$price"; 
                            }
                        ?>
                        </div>
                    </div>
                
                    <?php

                } wp_reset_postdata();
            ?>
            </div>

            <div id="starter" class="menu-body" style="display:none">
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

                    <div class="menu-item">
                        <div>
                            <div class="item-title">
                                <?php the_title(); ?>
                                <span><?php echo get_the_term_list( 
                                        get_the_ID(), 'menu-tag', '<span class="hot">', '</span> <span class="new">', '</span>' ); ?>
                                </span>
                            </div>
                            <div class="ingredients"><?php the_content(); ?></div>
                        </div>
                        <div class="price">$<?php 
                            $price_values = get_post_custom_values( 'price' );

                            foreach ( $price_values as $key => $price ) {
                                echo "$price"; 
                            }
                        ?>
                        </div>
                    </div>
                
                    <?php

                } wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>

        <div class="front-slider">
            <?php echo do_shortcode('[metaslider id="201"]'); ?>
        </div>
    </div>

    <?php
    }
    get_template_part('form');
    get_template_part('map');
    get_footer();
?>