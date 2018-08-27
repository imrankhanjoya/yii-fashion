<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pashmina
 */

 $val = get_page_by_path( 'about-us' );
 $about = get_page_link($val->ID);
 $val = get_page_by_path( 'privacy-policy' );
 $privacypolicy = get_page_link($val->ID);
 $val = get_page_by_path( 'terms-and-conditions' );
 $termsconditions = get_page_link($val->ID);

?>
<style type="text/css">
	.bottom-footer{
		position: fixed;
		bottom: 0px;
		background-color: #000;
		width: 100%;
	}
	.bottom-footer a{
		color: #fff;
		font-size: 11px;
	}
</style>
<div class="container bottom-footer">
	<div class="row">
		<div class="col-md-4 col-xs-3 text-center"> <a href="<?=$about?>">About us</a></div>
		<div class="col-md-4 col-xs-4 text-center"> <a href="<?=$privacypolicy?>">Privacy Policy</a></div>
		<div class="col-md-4 col-xs-5 text-center"> <a href="<?=$termsconditions?>">Terms Conditions</a></div>
	</div>
</div>

	<script>
		(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=280996468577026&autoLogAppEvents=1";
            fjs.parentNode.insertBefore(js, fjs);}
      (document, "script", "facebook-jssdk"));
   </script>

<?php wp_footer(); ?>

</body>
</html>
