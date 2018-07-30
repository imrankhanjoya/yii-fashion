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
	getProductByBrand($taggeBrands[0]);

	foreach ($taggeBrands[0] as $key => $value) {
		if($value=="")
			continue;
		$url = isset($jsonProduct[$value]['url'])?$jsonProduct[$value]['url']:"http://www.gloat.me/?s=".$value;
		$title = isset($jsonProduct[$value]['title'])?$jsonProduct[$value]['title']:$value;
		$image = isset($jsonProduct[$value]['icon'])?$jsonProduct[$value]['icon']:"http://www.gloat.me/wp-content/uploads/2018/07/makeup.png";
		$tp[] = array("title"=>$title,"image"=>$image,"key"=>md5($title),"url"=>$url);
	}
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
								<div class="col-md-4 col-xs-12 voteBox">
										<div class="row">
										<div class="col-md-12 col-xs-6">
										<?php
										$voteCount = get_contest_vodecount($post->ID);	
										if (is_user_logged_in()) {
											
											$ifVoted = get_post_favstatus($post->ID,get_current_user_id());
											if($ifVoted){
												echo '<span class="fa fa-heart f-selct top"></span>';	
											}else{
												echo '<a class="wpf-favorite-link" data-label="" href="#" data-id="'.$post->ID.'"><span class="fa fa-heart f-selct top"></span></a>';
											}
											

										}else{
											echo '<a href="'.getLoginPage().'"><span class="fa fa-heart f-selct top"></span></a>';	
										}

											
										
										?>
									</div>
									<div class="col-md-12 col-xs-6">
										<?php echo '<span class="glyphicon-class vcount">'.$voteCount.'</span>';?>
									</div>
									
									</div>

								</div>
								<div class=" col-md-8 col-xs-12 ">

									<b>Help to share win the contest, Share with your firends and on social media</b>
								<div class="addthis_sharing_toolbox" data-url="<?=$shareUrl?>" data-title="Hi Friends this is <?=$userdata->data->display_name?> Join me at Gloat.Me" data-description="Join me at Gloat.Me and lets discuss about beauty and products #Gloat.Me" data-media="<?=$img?>">
								</div>
								</div>
							</div>
			</div><!-- .col-lg-8 -->
					

			
			
		</div><!-- .row -->
		<div class="row" style="margin-top:20px; margin-bottom:100px;">
			
			
			<div class="col-md-offset-1 col-md-10 " style=" margin-bottom:10px">
				<h3>What made her awesome </h3>
						<?php foreach($tp as $pro):?>
							<div class='col-md-4 col-xs-12'>
									<a href="<?=$pro['url']?>" target="_blank">
											<div class='spro'>
												<div class='col-md-4 col-xs-4'>
													<img src='<?=$pro['image']?>' class='img-responsive' >
												</div>
												<div class='col-md-8 col-xs-8'><?=$pro['title']?></div>
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
