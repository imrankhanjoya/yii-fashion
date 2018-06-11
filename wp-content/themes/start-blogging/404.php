<?php
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Start_Blogging
 * @version 1.0.0
 */

get_header(); ?>


<div class="col-md-12 error-content">
	<div class="row">
	
		<div class="col-md-6">	
			<div id="page-title"><?php esc_html_e( 'Page Not Found', 'start-blogging' ); ?></div>
			<div id="error-message"><?php esc_html_e( 'Oops! The page you were looking for was not found. Perhaps searching can help.', 'start-blogging' ); ?></div>
		</div>
		
		<div class="col-md-6">
			<header id="page-header">
			<div id="error-label"><?php esc_html_e( '404', 'start-blogging' ); ?></div>
			</header>
		</div>
		
	</div>
</div>

<?php 
get_footer();