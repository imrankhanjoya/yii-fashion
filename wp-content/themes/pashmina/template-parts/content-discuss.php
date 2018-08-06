<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>
<div class="col-md-12 container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	

	<div class="entry-content">
	<div class="row mt-4">
		<div class="col-lg-1 pd-0 col-2 ">
		<div class=" div-bg" style="background-image: url(https://www.biokplus.com/assets/img/greenbox-girl.png);">
		<h1 class="h1-styl text-muted text-center">v</h1>
		</div>
		</div>
		<div class="col-lg-10 pd-0 col-12" style="margin-left: 37px;">
			<p><?PHP the_content();?>	</p>
		</div>
	</div>
    <hr>
    
	
	</div><!-- .entry-content -->

	<div class="row com-btn">
	<div class="col-lg-12 col-md-12">
		<a class="btn-type" href="#" ><span class="icon-type">3</span>hours ago</a>
		<a class="btn-type" href="#" ><i class=" icon-type fa fa-eye"></i> 444 View  </a>
	
		<div class="entry-footer">
			<?php pashmina_entry_footer(); ?>
		</div>
		</div><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
</div>
