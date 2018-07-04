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

$showHeader = true;

?>


	<header class="dt-header" <?php if ( ! empty( $header_image ) ) { ?>style="background-image: url('<?php header_image(); ?>'); background-position: center; background-repeat: no-repeat;"<?php } ?> >
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



        

    </header>
