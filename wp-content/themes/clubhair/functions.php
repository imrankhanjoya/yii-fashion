<?php
/**
 * ClubHair functions and definitions
 *
 * @package ClubHair
 */

/**
 * ClubHair Theme Setup
 */
function clubhair_setup() {
	// Meta Title.
	add_theme_support( 'title-tag' );

	// Automatic Feed Links.
	add_theme_support( 'automatic-feed-links' );

	// Logo Support.
	add_theme_support( 'custom-logo', array(
		'width'       => 215,
		'height'      => 38,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Featured Image.
	add_theme_support( 'post-thumbnails' );

	// Language Support.
	load_theme_textdomain( 'clubhair', get_template_directory() . '/languages' );

	// Header Image.
	$clubhair_args = array(
		'flex-width'    		=> true,
		'width'         		=> 1500,
		'flex-height'   		=> true,
		'height'        		=> 900,
		'default-text-color'	=> '#fff',
	);
	add_theme_support( 'custom-header', $clubhair_args );

	// Content Width.
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}
}
add_action( 'after_setup_theme', 'clubhair_setup' );

/**
 * Color / Social Customizer
 *
 * @param array $clubhair_wp_customize Theme Colors & Social Media.
 */
function clubhair_customize_register( $clubhair_wp_customize ) {
	$clubhair_colors 	= array();
	$clubhair_colors[] 	= array(
		'slug' => 'default_color',
		'default' => '#c59d5f',
		'label' => esc_html__( 'Default Color ', 'clubhair' ),
	);

	foreach ( $clubhair_colors as $clubhair_color ) {
		$clubhair_wp_customize->add_setting( $clubhair_color['slug'], array(
			'default' => $clubhair_color['default'],
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$clubhair_wp_customize->add_control( new WP_Customize_Color_Control( $clubhair_wp_customize, $clubhair_color['slug'], array(
			'label' => $clubhair_color['label'],
			'section' => 'colors',
			'settings' => $clubhair_color['slug'],
		) ) );
	}

	$clubhair_wp_customize->add_panel( 'widget_images', array(
		'priority'       => 70,
		'theme_supports' => '',
		'title'          => esc_html__( 'Widget Images', 'clubhair' ),
		'description'    => esc_html__( 'Set background images for certain widgets.', 'clubhair' ),
	) );

	$clubhair_wp_customize->add_section( 'information_background' , array(
		'title'      => esc_html__( 'Information Background','clubhair' ),
		'panel'      => 'widget_images',
		'priority'   => 20,
	) );

	$clubhair_wp_customize->add_section( 'contact_background' , array(
		'title'      => esc_html__( 'Contact Background','clubhair' ),
		'panel'      => 'widget_images',
		'priority'   => 20,
	) );

	$clubhair_wp_customize->add_setting( 'information_bg', array(
		'flex-width'    		=> true,
		'width'         		=> 1500,
		'flex-height'   		=> true,
		'height'        		=> 900,
	) );

	$clubhair_wp_customize->add_setting( 'contact_bg', array(
		'flex-width'    		=> true,
		'width'         		=> 1500,
		'flex-height'   		=> true,
		'height'        		=> 900,
	) );

	$clubhair_wp_customize->add_control( new WP_Customize_Image_Control( $clubhair_wp_customize, 'information_background_image', array(
		'label'      => esc_html__( 'Add Information Background Here, the width should be approx 1500px', 'clubhair' ),
		'section'    => 'information_background',
		'settings'   => 'information_bg',
	) ) );

	$clubhair_wp_customize->add_control( new WP_Customize_Image_Control( $clubhair_wp_customize, 'contact_background_image', array(
		'label'      => esc_html__( 'Add Contact Background Here, the width should be approx 1500px', 'clubhair' ),
		'section'    => 'contact_background',
		'settings'   => 'contact_bg',
	) ) );

	$clubhair_wp_customize->add_section( 'sociallinks', array(
		'title' => esc_html__( 'Social Links','clubhair' ),
		'description' => esc_html__( 'Add Your Social Links Here.','clubhair' ),
		'priority' => '900',
	) );

	$clubhair_wp_customize->add_setting( 'clubhair_facebooklink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_facebooklink', array(
		'label' => esc_html__( 'Facebook URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_twitterlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_twitterlink', array(
		'label' => esc_html__( 'Twitter URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_pinterestlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_pinterestlink', array(
		'label' => esc_html__( 'Pinterest URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_instagramlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_instagramlink', array(
		'label' => esc_html__( 'Instagram URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_linkedinlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_linkedinlink', array(
		'label' => esc_html__( 'LinkedIn URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_googlepluslink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_googlepluslink', array(
		'label' => esc_html__( 'Google+ URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_youtubelink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_youtubelink', array(
		'label' => esc_html__( 'YouTube URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_vimeo', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_vimeo', array(
		'label' => esc_html__( 'Vimeo URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_tumblrlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_tumblrlink', array(
		'label' => esc_html__( 'Tumblr URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
	$clubhair_wp_customize->add_setting( 'clubhair_flickrlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubhair_wp_customize->add_control( 'clubhair_flickrlink', array(
		'label' => esc_html__( 'Flickr URL', 'clubhair' ),
		'section' => 'sociallinks',
	) );
}
add_action( 'customize_register', 'clubhair_customize_register' );

/**
 * Includes Plugin Admin
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Bootstrap 3.3.7
 */
function clubhair_bootstrap() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome-all.min.css' );
	wp_enqueue_style( 'clubhair-googlefonts', clubhair_google_fonts_url(), array(), null );
	wp_enqueue_style( 'clubhair-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'clubhair-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'clubhair_bootstrap' );

/**
 * Google Font
 */
function clubhair_google_fonts_url() {
	$font_families = array( 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );
	$query_args = array(
		'family' => rawurlencode( implode( '|', $font_families ) ),
		'subset' => rawurlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	return apply_filters( 'clubhair_google_fonts_url', $fonts_url );
}

/**
 * Navigation
 */
function clubhair_register_menu() {
	register_nav_menus( array(
		'primary' => esc_html__( 'Top Primary Menu', 'clubhair' ),
	) );
}
add_action( 'init', 'clubhair_register_menu' );

/**
 * Bootstrap Navigation
 */
function clubhair_bootstrap_menu() {
	wp_nav_menu(array(
		'theme_location'    => 'primary',
		'depth'             => 2,
		'menu_class'        => 'nav navbar-nav',
		'fallback_cb'       => 'ClubHair_WP_Bootstrap_Navwalker::fallback',
		'walker'            => new ClubHair_WP_Bootstrap_Navwalker(),
	));
}
require get_template_directory() . '/inc/class-clubhair-wp-bootstrap-navwalker.php';

/**
 * WooCommerce Support
 */
function clubhair_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'clubhair_woocommerce_support' );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 10 );

/**
 * WooCommerce Cart Count
 */
function clubhair_woocommerce_cart_count() {
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		$clubhair_count = WC()->cart->cart_contents_count;
		?>
		<a href="<?php echo esc_attr( wc_get_cart_url() ); ?>" title="<?php echo esc_attr__( 'View your shopping cart', 'clubhair' ); ?>">
			<i class="fas fa-shopping-basket"></i>
		<?php if ( $clubhair_count > 0 ) { ?>
			<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubhair_count ); ?></span>
		<?php } ?>
		</a>
		<?php
	}
}
add_action( 'clubhair_header_top', 'clubhair_woocommerce_cart_count' );

/**
 * WooCommerce Cart Count
 *
 * @param array $clubhair_fragments Cart Count.
 */
function clubhairs_add_to_cart_fragment( $clubhair_fragments ) {
	ob_start();
	$clubhair_count = WC()->cart->cart_contents_count;
	?>
	<a href="<?php echo esc_attr( wc_get_cart_url() ); ?>" title="<?php echo esc_attr__( 'View your shopping cart', 'clubhair' ); ?>">
		<i class="fas fa-shopping-basket"></i>
	<?php if ( $clubhair_count > 0 ) { ?>
		<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubhair_count ); ?></span>
	<?php } ?>
	</a>
	<?php
	$clubhair_fragments['.woocommerce-cart-contents a'] = ob_get_clean();
	return $clubhair_fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'clubhairs_add_to_cart_fragment' );

/**
 * Header Style
 */
function clubhair_header_style() {
	if ( ! display_header_text() ) {
		echo'
		<style type="text/css">
			.site-title,
			.site-description {
				position: absolute!important;
				clip: rect(1px 1px 1px 1px);
				clip: rect(1px, 1px, 1px, 1px);
			}
		</style>
		';
	}
}
add_action( 'wp_head', 'clubhair_header_style' );

/**
 * Custom Colors
 */
function clubhair_customizer_css() {
	$clubhair_default_color 			= get_theme_mod( 'default_color' );
	$clubhair_header_text_color 		= get_header_textcolor();
	$clubhair_information_background 	= get_theme_mod( 'information_bg' );
	$clubhair_contact_background 		= get_theme_mod( 'contact_bg' );
	?>
	<style type="text/css">
		.site-header {
			background-image: url('<?php header_image(); ?>');
		}

		/* Widget Images */
		.sidebar-information:before {
			background-image: url('<?php echo esc_attr( $clubhair_information_background ); ?>');
		}

		.sidebar-contact {
			background-image: url('<?php echo esc_attr( $clubhair_contact_background ); ?>');
		}

		.btn-search,
		.btn-submit,
		a.btn-custom:hover,
		a.btn-custom:focus,
		a.btn-custom span.btn-icon,
		.navbar-default .navbar-brand:after,
		.site-header .header-info h1:before,
		.content .sidebar-blog-title h2:before,
		.sidebar-services .sidebar-services-title h2:before,
		.sidebar-prices .sidebar-prices-title h2:before,
		.sidebar-prices .sidebar-price h3:after,
		.sidebar-stats .sidebar-stats-title h2:before,
		.sidebar-information .sidebar-info h2:before,
		.sidebar-contact:after,
		.post-item-1,
		.post-item .post-categories-list .post-categories li a,
		.post-navigation a,
		.post-navigation a:hover,
		.post-navigation a:focus,
		.nav-links .page-numbers.current,
		.nav-links .page-numbers:hover,
		.nav-links .page-numbers:focus,
		.nav-links .prev.page-numbers,
		.nav-links .next.page-numbers,
		.comment .reply a,
		.woocommerce span.onsale,
		.woocommerce .products .product .button,
		.woocommerce .products .product a.added_to_cart,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce a.button.alt:hover,
		.woocommerce a.button.alt:focus,
		.woocommerce button.button.alt,
		.woocommerce button.button.alt:hover,
		.woocommerce button.button.alt:focus,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.wpcf7-form input[type="submit"],
		.sidebar-item .woocommerce-product-search input[type="submit"],
		.back-to-top,
		.tooltip-inner {
			background-color: <?php echo esc_attr( $clubhair_default_color ); ?>;
		}

		a.btn-custom,
		a.btn-custom:hover,
		a.btn-custom:focus,
		.sidebar-services:after,
		.sidebar-services .sidebar-services-title:after,
		.sidebar-contact a.btn-custom:hover,
		.sidebar-contact a.btn-custom:focus {
			border-color: <?php echo esc_attr( $clubhair_default_color ); ?>;
		}

		.tooltip.top .tooltip-arrow,
		.woocommerce-info,
		.woocommerce-message {
			border-top-color: <?php echo esc_attr( $clubhair_default_color ); ?>;
		}

		a:hover,
		a:focus,
		a.btn-custom,
		a.btn-custom:hover span.btn-icon,
		a.btn-custom:focus span.btn-icon,
		.navbar-default .navbar-brand:hover,
		.navbar-default .navbar-brand:focus,
		.navbar-default .navbar-nav > li a:hover,
		.navbar-default .navbar-nav > li a:focus,
		.navbar-default .navbar-nav > .active > a,
		.navbar-default .navbar-nav > .active > a:focus,
		.navbar-default .navbar-nav > .active > a:hover,
		.navbar-default .navbar-nav > .open > a,
		.navbar-default .navbar-nav > .open > a:focus,
		.navbar-default .navbar-nav > .open > a:hover,
		.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
		.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus,
		.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
		.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus,
		.navbar-default .navbar-nav > li > .dropdown-menu > .active > a,
		.navbar-default .navbar-nav > li > .dropdown-menu > .active > a:hover,
		.navbar-default .navbar-nav > li > .dropdown-menu > .active > a:focus,
		.sidebar-services .sidebar-service i.far,
		.sidebar-prices .sidebar-price .price,
		.sidebar-stats .sidebar-stat h4,
		.sidebar-contact a.btn-custom span.btn-icon,
		.post-navigation a span.btn-icon,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce-info:before,
		.woocommerce-message:before,
		.sidebar-item .product_list_widget del,
		.sidebar-item .product_list_widget ins,
		.sidebar-item .product_list_widget .woocommerce-Price-amount,
		.copyright a {
			color: <?php echo esc_attr( $clubhair_default_color ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'clubhair_customizer_css' );

/**
 * Widgets
 */
function clubhair_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'clubhair' ),
		'id'            => 'primary_sidebar',
		'before_widget' => '<div class="sidebar-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'clubhair' ),
		'id'            => 'header-sidebar',
		'before_widget' => '<div class="header-info">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1>',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Services Title', 'clubhair' ),
		'id'            => 'services_title_sidebar',
		'before_widget' => '<div class="sidebar-services-title">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Service 1', 'clubhair' ),
		'id'            => 'service_sidebar_1',
		'before_widget' => '<div class="sidebar-service sidebar-service-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Service 2', 'clubhair' ),
		'id'            => 'service_sidebar_2',
		'before_widget' => '<div class="sidebar-service sidebar-service-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Service 3', 'clubhair' ),
		'id'            => 'service_sidebar_3',
		'before_widget' => '<div class="sidebar-service sidebar-service-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Service 4', 'clubhair' ),
		'id'            => 'service_sidebar_4',
		'before_widget' => '<div class="sidebar-service sidebar-service-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Blog Title', 'clubhair' ),
		'id'            => 'blog_title_sidebar',
		'before_widget' => '<div class="sidebar-blog-title">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Contact', 'clubhair' ),
		'id'            => 'contact_sidebar',
		'before_widget' => '<div class="sidebar-contact-main">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Prices Title', 'clubhair' ),
		'id'            => 'prices_title_sidebar',
		'before_widget' => '<div class="sidebar-prices-title">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Prices 1', 'clubhair' ),
		'id'            => 'price_sidebar_1',
		'before_widget' => '<div class="sidebar-price sidebar-price-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Prices 2', 'clubhair' ),
		'id'            => 'price_sidebar_2',
		'before_widget' => '<div class="sidebar-price sidebar-price-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Prices 3', 'clubhair' ),
		'id'            => 'price_sidebar_3',
		'before_widget' => '<div class="sidebar-price sidebar-price-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Stats Title', 'clubhair' ),
		'id'            => 'stats_title_sidebar',
		'before_widget' => '<div class="sidebar-stats-title">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Stats 1', 'clubhair' ),
		'id'            => 'stats_sidebar_1',
		'before_widget' => '<div class="sidebar-stat sidebar-stat-1">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Stats 2', 'clubhair' ),
		'id'            => 'stats_sidebar_2',
		'before_widget' => '<div class="sidebar-stat sidebar-stat-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Stats 3', 'clubhair' ),
		'id'            => 'stats_sidebar_3',
		'before_widget' => '<div class="sidebar-stat sidebar-stat-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Stats 4', 'clubhair' ),
		'id'            => 'stats_sidebar_4',
		'before_widget' => '<div class="sidebar-stat sidebar-stat-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front page: Information', 'clubhair' ),
		'id'            => 'information_sidebar',
		'before_widget' => '<div class="sidebar-info">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'clubhair_widgets_init' );

/**
 * Post Read More
 *
 * @param array $link Show more link.
 */
function clubhair_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="btn btn-default btn-custom">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		// translators: %s containing the title of the post or page.
		sprintf( __( '<span class="btn-text">Continue reading</span> <span class="btn-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> <span class="screen-reader-text"> "%s"</span>', 'clubhair' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'clubhair_excerpt_more' );

/**
 * Bootstrap Images img-responsive
 *
 * @param array $html Html code for image with Bootstrap class.
 */
function clubhair_bootstrap_responsive_images( $html ) {
	$classes = 'img-responsive';
	if ( preg_match( '/<img.*? class="/', $html ) ) {
		$html = preg_replace( '/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html );
	} else {
		$html = preg_replace( '/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html );
	}
	return $html;
}
add_filter( 'the_content','clubhair_bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'clubhair_bootstrap_responsive_images', 10 );

/**
 * Comment Reply
 */
function clubhair_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clubhair_comment_reply' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubhair_fields Comment Form Fields.
 */
function clubhair_comment_form_fields( $clubhair_fields ) {
	$clubhair_commenter 	= wp_get_current_commenter();
	$clubhair_req      	= get_option( 'require_name_email' );
	$clubhair_aria_req 	= ( $clubhair_req ? " aria-required='true'" : '' );
	$clubhair_html5    	= current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	$clubhair_fields   	= array(
		'author' 	=> '<div class="form-group comment-form-author"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $clubhair_commenter['comment_author'] ) . '" placeholder="' . ( $clubhair_req ? '* ' : '' ) . __( 'Name', 'clubhair' ) . '..." size="30"' . $clubhair_aria_req . ' /></div>',
		'email'  	=> '<div class="form-group comment-form-email"><input class="form-control" id="email" name="email" ' . ( $clubhair_html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $clubhair_commenter['comment_author_email'] ) . '" placeholder="' . ( $clubhair_req ? '* ' : '' ) . __( 'Email', 'clubhair' ) . '..." size="30"' . $clubhair_aria_req . ' /></div>',
		'url'    	=> '<div class="form-group comment-form-url"><input class="form-control" id="url" name="url" ' . ( $clubhair_html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $clubhair_commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website', 'clubhair' ) . '..." size="30" /></div>',
	);
	return $clubhair_fields;
}
add_filter( 'comment_form_default_fields', 'clubhair_comment_form_fields' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubhair_args Comment Form Fields.
 */
function clubhair_comment_form( $clubhair_args ) {
	$clubhair_args['comment_field'] = '<div class="form-group comment-form-comment"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr__( 'Comment', 'clubhair' ) . '..." aria-required="true"></textarea></div>';
	$clubhair_args['class_submit'] = 'btn btn-default btn-submit';
	return $clubhair_args;
}
add_filter( 'comment_form_defaults', 'clubhair_comment_form' );

?>
