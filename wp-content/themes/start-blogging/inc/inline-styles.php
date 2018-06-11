<?php
/**
 * Add inline styles to the head area
 * These styles represents options from the customizer
 * @package Start_Blogging
 * @since 1.0.0
 */
 
 // Dynamic styles
function start_blogging_inline_styles($custom) {
	
// BEGIN CUSTOM CSS	
if (   is_active_sidebar( 'cbottom1'  )
	&& is_active_sidebar( 'cbottom2' )
	&& is_active_sidebar( 'cbottom3'  )	
	&& is_active_sidebar( 'cbottom4'  )	) :
	$custom .= "#content-wrapper {padding-bottom: 1rem};
		"."\n";		
endif;
	
		
// END CUSTOM CSS
//Output all the styles
	wp_add_inline_style( 'start-blogging-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'start_blogging_inline_styles' );	