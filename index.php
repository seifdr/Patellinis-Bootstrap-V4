<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
					<div class="col-12 col-sm-8 ml-auto mr-auto">
					<?php
						// ini_set('display_errors', 1);
						// ini_set('display_startup_errors', 1);
						// error_reporting(E_ALL);
					
						outputMenuPageBreadCrumb( TRUE );
					?>
					<div class="row">
							<!-- <div class="col-0 col-sm-2 b-red"></div> -->
							<div class="col-12">
								<h1 class="menuH1">Menu</h1>
								<p>For those with a gluten allergy or have Celiac Disease, please visit our <a href="<?php echo get_term_link('gluten free', 'post_tag'); ?>"><strong> gluten free menu </strong></a>.</p>
								<br />
								<p><strong>Browse our menu by category</strong></p>
							</div>
							<!-- <div class="col-0 col-sm-2 b-red"></div> -->
					</div>
						<div class="row browseMenu">
									<ul class="col-12 col-sm-6" >
									<?php 

										//in functions.php file, shared with archive.php. 
										//this function returns a sorted list of categories by a custom metadata order value
										$categories = get_meta_key_sorted_category_list();				

										$categoryCnt = ceil( ( count( $categories ) )/2 );
										$catCount = 0;

										foreach ( $categories as $category ) {
											$catCount++;
											echo '<li><a href="#'. $category->name .'">'.  $category->name . '</a></li>';

											if( $catCount == $categoryCnt ){
												echo '</ul><ul class="col-12 col-sm-6">';
											}
										}
									?>
									</ul>
						</div>
						<div class="row">
							<div class="col-12">
								<p>For a pdf copy of our menu, please <a target="_blank" href="http://www.patellinis.com/wp-content/uploads/2017/06/patellinis-menu.pdf">click here</a>.</p>
								<br />
							</div>
						</div>
						<?php 
							// in function.php file
							output_menu_items_by_category( $categories );
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
