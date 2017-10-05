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
	</div><!-- #content -->
</div><!-- #page -->

<div id="primary-sidebar" class="row footer-widgets" role="complementary">
		<?php if ( is_active_sidebar( 'patellinis-footer-widgets' ) ) { ?>
				<?php dynamic_sidebar( 'patellinis-footer-widgets' ); ?>
		<?php } ?>
	</div>



<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				&copy; <?php bloginfo( 'name' );
						echo ' - ';
						echo date("Y"); ?>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</div> <!-- closing the container div from above -->
</body>
</html>
