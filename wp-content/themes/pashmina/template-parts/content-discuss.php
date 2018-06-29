<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>
<div class="col-md-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure>
        <?php
        if ( has_post_thumbnail() ) :
            the_post_thumbnail( 'pashmina-front-post-img' );
         endif; 
         ?>

    </figure>
	

	<div class="entry-content">
		<p><?PHP the_content();?></p>
	
	</div><!-- .entry-content -->
	

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
</div>
