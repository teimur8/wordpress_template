<?php

    add_filter('show_admin_bar', '__return_false');

    add_action('wp_enqueue_scripts', 'test_media');

    // paths
    define( 'PATH_THEME_IMG', get_template_directory_uri() . '/assets/img/' );
    define( 'PATH_THEME_JS', get_template_directory_uri() . '/assets/js/' );


    function test_media()
    {
        wp_enqueue_style('test-main', get_stylesheet_uri());
        wp_enqueue_script('test-script' , PATH_THEME_JS. 'script.js', [], null);
    }

    add_action('after_setup_theme', 'test_after_setup');

    function test_after_setup(){

        register_nav_menu('top', 'Верхнее');


    }




    add_action('widgets_init', 'test_widget');

    function test_widget(){
        register_sidebar([
            'name'        => 'Sidebar Right',
            'id'          => 'sidebar-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => "</div>\n",
        ]);
        register_sidebar([
            'name'        => 'Sidebar Bottom',
            'id'          => 'sidebar-bottom',
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => "</div>\n",
        ]);
    }


