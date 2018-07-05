<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>
<div class="col-md-6">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    
    
    
	 
	
	<div class="entry-content" style="min-height:220px; padding:20px 20px; background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>)">
		
		<a href="<?php esc_url( the_permalink() ); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
		
		
	</div><!-- .entry-content -->
	

</article><!-- #post-## -->
</div>
