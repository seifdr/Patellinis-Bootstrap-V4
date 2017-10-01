<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapPress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />

		<?php
			if( function_exists( 'get_field' ) ){
							$meta_description	= get_field('meta_description');

							if( !empty( $meta_description ) ){
								echo '<meta name="description" content="'. trim( $meta_description ) .'">';
							}
			} // close - 	if( function_exists( 'get_field' ) ){
		?>

		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container master-container">

		<div id="page" class="site">

			<header id="masthead" class="site-header" role="banner">

					<style type="text/css">
						nav.patel-navbar{
							background-color: #000;
							padding: 0;
						}

						ul#upper-nav {
							display: flex;
							justify-content: space-evenly;
							align-content: strech;
							flex-grow: 1;
						}

						ul#upper-nav li {
							display: flex;
							flex-grow: 1;
						}

						ul#upper-nav li.wide {
							flex-grow: 1.5;
						}

						ul#upper-nav li a {
							width: 100%;
						}

					</style>


					<nav class="navbar navbar-expand-lg patel-navbar">
						
						<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
							<div class="collapse navbar-collapse" id="navbarNav">
									<?php
									$args = array(
										'menu' => 'Upper Nav',
										// 'theme_location' => 'Upper Nav',
										'depth'      => 3,
										'container'  => false,
										'menu_class' => 'nav nav-justified',
										'menu_id' =>  'upper-nav',
										'walker'     => new Bootstrap_Walker_Nav_Menu()
										);
									if (has_nav_menu('primary')) {
										wp_nav_menu($args);
									}
									?>
								</div>

				</nav>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
