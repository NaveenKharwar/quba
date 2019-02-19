<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quba
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'quba'); ?></a>
    <header isd="masthead" class="site-header" style="background:url('<?php header_image(); ?>') no-repeat center center fixed; background-size: cover;">
    <div class="header-backgroundColor"></div>
    <section>
    <nav class="navbar navbar-expand-md navbar-light" role="navigation">
  <div class="container nav-wrapper">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="site-branding">
        <?php the_custom_logo(); ?>
        <div class="site-branding-text">
            <h2 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h2>
        </div><!-- .site-branding-text -->
    </div><!-- .site-branding -->
        <?php
        wp_nav_menu(array(
            'theme_location'    => 'quba-menu',
            'depth'             => 1,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ));
        ?>
    </div>
</nav>
    <?php if (get_theme_mod('intro_toggle_switch') == '') { ?>
        <?php
        if (is_front_page() && !is_home()) {
            require get_template_directory() . '/inc/header-intro.php';
        } else {
            // do nothing
        }
        ?>
    <?php } // end if ?>

    </section>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
