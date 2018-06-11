<?php global $incart_lite_shortname; ?>
<?php
if ( 'page' == get_option( 'show_on_front' ) ) {
	global $shortname; 
?>
<?php get_header(); ?>

<?php get_template_part('template-front-page'); ?>

<?php get_footer(); ?>
<?php 
 } else {
	include( get_home_template() );
}
 ?>