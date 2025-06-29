<?php

add_filter('get_the_archive_title', function(){
    if(is_post_type_archive('our_blogs')){
        $title = "Blogs";
        return $title;
    }elseif(is_post_type_archive('our_services')){
        $title = "Services";
        return $title;
    }
    
});

function jadev_menu()
{
    $locations = array(
        'primary' => "Primary Menu",
        'footer' => "Footer Menu"
    );
    register_nav_menus($locations);
}
add_action('init', 'jadev_menu');

function jadev_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','jadev_theme_support');

//enqueue script//
function jadev_enqueue_scripts()
{
    wp_enqueue_script('jadev-main', get_stylesheet_directory_uri() .  '/assets/js/main.js', array('jadev-jquery'), false, true);
    wp_enqueue_script('jadev-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), false, true);
    wp_enqueue_script('jadev-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.j', array(), false, true);
    wp_enqueue_script('jadev-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'jadev_enqueue_scripts');


//enqueue style//
function jadev_enqueue_style()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style('jadev-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('jadev-font', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), false, 'all');
    wp_enqueue_style('jadev-style', get_template_directory_uri() . '/style.css', array('jadev-bootstrap'), $version, 'all');
}
add_action('wp_enqueue_scripts', 'jadev_enqueue_style');

function jadev_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Social Media Icons',
            'id' => 'social-media-icons',
            'decription' => 'social media icons and links'
        ),
    );
}
add_action('widgets_init', 'jadev_widget_areas');