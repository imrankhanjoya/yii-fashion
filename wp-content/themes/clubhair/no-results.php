<?php
/**
 * The template for displaying when there is no result
 *
 * @package ClubHair
 */

?>
<div class="col-xs-12">
	<div class="page-title">
		<h1><?php esc_html_e( 'Oops..! No Results Found.', 'clubhair' ); ?></h1>
	</div>
	<p><?php esc_html_e( 'Perhaps, Try searching with different keywords.', 'clubhair' ); ?></p>
	<?php get_search_form(); ?>
</div>
