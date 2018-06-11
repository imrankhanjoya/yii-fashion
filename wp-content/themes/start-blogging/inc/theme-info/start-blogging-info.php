<?php
/**
 * Theme Info Page
 * Special thanks to the Consulting theme by ThinkUpThemes for this info page
 * to be used as a foundation.
 * @package Start_Blogging
 * @since 1.1.2
 */
 
function start_blogging_info() {    

	// THEME INFO PAGE CLASS
	require_once get_template_directory() . '/inc/theme-info/start-blogging-info-class-about.php';

	// About page instance
	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme

		$theme_name    = trim( ucwords( str_replace( ' (Lite)', '', $theme_data->get( 'Name' ) ) ) );
		$theme_slug    = trim( strtolower( str_replace( ' (Lite)', '-lite', $theme_data->get( 'Name' ) ) ) );
		$theme_version = $theme_data->get( 'Version' );

	$config = array(
		// Menu name under Appearance.
		'menu_name'             => sprintf( __( 'About %1$s', 'start-blogging' ), ucfirst( $theme_name ) ),
		// Page title.
		'page_name'             => sprintf( __( 'About %1$s', 'start-blogging' ), ucfirst( $theme_name ) ),
		// Main welcome title
		'welcome_title'         => sprintf( __( 'Welcome to %1$s - v', 'start-blogging' ), ucfirst( $theme_name ) ),
		// Main welcome content
		'welcome_content'       => sprintf( esc_html__(  '%1$s is a theme that gives you an exceptional style that was created with what I call Real World design; even I\'m using it for my own website! With clean lines and amazing features like Unlimited Colours, you can personalize this theme by utilizing the powerful built-in customizer with live previews as you make changes....and then there is the pro version!', 'start-blogging' ), ucfirst( $theme_name ) ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'             => array(
			'upgrade_url'     => '//www.bloggingthemestyles.com/wordpress-themes/start-blogging-pro',
			'price_discount'  => __( 'Get the Pro for $49 ($10 off)', 'start-blogging' ),
			'price_normal'	  => __( 'Save $10 off the Start Blogging Pro $59 membership. Offer EXPIRES March 31, 2018. Use this coupon at checkout.', 'start-blogging' ),
			'coupon'	      => 'SBPRO49',
			'button'	      => __( 'Upgrade Now', 'start-blogging' ),
		),
		'tabs'                 => array(
			'getting_started'  => __( 'Getting Started', 'start-blogging' ),
			'support_content'  => __( 'Support', 'start-blogging' ),
			'changelog'           => __( 'Changelog', 'start-blogging' ),
			'free_pro'         => __( 'Free VS PRO', 'start-blogging' ),
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title'               => esc_html__( 'Setup Documentation', 'start-blogging' ),
				'text'                => sprintf( esc_html__( 'To help you get started with the initial setup of this theme and to learn about the various features, you can check out detailed setup documentation.', 'start-blogging' ) ),
				'button_label'        => sprintf( esc_html__( 'View %1$s Tutorials', 'start-blogging' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//www.bloggingthemestyles.com/setup-start-blogging' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			'second' => array(
				'title'               => esc_html__( 'Go to Customizer', 'start-blogging' ),
				'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'start-blogging' ),
				'button_label'        => esc_html__( 'Go to Customizer', 'start-blogging' ),
				'button_link'         => esc_url( admin_url( 'customize.php' ) ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),
			
			'third' => array(
				'title'               => esc_html__( 'Using a Child Theme', 'start-blogging' ),
				'text'                => sprintf( esc_html__( 'If you plan to customize this theme, I recommend looking into using a child theme. To learn more about child themes and why it\'s important to use one, check out the WordPress documentation.', 'start-blogging' ) ),
				'button_label'        => sprintf( esc_html__( 'Child Themes', 'start-blogging' ), ucfirst( $theme_name ) ),
				'button_link'         => esc_url( '//developer.wordpress.org/themes/advanced-topics/child-themes/' ),
				'is_button'           => true,
				'recommended_actions' => false,
                'is_new_tab'          => true,
			),		
		),

		// Changelog content tab.
		'changelog'      => array(
			'first' => array (				
				'title'        => esc_html__( 'Changelog', 'start-blogging' ),
				'text'         => esc_html__( 'I generally recommend you always read the CHANGELOG before updating so that you can see what was fixed, changed, deleted, or added to the theme.', 'start-blogging' ),	
				'button_label' => '',
				'button_link'  => '',
				'is_button'    => false,
				'is_new_tab'   => false,				
				),
		),			
		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title'        => esc_html__( 'Free Support', 'start-blogging' ),
				'icon'         => 'dashicons dashicons-sos',
				'text'         => esc_html__( 'Get free support by visiting the theme support forum and I will do my very best to answer your questions should you find yourself in need of help.', 'start-blogging' ),
				'button_label' => esc_html__( 'Get Free Support', 'start-blogging' ),
				'button_link'  => esc_url( '//wordpress.org/support/theme/start-blogging' ),
				'is_button'    => true,
				'is_new_tab'   => true,
			),
			'second' => array(
				'title'        => esc_html__( 'Common Problems', 'start-blogging' ),
				'icon'         => 'dashicons dashicons-editor-help',
				'text'         => esc_html__( 'For quick answers to the most common problems, you can check out the tutorials which can provide instant solutions and answers.', 'start-blogging' ),
				'button_label' => sprintf( esc_html__( 'Get Answers', 'start-blogging' ) ),
				'button_link'  => '//www.bloggingthemestyles.com/support/common-problems',
				'is_button'    => true,
				'is_new_tab'   => true,
			),

		),
		// Free vs pro array.
		'free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => ucfirst( $theme_name ) . ' PRO',
			'pro_theme_link'      => '//www.bloggingthemestyles.com/wordpress-themes/start-blogging-pro/',
			'get_pro_theme_label' => sprintf( __( 'Get %s Now!', 'start-blogging' ), ucfirst( $theme_name ) . ' Pro' ),
			'features'            => array(
				array(
					'title'            => __( 'Mobile Friendly', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Responsive Typography', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => __( 'Unlimited Colours', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => __( 'Background Image', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Built-In Social Buttons', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),	
				array(
					'title'            => __( 'Custom Error Page', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => __( 'Blog Styles', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '1',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '6',
					'hidden'           => '',
				),				
				array(
					'title'            => __( 'Sidebar Positions', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '20',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '22+',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Page Templates', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '4',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '5',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Theme Options', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Advanced',
					'hidden'           => '',
				),		
				array(
					'title'            => __( 'Support', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Premium',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Post Formats', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => __( 'Blog Thumbnail Creation', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => __( 'Boxed Layouts', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),					
				array(
					'title'            => __( 'Front Page Template', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => __( 'Page Builder Ready', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Google Font Setting', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Built-in Slider', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Show or Hide Elements', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'Customized Archive Titles', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				array(
					'title'            => __( 'WooCommerce Ready', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),				
				array(
					'title'            => __( 'Developer Friendly with Custom Hooks', 'start-blogging' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
					'hidden'           => '',
				),
				
			),
		),
	);
	start_blogging_info_page::init( $config );

}

add_action('after_setup_theme', 'start_blogging_info');

?>