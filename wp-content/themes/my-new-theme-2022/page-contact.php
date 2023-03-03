<?php
    get_header();
?>
        <div class="headings">
            <h1 class="page-header"><?php the_title(); ?></h1>
            <p class="page-subtitle">Fill in the form below!</p>
        </div>
        <div class="open">Open from 10am to 12pm</div>
    </header>

    <main>
        <?php
            $parentId = wp_get_post_parent_id(get_the_ID());
            $pageChildren = get_pages(array('child_of' => get_the_ID()));
            if ($parentId || $pageChildren) {
                the_page_nav($parentId);
            }
        ?>
        
        <div class="main-container">
            <?php 
            get_template_part('form');
            get_template_part('map');
            ?>
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