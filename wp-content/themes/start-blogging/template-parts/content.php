<?php
/**
 * The default template for displaying content
 * @package Start_Blogging
 * @version 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php // Check for featured image
			if ( has_post_thumbnail() ) {        
				echo '<a class="featured-image-link" href="' . esc_url( get_permalink() ) . '" aria-hidden="true">';
				the_post_thumbnail( 'start_blogging_blog', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => 'blog1'));
				echo '</a>';
			}		
		?>	
	
	<?php if ( 'post' == get_post_type() && !is_single()) : ?>
	<div class="entry-meta block-post-info">
		<?php start_blogging_posted_on(); ?>
	</div>	
	<?php endif; ?>	

	<header class="entry-header">	
		<?php edit_post_link( __( 'Edit This Post', 'start-blogging' ), '<span class="edit-link">', '</span>' ); ?>
		
		<?php
			if( is_sticky() && is_home() && get_theme_mod( 'start_blogging_featured_label', 1 ) )  :	
			$featured = esc_attr__('Featured', 'start-blogging' );
			echo '<span class="featured-post">' . $featured . '</span>';
			endif;
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header>	

	<div class="entry-content">
		<?php
		if ( esc_attr(get_theme_mod( 'start_blogging_use_excerpt', 1 )) ) :
				the_excerpt();		
			else :
			/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue Reading %s ...', 'start-blogging' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="sr-only">"', '"</span>', false )
				) );
			endif;
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'start-blogging' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="sr-only">' . __( 'Page', 'start-blogging' ) . ' </span>%',
				'separator'   => '<span class="sr-only">, </span>',
			) );	
		?>	
		
	</div>

	<footer class="entry-footer"></footer>

</article>
