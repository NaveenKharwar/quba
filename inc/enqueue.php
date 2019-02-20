<?php
/**
 * quba enqueue scripts
 *
 * @package quba
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('quba_scripts')) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function quba_scripts()
    {
        wp_enqueue_style('quba-style', get_stylesheet_uri());

	    wp_enqueue_style( 'quba-fontawesome', get_template_directory_uri() . '/assets/fontawesome/fontawesome-all.min.css', array(), '5.2.0' );

        wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');

        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '20160804');

        wp_enqueue_style('my-google-fonts', 'https://fonts.googleapis.com/css?family=Cabin', false);

        wp_enqueue_script('quba-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

        wp_enqueue_script('quba-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

        wp_enqueue_script('scrollTop', get_template_directory_uri() . '/assets/js/scrollTop.js', array('jquery'), '20154834', true);


        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
} // endif function_exists( 'quba_scripts' ).

add_action('wp_enqueue_scripts', 'quba_scripts');
