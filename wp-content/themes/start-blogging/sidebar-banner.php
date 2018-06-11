<?php
/**
 * For displaying banner
 * @package Start_Blogging
 * @version 1.0.0
 */

if ( ! is_active_sidebar( 'banner' ) ) {
	return;
}
?>
	
<?php if ( is_active_sidebar( 'banner' ) ) : ?>

<div class="banner-wrapper">

		<div id="banner" class="widget-area">
			<?php dynamic_sidebar( 'banner' ); ?>
		</div>
</div>	
<?php endif; ?>