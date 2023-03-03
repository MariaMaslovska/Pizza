<?php
    get_header();
?>

        <div class="headings">
            <h1 class="page-header">We're searching</h1>
            <p class="page-subtitle">Call us <?php the_field('phone_number', 20); ?></p>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>

    <main class="main-page">
        <?php
            $parentId = wp_get_post_parent_id(get_the_ID());
            $pageChildren = get_pages(array('child_of' => get_the_ID()));
            if ($parentId || $pageChildren) {
                the_page_nav($parentId);
            }
        ?>

        <div class="main-container">
            <section>
                <?php
                    $careers_posts = new WP_Query(array(
                        'post_type' => 'careers',
                        'posts_per_page' => -1,
                    ));

                    while ($careers_posts->have_posts()){
                        $careers_posts->the_post();
                        ?>
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        <?php
                    }
                ?>
            </section>
        </div>
    </main>
<?php
    get_footer();

    function the_page_nav($parentId) {
    ?>

    <nav class="page-links">
        <h2 class="title">
            <a href="<?php echo the_permalink($parentId); ?>">
                <?php echo get_the_title($parentId); ?>
            </a>
        </h2>
        <ul>
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