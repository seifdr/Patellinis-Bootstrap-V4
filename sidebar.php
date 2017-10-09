<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

if ( has_post_thumbnail() ) { ?>
	<aside id="secondary" class="featureImg-area" role="complementary">
		<?php displayImg( get_post_thumbnail_id(), "large", 'img-responsive page-img-feature', TRUE ); ?>
	</aside><!-- #secondary -->
<?php } elseif ( is_active_sidebar( 'sidebar-1' ) ) { ?>
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
<?php } ?>



