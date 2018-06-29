<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>
<div class="col-md-12 discuss">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure>
        <?php
        if ( has_post_thumbnail() ) :
            the_post_thumbnail( 'pashmina-front-post-img' );
         endif; 
         ?>

    </figure>
	

	<div class="entry-content">
		<?PHP the_content();?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pashmina' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php comments_template('', true); ?>

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->

	
</article><!-- #post-## -->
</div>
