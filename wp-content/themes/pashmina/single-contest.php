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
$userID = 23;
?>
<?php if(isset($_GET['startit']) && $userID ):?>

<?PHP include('contest-form.php'); ?>

<?php else: ?>
	<div class="container" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>); height:650px; width: 100%; background-position: center; background-size: cover;" >
		<div class="row" >
			<div class="col-lg-12 col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<div class="entry-content">

						<a href="<?php esc_url( the_permalink() ); ?>">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </a>
						<?=$post->post_content?>

						</div><!-- .entry-content -->
						
						<a href="getStart">Get Start</a>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-8 -->

			
		</div><!-- .row -->
	</div><!-- .container -->
<?php endif; ?>
<?php
get_footer('contest');
