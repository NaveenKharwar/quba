<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page.
 *
 * @package WordPress
 */

get_header();
?>
<div>
  <div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (get_theme_mod('about_toggle_switch') == '') { ?>
        <!-- 
          Front Page About Section Start
        -->
        <section id="about">
          <div class="container-fluid">
            <div class="row">
              <?php
                function about_image_url()
                {
                    if (get_theme_mod('image_about') > 0) {
                        return wp_get_attachment_url(get_theme_mod('image_about'));
                    } else {
                        return get_template_directory_uri() . '/assets/img/undraw_personalization_triu.png';
                    }
                }
                ?>
              <div class="col-sm-12 col-md-12 col-lg-6">
                <img class="img-fluid" src="<?php echo esc_url(about_image_url()); ?>" alt="" srcset="">
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 about-content">
                <h1><?php echo get_theme_mod('about_heading', 'About Developer') ?></h1>
                <p><?php echo get_theme_mod('about_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                  fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.') ?>
                </p>
              </div>
            </div>
          </div>
        </section>
        <!-- 
          Front Page Services Section Start
        -->
        <?php } // end if ?>
        <?php if (get_theme_mod('services_toggle_switch') == '') { ?>
          <section id="services">
            <div class="container">
              <div class="row">
                <div class="section-entry">
                  <h1><?php echo get_theme_mod('services_heading', 'What we provide') ?></h1>
                  <p><?php echo get_theme_mod('service_subheading', 'Nullam blandit gravida viverra. Etiam turpis erat, sagittis sit amet felis non, porta porta justo.Integer ornare nibh nulla, id pulvinar metus cursus semper.') ?></p>
                </div><!-- .section-entry -->
                <div class="services">
                  <div class="row">
                    <?php if (get_theme_mod('servicesOne_toggle_switch') == '') { ?>
                      <div class="col-lg-3 col-md-6 text-center service-item">
                      <?php //image
                      function serviceOne_image_url()
                      {
                        if (get_theme_mod('serviceOne_image') > 0) {
                          return wp_get_attachment_url(get_theme_mod('serviceOne_image'));
                        } else {
                          return get_template_directory_uri() . '/assets/img/png/021-resume-1.png';
                        }
                      }
                      ?>
                      <img class="img-fluid" src="<?php echo esc_url(serviceOne_image_url()); ?>" alt="">
                      <h5><?php echo get_theme_mod('servicesOne_heading', 'Content Marketing') ?></h5>
                      <p><?php echo get_theme_mod('serviceOne_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                    </div><!--- .service-item (One)-->
                  <?php } // end if ?>
                  <?php if (get_theme_mod('servicesTwo_toggle_switch') == '') { ?>
                  <div class="col-lg-3 col-md-6 text-center service-item">
                    <?php //image
                    function serviceTwo_image_url()
                    {
                      if (get_theme_mod('serviceTwo_image') > 0) {
                        return wp_get_attachment_url(get_theme_mod('serviceTwo_image'));
                      } else {
                        return get_template_directory_uri() . '/assets/img/png/042-conversation-1.png';
                      }
                    }
                    ?>
                    <img class="img-fluid" src="<?php echo esc_url(serviceTwo_image_url()); ?>" alt="">
                    <h5><?php echo get_theme_mod('servicesOne_heading', 'Email Marketing') ?></h5>
                    <p><?php echo get_theme_mod('serviceTwo_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                  </div><!--- .service-item (Two)-->
                <?php } // end if ?>
                  <?php if (get_theme_mod('servicesThree_toggle_switch') == '') { ?>
                  <div class="col-lg-3 col-md-6 text-center service-item">
                  <?php //image
                  function serviceThree_image_url()
                  {
                    if (get_theme_mod('serviceThree_image') > 0) {
                      return wp_get_attachment_url(get_theme_mod('serviceThree_image'));
                    } else {
                      return get_template_directory_uri() . '/assets/img/png/001-salary-1.png';
                    }
                  }
                  ?>
                  <img class="img-fluid" src="<?php echo esc_url(serviceThree_image_url()); ?>" alt="">
                  <h5><?php echo get_theme_mod('servicesThree_heading', 'Market Analysis') ?></h5>
                  <p><?php echo get_theme_mod('serviceThree_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                  </div><!--- .service-item (Three)-->
                  <?php } // end if ?>
                  <?php if (get_theme_mod('servicesFour_toggle_switch') == '') { ?>
                  <div class="col-lg-3 col-md-6 text-center service-item">
                  <?php //image
                  function serviceFour_image_url()
                  {
                    if (get_theme_mod('serviceFour_image') > 0) {
                      return wp_get_attachment_url(get_theme_mod('serviceFour_image'));
                    } else {
                      return get_template_directory_uri() . '/assets/img/png/035-video-conference.png';
                    }
                  }
                  ?>
                  <img class="img-fluid" src="<?php echo esc_url(serviceFour_image_url()); ?>" alt="">
                  <h5><?php echo get_theme_mod('servicesFour_heading', 'Web Development') ?></h5>
                  <p><?php echo get_theme_mod('serviceFour_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                  </div><!--- .service-item (Four) -->
                  <?php } // end if ?>
                  <?php if (get_theme_mod('servicesFive_toggle_switch') == '') { ?>
                  <div class="col-lg-3 col-md-6 text-center service-item">
                  <?php //image
                  function serviceFive_image_url()
                  {
                    if (get_theme_mod('serviceFive_image') > 0) {
                      return wp_get_attachment_url(get_theme_mod('serviceFive_image'));
                    } else {
                      return get_template_directory_uri() . '/assets/img/png/048-conversation.png';
                    }
                  }
                  ?>
                  <img class="img-fluid" src="<?php echo esc_url(serviceFive_image_url()); ?>" alt="">
                  <h5><?php echo get_theme_mod('servicesFive_heading', 'Keyword Research') ?></h5>
                  <p><?php echo get_theme_mod('serviceFive_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                  </div><!--- .service-item (Five) --->
                  <?php } // end if ?>
                  <?php if (get_theme_mod('servicesSix_toggle_switch') == '') { ?>
                  <div class="col-lg-3 col-md-6 text-center service-item">
                  <?php //image
                  function serviceSix_image_url()
                  {
                    if (get_theme_mod('serviceSix_image') > 0) {
                      return wp_get_attachment_url(get_theme_mod('serviceSix_image'));
                    } else {
                      return get_template_directory_uri() . '/assets/img/png/046-interview-1.png';
                    }
                  }
                  ?>
                  <img class="img-fluid" src="<?php echo esc_url(serviceSix_image_url()); ?>" alt="">
                  <h5><?php echo get_theme_mod('servicesSix_heading', 'Optimization') ?></h5>
                  <p><?php echo get_theme_mod('serviceSix_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                  </div> <!-- .service-item (Six) -->
                  <?php } // end if ?>
                  <?php if (get_theme_mod('servicesSeven_toggle_switch') == '') { ?>
                  <div class="col-lg-3 col-md-6 text-center  service-item">
                  <?php //image
                  function serviceSeven_image_url()
                  {
                    if (get_theme_mod('serviceSeven_image') > 0) {
                      return wp_get_attachment_url(get_theme_mod('serviceSeven_image'));
                    } else {
                      return get_template_directory_uri() . '/assets/img/png/024-interview-2.png';
                    }
                  }
                  ?>
                  <img class="img-fluid" src="<?php echo esc_url(serviceSeven_image_url()); ?>" alt="">
                  <h5><?php echo get_theme_mod('servicesSeven_heading', 'Social Media Optimization') ?></h5>
                  <p><?php echo get_theme_mod('serviceSeven_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                  </div><!--- .service-item (Seven) -->
                  <?php } // end if ?>
                  <?php if (get_theme_mod('servicesEight_toggle_switch') == '') { ?>
                  <div class="col-lg-3 col-md-6 text-center service-item">
                  <?php //image
                  function serviceEight_image_url()
                  {
                    if (get_theme_mod('serviceEight_image') > 0) {
                      return wp_get_attachment_url(get_theme_mod('serviceEight_image'));
                    } else {
                      return get_template_directory_uri() . '/assets/img/png/041-profiles.png';
                    }
                  }
                  ?>
                  <img class="img-fluid" src="<?php echo esc_url(serviceEight_image_url()); ?>" alt="">
                  <h5><?php echo get_theme_mod('servicesEight_heading', 'CMS Developemnt') ?></h5>
                  <p><?php echo get_theme_mod('serviceEight_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ?></p>
                  </div><!--- .service-item (Eight) -->
                  <?php } // end if ?>
                </div><!-- .row --->
              </div><!-- .services -->
            </div>
          </div>
        </section><!-- #services -->
        <!-- 
          Front Page Services Section End
        -->
        <?php } // end if ?>
        <?php if (get_theme_mod('portfolio_toggle_switch') == '') { ?>
        <!-- 
          Front Page Portfolio Section Start
        -->
        <section id="portfolio">
          <div class="container">
            <div class="section-entry">
            <h1><?php echo get_theme_mod('portfolio_heading', 'Portfolio') ?></h1>
              <p><?php echo get_theme_mod('portfolio_subheading', 'Showcase your work effectively and in an attractive form that your prospective clients will love.') ?></p>
            </div>
            <div class="row">
              <?php
              if (get_query_var('paged')) {
                $paged = get_query_var('paged');
              }
              if (get_query_var('page')) {
                $paged = get_query_var('page');
              }
              $query = new WP_Query(array( 'post_type' => 'portfolio', 'paged' => $paged ));
              if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) :
                  $query->the_post(); ?>
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="service-card-1">
                      <div class="content">
                        <a href="<?php the_permalink(); ?>">
                          <div class="content-overlay"></div>
                          <?php the_post_thumbnail('content-image img-fluid'); ?>
                          <div class="content-details fadeIn-bottom inner__content">
                            <span><?php the_title(); ?></span>
                          </div><!-- .content-details -->
                        </a><!-- the_permalink(); -->
                      </div><!-- .content -->
                    </div><!--- .service-card-1 -->
                  </div><!-- .col-lg-6 col-md-12 col-sm-12 -->
                    <?php  endwhile;
wp_reset_postdata(); ?><!-- show pagination here -->
                <?php else :
    ?><!-- show 404 error here -->
                <?php endif; ?>
            </div><!--- .row -->
          </div><!-- .container --->
        </section><!--- #portfolio -->
        <!-- 
          Front Page Portfolio Section End
        -->
        <?php } // end if ?>
        <!-- 
          Front Page Contact Section Start
        -->
        <?php if (get_theme_mod('contact_toggle_switch') == '') { ?>
        <section id="contact">
          <div class="container">
            <div class="row">
              <div class="section-entry">
                <h1><?php echo get_theme_mod('contact_heading', 'Ready To Get Start') ?></h1>
                <p><?php echo get_theme_mod('contact_subheading', 'Get in touch with me') ?></p>
              </div><!--- .section-entry -->
            </div>
          </div>

          <div class="container">
            <div class="row justify-content-md-center footer-check">
              <div class="col text-center cheked-in">
                  <p> Cheked in to : <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo home_url(); ?></a></p>
              </div>
              <div class="col-md-auto text-center">
                <div class="footer-scroll">
                  <p><a href="#" class="scrollup  fas fa-chevron-up"></a></p>
                </div><!--- .footer-scroll -->
              </div>

              <div class="col text-center">
                  <div class="footer-icons vertical-divider">
                    <a href="<?php echo get_theme_mod('saOne_url', '') ?>" class="<?php echo get_theme_mod('saOne_class', '') ?>"></a>
                    <a href="<?php echo get_theme_mod('saTwo_url', '') ?>" class="<?php echo get_theme_mod('saTwo_class', '') ?>"></a>
                    <a href="<?php echo get_theme_mod('saThree_url', '') ?>" class="<?php echo get_theme_mod('saThree_class', '') ?>"></a>
                    <a href="<?php echo get_theme_mod('saFour_url', '') ?>" class="<?php echo get_theme_mod('saFour_class', '') ?>"></a>
                    <a href="<?php echo get_theme_mod('saFive_url', '') ?>" class="<?php echo get_theme_mod('saFive_class', '') ?>"></a>
                    <a href="mailto:<?php echo get_theme_mod('email_address', '') ?>" class="<?php echo get_theme_mod('email_class', '') ?>"></a>
                  </div><!--- .footer-icons -->
              </div>
            </div>
          </div>
        </section><!-- #contact --->
        <?php } // end if ?>

        <!-- 
          Front Page Contact Section End
        -->
      </main><!-- #main -->
    </div><!-- #primary -->
    </div><!-- .container-fluid -->
<?php
get_footer();
