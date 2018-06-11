<?php
/**
 * The template for displaying archive pages
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Start_Blogging
 * @version 1.0.0
 */

get_header(); ?>

		<div class="col-md-8">
		
			<main id="main" class="site-main">
			
		<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="description">', '</div>' );
					?>			
				</header>
			
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous', 'start-blogging' ),
				'next_text'          => __( 'Next', 'start-blogging' ),
				'before_page_number' => '<span class="meta-nav sr-only">' . __( 'Page', 'start-blogging' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>			


			</main>
			
		</div>

			<div class="col-md-4">        
				<?php get_sidebar( 'right' ); ?>       
			</div>
	

<?php get_footer();
