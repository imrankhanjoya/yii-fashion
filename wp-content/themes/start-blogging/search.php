<?php
/**
 * The template for displaying search results pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package Start_Blogging
 * @version 1.0.0
 */

get_header(); ?>

<div class="col-md-8">

	<main id="main" class="site-main">

		<?php
			if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for %s', 'start-blogging' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'search' );
			endwhile;
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous', 'start-blogging' ),
					'next_text'          => __( 'Next', 'start-blogging' ),
					'before_page_number' => '<span class="meta-nav sr-only">' . __( 'Page', 'start-blogging' ) . ' </span>',
				) );
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; 
		?>			
			
	</main>
	
</div>

<div class="col-md-4">        
	<?php get_sidebar( 'right' ); ?>       
</div>


<?php get_footer();
