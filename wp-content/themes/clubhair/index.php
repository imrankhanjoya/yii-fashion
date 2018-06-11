<?php
/**
 * The main template file
 *
 * @package ClubHair
 */

get_header(); ?>

<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
	<?php if ( is_active_sidebar( 'services_title_sidebar' ) || is_active_sidebar( 'service_sidebar_1' ) || is_active_sidebar( 'service_sidebar_2' ) || is_active_sidebar( 'service_sidebar_3' ) ) : ?>
	<section class="sidebar-services">
		<div class="container-fluid">
			<?php if ( is_active_sidebar( 'services_title_sidebar' ) ) : ?>
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
					<?php dynamic_sidebar( 'services_title_sidebar' ); ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="row">
			<?php if ( is_active_sidebar( 'service_sidebar_1' ) && is_active_sidebar( 'service_sidebar_2' ) ) : ?>
				<div class="col-xs-12 col-sm-6">
			<?php elseif ( is_active_sidebar( 'service_sidebar_1' ) ) : ?>
				<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<?php endif; ?>
					<?php dynamic_sidebar( 'service_sidebar_1' ); ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<?php dynamic_sidebar( 'service_sidebar_2' ); ?>
				</div>
			<?php if ( is_active_sidebar( 'service_sidebar_3' ) && is_active_sidebar( 'service_sidebar_4' ) ) : ?>
				<div class="col-xs-12 col-sm-6">
			<?php elseif ( is_active_sidebar( 'service_sidebar_3' ) ) : ?>
				<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<?php endif; ?>
					<?php dynamic_sidebar( 'service_sidebar_3' ); ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<?php dynamic_sidebar( 'service_sidebar_4' ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>

<section class="content content-index">
	<div class="container-fluid">
	<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
		<?php if ( is_active_sidebar( 'blog_title_sidebar' ) ) : ?>
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
				<?php dynamic_sidebar( 'blog_title_sidebar' ); ?>
			</div>
		</div>
		<?php endif; ?>
	<?php endif; ?>
		<div class="row">
			<div class="col-xs-12">
				<?php get_template_part( 'loop' ); ?>
			</div>
		</div>
	</div>
</section>

<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
	<?php if ( is_active_sidebar( 'contact_sidebar' ) ) : ?>
	<section class="sidebar-contact">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 text-center">
					<?php dynamic_sidebar( 'contact_sidebar' ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>

<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
	<?php if ( is_active_sidebar( 'prices_title_sidebar' ) || is_active_sidebar( 'price_sidebar_1' ) || is_active_sidebar( 'price_sidebar_2' ) || is_active_sidebar( 'price_sidebar_3' ) ) : ?>
	<section class="sidebar-prices">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 text-center">
					<?php dynamic_sidebar( 'prices_title_sidebar' ); ?>
				</div>
			</div>
			<div class="row">
				<?php if ( is_active_sidebar( 'price_sidebar_1' ) && is_active_sidebar( 'price_sidebar_2' ) && is_active_sidebar( 'price_sidebar_3' ) ) : ?>
				<div class="col-xs-12 col-sm-4 text-center">
					<?php dynamic_sidebar( 'price_sidebar_1' ); ?>
				</div>
				<div class="col-xs-12 col-sm-4 text-center">
					<?php dynamic_sidebar( 'price_sidebar_2' ); ?>
				</div>
				<div class="col-xs-12 col-sm-4 text-center">
					<?php dynamic_sidebar( 'price_sidebar_3' ); ?>
				</div>
				<?php elseif ( is_active_sidebar( 'price_sidebar_1' ) && is_active_sidebar( 'price_sidebar_2' ) ) : ?>
				<div class="col-xs-12 col-sm-4 col-sm-offset-2 text-center">
					<?php dynamic_sidebar( 'price_sidebar_1' ); ?>
				</div>
				<div class="col-xs-12 col-sm-4 text-center">
					<?php dynamic_sidebar( 'price_sidebar_2' ); ?>
				</div>
				<?php elseif ( is_active_sidebar( 'price_sidebar_1' ) ) : ?>
				<div class="col-xs-12 col-sm-4 col-sm-offset-4 text-center">
					<?php dynamic_sidebar( 'price_sidebar_1' ); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>

<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
	<?php if ( is_active_sidebar( 'stats_title_sidebar' ) || is_active_sidebar( 'stats_sidebar_1' ) || is_active_sidebar( 'stats_sidebar_2' ) || is_active_sidebar( 'stats_sidebar_3' ) || is_active_sidebar( 'stats_sidebar_4' ) ) : ?>
	<section class="sidebar-stats">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
					<?php dynamic_sidebar( 'stats_title_sidebar' ); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 text-center">
					<?php dynamic_sidebar( 'stats_sidebar_1' ); ?>
				</div>
				<div class="col-xs-12 col-sm-3 text-center">
					<?php dynamic_sidebar( 'stats_sidebar_2' ); ?>
				</div>
				<div class="col-xs-12 col-sm-3 text-center">
					<?php dynamic_sidebar( 'stats_sidebar_3' ); ?>
				</div>
				<div class="col-xs-12 col-sm-3 text-center">
					<?php dynamic_sidebar( 'stats_sidebar_4' ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>

<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
	<?php if ( is_active_sidebar( 'information_sidebar' ) ) : ?>
	<section class="sidebar-information">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-md-7 col-md-offset-5">
					<div class="sidebar-info">
						<?php dynamic_sidebar( 'information_sidebar' ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>

<?php get_footer(); ?>
