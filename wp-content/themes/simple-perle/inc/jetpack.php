<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package simple-perle
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function simple_perle_jetpack_setup() {

	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'posts-wrap',
		'wrapper'        => false,
		'render'         => 'simple_perle_infinite_scroll_render',
		'footer'         => 'page',
		'footer_widgets' => array( 'sidebar-1' ),
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Jetpack Portfolio to activate Plugin Enhancement Script.
	add_theme_support( 'jetpack-portfolio' );

}
add_action( 'after_setup_theme', 'simple_perle_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function simple_perle_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		elseif ( is_post_type_archive('jetpack-portfolio') ):
			get_template_part( 'template-parts/content', 'portfolio' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}

/**
 * Jetpack Share buttons - Move to new place
 */

function simple_perle_remove_share() {
	remove_filter( 'the_content', 'sharing_display',19 );
	remove_filter( 'the_excerpt', 'sharing_display',19 );
}
 
add_action( 'loop_start', 'simple_perle_remove_share' );
