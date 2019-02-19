<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quba
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer container">
  <div class="footer widget">
    <div class="row">
        <?php if (is_active_sidebar('footer_1')) : ?>
            <?php dynamic_sidebar('footer_1'); ?>
        <?php endif; ?>
            <?php if (is_active_sidebar('footer_2')) : ?>
                <?php dynamic_sidebar('footer_2'); ?>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer_3')) : ?>
                <?php dynamic_sidebar('footer_3'); ?>
            <?php endif; ?>
        <div class="col-sm footer-contact">
          <i class="fa fa-phone" aria-hidden="true"></i>
          <p class="tel"><?php echo get_theme_mod('telephone_number', '+91 (1234) 67893)') ?></p>
          <p class="email-address"><a href="mailto:<?php echo get_theme_mod('email_address-footer', 'hi@naveenkharwar.com') ?>"><?php echo get_theme_mod('email_address-footer', 'hi@naveenkharwar.com') ?></a></p>
          <p><a href="<?php echo get_theme_mod('contact_form', '') ?>">Contact Me!</a></p>
        </div>
    </div>
  </div>
  <div class="site-info">
    <div class="row">
      <div class="col-md-12">
        <?php echo '<p><a target="_blank" href="http://www.demo.naveenkharwar.com/theme/quba/">Quba</a><br/>'.__('Proudly powered by','quba').' WordPress</p>'; ?>
      </div>
    </div>
  </div><!-- .site-info -->
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
