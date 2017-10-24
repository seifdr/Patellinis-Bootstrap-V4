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
								<p>For those with a gluten allergy or have Celiac Disease, please visit our <a href="<?php echo get_term_link('gluten free', 'post_tag'); ?>"><strong> gluten free menu </strong></a>.</p>
								<br />
								<p><strong>Browse our menu by category</strong></p>
							</div>
							<!-- <div class="col-0 col-sm-2 b-red"></div> -->
					</div>
						<div class="row browseMenu">
									<ul class="col-12 col-sm-6" >
									<?php 

										$categories = get_categories( array(
										  	'hide_empty' => TRUE,
										  	'exclude'	=> 1,
										    'orderby' => 'meta_value',
										    'meta_key' => 'categoryOrder',
										    'order'   => 'ASC'
										) );
										
										//meta_key sort - meta_key sort not working in the term query, so we have to manually do 
										
										$postCatsArchive = array();
										
										$counterHere = 100;
										
										foreach ( $categories as $postCat ) {
											
											//look( $postCat );
											$x = get_term_meta( $postCat->term_id, 'categoryOrder')[0];
											
											// $postCatsArchive[] = $x;
											$postCatsArchive[$x] = $postCat;
								 			
											$counterHere++;
										}
										
										ksort( $postCatsArchive, SORT_NUMERIC ); //sorts the issue_archive array from low to high
										
										$categories = $postCatsArchive;		
										
										//end meta_key sort					

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
						
						foreach ( $categories as $category ) {
							
						?>
		
							<div class="row">
								<div class="col-12">
								<?php 
		
									echo "<h2 id='". $category->name ."' class='menuCat' >". $category->name ."</h2>";
		
									echo "<p>". $category->description . "</p>";
								?>
								</div>
							</div>
						
						<?php 
		
						if ( have_posts() ) {
		
							$post_counter = 0;
							$fhp_counter  = 0;
							$s_counter	  = 0;
							$bev_counter  = 0;
		
							while ( have_posts() ) {
								the_post();
								$post_counter++;
		
								$thisCategory = get_the_category();
		
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
								
								} // end if( $thisCategory[0]->cat_name == $category->name ){
		
							} // end while have_posts()
		
								$after_cat_title = get_field( 'after_cat_title', 'category_'.$category->cat_ID );
								$after_cat_content = get_field( 'after_cat_content', 'category_'.$category->cat_ID );
		
								if( !empty( $after_cat_title ) || !empty( $after_cat_content ) ){
		
									echo "<div class='row' ><div class='col-12'>";
		
										if( !empty( $after_cat_title ) ){
											echo '<h4>'. $after_cat_title . '</h4>';
										}
		
										if( !empty( $after_cat_content ) ){
											echo '<p>'. $after_cat_content . '</p>';
										}
		
									echo "<br /></div></div>";
		
								}
						} // end if have posts
		
						// rewind
						//rewind_posts();
		
					} // end foreach categories



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
