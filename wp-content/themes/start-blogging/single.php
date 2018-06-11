<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package Start_Blogging
 * @version 1.0.0
 */

get_header(); ?>

		<div class="col-md-8">
		
			<main id="main" class="site-main">

		
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			/*
			 * Include the post format-specific template for the content. If you want to
			 * use this in a child theme, then include a file called called content-___.php
			 * (where ___ is the post format) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'single' );


			// Previous/next post navigation.
			if ( esc_attr(get_theme_mod( 'start_blogging_post_nav', 1 )) ) :
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post - ', 'start-blogging' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'start-blogging' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post - ', 'start-blogging' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'start-blogging' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );	
			endif;
	
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) && esc_attr(get_theme_mod( 'start_blogging_authorbio', 1 ) ) ) :
				get_template_part( 'author-bio' );
			endif;

			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;


		// End the loop.
		endwhile;
		?>

			</main>
			
		</div>

			<div class="col-md-4">        
				<?php get_sidebar( 'right' ); ?>       
			</div>

<?php get_footer();
