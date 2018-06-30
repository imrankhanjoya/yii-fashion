<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

$post_ID = get_the_ID();
$val = get_post_meta($post_ID);

$price = $val['LowestNewPrice'][0]!=""?$val['LowestNewPrice'][0]:$val['ListPrice'][0];
        
?>
<div class="col-md-3 productlist" >
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <center>
    <figure>
        <?= "<img src='".$val['LargeImage'][0]."' class='img-responsive small-img'>"?>
    </figure>
	</center>

	<div class="entry-content">
		<a href="<?php esc_url( the_permalink() ); ?>" title="<?=$val['Publisher'][0]?>"><h2 class="entry-by"><?=$val['Brand'][0]?></h2></a>
		<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><h2 class="entry-title"><?php the_title(); ?></h2></a>
		
	</div><!-- .entry-content -->
	<ul class="nav nav-pills btn-group-xs">
	  <li role="presentation"><a href="<?=$val['DetailPageURL'][0]?>" ><?=$price?></a></li>
	  <li role="presentation"><a href="#"><span class="glyphicon glyphicon-heart"></span> Fave</a></li>
	  <li role="presentation"><a href="#"><span class="glyphicon glyphicon-share-alt
"></span> Share</a></li>
	</ul>


</article><!-- #post-## -->
</div>
