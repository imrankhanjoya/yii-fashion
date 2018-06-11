<?php
/**
 * Bottom sidebars 
 * @package Start_Blogging
 * @version 1.0.0
 */

if (   ! is_active_sidebar( 'bottom1'  )
	&& ! is_active_sidebar( 'bottom2' )
	&& ! is_active_sidebar( 'bottom3'  )		
	&& ! is_active_sidebar( 'bottom4'  )	
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
   
<aside id="sidebar-bottom" class="widget-area">
	<div class="container">
		<div class="row">		   
			<?php if ( is_active_sidebar( 'bottom1' ) ) : ?>
				<div id="bottom1" <?php start_blogging_bottom(); ?>>
					<?php dynamic_sidebar( 'bottom1' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'bottom2' ) ) : ?>      
				<div id="bottom2" <?php start_blogging_bottom(); ?>>
					<?php dynamic_sidebar( 'bottom2' ); ?>
				</div>         
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'bottom3' ) ) : ?>        
				<div id="bottom3" <?php start_blogging_bottom(); ?>>
					<?php dynamic_sidebar( 'bottom3' ); ?>
				</div>
			<?php endif; ?>
			
			<?php if ( is_active_sidebar( 'bottom4' ) ) : ?>        
				<div id="bottom4" <?php start_blogging_bottom(); ?>>
					<?php dynamic_sidebar( 'bottom4' ); ?>
				</div>
			<?php endif; ?>		
		</div>
	</div>
</aside>         
