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
					<div class="row upperContactInfo">
						<div class="col-6 text-center">
							<p>1429 Main Street Sarasota, Florida 34236</p>
						</div>
						<div class="col-6 text-center">
							<p>Order Now - Call 941-957-6433</p>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="site-branding">
								<div class="LogoOutter">
									<div class="LogoInner">
										<a href="<?php echo home_url(); ?>">
											<?php $description = get_bloginfo( 'description', 'display' ); ?>
											<img id="PatelinnisLogo" class="img-responsive" src='<?php echo esc_url( get_theme_mod( 'patelinni_logo_white', get_template_directory_uri() . '/img/Patelinnis-Header-Logo.png' ) ); ?>' alt="<?php echo $description; ?>" />
										</a>
									</div>
								</div>
							</div><!-- .site-branding -->
						</div>
					</div>
						
					<nav class="navbar navbar-expand-lg patel-navbar">
							<div class="smallOnly">
									<div>
										<a class="navbar-brand visible-xs" href="<?php echo get_site_url(); ?>" id="xsLogo" alt="Visit our homepage!">
											<img id="PatelinnisLogoSm" class="img-responsive" style="height: 50px; margin-top: 0; padding-top: 0;" src='<?php echo esc_url( get_theme_mod( 'patelinni_logo', get_template_directory_uri() . '/img/Patellinis-White-Logo.png' ) ); ?>' alt="Patellini's New York Style Pizza Logo. Sarasota, Florida." />
										</a>
									</div>
									<div>
										<div class="navbar-text navbar-left cellLinks"><a href="tel:9419576433" title="Order now" class="navbar-link">941-957-6433</a></div>
									</div>
								</div>
								<button class="navbar-toggler navbar-toggler-right custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
			<?php // if( !is_front_page() && !is_home() && !is_single() && !cat ){ ?>
			<?php if( is_page() ) { ?>
				<div class="row">
					<div class="col-12">
						<?php echo bootstrap_breadcrumb(); ?>
					</div>
				</div>
			<?php } ?>


