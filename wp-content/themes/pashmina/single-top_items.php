<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */

get_header(); 

?>


<div class="col-md-12" style="min-height:220px; padding:20px 20px; background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>)">
<center>
<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?PHP
$content_post = get_post(get_the_ID());
echo get_the_content();
?>
<?php the_excerpt( '<h3 class="entry-title">', '</h3>' ); ?>
	
</center>	
<?= $content_post->post_content ?>
</div>


	<div class="container">
		<div class="row">

				<div class="col-md-8" >
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php 
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'product', 'posts_per_page' =>10, 'paged' => $paged );
						$custom_query = new WP_Query($args);
						?>
						<?PHP while($custom_query->have_posts()) : $custom_query->the_post(); $post_ID = get_the_ID();  $val = get_post_meta($post_ID);?>

									<div class="col-md-12" style="border:1px solid #ccc; border-radius: 4px; margin-bottom:20px" >
									
									<div class="col-md-4" >
										<figure>
										<?= "<img src='".$val['LargeImage'][0]."' class='img-responsive small-img'>"?>
										</figure>
										
									</div>
									<div class="col-md-8 entry-content">
										
										<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><h2 class="entry-title"><?php the_title(); ?></h2></a>
										<a href="<?php esc_url( the_permalink() ); ?>" title="<?=$val['Publisher'][0]?>"><h2 class="entry-by"><?=$val['Brand'][0]?></h2></a>
										<?php the_content(); ?>
										<ul class="nav nav-pills btn-group-xs">
										<li role="presentation"><a href="<?=$val['DetailPageURL'][0]?>" ><?=$price?></a></li>
										<li role="presentation"><a href="#"><span class="glyphicon glyphicon-heart"></span> Fave</a></li>
										<li role="presentation"><a href="#"><span class="glyphicon glyphicon-share-alt
										"></span> Share</a></li>
										</ul>
									</div><!-- .entry-content -->
									


									</div>

						<?php endwhile; ?>

						<?php next_posts_link( '&larr; Older posts', $custom_query->max_num_pages); ?>
						<?php previous_posts_link( 'Newer posts &rarr;' ); ?>

						<?php wp_reset_postdata(); // reset the query ?>

					</main><!-- #main -->
				</div><!-- #primary -->
				</div>
				<aside class="col-lg-4 col-md-4">
				<div class="dt-sidebar">
					<?php get_sidebar(); ?>
				</div><!-- .dt-sidebar -->
			</aside><!-- .col-lg-4 -->
			
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
