<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simple-perle
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main portfolio-wrap clear" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php $portfolio_title = get_theme_mod( 'simple_perle_portfolio_title' );

				if( $portfolio_title ) :?>

					<h2 class="portfolio-title clearfix"><?php echo wp_kses_post( $portfolio_title ); ?></h2>

			<?php endif; ?>

			<div class="posts-wrap" id="posts-wrap">

			<?php 
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'portfolio' );

				endwhile; ?>

				</div>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			<?php the_posts_pagination(); ?>

		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer(); ?>
