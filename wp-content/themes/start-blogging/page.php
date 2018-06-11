<?php
/**
 * The template for displaying all pages
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Start_Blogging
 * @version 1.0.0
 */

get_header(); ?>


<div class="col-md-12">	
	<main id="main" class="site-main">
			
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
	
	</main>
</div>

<?php 
get_footer();
