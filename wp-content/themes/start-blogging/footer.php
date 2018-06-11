<?php
/**
 * The template for displaying the footer
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Start_Blogging
 * @version 1.0.0
 */

?>

</div><!-- row -->
		</div><!-- #content -->
		</div><!-- container -->


		<?php get_sidebar( 'content-bottom' ); ?>

		
		<div id="bottom-sidebar-wrapper">
		<?php get_sidebar( 'bottom' ); ?>
		</div>
	
	<a class="go-top"><span class="fa fa-angle-up"></span></a>

	<footer id="site-footer">
		<?php get_sidebar( 'footer' ); ?>
		
            <?php if ( has_nav_menu( 'social' ) ) :
					echo '<nav class="social-menu">';
						wp_nav_menu( array(
							'theme_location' => 'social', 'depth' => 1, 'container' => false, 'menu_class' => 'social-icons', 'link_before' => '<span class="sr-only">', 'link_after' => '</span>',
						) );
					echo '</nav>';
            endif; ?>
			
 			<nav id="footer-nav">
				<?php wp_nav_menu( array( 
						'theme_location' => 'footer', 
						'fallback_cb' => false, 
						'depth' => 1,
						'container' => false, 
						'menu_id' => 'footer-menu', 
					) ); 
				?>
			</nav>
			
		<div id="site-info">        
		<?php esc_html_e('Copyright &copy;', 'start-blogging'); ?> 
        <?php echo date_i18n( __( 'Y', 'start-blogging' ) ) ?>
		<?php echo esc_html(get_theme_mod( 'start_blogging_copyright')); ?>. <?php esc_html_e('All rights reserved.', 'start-blogging'); ?>			
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->	
		
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
