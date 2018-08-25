<?php
/**
 * Pashmina functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pashmina
 */

if ( ! function_exists( 'pashmina_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pashmina_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pashmina, use a find and replace
	 * to change 'pashmina' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pashmina' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom Image Crop
	add_image_size( 'pashmina-featured-post-img',600, 450, true );
	add_image_size( 'pashmina-thum-featured-post-img',450, 450, true );
	add_image_size( 'pashmina-front-post-img', 800, 520, true );
	add_image_size( 'pashmina-popular-img', 96, 96, true );
	add_image_size( 'pashmina-about-img', 340, 260, true );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	//add_theme_support( 'title-tag' );

	/**
	 * Add Custom Logo Support
	 */
	add_theme_support( 'custom-logo' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'pashmina' ),
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
	add_theme_support( 'custom-background', apply_filters( 'pashmina_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Add editor style
	 */
	add_editor_style( 'css/custom-editor-style.css' );

}
endif;
add_action( 'after_setup_theme', 'pashmina_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pashmina_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pashmina_content_width', 640 );
}
add_action( 'after_setup_theme', 'pashmina_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function pashmina_scripts() {
	// Enqueue Bootstrap Grid
	wp_enqueue_style( 'bootstrap','//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
	//wp_enqueue_style( 'bootstrap_lo',get_template_directory_uri() .'/css/bootstrap.css','1.1.1');

	// Enqueue Google fonts
   
   //font-family: 'Tangerine', cursive; 

	//wp_enqueue_style( 'pashmina-roboto', '//fonts.googleapis.com/css?family=Pathway+Gothic+One|Open+Sans+Condensed:300,700|Dawning+of+a+New+Day|Pinyon+Script|Raleway+Dots|Roboto+Condensed:300,300i,400,700|Roboto:400,300,500,700,900|Dancing+Script' );
	wp_enqueue_style( 'pashmina-roboto', '//fonts.googleapis.com/css?family=Tangerine:700|Pathway+Gothic+One|Open+Sans+Condensed:300,700|Dawning+of+a+New+Day|Pinyon+Script|Raleway+Dots|Oswald:300,300i,400,700|Roboto:200,300,400,500,600,700|Dancing+Script|Tangerine' );

	// Enqueue Swiper.css
	//IKJ wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css', array(), '4.0.6', '' );

	// Stylesheet
	wp_enqueue_style( 'pashmina-style', get_stylesheet_uri() );

	// Enqueue Swiper
	//IKJ wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array( 'jquery' ), '4.0.6', '' );
	wp_enqueue_script( 'OneSignalSDK',"https://cdn.onesignal.com/sdks/OneSignalSDK.js", array(),null, '');
	wp_enqueue_script( 'bootstrapjs',"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", array( 'jquery' ), '4.0.6', '' );
	// Enqueue FontAwesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0', '' );

	// Custom JS
	wp_enqueue_script( 'pashmina-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'OneSignalSDK-loc', get_template_directory_uri() . '/js/OneSignal.js', array( 'OneSignalSDK','bootstrapjs' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pashmina_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
 * Load Widgets file
 */
require get_template_directory() . '/inc/widgets/widgets.php';


/**
 * Load Dashboard file
 */
require get_template_directory() . '/inc/dashboard.php';
/**
 * Include the TGM_Plugin_Activation class
 */
require_once get_template_directory() . '/inc/tgm.php';

/**
 * Breadcrumbs
 */
function pashmina_breadcrumb() {
	global $post;
	echo '<ul id="dt_breadcrumbs">';
	if ( !is_home() ) {
		echo '<li><a href="';
		echo esc_url( home_url() );
		echo '">';
		echo __( 'Home', 'pashmina' );
		echo '</a></li><li class="separator"> / </li>';
		if ( is_category() || is_single() ) {
			echo '<li>';
			the_category( ' </li><li class="separator"> / </li><li> ' );
			if ( is_single() ) {
				echo '</li><li class="separator"> / </li><li>';
				the_title();
				echo '</li>';
			}
		} elseif ( is_page() ) {
			if ( $post->post_parent ){
				$anc = get_post_ancestors( $post->ID );
				$title = get_the_title();
				foreach ( $anc as $ancestor ) {
					$output = '<li><a href="'. esc_url( get_permalink( $ancestor ) ) .'" title="'. esc_attr( get_the_title( $ancestor ) ) .'">'. esc_attr( get_the_title( $ancestor ) ) .'</a></li> <li class="separator"> / </li>';
				}
				echo $output;
				echo esc_attr( $title );
			} else { ?>
				<li><?php the_title_attribute() ?></li>
			<?php }
		}
	} elseif ( is_tag() ) {
		single_tag_title();
	} elseif ( is_day() ) {
		echo"<li>" . __( 'Archive for', 'pashmina' ); the_time( 'F jS, Y' ); echo'</li>';
	} elseif ( is_month() ) {
		echo"<li>" . __( 'Archive for', 'pashmina' ); the_time( 'F, Y' ); echo'</li>';
	} elseif ( is_year() ) {
		echo"<li>" . __( 'Archive for', 'pashmina' ); the_time( 'Y' ); echo'</li>';
	} elseif ( is_author( ) ) {
		echo"<li>" . __( 'Author Archive', 'pashmina' ); echo'</li>';
	} elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) {
		echo "<li>" . __( 'Blog Archive', 'pashmina' ); echo'</li>';
	} elseif ( is_search() ) {
		echo "<li>" . __( 'Search Results', 'pashmina' ); echo'</li>';
	}
	echo '</ul>';
}

/**
 * Convert hexdec color string to rgb(a) string
 */
function pashmina_hex2rgba( $color, $opacity = false ) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if( empty( $color ) )
		return $default;

	//Sanitize $color if "#" is provided
	if ( $color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if ( strlen( $color ) == 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb =  array_map( 'hexdec', $hex );

	//Check if opacity is set(rgba or rgb)
	if( $opacity ){
		if( abs( $opacity ) > 1 )
			$opacity = 1.0;
		$output = 'rgba( '.implode( ",",$rgb ).','.$opacity.' )';
	} else {
		$output = 'rgb( '.implode( ",",$rgb ).' )';
	}

	//Return rgb(a) color string
	return $output;
}


add_action( 'tgmpa_register', 'pashmina_register_required_plugins' );
function pashmina_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Mega Menu Plugin for WordPress',
			'slug'      => 'easymega',
			'required'  => false,
		),



	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'pashmina',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}




if (!function_exists('df_disable_admin_bar')) {

	function df_disable_admin_bar() {
		
		// for the admin page
		remove_action('admin_footer', 'wp_admin_bar_render', 1000);
		// for the front-end
		remove_action('wp_footer', 'wp_admin_bar_render', 1000);
	  	
		// css override for the admin page
		function remove_admin_bar_style_backend() { 
			echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
		}	  
		add_filter('admin_head','remove_admin_bar_style_backend');
		
		// css override for the frontend
		function remove_admin_bar_style_frontend() {
			echo '<style type="text/css" media="screen">
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
			</style>';
		}
		add_filter('wp_head','remove_admin_bar_style_frontend', 99);
  	}
}
add_action('init','df_disable_admin_bar');


add_filter( 'get_avatar' , 'my_custom_avatar' , 1 , 5);

function my_custom_avatar( $avatar, $id_or_email, $size, $default, $alt ) {
    $comment_user = false;
    


    if ( is_numeric( $id_or_email ) ) {

        $id = (int) $id_or_email;
        $comment_user = get_user_by( 'id' , $id );
 

    } elseif ( is_object( $id_or_email ) ) {

        if ( ! empty( $id_or_email->user_id ) ) {
            $id = (int) $id_or_email->user_id;
            $comment_user = get_user_by( 'id' , $id );
        }

    } else {
        $comment_user = get_user_by( 'email', $id_or_email );	
    }

    if ( $comment_user && is_object( $comment_user ) ) {

    			$avatar = get_the_author_meta( 'cupp_upload_meta', $comment_user->data->ID );
    			
            $avatar = "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} img-circle photo' height='{$size}' width='{$size}' />";
        

    }

    return $avatar;
}
