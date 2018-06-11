<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simple-perle
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'simple-perle' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="top-menu-wrap" id="top-menu-wrap">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i>
	 			<?php esc_html_e( 'Menu', 'simple-perle' ); ?></button>
				<?php wp_nav_menu(
						array(
							'theme_location' => 'primary', 
							'menu_id'        => 'primary-menu', 
							'container'      => '' 
							)
					); ?>
			</nav><!-- #site-navigation -->

			<?php if ( has_nav_menu( 'social-media' ) ) { ?>

				<nav id="social-navigation" class="social-navigation" role="navigation">
					<?php wp_nav_menu( 
							array( 
								'theme_location' => 'social-media', 
								'menu_id'        => 'social-media', 
								'container'      => '' , 
								'link_before'    => '<span class="screen-reader-text">', 
								'link_after'     => '</span>', 
								) 
						); ?>
				</nav><!-- #social-navigation -->
			<?php } ?>

		</div>

		<div class="site-branding">
			<?php if ( function_exists( 'the_custom_logo' ) ) the_custom_logo(); ?>
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
