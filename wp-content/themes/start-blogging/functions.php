<?php
/**
 * Blogging functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Start_Blogging
 * @version 1.0.0
 */

 // Declare latest theme version
 $GLOBALS['START_BLOGGING_VERSION'] = '1.0.0';
 
/**
 * Blogging only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

 
//----------------------------------------------------------------------------------
//	Theme Setup and Support
//----------------------------------------------------------------------------------

function start_blogging_setup() {
	

	// set the maximum width for content in the theme https://codex.wordpress.org/Content_Width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 790;
	}

	// Loads texdomain. https://codex.wordpress.org/Function_Reference/load_theme_textdomain
	load_theme_textdomain( 'start-blogging', get_template_directory() . '/languages' );

	// Add automatic feed links support. https://codex.wordpress.org/Automatic_Feed_Links
	add_theme_support( 'automatic-feed-links' );

	// Add selective Widget refresh support
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for html5
	add_theme_support( 'html5', array( 'search-form' ) );
	
	// Takes care of the <title> tag. https://codex.wordpress.org/Title_Tag
	add_theme_support( 'title-tag' );

	
	// Add theme styling to the post editor 
	add_editor_style( array( 'assets/css/editor.css', start_blogging_fonts_url() ) );
	
	// This theme uses wp_nav_menu(). https://codex.wordpress.org/Function_Reference/register_nav_menu
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'start-blogging' ),
		'social' => esc_html__( 'Social Menu', 'start-blogging' ),
		'topsocial' => esc_html__( 'Top Social Menu', 'start-blogging' ),
		'footer'  => esc_html__( 'Footer Menu', 'start-blogging' ),
	) );	
	
	// Add custom background support. https://codex.wordpress.org/Custom_Backgrounds
	add_theme_support( 'custom-background', array(
		'default-color' => '000',
	) );

	// Add theme support for custom logo. https://codex.wordpress.org/Theme_Logo
	add_theme_support( 'custom-logo', array(
		'flex-width'  => true,
		'height'      => 100,
		'flex-height'  => true,
	) );
	
	// Enable support for Post Thumbnails on posts and pages. https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 add_theme_support( 'post-thumbnails' );
	 
	// Adding image sizes. https://developer.wordpress.org/reference/functions/add_image_size/
	add_image_size( 'start_blogging_blog', 800, 500, true );

}
add_action( 'after_setup_theme', 'start_blogging_setup' );


//----------------------------------------------------------------------------------
//	Add Body Classes
//----------------------------------------------------------------------------------

// Get the colorscheme or the default if there isn't one.
function start_blogging_body_classes( $classes ) {
	$colors = start_blogging_sanitize_colorscheme( get_theme_mod( 'colorscheme', 'default' ) );
	$classes[] = 'colors-' . $colors;
	return $classes;
}
add_filter( 'body_class', 'start_blogging_body_classes' );

// Add class to page nav
	function start_blogging_wp_page_menu_class( $class ) {
	  return preg_replace( '/<ul>/', '<ul class="nav navbar-nav">', $class, 1 );
	}
	add_filter( 'wp_page_menu', 'start_blogging_wp_page_menu_class' );
	
//----------------------------------------------------------------------------------
// Add Inline Custom Colour CSS 
// Special thanks to the TwentySeventeen theme
//----------------------------------------------------------------------------------
function start_blogging_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}
	require_once( START_BLOGGING_PHP_INCLUDE . '/color-patterns.php' );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 44 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo start_blogging_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'start_blogging_colors_css_wrap' );


//----------------------------------------------------------------------------------
//	Setup a fallback menu
//----------------------------------------------------------------------------------

// default nav top level pages
function start_blogging_blogging_default_nav(){
    echo '<div class="navbar-collapse collapse">';
    echo '<ul class="nav navbar-nav">';
    $pages = get_pages();  
    $n = count($pages); 
    $i=0;
    foreach ( $pages as $page ) {
        $menu_name = esc_html($page->post_title);
        $menu_link = get_page_link( $page->ID );
        if(get_the_ID() == $page->ID) $current_class = "current_page_item current-menu-item";
        else { $current_class = ''; }
        $menu_class = "page-item-" . $page->ID;
        echo "<li class='page_item ".esc_attr($menu_class)." $current_class'><a href='".esc_url($menu_link)."'>".esc_html($menu_name)."</a></li>";
        $i++;
    } 
    echo '</ul>';
    echo '</div>';
}	


/**
 * Register custom fonts.
 */
function start_blogging_fonts_url() {
	$fonts_url = '';
	// Translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language.
	$playfair_display = _x( 'on', 'Playfair Display font: on or off', 'start-blogging' );
	if ( 'off' !== $playfair_display ) {
		$font_families = array();
		$font_families[] = 'Playfair Display:400,700';
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function start_blogging_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'start_blogging-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'start_blogging_resource_hints', 10, 2 );

//----------------------------------------------------------------------------------
//	Enqueue Theme Scripts and Styles
//----------------------------------------------------------------------------------
 function start_blogging_styles_scripts() {
	 global $START_BLOGGING_VERSION;

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'start-blogging-fonts', start_blogging_fonts_url(), array(), null );
	
	// Load Styles
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css', array(), '4.4.0', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array( ), '4.0.0', 'all' );
	wp_enqueue_style( 'start-blogging-style', get_stylesheet_uri(), '', $START_BLOGGING_VERSION );
		
	// Load Scripts
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'start-blogging-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', array( 'jquery' ), $START_BLOGGING_VERSION, 'true' );
	
	
	// Add comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}		
}
add_action( 'wp_enqueue_scripts', 'start_blogging_styles_scripts' );


//----------------------------------------------------------------------------------
//	Create a custom excerpt size
//----------------------------------------------------------------------------------

// Custom excerpt size
	function start_blogging_excerpt_length( $length ) { 
	$start_blogging_excerpt_size = esc_attr(get_theme_mod( 'start_blogging_excerpt_size', '55' ));
		return $start_blogging_excerpt_size;
	}
	add_filter( 'excerpt_length', 'start_blogging_excerpt_length', 999 );

//	Change excerpt ending
	function start_blogging_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'start_blogging_excerpt_more', 21 );	

//----------------------------------------------------------------------------------
//  Remove the Inline CSS that loads in the content (bad) for the WP Gallery
//  Special thanks to http://wpcrux.com/blog/wordpress-default-gallery-css/
//----------------------------------------------------------------------------------

 add_filter( 'use_default_gallery_style', '__return_false' );
 

//----------------------------------------------------------------------------------
//	Move Comment Field Below 
//  Special thanks to the Kale theme
//---------------------------------------------------------------------------------- 

function start_blogging_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'start_blogging_move_comment_field_to_bottom' );


//----------------------------------------------------------------------------------
//	Define Path to Includes - Additional Functions
//----------------------------------------------------------------------------------

define( 'START_BLOGGING_PHP_INCLUDE', trailingslashit( get_template_directory() ) . 'inc/' );
 
require_once( START_BLOGGING_PHP_INCLUDE . 'template-tags.php' );
require_once( START_BLOGGING_PHP_INCLUDE . 'customizer.php' );
require_once( START_BLOGGING_PHP_INCLUDE . 'sidebars.php' );
require_once( START_BLOGGING_PHP_INCLUDE . 'inline-styles.php' );
require_once( START_BLOGGING_PHP_INCLUDE . 'template-functions.php' );
require_once( START_BLOGGING_PHP_INCLUDE . 'theme-info/start-blogging-info.php' );



