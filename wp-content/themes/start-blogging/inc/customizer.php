<?php
/**
 * Blogging theme customizer sections, settings, and controls
 * @package Start_Blogging
 * @since 1.0.0
 */

// Enqueue the customizer styles for this theme
function start_blogging_custom_customize_enqueue() {
    wp_enqueue_style( 'start-blogging-customizer', get_template_directory_uri() . '/inc/customizer-style.css' );
}
if(is_admin())  add_action( 'customize_controls_enqueue_scripts', 'start_blogging_custom_customize_enqueue' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function start_blogging_custom_colour_js() {
	wp_enqueue_script( 'start-blogging-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'start_blogging_custom_colour_js' );

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function start_blogging_customize_preview_js() {
	wp_enqueue_script( 'start-blogging-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'start_blogging_customize_preview_js' );


/*
 * Create a custom type for entering in HTML content
 * Special thanks to Devin Price https://wptheming.com/2015/07/customizer-control-arbitrary-html/
 */
	if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Start_Blogging_Custom_Content' ) ) :
	class Start_Blogging_Custom_Content extends WP_Customize_Control {

	public $content = '';

	// Render the control's content. Allows the content to be overriden without having to rewrite the wrapper.
	public function render_content() {
		if ( isset( $this->label ) ) {
			echo '<span class="customize-control-title">' . $this->label . '</span>';
		}
		if ( isset( $this->content ) ) {
			echo $this->content;
		}
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
	}
}
endif;

// Register the options to the WordPress customizer for this theme.
function start_blogging_customize_register( $wp_customize ) {
    
    // SECTION - BLOGGING UPGRADE
    $wp_customize->add_section( 'start_blogging_upgrade', array(
        'title'       => esc_html__( 'Upgrade to Pro', 'start-blogging' ),
        'priority'    => 0
    ) );
    
    // SECTION - BASIC SETTINGS
    $wp_customize->add_section( 'start_blogging_basic_settings', array(
        'title'       => esc_html__( 'Basic Settings', 'start-blogging' ),
        'priority'    => 20
    ) );   

	// Add the upgrade option
	$wp_customize->add_setting( 'start_blogging_upgrade', array(
		'sanitize_callback'	=> 'wp_kses_post'
	) );

	$wp_customize->add_control( new Start_Blogging_Custom_Content( $wp_customize, 'start_blogging_upgrade', array(
		'label'	=> __('Get The Pro Version:','start-blogging'),
		'section'	=> 'start_blogging_upgrade',
		'setting'	=> 'start_blogging_upgrade',
	   'description' => wp_kses_post(__( '
		<h1>Start Blogging Pro</h1>
		<p>Upgrade to the pro version of Start Blogging and enjoy many additional features that will add more options. Here is what you can expect:</p>
		<p style="font-weight: 700;">Pro Features:
		<ul>
			<li>&bull; 6 Blog Styles</li>
			<li>&bull; 22+ Sidebars</li>
			<li>&bull; 5 Page Templates</li>
			<li>&bull; Blog Thumbnail Creation</li>
			<li>&bull; Boxed Layouts</li>
			<li>&bull; Front Page Template</li>
			<li>&bull; Page Builder Ready</li>
			<li>&bull; Built-in Slider</li>
		</ul>
		</p>
		<p><a class="button" href="https://www.bloggingthemestyles.com/wordpress-themes/start-blogging-pro/" target="_blank">Get the Pro!</a></p>', 'start-blogging' ) ),	
	) ) );  
 
	 // Use excerpts for blog posts
	  $wp_customize->add_setting( 'start_blogging_use_excerpt',  array(
		  'default' => 1,
		  'sanitize_callback' => 'start_blogging_sanitize_checkbox',
		) );  
	  $wp_customize->add_control( 'start_blogging_use_excerpt', array(
		'type'     => 'checkbox',
		'label'    => __( 'Use Excerpts', 'start-blogging' ),
		'description' => __( 'Use excerpts for your blog post summaries or uncheck the box to use the standard Read More tag.', 'start-blogging' ),
		'section'  => 'start_blogging_basic_settings',
	  ) );
 
    // Excerpt size
    $wp_customize->add_setting( 'start_blogging_excerpt_size',  array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        ) );
    $wp_customize->add_control( 'start_blogging_excerpt_size', array(
        'type'        => 'number',
        'section'     => 'start_blogging_basic_settings',
        'label'       => __('Excerpt Size', 'start-blogging'),
		'description' => __('You can change the size of your blog summary excerpts with increments of 5 words.', 'start-blogging'), 
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
        ),
    ) );	
	
	// Copyright
	$wp_customize->add_setting( 'start_blogging_copyright', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'start_blogging_copyright', array(
		'settings' => 'start_blogging_copyright',
		'label'    => __( 'Your Copyright Name', 'start-blogging' ),
		'section'  => 'start_blogging_basic_settings',		
		'type'     => 'text',
	) );   
  
  
// Add to the colour section
  	 
  
// CUSTOM COLOURS.

	$wp_customize->add_setting( 'colorscheme', array(
		'default'           => 'default',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'start_blogging_sanitize_colorscheme',
	) );

	$wp_customize->add_setting( 'colorscheme_hue', array(
		'default'           => 44,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint', // The hue is stored as a positive integer.
	) );

	$wp_customize->add_control( 'colorscheme', array(
		'type'    => 'radio',
		'label'    => __( 'Color Scheme', 'start-blogging' ),
		'choices'  => array(
			'default'  => __( 'Default', 'start-blogging' ),
			'custom' => __( 'Custom', 'start-blogging' ),
		),
		'section'  => 'colors',
		'priority' => 5,
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'colorscheme_hue', array(
		'mode' => 'hue',
		'section'  => 'colors',
		'priority' => 6,
	) ) );  
  
}

add_action( 'customize_register', 'start_blogging_customize_register' );

// SANITIZATION
//Checkboxes
if ( ! function_exists( 'start_blogging_sanitize_checkbox' ) ) :
	function start_blogging_sanitize_checkbox( $input ) {
		return ( isset( $input ) && true === (bool) $input ? true : false );
	}
endif;

/*
 * Sanitize the colorscheme.
 * @param string $input Color scheme.
 */
function start_blogging_sanitize_colorscheme( $input ) {
	$valid = array( 'default', 'custom' );

	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'default';
}