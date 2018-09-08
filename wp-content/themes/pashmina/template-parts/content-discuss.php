<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */
$post = get_post();
$title = $post->post_title;
$desc = get_the_content();
?>
<div class="col-md-12 container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	

	<div class="entry-content" >
	<div class="row mt-4">
		<div class="col-lg-1 col-xs-1">
		<?php echo get_avatar($post->post_author);?>
		</div>
		<div class="col-lg-10  col-12" style="position: relative;">
			<span class="text-muted text-center" style="position:absolute; color: #cccccc; font-size:150px; opacity: 0.4; z-index: -1; top:40px; left:0px"><?=$title[0]?></span>
			<div style="">
			<a href="<?php esc_url( the_permalink() ); ?>"><h2><?=$title?>	</h2></a>
			<div class="elimore"> 
			<p>
				<?=$desc;?>
			</p>
			</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
    <hr>
    
	
	</div><!-- .entry-content -->

	<div class="row com-btn">
	<div class="col-lg-12 col-md-12">
		<a class="btn-type" href="<?php esc_url( the_permalink() ); ?>" ><?php pashmina_posted_on(); ?></a>
		<a class="btn-type" href="<?php esc_url( the_permalink() ); ?>" ><i class=" icon-type fa fa-eye"></i> 444 View  </a>
	
		<div class="entry-footer">
			<?php pashmina_entry_footer(); ?>
		</div>
		</div><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
</div>
