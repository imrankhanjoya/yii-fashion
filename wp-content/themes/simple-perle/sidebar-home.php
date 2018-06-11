<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simple-perle
 */

if ( ! is_active_sidebar( 'archive-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area widget-area-sidebar" role="complementary">
	<?php dynamic_sidebar( 'archive-sidebar' ); ?>
</aside><!-- #secondary -->
