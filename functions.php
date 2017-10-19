<?php

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