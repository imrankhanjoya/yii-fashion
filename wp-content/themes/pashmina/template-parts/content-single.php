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

        else : ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank.png" alt="<?php _e( 'no image found', 'pashmina' )?>"/>
        <?php endif; ?>

    </figure>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php pashmina_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pashmina' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php if ( get_theme_mod( 'pashmina_related_posts_setting', 0 ) == 1 ) : ?>
		<?php get_template_part( 'template-parts/related-posts' );?>
	<?php endif; ?>
</article><!-- #post-## -->
