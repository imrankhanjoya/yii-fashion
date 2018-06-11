<?php
/**
 * The template for displaying the footer
 *
 * @package ClubHair
 */

?>
<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="footer-main">
					<div class="row">
						<div class="col-xs-12 text-center">
							<p><?php esc_html_e( 'Theme by', 'clubhair' ); ?> <?php if ( is_home( ) && ! is_paged( ) ) : ?><a href="<?php echo esc_url( __( 'https://www.thewpclub.com', 'clubhair' ) ); ?>" title="The WP Club" target="_blank"><?php endif; ?>The WP Club<?php if ( is_home( ) && ! is_paged( ) ) : ?></a><?php endif; ?>. <span class="sep"> | </span> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'clubhair' ) ); ?>" target="_blank"><?php /* translators: %s containing WordPress */ printf( esc_html__( 'Proudly powered by %s', 'clubhair' ), 'WordPress' ); ?></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="back-to-top"></div>

<?php wp_footer(); ?>

</body>
</html>
