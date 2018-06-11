<?php
/**
 * The template for displaying search results pages
 *
 * @package ClubHair
 */

get_header(); ?>

<section class="content content-search">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-title">
					<h1><?php esc_html_e( 'Search Results For:', 'clubhair' ); ?> <strong><?php echo get_search_query(); ?></strong></h1>
				</div>
				<p><?php the_archive_description(); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?php get_template_part( 'loop' ); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
