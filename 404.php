<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Quba
 */

get_header();
?>
<div class="container">
    <div class="row d-flex justify-content-center text-center">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="error-404 not-found col">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'quba'); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Search, what you are looking!', 'quba'); ?></p>
                    <?php
                    get_search_form();

                    ?>
                    <img class="img-404" src="<?php echo get_template_directory_uri(); ?>/assets/img/undraw_Taken_if77.png">
                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
