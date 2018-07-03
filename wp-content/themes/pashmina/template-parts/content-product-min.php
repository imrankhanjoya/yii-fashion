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
<div class="col-md-12 productlist" style="border: 1px solid">
    <center>
    <figure>
        <?= "<img src='".$val['LargeImage'][0]."' class='img-responsive small-img'>"?>
    </figure>
	</center>

	<div class="entry-content">
		<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><h2 class="entry-title"><?php the_title(); ?></h2></a>
		
	</div><!-- .entry-content -->
	


</div>
