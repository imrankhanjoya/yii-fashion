<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */
$user = wp_get_current_user();
$userID = $user->ID;
if($userID){
	$url = get_permalink().'?startit=true';
}

get_header('nomenu'); 
$post_ID = get_the_ID();
$post = get_post();  
$val = get_post_meta($post_ID);
$participant = get_participent($post_ID);
$complete= true;
?>
<?php if(isset($_GET['startit']) && $userID && $complete===false)://START PARTICIPATION ?>
	<?PHP include('contest-form.php'); ?>
<?php elseif($complete===true): ?>
	<?PHP include('contest-complete.php'); ?>
<?php else: ?>
	
	<div class="col-md-12" style="padding:0px; margin-bottom:10px">
     <a  href="<?php esc_url( the_permalink() ); ?>"> 
     <img class="img-responsive hidden-xs" src="<?= get_the_post_thumbnail_url(get_the_ID())?>" />
     <img class="img-responsive hidden-md hidden-lg" src="<?=$val['image'][0]?>" />
     </a>    
   </div>
	<div class="container-fluid">
	<div class="row">
			<div class="col-lg-12 col-md-12" style="background-color: #fff">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<div class="entry-content">

						<a href="<?=$url?>"><h2>Terms & Conditions</h2></a>
						<?=$post->post_content?>

						</div><!-- .entry-content -->
						
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-8 -->
			<div class="col-lg-12 col-md-12" style="background-color: #000; color:#fff; text-align: center;  padding-bottom:50px;">
				<h1><?PHP the_title();?></h1>
				Starting From <?=$val['start_date'][0]?>
				To
				<?=$val['end_date'][0]?>
				<br>
				Total participants
				<?=$participant?>
				<br>
				<br>
				<br>
				<?php if($userID): ?>
				<a style="color: #fff; border:1px solid; padding: 5px;" href="<?=$url?>" > Get Start To Win</a>
				<?php else: ?>
				<a data-toggle="modal" data-target="#myModal" style="color: #fff; border:1px solid; padding: 5px;"> Get Start To Win</a>
				<?php endif; ?>










			</div>











			
		</div><!-- .row -->
	</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel"><?PHP the_title();?></h4>
      </div>
      <div class="modal-body" style="text-align: center;">
      	
        <a href="<?=getLoginPage()?>"  class="btn btn-primary" >Login With Facebook</a>
        <p>
        <small>We promise will not post on your wall.</small>
     		</p>
      </div>
      
    </div>
  </div>
</div>

<?php endif; ?>
<?php
get_footer('contest');
