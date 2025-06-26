<?php

//enqueue script//
function enqueue_scripts()
{

    wp_enqueue_script('humberger-menu', get_stylesheet_directory_uri() .  '/js/humberger_menu.js', array(), false, true);
    wp_enqueue_script('projects_checkbox', get_stylesheet_directory_uri() .  '/js/projects-checkbox.js', array(), false, true);
    wp_enqueue_script('projects_renderer', get_stylesheet_directory_uri() .  '/js/projects-renderer.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');


//enqueue style//
function enqueue_style()
{
    wp_enqueue_style('ja-dev_style', get_theme_file_uri() . '/style.css', array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_style');
