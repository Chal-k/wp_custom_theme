<?php

function customtheme_enqueue_styles()
{

    wp_enqueue_style(
        'normalize',
        get_stylesheet_directory_uri() . '/assets/css/normalize.css',
        array(),
        false,
        'all'
    );

    wp_enqueue_style(
        'bootstrap',
        get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css',
        array(),
        false,
        'all'
    );

    wp_enqueue_style(
        'superfish',
        get_stylesheet_directory_uri() . '/assets/css/superfish.css',
        array(),
        false,
        'all'
    );

    wp_enqueue_style(
        'main-stylesheet',
        get_stylesheet_uri(),
        array('normalize', 'bootstrap'),
        '1.0',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'customtheme_enqueue_styles');

function customtheme_enqueue_scripts()
{

    wp_enqueue_script(
        'superfish',
        get_stylesheet_directory_uri() . '/assets/js/superfish.min.js',
        array('jquery'),
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'main-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'customtheme_enqueue_scripts');

wp_enqueue_script('imagesloaded');

/*----------------------------------------------------------*/
/* Adds new body classes
/*----------------------------------------------------------*/
add_filter('body_class', 'add_browser_classes');
function add_browser_classes($classes)
{
    // WordPress global variables with browser information
    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;

    if ($is_chrome) {
        $classes[] = 'chrome';
    } elseif ($is_gecko) {
        $classes[] = 'gecko';
    } elseif ($is_opera) {
        $classes[] = 'opera';
    } elseif ($is_safari) {
        $classes[] = 'safari';
    } elseif ($is_IE) {
        $classes[] = 'internet-explorer';
    }
    return $classes;
}

function nd_dosth_theme_setup()
{

    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    */
    load_theme_textdomain('cm_theme', get_stylesheet_directory() . '/languages');

    // Adds <title> tag support
    add_theme_support('title-tag');

    // Add custom-logo support
    add_theme_support('custom-logo');

    // Register Navigation Menus
    register_nav_menus(array(
        'header'   => esc_html__('Display this menu in header', 'cm_theme'),
        'footer'   => esc_html__('Display this menu in footer', 'cm_theme'),
    ));
}
add_action('after_setup_theme', 'nd_dosth_theme_setup');
