<?php
/**
 * For the footer sidebar
 * @package Start_Blogging
 * @version 1.0.0
 */

if (   ! is_active_sidebar( 'footer'  )	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<div class="container">
	<div class="row">
		<aside id="sidebar-footer" class="widget-area col-md-12">		             
			<?php dynamic_sidebar( 'footer' ); ?> 	
		</aside> 
	</div>
</div>