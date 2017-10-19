<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); ?>

	<div class="container main-container">
		<div class="row">
			<div id="primary" class="<?php 
					//add class if there is a image feature set 
					if( has_post_thumbnail() ){
						echo "content-area-with-feature-img";
					// add class if there is side bar
					} elseif ( is_active_sidebar( 'sidebar-1' ) ) {
						echo "content-area-with-sidebar";
					// no featured image or sidebar
					} else {
						echo "content-area";
					}
			?>">
				<main id="main" class="site-main" role="main">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
<?php
get_sidebar();
?>
	</div><!--  .row -->
<?php 
get_footer();
