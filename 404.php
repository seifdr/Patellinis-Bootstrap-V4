<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package StrapPress
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'strappress' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'strappress' ); ?></p>
							<p><a title="Visit our homepage" href="<?php echo get_home_url(); ?>">Click here to return home</a> or visit our <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">menu page.</a></p>
							<?php
								//get_search_form();

								//the_widget( 'WP_Widget_Recent_Posts' );

								// Only show the widget if site has multiple categories.
							?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--  .row -->

<?php
get_footer();
