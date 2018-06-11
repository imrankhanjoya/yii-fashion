<?php
/**
 * The default template for displaying the full post
 * @package Start_Blogging
 * @version 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
	<?php  the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => ''));	?>		

	<header class="entry-header">	
		<?php edit_post_link( __( 'Edit This Post', 'start-blogging' ), '<span class="edit-link">', '</span>' ); ?>	
		<?php	the_title( '<h1 class="entry-title">', '</h1>' );	?>
	</header>

	<div class="single-entry-meta">
		<?php start_blogging_single_meta(); ?>

	</div>

	<div class="entry-content">
		<?php	the_content();?>	
	</div>

	<footer class="entry-footer"></footer>

</article>
