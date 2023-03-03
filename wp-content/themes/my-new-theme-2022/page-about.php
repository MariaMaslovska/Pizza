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

    <main class="about">
        <?php
            $parentId = wp_get_post_parent_id(get_the_ID());
            $pageChildren = get_pages(array('child_of' => get_the_ID()));
            if ($parentId || $pageChildren) {
                the_page_nav($parentId);
            }
        ?>

        <div class="page-content">
            <?php the_content();?>
            <div class="restaurant-pic">
                <img src="<?php echo get_the_post_thumbnail_url(0, 'large'); ?>" alt="<?php the_title(); ?>">
            </div> 
        </div>

        <div class="page-position">
            <p>
                <a class="parent-link about-link" href="
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
                <span class="current-page-title about-link">
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