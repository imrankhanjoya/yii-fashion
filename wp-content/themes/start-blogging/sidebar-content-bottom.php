<?php
/**
 * Content Bottom sidebar. 
 * @package Start_Blogging
 * @version 1.0.0
 */

if (   ! is_active_sidebar( 'cbottom1'  )
	&& ! is_active_sidebar( 'cbottom2' )
	&& ! is_active_sidebar( 'cbottom3'  )	
	&& ! is_active_sidebar( 'cbottom4'  )	
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

       
<aside id="sidebar-content-bottom" class="widget-area">
	<div class="container">
		<div class="row">

		<?php if ( is_active_sidebar( 'cbottom1' ) ) : ?>
		<div id="cbottom1" <?php start_blogging_cbottom(); ?>>
			<?php dynamic_sidebar( 'cbottom1' ); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'cbottom2' ) ) : ?>      
		<div id="cbottom2" <?php start_blogging_cbottom(); ?>>
			<?php dynamic_sidebar( 'cbottom2' ); ?>
		</div>         
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'cbottom3' ) ) : ?>        
		<div id="cbottom3" <?php start_blogging_cbottom(); ?>>
			<?php dynamic_sidebar( 'cbottom3' ); ?>
		</div>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'cbottom4' ) ) : ?>        
		<div id="cbottom4" <?php start_blogging_cbottom(); ?>>
			<?php dynamic_sidebar( 'cbottom4' ); ?>
		</div>
		<?php endif; ?>	
		
		</div>
	</div>
</aside>         
  
