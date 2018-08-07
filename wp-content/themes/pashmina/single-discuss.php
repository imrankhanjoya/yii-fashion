<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */
function gloatme_header_metadata() {

  $data['title'] = get_the_title();
  $data['description'] = "Find the reviews and comments for topic: ".get_the_title();  
  echo generateMeta($data);  
        
}
add_action( 'wp_head', 'gloatme_header_metadata',0);

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">


				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-discuss-one', 'page' );
							the_post_navigation();
						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-8 -->

			
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
