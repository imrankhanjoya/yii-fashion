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
<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
<hr>
<a href="<?php the_permalink(); ?>">
<div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 card-brder-hovr text-center">
<img class="img-responsive" src="<?=$val['LargeImage'][0]?>">
</div>
<div class="col-lg-9 col-lg-9 col-sm-9 col-xs-9 col-md-9 prodt-like-cnt">
<span><?php the_title(); ?></span>
<h6 class="text-danger"><?=$val['Brand'][0]?></h6>
<span class="product-price"><span class="discounted-price"><?=$price?></span> 
</div>
</a>
</div>
