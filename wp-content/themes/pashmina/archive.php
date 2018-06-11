<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : the_post(); ?>

				<section class="dt-front-posts-wrap">
					<div class="dt-front-post">

						<?php  if ( has_post_thumbnail() ) : ?>
							<figure>

								<?php
								the_post_thumbnail( 'pashmina-front-post-img' );
								?>

								<span><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><i class="fa fa-mail-forward transition5"></i></a> </span>
							</figure>

						<?php endif; ?>

						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3">
								<div class="entry-meta">
									<p><strong><?php _e( 'Author:', 'pashmina' ); ?></strong><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo esc_html( get_the_author() ) ?></a></p>

									<p><strong><?php _e( 'Published on:', 'pashmina' ); ?></strong><?php esc_html( the_time("F d, Y") ); ?></p>

									<p><strong><?php _e( 'Category:', 'pashmina' ); ?></strong>
										<?php $categories_list = get_the_category_list( esc_html__( ', ', 'pashmina' ) );
										if ( $categories_list && pashmina_categorized_blog() ) {
											printf( $categories_list ); // WPCS: XSS OK.
										} ?></p>
								</div>
							</div>

							<article class="col-lg-9 col-md-9 col-sm-9">
								<header class="entry-header">
									<h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a></h2>
								</header><!-- .entry-header -->

								<div>
									<?php esc_html( the_excerpt() ); ?>
								</div>

								<footer class="entry-footer">
									<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php _e( 'CONTINUE READING', 'pashmina' ); ?></a>
								</footer><!-- .entry-footer -->
							</article>

							<div class="clearfix"></div>
						</div>
					</div>
				</section>

				<?php endwhile; ?>

				<div class="clearfix"></div>

				<div class="dt-pagination-nav">
					<?php echo paginate_links(); ?>
				</div><!---- .dt-pagination-nav ---->

			<?php else : ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.', 'pashmina' ); ?></p>

			<?php endif; ?>

			</div>

			<aside class="col-lg-4 col-md-4">
				<div class="dt-sidebar">
					<?php get_sidebar(); ?>
				</div><!-- dt-sidebar -->
			</aside><!-- .col-lg-4 -->
		</div>
	</div>

<?php
get_footer();
