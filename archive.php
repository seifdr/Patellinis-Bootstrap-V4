<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package StrapPress
 */

get_header(); 



?>



<div class="container main-container">
	<div class="row">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="col-12 col-sm-8 ml-auto mr-auto">
					<?php

					outputMenuPageBreadCrumb( TRUE );
					
					?>
					<div class="row">
					<!-- <div class="col-0 col-sm-2 b-red"></div> -->
						<div class="col-12">
							<?php if( !is_tag('Gluten Free') ){ ?>
								<h1><?php echo single_term_title(); ?> Menu</h1>
								<?php
								the_archive_description('<p>','</p>');
								echo '<p>For those with a gluten allergy or have Celiac Disease, please visit our <a href="'. get_term_link('gluten free', 'post_tag') .'"><strong> gluten free menu </strong></a>.</p><br />';
								?>
							<?php } else { ?>
								<h1><?php echo single_term_title(); ?> Menu</h1>
							<?php
								the_archive_description('<p>','</p>');
								echo "<p>Below is a list of our gluten free menu options. To view our complete menu, please visit our <strong><a href='". get_permalink( get_option( "page_for_posts" ) ) ."'>menu page.</a></strong></p><br />";
							 } ?>							
						</div>
					<!-- <div class="col-0 col-sm-2 b-red"></div> -->
					</div>
					<div class="row">
						<div class="col-12">
						<?php 

							//in functions.php file, shared with index.php. 
							//this function returns a sorted list of categories by a custom metadata order value
							$categories = get_meta_key_sorted_category_list();		

							// in function.php file, shared with index.php
							output_menu_items_by_category( $categories );
						?>
						</div> <!-- close col-12 -->
					</div> <!-- close row -->

				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
<?php
// get_sidebar();
?>
	</div><!--  .row -->
<?php 
get_footer();
