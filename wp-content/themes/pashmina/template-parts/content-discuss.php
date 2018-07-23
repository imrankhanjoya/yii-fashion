<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>

<div class="col-md-12 container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	

	<div class="entry-content">
		<p><?PHP the_content();?></p>
    <hr>
    
	
	</div><!-- .entry-content -->
	

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
</div>
