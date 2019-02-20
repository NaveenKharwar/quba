<?php
/**
 * Registers an editor stylesheet for the theme.
 *
 * @package quba
 */

 function quba_theme_add_editor_styles() {
    add_editor_style( '/editor-style.css' );
}
add_action( 'admin_init', 'quba_theme_add_editor_styles' );

