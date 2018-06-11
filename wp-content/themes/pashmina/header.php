<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pashmina
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

<?php
$header_image = get_header_image();
?>


	<header class="dt-header" <?php if ( ! empty( $header_image ) ) { ?>style="background-image: url('<?php header_image(); ?>');"<?php } ?> >
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="dt-logo">

                        <?php

                        if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                           echo  '<h1 class="transition35 site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
                        }

                        ?>

                        <?php
                        $description = get_bloginfo( 'description', 'display' );
                        if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>

					</div><!-- .dt-logo -->
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- .container -->



        <?php if ( has_nav_menu( 'primary' ) ) : ?>

        <nav class="dt-menu-wrap <?php if ( get_theme_mod( 'pashmina_sticky_menu', 0 ) == 1 ) { ?>dt-sticky<?php } ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="dt-menu-md">
                            <?php _e( 'Menu', 'pashmina' ); ?>
                            <span><i class="fa fa-bars"></i> </span>
                        </div>

                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

                    </div><!-- .col-lg-12 .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </nav><!-- .dt-sticky -->

        <?php endif; ?>

        <?php if( ! is_front_page() && ! is_home() ) : ?>
            <div class="dt-breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <?php pashmina_breadcrumb(); ?>
                        </div><!-- .col-lg-12 .col-md-12 -->
                    </div><!-- .row-->
                </div><!-- .container-->
            </div><!-- .dt-breadcrumbs-->
        <?php endif; ?>

    </header>
