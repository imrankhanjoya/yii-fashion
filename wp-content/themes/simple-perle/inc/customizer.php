<?php
/**
 * Simple Perle Theme Customizer.
 *
 * @package simple-perle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_perle_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 
		'simple_perle_theme_options', 
		array(
			'title'    => esc_html__('Theme Options', 'simple-perle'),
			'priority' => 20,
	)); 

	//Show homepage portfolio
	if( post_type_exists( 'jetpack-portfolio' ) ):
		$wp_customize->add_setting(
			'simple_perle_homepage_portfolio',
			array(
				'default'           => '',
				'sanitize_callback' => 'simple_perle_sanitize_checkbox',
			)
		);

		$wp_customize->add_control(
			'simple_perle_homepage_portfolio',
			array(
				'label'			=> esc_html__('Hide Portfolio from blog page?', 'simple-perle'),
				'description'   => esc_html__('Check box to hide Portfolio items from blog page.', 'simple-perle'),
				'section' 		=> 'simple_perle_theme_options',
				'type'   		=> 'checkbox'
			)
		);
	endif;

	//Portfolio Section Title
	if( post_type_exists( 'jetpack-portfolio' ) ):
		$wp_customize->add_setting(
			'simple_perle_portfolio_title',
			array(
				'default'			=> esc_html__('', 'simple-perle'),
				'sanitize_callback' => 'simple_perle_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'simple_perle_portfolio_title',
			array(
				'label'   => esc_html__('Portfolio Section Title', 'simple-perle'),
				'description'  => esc_html__('The title will appear on the Blog Page.', 'simple-perle'),
				'section' => 'simple_perle_theme_options',
				'type'    => 'text',
			)
		);
	endif;

	//Latest Posts Section Title
	$wp_customize->add_setting(
		'simple_perle_blog_title',
		array(
			'default'			=> esc_html__('', 'simple-perle'),
			'sanitize_callback' => 'simple_perle_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'simple_perle_blog_title',
		array(
			'label'   => esc_html__('Latest Posts Section Title', 'simple-perle'),
			'description'  => esc_html__('The title will appear on the Blog Page.', 'simple-perle'),
			'section' => 'simple_perle_theme_options',
			'type'    => 'text',
		)
	);

	//No Thumbnail colored bloc
	$wp_customize->add_setting(
		'simple_perle_thumb_placeholder',
		array(
			'default'           => 'show',
			'sanitize_callback' => 'simple_perle_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		'simple_perle_thumb_placeholder',
		array(
			'label'      => esc_html__('Display coloured block if no featured thumbnail is set?', 'simple-perle'),
			'section'    => 'simple_perle_theme_options',
			'type'       => 'radio',
			'choices'    => array(
							'show'  => esc_html__('Yes', 'simple-perle'),
							'hide'  => esc_html__('No', 'simple-perle'), 
			),
		)
	);
}
add_action( 'customize_register', 'simple_perle_customize_register' );

/**
 * Sanitize text
 */
function simple_perle_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitize checkbox
 */
function simple_perle_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitize thumnbail display
 */
function simple_perle_sanitize_radio( $input ) {
	$valid = array(
			'show'   => esc_html__('Yes', 'simple-perle'),
			'hide'    => esc_html__('No', 'simple-perle'),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simple_perle_customize_preview_js() {
	wp_enqueue_script( 'simple_perle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simple_perle_customize_preview_js' );