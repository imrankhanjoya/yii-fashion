<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */
global $post;
$post = get_post();  
/********/
global $Contest;
$Contest = get_post($post->post_parent);
$ContestInof = get_post_meta($post->post_parent);
$startDate = $ContestInof['start_date'][0];
$endDate = $ContestInof['end_date'][0];

/********/
global $userimage;
$userimage = get_post_meta($post->ID);
$img = $userimage['image'][0];
$array = explode('.',$img);
if(!empty($array)){
  $userimage = str_replace(".".end($array),"-max.".end($array),$img);
}

function gloatme_header_metadata() {
  global $post;
  global $Contest;
  global $userimage;	
  
  $data['title'] = $Contest->post_title." by ".get_the_title();
  $data['url'] = "http://www.gloat.me/discuss-beauty-tips/";
  $data['image'] = $userimage;
  $data['description'] = $post->post_content;
  echo generateMeta($data);  
        
}
add_action( 'wp_head', 'gloatme_header_metadata',0);


get_header('nomenu'); 






$taggeBrands = get_post_meta($post->ID,'taggeBrands');
$tp=[];
if(!empty($taggeBrands)){
	$tp = getProductByBrand($taggeBrands[0]);
}
?>

	<div class="container" style="min-height:650px; width: 100%; background-position: center; background-size: cover;" >
		<div class="row">
			<div class="col-md-12 " style="text-align: center; margin-bottom:10px">
				<h2><?=$Contest->post_title?> Started on <?=$startDate?> </h2>
			</div>
			<div class="col-md-offset-1 col-lg-4 col-md-4">
				<center><img alt="<?php the_title(); ?>" src="<?=$userimage?>" ></center>
			</div>
			<div class="col-lg-5 col-md-6">


						<a href="<?=$url?>">
              		<h1 class="entry-title"><?php the_title(); ?></h1>
            		</a>
						<?=$post->post_content?>
						<div class="row" style="margin-top: 50px;">

								
								
										<?php
										$voteCount = get_contest_vodecount($post->ID);
										if($voteCount==1){
											$vstring = 	"<span class='vcount'>".$voteCount."</span> person voted for ".get_the_title();
										}elseif($voteCount>1){
											$vstring = 	"<span class='vcount'>".$voteCount."</span> People voted for ".get_the_title();
										}else{
											$vstring = 	"Be the first one to vote for ".get_the_title();
										}
										if (is_user_logged_in()) {
											
											$ifVoted = get_post_favstatus($post->ID,get_current_user_id());
											if($ifVoted){
												$voteLable = 'Thanks For Vote';	
											}else{
												$voteLable = 'Help '.get_the_title().' to win';
											}
											$voteButton = '<a onClick="saveFav('.$post->ID.')"  class="heart-vote-btn"><span class="glyphicon glyphicon-heart-empty heart-icon-btn"></span><span class="voteLable">'.$voteLable.'</span></a>';

										}else{
											echo '<a href="'.getLoginPage().'"><span class="fa fa-heart f-selct top"></span></a>';	
										}
								?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
									<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12 main-div-vote">
										<h5><?=$vstring?></h5>
										<?=$voteButton?>
									</div>
								</div>
								
								<div class=" col-md-12 col-xs-12 ">

									<b>Help to share win the contest, Share with your firends and on social media</b>
								<div class="addthis_sharing_toolbox" data-url="<?=$shareUrl?>" data-title="Hi Friends this is <?=$userdata->data->display_name?> Join me at Gloat.Me" data-description="Join me at Gloat.Me and lets discuss about beauty and products #Gloat.Me" data-media="<?=$img?>">
								</div>
								</div>
								<div class=" col-md-12 col-xs-12 ">

								<h5>Brands that made her awesome</h5>
								<?PHP foreach($taggeBrands[0] as $b):?>
									<div class="col-md-3 col-xs-3">
									<a href="/topics/<?=$b?>"><img src="//gloat.me/wp-content/uploads<?=$brands[$b]['logo']?>" class=ïmg-thumnail " ></a>
									</div>
								<?php endforeach;?>
								</div>
							</div>
			</div><!-- .col-lg-8 -->
					

			
			
		</div><!-- .row -->
		<div class="row" style="margin-top:20px; margin-bottom:100px;">
			
			
			<div class="col-md-offset-1 col-md-10 " style=" margin-bottom:10px">
				<h3>What made her awesome </h3>
						<?php foreach($tp as $pro): ?>
							<div class='col-md-4 col-xs-12 no-margin no-padding'>
									<a href="<?=$pro->guid?>" target="_blank">
											<div class='spro'>
												<div class='col-md-4 col-xs-4'>
													<img src='<?=$pro->image?>' class='img-responsive' >
												</div>
												<div class='col-md-8 col-xs-8'>
													<?=$pro->post_title?><br>
													<?=$pro->name?> 
													<br><a  href='<?=$pro->detailUrl?>' target="_blank" >Explore on amazon</a>
												</div>
											</div>
									</a>		
							</div>
						<?PHP endforeach;?>
			</div>

			<div class="col-md-offset-1 col-md-10 " style="height: auto" >
				<?PHP include('contest-participant.php'); ?>
			</div>

			
		</div>
	</div><!-- .container -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=imrankhanjoya"></script>
<?php if(is_user_logged_in()): ?>
<script type="text/javascript">
	var ajax_url = '<?=admin_url( 'admin-ajax.php' )?>';

	function loadFav(){
		
		jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'get_contest_vodecount',
                postID:<?=$post->ID?>
            },
            success : function( response ) {
                $(".vcount").html(response);
            }
        });
	}
	//setInterval(loadFav,1000);
	$(document).ready(function(){
		
		$(".wpf-favorite-link").click(function(){
			setTimeout(loadFav,3000);
			
		});
		loadFav();
	});
</script>
<?php endif;?>
<?php
get_footer('contest');
