<?php
/**
 * The template for search form.
 *
 * @package simple-perle
 */
 ?>
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="search-form" class="search-form" method="get" role="search">
			<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label', 'simple-perle' ); ?></label>
			<input type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo esc_attr_x('Search &hellip;','submit button', 'simple-perle');?>" class="search-field" class="search-field" />
			<button type="submit" id="search-submit" class="search-submit"><i class="fa fa-search"></i></button>
	</form>