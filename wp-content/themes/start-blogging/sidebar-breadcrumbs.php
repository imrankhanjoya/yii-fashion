<?php
/**
 * For displaying breadcrumbs
 * @package Start_Blogging
 * @version 1.0.0
 */

if ( ! is_active_sidebar( 'breadcrumbs' ) ) {
	return;
}
?>

<div id="breadcrumbs" class="widget-area">
	<?php dynamic_sidebar( 'breadcrumbs' ); ?>
</div> 
