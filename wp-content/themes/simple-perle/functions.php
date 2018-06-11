<?php
/**
 * Perle functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package simple-perle
 */

if ( ! function_exists( 'simple_perle_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simple_perle_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Simple Perle, use a find and replace
	 * to change 'simple-perle' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'simple-perle', get_template_directory() . '/languages' );

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
	add_image_size( 'simple-perle-featured-post-thumb', 735, 865, true );
	add_image_size( 'simple-perle-portfolio-post-thumb', 400, 360, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'simple-perle' ),
		'social-media' => esc_html__( 'Social Media', 'simple-perle' ),
	) );

	//Add theme support for Site logo feature
	$args = array(
			'header-text' => array(
				'site-title',
				'site-description',
			),
			'width' => 345,
			'height' => 100,
			'flex-height' => true,
			'flex-width'  => true,
	);
	add_theme_support( 'custom-logo', $args);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'simple_perle_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Editor styles
	add_editor_style( array( 'editor-style.css', simple_perle_fonts_url() ) );
}
endif;
add_action( 'after_setup_theme', 'simple_perle_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function simple_perle_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'simple_perle_content_width', 550 );
}
add_action( 'after_setup_theme', 'simple_perle_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function simple_perle_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simple-perle' ),
		'id'            => 'archive-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'simple-perle' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
        'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
        'id'            => 'sidebar-3',
        'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'simple_perle_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simple_perle_scripts() {
	wp_enqueue_style( 'perle-style', get_stylesheet_uri() );

	wp_enqueue_style( 'simple-perle-font-awesome', get_template_directory_uri() . '/inc/fontawesome/font-awesome.css', array('dashicons'), '4.7.0', 'screen' );

	wp_enqueue_script( 'simple-perle-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'simple-perle-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'simple-perle-viewport-checker', get_template_directory_uri() . '/js/viewport-checker.js', array(), '1.0', true );

	wp_enqueue_script( 'simple-perle-script', get_template_directory_uri() . '/js/script.js', array(), '1.0', true );

	wp_enqueue_script( 'simple-perle-sub-menu-toggle-script', get_template_directory_uri() . '/js/sub-menu-toggle.js', array('jquery'), '20150816', true );

	wp_localize_script( 'simple-perle-sub-menu-toggle-script', 'simplePerleScreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'simple-perle' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'simple-perle' ) . '</span>',
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_perle_scripts' );

function simple_perle_admin_enqueue_scripts() {

	wp_enqueue_script( 'simple-perle-plugin-enhancements', get_template_directory_uri() . '/js/plugin-enhancements.js', array('jquery'), false, true );
	}

add_action( 'admin_enqueue_scripts', 'simple_perle_admin_enqueue_scripts' );

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load plugin enhancement file to display admin notices.
 */
require get_template_directory() . '/inc/plugin-enhancements.php';

/**
 * Load About Me widgets
 */
require get_template_directory() . '/inc/about-me-widget.php';

/**
 * Load the Getting Started page and Theme Update class
 */
if( is_admin() ) {
	require_once( get_template_directory() . '/inc/admin/start-page/start-page.php' );
}

/**
 * Load Customizer Upgrade button
 */
require_once(  get_template_directory() . '/inc/nudge-upgrade-theme/add-customize-section.php' );

/**
 *
 * Build Google font url based on
 * http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 */
function simple_perle_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Playfair Display or Lato, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$playfair = _x( 'on', 'Playfair Display font: on or off', 'simple-perle' );

	$lato = _x( 'on', 'Lato font: on or off', 'simple-perle' );

	if ( 'off' !== $playfair ||  'off' !== $lato ) {
		$font_families = array();

		if ( 'off' !== $playfair ) {
			$font_families[] = 'Playfair Display:400,700,400italic';
		}

		if ( 'off' !== $lato) {
			$font_families[] = 'Lato:400,300,700,400italic,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue Google font on front end
 */
function simple_perle_scripts_styles() {
	wp_enqueue_style( 'perle-fonts', simple_perle_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'simple_perle_scripts_styles' );



function wpsites_before_post_widget( $content ) {
    if ( is_singular( array( 'post', 'page' ) ) && is_active_sidebar( 'before-post' ) && is_main_query() ) {
        dynamic_sidebar('before-post');
    }
    return $content;
}
add_filter( 'the_content', 'wpsites_before_post_widget' );