<?php
/**
 * Content Top sidebar. 
 * @package Start_Blogging
 * @version 1.0.0
 */

if (   ! is_active_sidebar( 'ctop1'  )
	&& ! is_active_sidebar( 'ctop2' )
	&& ! is_active_sidebar( 'ctop3'  )	
	&& ! is_active_sidebar( 'ctop4'  )		
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

     
<aside id="content-top" class="widget-area">
<div class="row">	
	
		<?php if ( is_active_sidebar( 'ctop1' ) ) : ?>
			<div id="ctop1" <?php start_blogging_ctop(); ?>>
				<?php dynamic_sidebar( 'ctop1' ); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'ctop2' ) ) : ?>      
			<div id="ctop2" <?php start_blogging_ctop(); ?>>
				<?php dynamic_sidebar( 'ctop2' ); ?>
			</div>         
		<?php endif; ?>
		
		<?php if ( is_active_sidebar( 'ctop3' ) ) : ?>        
			<div id="ctop3" <?php start_blogging_ctop(); ?>>
				<?php dynamic_sidebar( 'ctop3' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'ctop4' ) ) : ?>        
			<div id="ctop4" <?php start_blogging_ctop(); ?>>
				<?php dynamic_sidebar( 'ctop4' ); ?>
			</div>
		<?php endif; ?>
		
	</div>
</aside>         

