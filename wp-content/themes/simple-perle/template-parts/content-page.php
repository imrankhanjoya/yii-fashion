<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simple-perle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (has_post_thumbnail()): ?>

		<header class="entry-header clear">

	<?php else: ?>

		<header class="entry-header clear no-thumbnail">

	<?php endif; ?>

		<?php the_post_thumbnail('simple-perle-featured-post-thumb', array( 'class' => "attachment-simple-perle-featured-post-thumb animate")); ?>

			<div class="entry-header-content">

				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', 'simple-perle' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>

			</div><!-- end .entry-header-content -->

		</header><!-- .entry-header -->


		<div class="entry-content">

			<div class="post-meta right">

				<?php if ( function_exists( 'sharing_display' ) ) {
					sharing_display( '', true );
				} ?>

			</div>

			<div class="page-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-perle' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div><!-- .entry-content -->

</article><!-- #post-## -->
