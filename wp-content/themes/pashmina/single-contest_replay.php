<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */

get_header('nomenu'); 


$post = get_post();  
$userimage = get_post_meta($post->ID);
$img = $userimage['image'][0];
$array = explode('.',$img);
if(!empty($array)){
  $userimage = str_replace(".".end($array),"-max.".end($array),$img);
}

$val = get_post_meta($post->ID,'taggedProduct');
$tp=[];
$jsonProduct = file_get_contents($proPath = get_template_directory()."/parsed.json");
$jsonProduct = json_decode($jsonProduct,true);
foreach ($val[0] as $key => $value) {
	if($value=="")
		continue;
	$title = isset($jsonProduct[$value]['title'])?$jsonProduct[$value]['title']:$value;
	$image = isset($jsonProduct[$value]['icon'])?$jsonProduct[$value]['icon']:"http://www.gloat.me/wp-content/uploads/2018/07/makeup.png";
	$tp[] = array("title"=>$title,"image"=>$image,"key"=>md5($title));
}
?>

	<div class="container" style="min-height:650px; width: 100%; background-position: center; background-size: cover;" >
		<div class="row">
			<div class="col-md-12 " style="text-align: center; margin-bottom:10px">
				<h2>Office look fashion click Started on 24 Jun 2005 </h2>
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
								<div class="col-md-4 voteBox">
											<center>
										<?php
										$voteCount = get_contest_vodecount($post->ID);	
										if (is_user_logged_in()) {
											
											$status = get_post_favstatus($post->ID,get_current_user_id());
											if($status){
												echo '<span class="fa fa-heart f-selct"></span>';	
											}else{
												echo '<a class="wpf-favorite-link" data-label="" href="#" data-id="'.$post->ID.'">';
												echo '<span class="fa fa-heart f-selct"></span>';
												echo '</a>';
											}
											

										}
											echo '<span class="glyphicon-class">'.$voteCount.'</span>';
										?>

											</center>
								</div>
								<div class=" col-md-8">
									<h6>Help to share win the contest, Share with your firends and on social media</h6>
								<div class="addthis_sharing_toolbox" data-url="<?=$shareUrl?>" data-title="Hi Friends this is <?=$userdata->data->display_name?> Join me at Gloat.Me" data-description="Join me at Gloat.Me and lets discuss about beauty and products #Gloat.Me" data-media="<?=$img?>"></div>
								</div>
							</div>
			</div><!-- .col-lg-8 -->
			<div class="col-lg-2 col-md-2">
			</div>			

			
			
		</div><!-- .row -->
		<div class="row" style="margin-top:20px; margin-bottom:100px;">
			
			
			<div class="col-md-offset-1 col-md-10 " style="text-align: center; margin-bottom:10px">
				<h5>What made her awesome </h5>
						<?php foreach($tp as $pro):?>
							<div id='"+value.key+"' class='col-md-4 col-xs-12 spro'><div class='col-md-4 col-xs-4'><img src='<?=$pro['image']?>' class='img-responsive' ></div><div class='col-md-8 col-xs-8'><?=$pro['title']?></div></div>
						<?PHP endforeach;?>
			</div>

			<div class="col-md-offset-1 col-md-10 " style="height: auto" >
				<?PHP include('contest-participant.php'); ?>
			</div>

			
		</div>
	</div><!-- .container -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=imrankhanjoya"></script>
<?php
get_footer('contest');
