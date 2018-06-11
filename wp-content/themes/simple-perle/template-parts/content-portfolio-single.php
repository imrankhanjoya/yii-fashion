<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simple-perle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>

	<?php if (has_post_thumbnail()): ?>

		<header class="entry-header clear">

	<?php else: ?>

		<header class="entry-header clear no-thumbnail">

	<?php endif; ?>

		<?php the_post_thumbnail('simple-perle-featured-post-thumb', array( 'class' => "animate attachment-simple-perle-featured-post-thumb")); ?>

		<div class="entry-header-content">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta bottom-meta">
				<?php echo esc_html( the_terms( $post->ID, 'jetpack-portfolio-type' ,  ' ' )); ?>  <?php simple_perle_edit(); ?>
			</div>
		</div><!-- end .entry-header-content -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if(get_the_terms( $post->ID, 'jetpack-portfolio-tag')):?>
			<div class="post-meta portfolio-meta left">

				<?php 
					echo esc_html__( 'Tagged: ', 'simple-perle' ), esc_html( the_terms( $post->ID, 'jetpack-portfolio-tag' ,  ' ' )); ?>
			</div>
		<?php endif; ?>

		<div class="post-meta right">

			<?php if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			} ?>

		</div>

		<div class="post-content">
			<?php the_content(); ?>
		</div>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
