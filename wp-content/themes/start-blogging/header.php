<?php
/**
 * The header for our theme
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Start_Blogging
 * @version 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<div id="top">
<div class="container">
<div class="row">


		<div id="announcement" class="col-sm-6">
				<?php if ( is_active_sidebar( 'announcement' ) ) { 
				dynamic_sidebar( 'announcement' ); 
				} ?>
		</div>
	
	
	<?php if ( has_nav_menu( 'topsocial' ) ) { ?>
		<div class="col-sm-6 header-row-1-right">
			<?php if ( has_nav_menu( 'topsocial' ) ) {
			echo '<nav id="top-social-menu">';
				wp_nav_menu( array(
					'theme_location' => 'topsocial', 'depth' => 1, 'container' => false, 'menu_class' => 'top-social-icons', 'link_before' => '<span class="sr-only">', 'link_after' => '</span>',
				) );
			echo '</nav>';
			
			} ?>
		</div>
			<?php } ?>
</div>
</div>
</div>

	<a class="skip-link sr-only" href="#content-wrapper"><?php _e( 'Skip to content', 'start-blogging' ); ?></a>

<div id="header-wrapper">	
		<header id="masthead" class="site-header">
			<div id="site-branding">
				<?php	
				start_blogging_the_custom_logo();	
				
					if ( is_front_page() ) : ?>
						<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<div id="site-description"><?php echo $description; ?></div>
					<?php endif;
				?>
			</div>
			
				<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menu', 'start-blogging' ); ?>">
				
                <div class="toggle-container visible-xs visible-sm hidden-md hidden-lg">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="sr-only"><?php esc_html_e('Menu', 'start-blogging'); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                </div>			
                              
              <?php if ( has_nav_menu( 'primary' ) ) {																			
                        wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); 
                        } else {
                        start_blogging_blogging_default_nav();					
                       } 
                    ?>      
					
            </nav><!-- #site-navigation --> 
           
			
		</header>
</div>
	
<div class="container">	
	
	<?php get_sidebar( 'banner' ); ?>
	
	
	<div id="content-wrapper" class="site-content">
	
	<?php get_sidebar( 'breadcrumbs' ); ?>
	<?php get_sidebar( 'content-top' ); ?>
	
	<div class="row">