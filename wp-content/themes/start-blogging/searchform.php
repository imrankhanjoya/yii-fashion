<?php
/**
 * Template for displaying search forms
 * @package Start_Blogging
 * @version 1.0.0
 */

?>


<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<span class="sr-only"><?php echo _x( 'Search', 'Search form label', 'start-blogging' ); ?></span>	
	<div class="form-group"><input type="search" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="<?php echo esc_attr_x( 'Search', 'Search field placeholder', 'start-blogging' ); ?>">
   </div>           
  <div class="form-actions"><button class="btn btn-search btn-default" type="submit"><?php echo esc_html__('Search', 'start-blogging'); ?></button></div>
</form> 