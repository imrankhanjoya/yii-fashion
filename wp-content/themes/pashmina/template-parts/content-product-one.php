<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="col-md-6">
    <figure>
        <?php
        $post_ID = get_the_ID();
        $val = get_post_meta($post_ID);
        //print_r($val);
        echo "<img src='".$val['LargeImage'][0]."'>";
        ?>

    </figure>
    <h4>Ranking <span class="label label-default"><span class="glyphicon glyphicon-star hicon"></span><?=$val['SalesRank'][0]?></span></h4>
    
    <div class="price_box">
    	<span class="lab">Lowest price Now</span><br>
    	<span class="list"><?=$val['ListPrice'][0]?></span>
    	<?PHP if(isset($val['LowestNewPrice'][0])):?>
    	<span class="offer"><?=$val['LowestNewPrice'][0]?></span>
    	<?PHP endif;?>
        <div class="clearfix"></div>
                    <a href="<?=$val['DetailPageURL'][0]?>" class="btn btn-success">Buy <span class="ambadge">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
    </div>
    <?php the_category(); ?>
	 <div class="clearfix"></div>
	 <div class="taglist">
	 <?php the_tags(); ?>
	 </div>
	</div>
	<div class="col-md-6">
	<div class="entry-content">
		<h5 class="excerpt"><?php the_excerpt(); ?></h5>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<span class="excerpt">By <?=$val['Brand'][0]?></span>
        <?php if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div>

	<?php comments_template('', true); ?>
</article><!-- #post-## -->
