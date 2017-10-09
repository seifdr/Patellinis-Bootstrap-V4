<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

?>

	<div id="footer-sidebar" class="row footer-widgets" role="complementary">
			<?php if ( is_active_sidebar( 'patellinis-footer-widgets' ) ) { ?>
					<?php dynamic_sidebar( 'patellinis-footer-widgets' ); ?>
			<?php } ?>
	</div>
</div><!-- #content -->
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				&copy; <?php bloginfo( 'name' );
						echo ' - ';
						echo date("Y"); ?>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>


</div><!--  .container -->
</body>
</html>
