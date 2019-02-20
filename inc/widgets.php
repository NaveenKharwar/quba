<?php
/**
 * Declaring widgets
 *
 * @package quba
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function quba_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'quba'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'quba'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar( array(
		'name'          => 'Footer Widget One',
		'id'            => 'footer_1',
		'before_widget' => '<div class="col-sm">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3  class="widget-title">',
		'after_title'   => '</h3>',
    ) );

	register_sidebar( array(
		'name'          => 'Footer Widget Two',
		'id'            => 'footer_2',
		'before_widget' => '<div class="col-sm">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );

	register_sidebar( array(
		'name'          => 'Footer Widget Three',
		'id'            => 'footer_3',
		'before_widget' => '<div class="col-sm">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action('widgets_init', 'quba_widgets_init');
