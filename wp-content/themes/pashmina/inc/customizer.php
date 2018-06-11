<?php
/**
 * Pashmina Theme Customizer.
 *
 * @package Pashmina
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pashmina_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Sticky Menu
    $wp_customize->add_section( 'pashmina_sticky_menu_section', array(
        'priority' 			=> 32,
        'title' 			=> __( 'Sticky Top Menu', 'pashmina' ),
    ) );

    $wp_customize->add_setting( 'pashmina_sticky_menu', array(
        'default' 			=> '',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'pashmina_checkbox_sanitize'
    ) );

    $wp_customize->add_control( 'pashmina_sticky_menu', array(
        'type' 				=> 'checkbox',
        'label' 			=> __( 'Enable sticky Main menu', 'pashmina' ),
        'settings' 			=> 'pashmina_sticky_menu',
        'section' 			=> 'pashmina_sticky_menu_section'
    ) );

    // Related Posts
    $wp_customize->add_section(
        'pashmina_related_posts_section',
        array(
            'priority' 			=> 202,
            'title' 			=> __( 'Related Posts', 'pashmina' )
        )
    );

    $wp_customize->add_setting(
        'pashmina_related_posts_setting',
        array(
            'default' 			=> 0,
            'capability' 		=> 'edit_theme_options',
            'sanitize_callback'	=> 'pashmina_checkbox_sanitize'
        )
    );

    $wp_customize->add_control(
        'pashmina_related_posts',
        array(
            'type' 				=> 'checkbox',
            'label' 			=> __( 'Check to activate the related posts', 'pashmina' ),
            'section' 			=> 'pashmina_related_posts_section',
            'settings' 			=> 'pashmina_related_posts_setting'
        )
    );

    // Featured posts Slider
    $wp_customize->add_section( 'featured_posts', array(
        'priority' 			=> 200,
        'title' 			=> __( 'Featured Post Slider', 'pashmina' )
    ));

    $wp_customize->add_setting( 'featured_posts', array(
        'default' 			=> '',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'pashmina_checkbox_sanitize'
    ));

    $wp_customize->add_control( 'featured_posts', array(
        'type' 				=> 'checkbox',
        'label' 			=> __( 'Enable featured post slider', 'pashmina' ),
        'settings' 			=> 'featured_posts',
        'section' 			=> 'featured_posts'
    ));

    $cats = array();
    foreach ( get_categories() as $categories => $category ){
        $cats[$category->term_id] = $category->name;
    }
    $wp_customize->add_setting( 'featured_posts_select', array(
        'default' => 1,
        'sanitize_callback' => 'absint'
    ) );

    $wp_customize->add_control( 'featured_posts_select', array(
        'type'      => 'select',
        'label' 	=> __( 'Select Category', 'pashmina' ),
        'choices'   => $cats,
        'settings'  => 'featured_posts_select',
        'section'   => 'featured_posts'
    ) );

    $wp_customize->add_setting( 'featured_posts_count', array(
        'default' 			=> '6',
        'capability' 		=> 'edit_theme_options',
        'sanitize_callback' => 'pashmina_sanitize_integer'
    ) );

    $wp_customize->add_control( 'featured_posts_count', array(
        'type'			 	=> 'number',
        'label' 			=> __( 'No. of Posts', 'pashmina' ),
        'section'			=> 'featured_posts',
        'settings' 			=> 'featured_posts_count'
    ) );

    // Font Colors
    $wp_customize->add_setting( 'pashmina_font_color', array(
        'priority' 			     => 3,
        'default' 			     => '#2f363e',
        'capability' 			 => 'edit_theme_options',
        'sanitize_callback'		 => 'pashmina_color_sanitize',
        'sanitize_js_callback'   => 'pashmina_color_escaping_sanitize'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pashmina_font_color', array(
        'label' 		=> __( 'Font Color', 'pashmina' ),
        'section' 		=> 'colors',
        'settings' 		=> 'pashmina_font_color'
    ) ) );

    // Primary Color
    $wp_customize->add_setting( 'pashmina_primary_color', array(
        'priority' 			     => 4,
        'default' 			     => '#e83f6f',
        'capability' 			 => 'edit_theme_options',
        'sanitize_callback'		 => 'pashmina_color_sanitize',
        'sanitize_js_callback'   => 'pashmina_color_escaping_sanitize'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pashmina_primary_color', array(
        'label' 		=> __( 'Primary Color', 'pashmina' ),
        'section' 		=> 'colors',
        'settings' 		=> 'pashmina_primary_color'
    ) ) );

    // Main Menu Color
    $wp_customize->add_setting( 'pashmina_menu_color', array(
        'priority' 			     => 5,
        'default' 			     => '#fff',
        'capability' 			 => 'edit_theme_options',
        'sanitize_callback'		 => 'pashmina_color_sanitize',
        'sanitize_js_callback'   => 'pashmina_color_escaping_sanitize'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pashmina_menu_color_picker', array(
        'label' 		=> __( 'Menu Font Color', 'pashmina' ),
        'section' 		=> 'colors',
        'settings' 		=> 'pashmina_menu_color'
    ) ) );

    $wp_customize->add_setting( 'pashmina_menu_bg_color', array(
        'priority' 				 => 6,
        'default' 				 => '#e83f6f',
        'capability' 			 => 'edit_theme_options',
        'sanitize_callback'		 => 'pashmina_color_sanitize',
        'sanitize_js_callback'   => 'pashmina_color_escaping_sanitize'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pashmina_menu_bg_color_picker', array(
        'label' 			=> __( 'Menu Background', 'pashmina' ),
        'section' 			=> 'colors',
        'settings' 			=> 'pashmina_menu_bg_color'
    ) ) );

    $wp_customize->add_setting( 'pashmina_menu_color_hover', array(
        'priority' 			     => 7,
        'default' 			     => '#273039',
        'capability' 			 => 'edit_theme_options',
        'sanitize_callback'		 => 'pashmina_color_sanitize',
        'sanitize_js_callback'   => 'pashmina_color_escaping_sanitize'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pashmina_menu_hover_color_picker', array(
        'label' 			=> __( 'Menu Hover Font Color', 'pashmina' ),
        'section' 			=> 'colors',
        'settings' 			=> 'pashmina_menu_color_hover'
    ) ) );

    $wp_customize->add_setting( 'pashmina_menu_hover_bg_color', array(
        'priority' 			     => 8,
        'default' 			     => '#e83f6f',
        'capability' 			 => 'edit_theme_options',
        'sanitize_callback'		 => 'pashmina_color_sanitize',
        'sanitize_js_callback'   => 'pashmina_color_escaping_sanitize'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pashmina_menu_hover_bg_color_picker', array(
        'label' 			=> __( 'Menu Hover Background', 'pashmina' ),
        'section' 			=> 'colors',
        'settings' 			=> 'pashmina_menu_hover_bg_color'
    ) ) );

    // Checkbox Sanitize
    function pashmina_checkbox_sanitize( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }

    // Color Sanitizate
    function pashmina_color_sanitize( $color ) {
        if ( $unhashed = sanitize_hex_color_no_hash( $color ))
            return '#' . $unhashed;

        return $color;
    }

    // Color Escape Sanitize
    function pashmina_color_escaping_sanitize( $input ) {
        $input = esc_attr( $input );
        return $input;
    }

    // Number Integer
    function pashmina_sanitize_integer( $input ) {
        return absint( $input );
    }
}
add_action( 'customize_register', 'pashmina_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pashmina_customize_preview_js() {
	wp_enqueue_script( 'pashmina_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'pashmina_customize_preview_js' );

/**
 * Enqueue Inline styles generated by customizer
 */
function pashmina_customizer_styles() {

    $pashmina_font_color_val = esc_attr( get_theme_mod( 'pashmina_font_color' ) );
    $font_color_85           = esc_attr( pashmina_hex2rgba( $pashmina_font_color_val, .85 ) );
    $font_color6             = esc_attr( pashmina_hex2rgba( $pashmina_font_color_val, .6 ) );

    if ( $pashmina_font_color_val != '#2f363e' && $pashmina_font_color_val != '' ) {

        $pashmina_font_color = "
    body,
    a,
    .dt-logo p,
    .dt-pagination-nav a,
    .dt-pagination-nav .current,
    .dt-footer-cont li a,
    .dt-footer-bar,
    .dt-footer-bar a,
    button,
    input,
    textarea,
    select,
    caption {
        color: {$font_color_85};
    }

    .dt-featured-post figure span,
    .tagcloud a {
        background: {$font_color6};
    }

	.dt-featured-post .entry-footer span,
	.dt-front-post .entry-meta p,
    .dt-front-post .entry-meta a,
    .dt-popular-post-date,
    .dt-front-post .entry-meta a,
    .dt-front-post .entry-footer a {
	    color: {$font_color6};
	}
	";
    } else {
        $pashmina_font_color = '';
    }

    $pashmina_primary_color_val = esc_attr( get_theme_mod( 'pashmina_primary_color' ) );

    if ( $pashmina_primary_color_val != '#e83f6f' && $pashmina_primary_color_val != '' ) {
        $pashmina_primary_color = "
    a:hover,
    .dt-logo a,
    .dt-front-post .entry-meta a:hover,
    .dt-front-post .entry-footer a:hover,
    .dt-pagination-nav a:hover,
    .dt-pagination-nav .current,
    .entry-meta a:hover,
    .entry-footer a:hover,
    .dt-footer-cont li a:hover,
    .dt-footer-bar a:hover {
        color: {$pashmina_primary_color_val};
    }

    .dt-pagination-nav a:hover,
    .dt-pagination-nav .current {
        border-color: {$pashmina_primary_color_val};
    }

    .dt-featured-post figure span .fa,
    .dt-featured-post-slider .swiper-pagination-bullet-active,
    .dt-front-post figure span .fa,
    #back-to-top:hover,
    .tagcloud a:hover,
    .dt-footer-cont .widget-title:after,
    .dt-related-posts .dt-news-post-img .fa:hover {
        background: {$pashmina_primary_color_val};
    }
	";
    } else {
        $pashmina_primary_color = '';
    }

    $pashmina_menu_color_val = esc_attr( get_theme_mod( 'pashmina_menu_color' ) );

    if ( $pashmina_menu_color_val != '#ffffff' && $pashmina_menu_color_val != '' ) {
        $pashmina_menu_color = "
	.dt-menu-wrap li a {
		color: {$pashmina_menu_color_val};
	}
	";
    } else {
        $pashmina_menu_color = '';
    }

    $pashmina_menu_bg_color_val = esc_attr( get_theme_mod( 'pashmina_menu_bg_color' ) );

    if ( $pashmina_menu_bg_color_val != '#e83f6f' && $pashmina_menu_bg_color_val != '' ) {
        $pashmina_menu_bg_color = "
	.dt-menu-wrap,
	.dt-menu-wrap ul {
		background: {$pashmina_menu_bg_color_val};
	}
	";
    } else {
        $pashmina_menu_bg_color = '';
    }

    $pashmina_menu_color_hover_val = esc_attr( get_theme_mod( 'pashmina_menu_color_hover' ) );

    if ( $pashmina_menu_color_hover_val != '#273039' && $pashmina_menu_color_hover_val != '' ) {
        $pashmina_menu_color_hover = "
	.dt-menu-wrap li:hover > a,
	.dt-menu-wrap .current-menu-item a {
		color: {$pashmina_menu_color_hover_val} !important;
	}
	";
    } else {
        $pashmina_menu_color_hover = '';
    }

    $pashmina_menu_hover_bg_color_val = esc_attr( get_theme_mod( 'pashmina_menu_hover_bg_color' ) );

    if ( $pashmina_menu_hover_bg_color_val != '#e83f6f' && $pashmina_menu_hover_bg_color_val != '' ) {
        $pashmina_menu_hover_bg_color = "
	.dt-menu-wrap li:hover > a,
	.dt-menu-wrap .current-menu-item a {
		background: {$pashmina_menu_hover_bg_color_val};
	}
	";
    } else {
        $pashmina_menu_hover_bg_color = '';
    }

    $header_text_color = get_header_textcolor();

    if ( $header_text_color != '' && $header_text_color != '000000' ) {
        $header_text_colors = "
	.dt-logo h1 a,
	.dt-logo p {
		color: #{$header_text_color};
	}
		";
    } else {
        $header_text_colors = '';
    }

    $dt_related_posts = 33.333333;

    $dt_related_posts_li = ".dt-related-posts li { width: calc({$dt_related_posts}% - 20px); }";

    $custom_css = $pashmina_font_color . $header_text_colors . $pashmina_primary_color . $pashmina_menu_color .$pashmina_menu_bg_color .$pashmina_menu_color_hover .$pashmina_menu_hover_bg_color . $dt_related_posts_li;

    wp_add_inline_style( 'pashmina-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'pashmina_customizer_styles' );
