<?php

/**
 * Displays the optional custom logo.
 * @package Start_Blogging
 * @since 1.0.0
 */
if ( ! function_exists( 'start_blogging_the_custom_logo' ) ) :
function start_blogging_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;


/**
 * Display navigation to next/previous comments when applicable.
 * Special thanks to the Twenty Fifteen theme
 */
if ( ! function_exists( 'start_blogging_comment_nav' ) ) :
function start_blogging_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'start-blogging' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'start-blogging' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'start-blogging' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

// Display the post meta info for the blog
if ( ! function_exists( 'start_blogging_posted_on' ) ) :
function start_blogging_posted_on() {
	$time_string = '<span class="block-day">%1$s</span><span class="block-month-year">%2$s %3$s</span>';

	$posted_on = sprintf( $time_string,
        esc_html( get_the_date( 'd' ) ),
		esc_attr( get_the_date( 'M' ) ),	
		esc_html( get_the_date( 'Y' ) )
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'start-blogging' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$comment_count = get_comments_number(); // get_comments_number returns only a numeric value

	if ( comments_open() ) {
		if ( $comment_count == 0 ) {
			$comments = __('No Comments', 'start-blogging' );
		} elseif ( $comment_count > 1 ) {
			$comments = $comment_count . __(' Comments', 'start-blogging' );
		} else {
			$comments = __('1 Comment', 'start-blogging' );
		}
		$comment_link = '<a class="block-comments-link" href="' . get_comments_link() .'"> '. $comments.'</a>';
	}else{
		$comment_link = "";
	}

	echo '<span class="entry-date published updated">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>' . $comment_link; // WPCS: XSS OK.

}
endif;


/**
 * Display the post meta info for the full post (single)
 * Special thanks to the Twenty Fifteen theme for this meta code
 */
if ( ! function_exists( 'start_blogging_single_meta' ) ) :
function start_blogging_single_meta() {

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
			_x( 'Posted on', 'Used before publish date.', 'start-blogging' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard">%1$s <a class="url fn n" href="%2$s">%3$s</a></span>',
				_x( 'by', 'Used before post author name.', 'start-blogging' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'start-blogging' ) );
		if ( $categories_list && start_blogging_categorized_blog() ) {
			printf( '<span class="cat-links">%1$s %2$s</span>',
				_x( 'in', 'Used before category names.', 'start-blogging' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'start-blogging' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'start-blogging' ),
				$tags_list
			);
		}
	}

}
endif;
