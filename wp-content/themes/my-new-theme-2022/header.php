<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
<div id="main-header-top">
    <nav id="main-navigation">
        <i class="fa fa-bars"></i>
        <i class="fa fa-close"></i>
        <ul>
            <li>
                <a <?php 
                    if (is_page('home')) {
                        echo "class='current-menu-item'";
                    }
                ?>
                href="<?php echo get_site_url(); ?>">Home</a>
            </li>
            <li>
                <a <?php 
                    if (get_post_type() == 'menu' || is_page('menu')) {
                        echo "class='current-menu-item'";
                    }
                ?>
                href="<?php echo site_url('/menu'); ?>">Menu</a>
            </li>
            <li>
                <a <?php 
                    if (get_post_type() == 'proposition' || is_page('propositions')) {
                        echo "class='current-menu-item'";
                    }
                ?>
                href="<?php echo site_url('/propositions'); ?>">Propositions</a>
            </li>
            <li>
                <a <?php 
                    if (is_page('about') || wp_get_post_parent_ID(0) == 2) {
                        echo "class='current-menu-item'";
                    }
                ?>
                href="<?php echo site_url('about'); ?>">About</a>
            </li>
            <li>
                <a <?php 
                    if (is_page('contact')) {
                        echo "class='current-menu-item'";
                    }
                ?>
                href="<?php echo site_url('/contact'); ?>">Contact</a>
            </li>
            <li>
                <a <?php 
                    if (get_post_type() == 'post') {
                        echo "class='current-menu-item'";
                    }
                ?>
                href="<?php echo site_url('/blog'); ?>">Blog</a>
            </li>
        </ul>
    </nav>
</div>
<header id="main-header" style="background-image: url(<?php
        echo get_theme_file_uri('/images/pizza.jpg');
    ?>)">
        
        