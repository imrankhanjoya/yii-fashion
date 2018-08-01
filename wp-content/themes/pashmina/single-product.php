<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */
global $img;
$post_ID = get_the_ID();
$val = get_post_meta($post_ID);
$img = $val['LargeImage'][0];
function gloatme_header_metadata() {

  $data['title'] = get_the_title();
  $data['image'] = $img;
  $data['description'] = get_the_title()." related reviews and comments with where to buy option. at gloat.me";  
  echo generateMeta($data);  
        
}
add_action( 'wp_head', 'gloatme_header_metadata',0);


get_header(); 


?>
	<div class="container product_one">
		<div class="row">
			<div class="col-lg-8 col-md-8">


				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						while ( have_posts() ) : the_post();
							
							get_template_part( 'template-parts/content-product-one', 'page' );

							the_post_navigation();

							

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-8 -->
			<aside class="col-lg-4 col-md-4">
				<div class="dt-sidebar" style="padding:10px">
					<br>
					<?PHP //print_r($val);?>
					<div class="price_box">
						<div class="clearfix"></div>
						<?php $rsaaray = explode(' ', $val['ListPrice'][0]);?>
					<span class="lab">Best Price: <?=$rsaaray[0].' '.$rsaaray[1]?></span>
					<?PHP if(isset($val['LowestNewPrice'][0])):?>
					<span class="offer"><?=$val['LowestNewPrice'][0]?></span>
					<?PHP endif;?>
					<div class="clearfix"></div>
					<a href="<?=$val['DetailPageURL'][0]?>" class="btn btn-amz-sucs btn-success">Buy <span class="ambadge">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>

					</div>
					<?php get_sidebar(); ?>
				</div><!-- .dt-sidebar -->
			</aside><!-- .col-lg-4 -->
			
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
