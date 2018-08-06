<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

global $current_user;
wp_get_current_user();
$username = $current_user->display_name!=''?$current_user->display_name:'Dua Lipa';
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
    <?php $rsaaray = explode(' ', $val['ListPrice'][0]);?>
    	<span class="lab">Lowest price Now:  <?=$rsaaray[0].' '.$rsaaray[1]?></span><br>
    	<?PHP if(isset($val['LowestNewPrice'][0])):?>
    	<span class="offer"><?=$val['LowestNewPrice'][0]?></span>
    	<?PHP endif;?>
        <div class="clearfix"></div>
                    <a href="<?=$val['DetailPageURL'][0]?>" class="btn btn-amz-sucs btn-success">Buy <span class="ambadge">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
    </div>
    <?php the_category(); ?>
	 <div class="clearfix"></div>
	 <div class="taglist">
	 <?php the_tags(); ?>
	 </div>
	</div>
	<div class="col-md-6">
	<div class="entry-content">
		<h5 class="excerpt p-type"><?php the_excerpt(); ?></h5>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<span class="excerpt">By <?=$val['Brand'][0]?></span>
        <?php if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div>
<div class="clearfix"></div>
<hr>
<?php 
    $val = have_comments(); 
    if(!have_comments()):?>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            
            <p>
            <strong>Oops.. No review for this product yet.</strong>
            <br></p>
            <p>
            Have you purchased or sampled it? Be the first one to Share your thoughts with the girls! And get <b style="color:#8a6d3b;">Rewards</b> :)
            <br>
            Here are some examples:
            </p>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 author-tab-div no-padding">
          <div class="col-lg-4 col-md-4 col-sm-6 bdr-div no-padding">
            <div class="">
               <p class="text-muted  small">It really worked for me. And would like to recommended to friends </p>
            </div>
           <h6 class="text-muted">By <?=$username ?></h6>
         </div>
            <div class="col-lg-4 col-md-4 col-sm-6 bdr-div ">
            <div class="">
               <p class="text-muted small">Yaah its worked for me, But was expecting more result. Still satisfied :)</p>
            </div>
           <h6 class="text-muted">By <?=$username ?></h6>
         </div>
           <div class="col-lg-4 col-md-4 col-sm-6 " style="margin-top: 20px;">
            <div class="">
               <p class="text-muted small">Looks good need to try once....</p>
            </div>
           <h6 class="text-muted">By <?=$username ?></h6>
         </div>
          </div>
   </div>
<?php endif;?>
    
<?php comments_template('', true); ?>
</article><!-- #post-## -->
