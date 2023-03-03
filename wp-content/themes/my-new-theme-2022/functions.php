<?php
    function my_theme_files() {
        wp_enqueue_style('my-theme-styles', get_stylesheet_uri());
        wp_enqueue_script('script', '/wp-content/themes/my-new-theme-2022/script.js');
        wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/715294a907.js');
    }

    add_action('wp_enqueue_scripts', 'my_theme_files');


    function my_theme_features() {
        add_theme_support('title-tag');
        add_theme_support( 'post-thumbnails');
        add_image_size('chef-card', 200, 133, true);
        add_image_size('menu-card', 350, 350, true);
    }
    add_action('after_setup_theme', 'my_theme_features');
?>