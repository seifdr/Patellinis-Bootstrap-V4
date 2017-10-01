<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>

        <div id="primary">
            <main id="main" class="site-main" role="main">

                <!-- HOMEPAGE IMAGE CAROUSEL -->
                <?php get_template_part( 'template-parts/homepage-carousel'); ?>

                <!-- HOMEPAGE IMAGE CAROUSEL -->
                <?php get_template_part( 'template-parts/homepage-3-block-feature'); ?>

                <!-- HOMEPAGE IMAGE CAROUSEL -->
                <?php get_template_part( 'template-parts/homepage-bottom-feature'); ?>

            </main><!-- #main -->
        </div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
