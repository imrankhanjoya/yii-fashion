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
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "5863de63-7d93-4b6a-a10a-6ce8e2e15c3a",
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


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$header_image = get_header_image();

$showHeader = true;

?>


	<header class="dt-header" >
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div style="text-align: center; padding:10px;">

                        <?php

                        if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) {
                            echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="http://www.gloat.me/wp-content/uploads/2018/08/Gloatme-full-white.png" style="height:25px"></a>';
                        } else {
                           echo  '<h1 class="transition35 site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_attr( get_bloginfo( 'name' ) ) . '</a></h1>';
                        }

                        ?>

                        

					</div><!-- .dt-logo -->
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- .container -->



        

    </header>
  <style>
  .custom-logo{
    height: 20px;
    width: auto;
  }
  </style>
