<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simple-perle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (has_post_thumbnail()): ?>

		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php the_post_thumbnail('simple-perle-featured-post-thumb'); ?>
		</a>

	<?php else: ?>

		<?php 
			if( 'hide' != get_theme_mod( 'simple_perle_thumb_placeholder' ) ) { ?>

				<div class="image-placeholder"><img src="<?php echo esc_url( get_template_directory_uri() );?>/images/image-placeholder.gif" alt="image-placeholder"></div>

			<?php } ?>

	<?php endif;?>

	<div class="entry-content">
		<header class="entry-header">

			<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php simple_perle_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php endif;

			if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

			if ( 'page' != get_post_type() ) { ?>
				<div class="entry-meta bottom-meta">
					<?php simple_perle_entry_category(); ?>
				</div>
			<?php } ?>

			<?php if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			} ?>

		</header><!-- .entry-header -->

	</div><!-- .entry-content -->
</article><!-- #post-## -->
