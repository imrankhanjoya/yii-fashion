<?php
/**
 * The header for our theme including the navigation and the photo header
 *
 * @package ClubHair
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open() ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php
				$clubhair_custom_logo_id = get_theme_mod( 'custom_logo' );
				$clubhair_logo = wp_get_attachment_image_src( $clubhair_custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
				?>
				<div class="site-icon">
					<img src="<?php echo esc_url( $clubhair_logo[0] ); ?>" class="img-responsive">
				</div>
				<?php } ?>
				<span class="site-title"><?php bloginfo( 'name' ); ?></span>
				<?php $clubhair_description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $clubhair_description || is_customize_preview() ) : ?>
					<span class="site-description"><?php echo esc_html( $clubhair_description ); ?></span>
				<?php endif; ?>
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<div class="icon-frame">
					<span class="icon-bar icon-bar-1"></span>
					<span class="icon-bar icon-bar-2"></span>
					<span class="icon-bar icon-bar-3"></span>
				</div>
			</button>
		</div>
		<div id="navbar" class="navbar-collapse">
			<?php clubhair_bootstrap_menu(); ?>
		</div>
	</div>
</nav>

<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) : ?>
	<?php $clubhair_count = WC()->cart->cart_contents_count; ?>
	<div class="woocommerce-cart-contents">
		<a href="<?php echo esc_attr( wc_get_cart_url() ); ?>" title="<?php echo esc_attr__( 'View your shopping cart', 'clubhair' ); ?>">
			<i class="fas fa-shopping-basket"></i>
		<?php if ( $clubhair_count > 0 ) : ?>
			<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubhair_count ); ?></span>
		<?php endif; ?>
		</a>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
<section class="sidebar">
	<div class="sidebar-button">
		<a class="btn btn-default btn-sidebar"><span><?php esc_html_e( 'Sidebar', 'clubhair' ); ?></span></a>
	</div>
	<div class="sidebar-frame">
		<div class="sidebar-main">
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php if ( get_header_image() ) : ?>
	<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
		<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
			<header class="site-header site-header-sidebar" style="background-image:url('<?php header_image(); ?>');">
		<?php else : ?>
			<header class="site-header" style="background-image:url('<?php header_image(); ?>');">
		<?php endif; ?>
	<?php else : ?>
		<header class="site-header">
	<?php endif; ?>
<?php else : ?>
	<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
		<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
			<header class="site-header site-header-sidebar">
		<?php else : ?>
			<header class="site-header">
		<?php endif; ?>
	<?php else : ?>
		<header class="site-header">
	<?php endif; ?>
<?php endif; ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="site-header-extra">
					<?php if ( is_front_page() && is_home() && ! is_paged() ) : ?>
						<?php if ( is_active_sidebar( 'header-sidebar' ) ) : ?>
							<div class="site-header-extra-main">
								<?php dynamic_sidebar( 'header-sidebar' ); ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					<div class="scroll-down hidden-xs">
						<?php esc_html_e( 'Scroll down', 'clubhair' ); ?>
					</div>
				</div>
				<?php get_template_part( 'inc/social' ); ?>
			</div>
		</div>
	</div>
</header>
