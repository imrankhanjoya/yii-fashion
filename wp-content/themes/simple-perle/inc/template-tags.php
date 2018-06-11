<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package simple-perle
 */

if ( ! function_exists( 'simple_perle_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function simple_perle_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'simple-perle' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'simple_perle_entry_category' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function simple_perle_entry_category() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'simple-perle' ) );
		if ( $categories_list && simple_perle_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'simple-perle' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo ', <span class="comments-link">';
		comments_popup_link( esc_html__( 'No Comments', 'simple-perle' ), esc_html__( '1 Comment', 'simple-perle' ), esc_html__( '% Comments', 'simple-perle' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'simple-perle' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'simple_perle_edit' ) ) :
/**
 * Edit link for Portfolio single page
 */
function simple_perle_edit() {

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'simple-perle' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'simple_perle_entry_tags' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function simple_perle_entry_tags() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'simple-perle' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tag"></i> ' . esc_html__( '%1$s', 'simple-perle' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function simple_perle_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'simple_perle_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'simple_perle_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so simple_perle_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so simple_perle_categorized_blog should return false.
		return false;
	}
}

if ( ! function_exists( 'simple_perle_author_info' ) ) :
/**
 * Prints HTML with meta information for the current post author.
 */
function simple_perle_author_info() {

	$authoravatar = get_avatar( get_the_author_meta( 'ID' ), 100);
	$byline = sprintf(
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' .  sprintf( __( 'by ', 'simple-perle' )) . esc_html( get_the_author() ) . '</a></span>'
	);
	$authorbio = get_the_author_meta('description');

	echo '<p class="author-avatar-wrap clear"><span class="author-avatar">'. $authoravatar .'</span><span class="byline"> ' . $byline . '</span></p><p class="author-info"><span class="author-bio"> ' . $authorbio . '</span></p>';

}
endif;

/**
 * Flush out the transients used in simple_perle_categorized_blog.
 */
function simple_perle_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'simple_perle_categories' );
}
add_action( 'edit_category', 'simple_perle_category_transient_flusher' );
add_action( 'save_post',     'simple_perle_category_transient_flusher' );


if ( ! function_exists( 'simple_perle_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function simple_perle_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	
	?>
	<nav class="navigation post-navigation clear" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'simple-perle' ); ?></h2>
		<div class="nav-links clear">
			<?php
				previous_post_link( ' <div class="nav-previous">%link</div>', wp_kses( __( '<span class="meta-nav">Previous article</span> %title ', 'simple-perle' ), array( 'span' => array( 'class' => array() ) ) ));
				next_post_link( ' <div class="nav-next">%link</div>', wp_kses( __( '<span class="meta-nav">Next article</span> %title ', 'simple-perle' ), array( 'span' => array( 'class' => array() ) ) ));
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
