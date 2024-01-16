<?php

if (!function_exists('block_theme_support')) :

    /** 
     * @since Block Theme 1,0
     * 
     * @return void
     */

    function block_theme_support()
    {
        //Add theme support for block styles 
        add_theme_support('wp-block-styles');

        //Enqueue editor styles
        add_editor_style('style.css');
    }

endif;

add_action('after_setup_theme', 'block_theme_support');

/**
 * Enqueue  Styles
 */

if (!function_exists('block_theme_styles')) :

    function block_theme_styles()

    {
        //Register Stylesheets
        wp_enqueue_style('block-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
        wp_enqueue_style('block-theme-style-blocks', get_template_directory_uri() . '/assets/css/blocks.css', array(), wp_get_theme()->get('Version'));
    }

endif;

add_action('wp_enqueue_scripts', 'block_theme_styles');

function excerpt_custom_length($length)
{

    return 15;
}

add_filter('excerpt_length', 'excerpt_custom_length');
