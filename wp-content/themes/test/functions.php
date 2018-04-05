<?php

    add_filter('show_admin_bar', '__return_false');

    add_action('wp_enqueue_scripts', 'test_media');

    function test_media()
    {
        wp_enqueue_style('test-main', get_stylesheet_uri());
        wp_enqueue_script('test-script' , get_template_directory_uri() . '/assets/js/script.js', [], null);
    }

    add_action('after_setup_theme', 'test_after_setup');

    function test_after_setup(){

        register_nav_menu('top', 'Верхнее');


    }