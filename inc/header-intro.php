<?php
/**
 * Add intro section to header.
 *
 * @package Quba
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit('No script rookies, please.');
} ?>
<div class="container">
<div id="intro">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="intro-text">
            <h2><?php echo get_theme_mod( 'intro_primary_text', 'Quba WordPress Theme' ) ?></h2>
            <p class="text-secondary-heading"><?php echo get_theme_mod( 'intro_secondary_text', 'Quba is a WordPress Theme designed with design attention to details, flexibility and performance. You can easily customize every bit of the theme.' ) ?></p>
            </div>
            <p>
              <a class="intro-button" href="<?php echo get_theme_mod( 'button_one_link', '' ) ?>"><?php echo get_theme_mod( 'button_one_text', 'Contact' ) ?></a>
              <a class="intro-button" href="<?php echo get_theme_mod( 'button_two_link', '' ) ?>"><?php echo get_theme_mod( 'button_two_text', 'Blog' ) ?></a>
            </p>
        </div>
        <?php
            function intro_image_url() {
                if ( get_theme_mod( 'image_intro' ) > 0 ) {
                    return wp_get_attachment_url( get_theme_mod( 'image_intro' ) );
                } else {
                    return get_template_directory_uri() . '/assets/img/wp.png';
                }
            }
        ?>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <img class="img-fluid" src="<?php echo esc_url( intro_image_url() ); ?>" />
        </div>
    </div>
</div>
</div>
