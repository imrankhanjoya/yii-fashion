<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simple-perle
 */

?>

	</div><!-- #content -->

	<?php if(is_single()):

		 simple_perle_post_navigation();

	endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php get_sidebar(); ?>

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simple-perle' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'simple-perle' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'simple-perle' ), 'simple-perle', '<a href="http://nudgethemes.com" rel="designer">Nudge Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
