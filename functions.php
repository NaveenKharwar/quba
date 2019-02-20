<?php
/**
 * Quba functions and definitions
 *
 * @package Quba
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$quba_includes = array(
    '/customizer/custom-controls.php', // Custom Control Class
    '/required-plugin/plugin-required.php', // Plugin Required.
    '/customizer/custom-customizers.php', // Custom Customizer Control Settings
    '/theme-settings.php', // Initialize theme default settings.
    '/widgets.php', // Register widget area.
    '/enqueue.php', // Enqueue scripts and styles.
    '/theme-excerpt.php', // Custom Excerpt Setting for this Theme.
    '/customizer.php', // Customizer additions.
    '/class-wp-bootstrap-navwalker.php', // Load custom WordPress nav walker.
    '/editor.php', // Load Editor functions.
);

foreach ($quba_includes as $file) {
    $filepath = locate_template('inc' . $file);
    if (!$filepath) {
        trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
    }
    require_once $filepath;
}

