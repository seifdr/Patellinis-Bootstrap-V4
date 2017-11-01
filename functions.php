<?php

/**
 * Sidebar override 
 * If true --> no sidebar will show on page
 * If false --> sidebar will show on pages is no featured image is provided
 */

const SIDEBAR_OVERRIDE = FALSE;

/**
 * StrapPress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package StrapPress
 */

if ( ! function_exists( 'strappress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function strappress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on StrapPress, use a find and replace
	 * to change 'strappress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'strappress', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'strappress' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'strappress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'strappress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function strappress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strappress_content_width', 640 );
}
add_action( 'after_setup_theme', 'strappress_content_width', 0 );


/**
 * Add CSS/JS Scritps
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Register Widget Areas
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Bootstrap Walker.
 */
require get_template_directory() . '/inc/bootstrap-walker.php';


/** 
* Patellini's Specific Stuff 
*/

/**
*	Add in a Footer Widget Section
*/
require get_template_directory(). '/inc/footer-widgets.php';

/**
 * Implement the Breadcrumbs feature.
 */
require get_template_directory() . '/inc/breadcrumbs.php';


/**
*	Change Wordpress default posts to menu items
*/
require get_template_directory(). '/inc/menu.php';

function look( $value, $margin = NULL ){
	
	if( $margin ){
		echo "<div style='margin-left: 200px'>";
	}

	echo "<pre>";
	print_r( $value );
	echo "</pre>";

	if( $margin ){
		echo "</div>";
	}

}

function not_Blank($var){
	if( isset($var) && !empty($var) ){
		return TRUE;
	} else {
		return FALSE;
	}
}

function displayImg( $imgID = NULL, $size = "thumbnail", $class = NULL, $echo = FALSE ){
	if( $imgID != NULL && !empty( $imgID ) ){
			$image_url 	  = wp_get_attachment_image_src( $imgID, $size );
			$image_alt 	  = get_post_meta( $imgID, '_wp_attachment_image_alt', true);
			$image_title  = get_the_title( $imgID );

			$output = '<img src="'. $image_url[0] .'"';

			if( !empty( $image_alt ) ){ 
				$output .= ' alt="'. $image_alt .'" ';
			}  

			if( !empty( $image_title ) ){ 
				$output .= ' title="'. $image_title .'" ';
			}  

			if( !empty( $class ) ){ 
				$output .= ' class="'. $class .'" ';
			}  

			$output .= ' />';
			
			if( $echo ){
				echo $output; 
			} else {
				return $output;
			}
	}
}


function outputMenuPageBreadCrumb( $isPost = FALSE ) {
	if( $isPost ){
	?>
		<div class="row">
			<div class="col-12 menuBreadcrumb">
				<?php echo bootstrap_breadcrumb(); ?>
			</div>
		</div>
	<?php
	}
}

//shared get sorted categories by menu item order stored as metadata
function get_meta_key_sorted_category_list(){

	//if its a tag page, then we need only categories that have a post with that tag. Otherwise we can use all categories for the main page
	if( is_tag() ){
		//pull in the global post returned by main query 
		global $posts;
		
		//set empty array to capture, categories from posts in main query
		$tagCats = [];

		foreach ($posts as $p ) {
			//get the category id, should only be one, so we grab the first
			$cat = get_the_category( $p->ID )[0];

			//check if category id is already in tagcat array, if not, add it.
			if( !in_array( $cat->term_id, $tagCats ) ){
				$tagCats[] = $cat->term_id;
			}
		}

		$categories = get_categories( array(
			'hide_empty' => TRUE,
			'exclude'	=> 1,
			'include'	=> $tagCats,
			'orderby' => 'meta_value',
			'meta_key' => 'categoryOrder',
			'order'   => 'ASC'
		) );

	} else {
		$categories = get_categories( array(
			'hide_empty' => TRUE,
			'exclude'	=> 1,
			'orderby' => 'meta_value',
			'meta_key' => 'categoryOrder',
			'order'   => 'ASC'
		) );
	}

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

	return $categories;
}

//shared menu item display code for the index and archive pages
function output_menu_items_by_category( $categories=NULL){
	

	if( !empty( $categories) ){

			foreach ( $categories as $category ) {	
 
				if( $category->count > 0 ){	
			?>
					<div class="row">
						<div class="col-12">
						<?php 
							echo "<h2 id='". $category->name ."' class='menuCat' >". $category->name ."</h2>";
							echo "<p>". $category->description;
							
							if( is_tag('Gluten Free') ){
								echo " The following gluten free pizza options <strong>are available in 10″ only.</strong>";
							}
							echo "</p>";
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
			} // end if( $category->count > 0 )
		} // end foreach categories

	} // end if !empty( categories )
}