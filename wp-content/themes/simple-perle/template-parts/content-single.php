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

			<div class="entry-meta">
				<?php simple_perle_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta bottom-meta">
				<?php simple_perle_entry_category(); ?>
			</div>
		</div><!-- end .entry-header-content -->

	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="post-meta left">
			<?php simple_perle_author_info(); ?>
		</div>

		<div class="post-meta right">
			<?php simple_perle_entry_tags(); ?>

			<?php if ( function_exists( 'sharing_display' ) ) {
				sharing_display( '', true );
			} ?>

		</div>

		<div class="post-content">
			<?php the_content(); ?>
		</div>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
