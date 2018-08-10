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
<!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "5863de63-7d93-4b6a-a10a-6ce8e2e15c3a",
    });
  });
</script> -->

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "9f21cd44-b6e7-4a3f-b49e-d52c2fd781c0",
    });
  });
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WM9QZCG');</script>
<!-- End Google Tag Manager -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WM9QZCG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



</head>

<body <?php body_class(); ?>>

<?php
$header_image = get_header_image();

$showHeader = true;

?>


	<header class="dt-header" <?php if ( ! empty( $header_image ) ) { ?>style="background-image: url('<?php header_image(); ?>'); background-position: center; background-repeat: no-repeat;"<?php } ?> >
		<div class="container hidden-xs">
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
                            <img src="http://gloat.me/wp-content/uploads/2018/07/white-30.png" height="20px">
                            <span><i class="fa fa-bars"></i> </span>
                        </div>

                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>

                    </div><!-- .col-lg-12 .col-md-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </nav><!-- .dt-sticky -->

        <?php endif; ?>

        <?php if( (! is_front_page() && ! is_home()) && showheader()) : ?>
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