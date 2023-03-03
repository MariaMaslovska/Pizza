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

    <main class="main-page <?php if (is_page('history') || is_page('our-chef') || is_page('opening-hours')){?>about<?php } ?>">
        <?php
            $parentId = wp_get_post_parent_id(get_the_ID());
            $pageChildren = get_pages(array('child_of' => get_the_ID()));
            if ($parentId || $pageChildren) {
                the_page_nav($parentId);
            }
        ?>

        <div class="page-content">
            <?php the_content(); ?> 
        </div>

        <?php 
            if (is_page('opening-hours')) {?>
            <h2>Opening Hours</h2>
            <div class="open-cols">
                <div class="open-col first-col">
                    <p><?php the_field( 'first_row' ); ?></p>
                    <p><?php the_field( 'second_row' ); ?></p>
                    <p><?php the_field( 'third_row' ); ?></p>
                </div>

                <div class="open-col second-col">
                    <p><?php the_field( 'fourth_row' ); ?></p>
                    <p><?php the_field( 'fifth_row' ); ?></p>
                    <p><?php the_field( 'sixth_row' ); ?></p>
                </div>
            </div>
            <?php        
            }
        ?>

        <?php 
            if (is_page('our-chef')) {
                $chef = new WP_Query(array(
                    'posts_per_page' => 1,
                    'post_type' => 'chef'
                ));

                while($chef -> have_posts()) {
                        $chef -> the_post(); ?>

                <div class="about-chef">
                    <div class="chef-desc">
                        <p>
                            <span class="chef">The Chef?&nbsp;</span>
                            <a class="chef-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </p>
                        <p>We are proud of our interiors.</p>
                    </div>

                    <div class="chef-pic">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(0, 'chef-card'); ?>" alt="<?php the_title(); ?>"></a>
                    </div>
                </div>

                <?php 
                } wp_reset_postdata();
            }
        ?>

        <div class="page-position">
            <p>
                <a class="parent-link <?php if (is_page('history') || is_page('our-chef') || is_page('opening-hours')){?>about-link<?php } ?>" href="
                <?php 
                    if ($parentId) {
                        echo get_permalink($parentId);
                    } else {
                        echo get_site_url();
                    }
                ?>">
                    Back to 
                    <?php
                        if ($parentId) {
                            echo get_the_title($parentId);  
                        } else {
                            echo "Home";
                        }
                    ?>
                </a>
                <span class="current-page-title <?php if (is_page('history') || is_page('our-chef') || is_page('opening-hours')){?>about-link<?php } ?>">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>
    </main>
<?php
    }
    get_footer();

    function the_page_nav($parentId) {
    ?>

    <nav class="page-links">
        <h3 class="parent-title">
            <a href="<?php echo the_permalink($parentId); ?>">
                <?php echo get_the_title($parentId); ?>
            </a>
        </h3>
        <ul class="links-list">
            <?php
                $childOf = $parentId ? $parentId : get_the_ID();
                wp_list_pages(array(
                    'child_of' => $childOf,
                    'sort_column' => 'menu_order',
                    'title_li' => NULL
                ));
            ?>
        </ul>
    </nav>
    <?php
    }
?>