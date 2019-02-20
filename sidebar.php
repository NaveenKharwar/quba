<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quba
 */

if (! is_active_sidebar('sidebar-1')) {
    return;
}
?>

        <aside id="secondary" class="widget-area col-lg-3 col-md-3 col-sm-12  sidebar-right">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </aside><!-- #secondary -->
    </div><!--- .row -->
</div><!-- .container -->
