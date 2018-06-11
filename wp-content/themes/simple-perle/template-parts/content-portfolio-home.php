<?php
/**
 * Template part for displaying Homepage Portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simple-perle
 */

?>

<?php if( get_theme_mod( 'simple_perle_homepage_portfolio' ) == '') :

		// Get Jetpack Portfolio posts. Only 4. 
		$args = array(
			'post_type'      => 'jetpack-portfolio', 
			'posts_per_page' => 3 
		);

		$the_query = new WP_Query( $args );

		// The loop
		if ( $the_query->have_posts() ) : ?>

			<section class="portfolio-wrap clear">

				<?php $portfolio_title = get_theme_mod( 'simple_perle_portfolio_title' );
					  $portfolio_url   = get_post_type_archive_link( 'jetpack-portfolio');

					if( $portfolio_title ) :?>

							<h2 class="portfolio-title clearfix"><a href="<?php echo $portfolio_url ; ?>"><?php echo wp_kses_post( $portfolio_title ); ?></a></h2>

				<?php endif; ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if (has_post_thumbnail()): ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail('simple-perle-portfolio-post-thumb'); ?>
							</a>
						<?php endif;?>

						<div class="entry-content">
							<header class="entry-header">

								<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

								<div class="entry-meta bottom-meta">
									<?php echo esc_html( the_terms( $post->ID, 'jetpack-portfolio-type' ,  ' ' )); ?>
								</div>

								<?php if ( function_exists( 'sharing_display' ) ) {
									sharing_display( '', true );
								} ?>

							</header><!-- .entry-header -->

						</div><!-- .entry-content -->
					</article><!-- #post-## -->

				<?php endwhile; // while ?>

			</section>
		<?php
		endif;

		wp_reset_postdata();

	endif; ?>