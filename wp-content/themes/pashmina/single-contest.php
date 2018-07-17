<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */

get_header('nomenu'); 

$post_ID = get_the_ID();
$post = get_post();        
?>




	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<div class="entry-content">

						<a href="<?php esc_url( the_permalink() ); ?>">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </a>
						<?PHP the_content()?>

						</div><!-- .entry-content -->
						
						<a href="getStart">Get Start</a>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-8 -->

			
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
