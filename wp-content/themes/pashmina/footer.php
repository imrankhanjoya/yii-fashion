<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pashmina
 */

 $val = get_page_by_path( 'about-us' );
 $about = get_page_link($val->ID);
?>

<footer class="dt-footer">
	

	<div class="dt-footer-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="dt-copyright">
						<?php _e( 'Copyright &copy; ', 'pashmina' ); echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a><?php _e( '. All rights reserved.', 'pashmina' )?>
					</div><!-- .dt-copyright -->
				</div><!-- .col-lg-4 .col-md-4 -->
				<div class="col-lg-4 col-md-4">
					<div class="dt-copyright">
						<a href="<?=$about ?>">About US</a>
					</div><!-- .dt-copyright -->
				</div><!-- .col-lg-4 .col-md-4 -->

				<div class="col-lg-4 col-md-4">
					<div class="dt-footer-designer">
						<?php do_action('pashmina_theme_info'); ?>
					</div><!-- .dt-footer-designer -->
				</div><!-- .col-lg-4 .col-md-4 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .dt-footer-bar -->
</footer><!-- .dt-footer -->

<a id="back-to-top" class="transition35"><i class="fa fa-angle-up"></i></a><!-- #back-to-top -->

<?php wp_footer(); ?>

</body>
</html>
