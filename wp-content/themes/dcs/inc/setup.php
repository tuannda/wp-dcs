<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dcs_setup()
{
    load_theme_textdomain('dcs', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'main_menu' => esc_html__('Main Menu', 'dcs'),
    ]);

    /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
    add_theme_support(
        'html5',
        [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]
    );
}

add_action('after_setup_theme', 'dcs_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dcs_content_width()
{
    $GLOBALS['content_width'] = apply_filters('dcs_content_width', 640);
}

add_action('after_setup_theme', 'dcs_content_width', 0);

/**
 * The path where JSON files are created when ACF field groups are saved/updated
 * @param string path of save point
 * @return string path of save point
 * @link http://www.advancedcustomfields.com/resources/local-json/
 * @link http://www.advancedcustomfields.com/resources/synchronized-json/
 */
function acf_json_save_point($path)
{
    return get_template_directory() . '/acf-json';
}

add_filter('acf/settings/save_json', 'acf_json_save_point');

/**
 * The path where JSON files are loaded when ACF field groups are initialized
 * @param array of string paths of load point(s)
 * @return array of string paths of load point(s)
 * @link http://www.advancedcustomfields.com/resources/local-json/
 * @link http://www.advancedcustomfields.com/resources/synchronized-json/
 */
function acf_json_load_point($paths)
{
    return array(get_template_directory() . '/acf-json');
}

add_filter('acf/settings/load_json', 'acf_json_load_point');
