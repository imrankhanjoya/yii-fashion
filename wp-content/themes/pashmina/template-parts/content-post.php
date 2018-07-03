<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure>

        <?php

        if ( has_post_thumbnail() ) :

            the_post_thumbnail( 'pashmina-front-post-img' );

         endif; ?>

    </figure>
	

	<div class="entry-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pashmina' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<header class="entry-header">

		<div class="entry-meta">
			<?php pashmina_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php //pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	
</article><!-- #post-## -->
