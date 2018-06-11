<?php
/**
 * Template part for displaying Homepage Portfolio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simple-perle
 */

?>

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

		</header><!-- .entry-header -->

	</div><!-- .entry-content -->
</article><!-- #post-## -->

