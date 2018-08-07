<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>
<div class="col-md-12 ">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure>
        <?php
        if ( has_post_thumbnail() ) :
            the_post_thumbnail( 'pashmina-front-post-img' );
         endif; 
         ?>

    </figure>
	

	<div class="entry-content">

		<!-- <div class="row">
			<div class="col-md-2 col-lg-1 all-div-padding0 text-center"> 
				<img class="img-circle" src="https://images.pexels.com/photos/207171/pexels-photo-207171.jpeg?auto=compress&cs=tinysrgb&h=350" style="height:50px; width:50px;">
			</div>
			<div class="col-md-6 col-lg-7 ">
				<a href=""> Favful - For Beauty Enthusiast
				<h6>Beauty Observer</h6></a>
			</div>
			<div class="col-md-4 col-lg-4 text-right">8 Jun 2018</div>
		</div> -->


		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?PHP the_content();?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pashmina' ),
				'after'  => '</div>',
			) );
		?>
		<?php pashmina_posted_on(); ?>



	</div><!-- .entry-content -->


	
</article><!-- #post-## -->


<?php comments_template('', true); ?>

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div>
