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
if(!$userID){
    $url = getLoginPage();
    wp_redirect($url);
}


get_header('nomenu'); 

$post_ID = get_the_ID();
$post = get_post();  

$url = get_permalink().'?startit=true';

$val = get_post_meta($post_ID);

$participant = get_participent($post_ID);
?>
<?php if(isset($_GET['startit']) && $userID):?>

<?PHP include('contest-form.php'); ?>

<?php else: ?>
	<div class="container hidden-xs" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>); height:400px; width: 100%; background-position: center; background-size: cover;" >
		
	</div><!-- .container -->
	<div class="container hidden-md hidden-lg" style="background-image: url(<?=$val['image'][0]?>); height:400px; width: 100%; background-position: center; background-size: cover;" >
		
	</div><!-- .container -->
	<div class="container" style=" height:400px; width: 100%; background:rgba(0,0,0,0.8);" >
	<div class="row" >
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
			<div class="col-lg-12 col-md-12" style=" height: 200px; color:#fff; text-align: center;">
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
				<a style="color: #fff; border:1px solid; padding: 5px;" href="<?=$url?>" > Get Start To Win</a>
			</div>

			
		</div><!-- .row -->
	</div>	
<script type="text/javascript">
	jQuery("div").click(function(){
		window.location = '<?=$url?>';
	})

</script>
<?php endif; ?>
<?php
get_footer('contest');
