<?php
/**
 * Template Name: Left &amp; Right Column
 * @package Start_Blogging
 * @version 1.0.0
*/

get_header(); ?>


		<div class="col-md-6 col-md-push-3">
		
			<main id="main" class="site-main">
					
				<?php while ( have_posts() ) : the_post(); 
				get_template_part( 'template-parts/content', 'page' ); 
				if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif;
				endwhile; ?>

			</main>	
			
		</div>

		<div class="col-md-3 col-md-pull-6">        
			<?php get_sidebar( 'left' ); ?>       
		</div>
		
		<div class="col-md-3">        
			<?php get_sidebar( 'right' ); ?>       
		</div>
	
<?php 
get_footer();