<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>

<div class="container main-container">
		<div class="row">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div> <!-- Close row -->
<?php
// get_sidebar();
get_footer();
