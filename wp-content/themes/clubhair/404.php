<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ClubHair
 */

get_header(); ?>

<section class="content content-404">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-title">
					<h1><?php esc_html_e( 'The Page You Are Looking For Doesn&rsquo;t Exist.', 'clubhair' ); ?></h1>
				</div>
				<h2><?php esc_html_e( 'We are very sorry for the inconvenience.', 'clubhair' ); ?></h2>
				<p><?php esc_html_e( 'Perhaps, Try using the search box below.', 'clubhair' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
