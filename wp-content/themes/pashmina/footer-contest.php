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
		<div class="col-md-4 text-center"> <a href="<?=$about?>">About us</a></div>
		<div class="col-md-4 text-center"> <a href="<?=$privacypolicy?>">Privacy Policy</a></div>
		<div class="col-md-4 text-center"> <a href="<?=$termsconditions?>">Terms Conditions</a></div>
	</div>
</div>

	

<?php wp_footer(); ?>

</body>
</html>
