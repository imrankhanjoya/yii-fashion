<?php
/**
 * The sidebar containing the main widget area
 *
 * @package ClubHair
 */

?>
<div class="primary-sidebar">
<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
	<?php dynamic_sidebar( 'primary_sidebar' ); ?>
<?php endif; ?>
</div>
