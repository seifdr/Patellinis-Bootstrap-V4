<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package StrapPress
 */

get_header(); ?>

	<div class="container main-container">
		<div class="row">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="col-12 col-sm-8 ml-auto mr-auto">
					<?php

						outputMenuPageBreadCrumb( is_singular( 'post' ) );

						while ( have_posts() ) : the_post();

						// post is menu item in this theme
						if( is_singular( 'post' ) ){
							// recreating the array we have from index 
							$catID 			= get_the_category()[0]->term_id; 
							$obj 			= get_category( $catID );
							$thisCategory  	= array( $obj );
							$category 		= $obj;

							$post_counter = 0;
							$fhp_counter  = 0;
							$s_counter	  = 0;
							$bev_counter  = 0;

							if( $thisCategory[0]->cat_name == $category->name ){
								if( strtolower( $thisCategory[0]->cat_name ) == "fresh homemade pizza"){
									$fhp_counter++;
									include( 'template-parts/menu-items/fresh-homemade-pizza.php' );
								} elseif( strtolower( $thisCategory[0]->cat_name ) == "fresh salads" ){
									$s_counter++; 
									include( 'template-parts/menu-items/fresh-salads.php' );	
								} elseif( strtolower( $thisCategory[0]->cat_name ) == "beverages" ){
									$bev_counter++;
									include( 'template-parts/menu-items/beverages.php' );
								} else {
									include( 'template-parts/menu-items/standard.php' );
								}

							} 
						} else {
							the_content();
						}

						endwhile; // End of the loop.
					?>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
<?php
//get_sidebar();
?>
	</div><!--  .row -->
<?php 
get_footer();