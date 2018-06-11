<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package simple-perle
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function simple_perle_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	//Add class if no sidebar 
	if ( ! is_active_sidebar( 'archive-sidebar' ) )
		$classes[] = 'no-sidebar';

	//Add class if Post title added
	if ( ! get_theme_mod( 'simple_perle_blog_title' ) == '' ) :
		$classes[] = 'simple-perle-blog-title';
	endif;

	return $classes;
}
add_filter( 'body_class', 'simple_perle_body_classes' );