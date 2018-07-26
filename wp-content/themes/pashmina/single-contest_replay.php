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
/********/
$Contest = get_post($post->post_parent);
$ContestInof = get_post_meta($post->post_parent);
$startDate = $ContestInof['start_date'][0];
$endDate = $ContestInof['end_date'][0];

/********/



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
	$url = isset($jsonProduct[$value]['url'])?$jsonProduct[$value]['url']:"http://www.gloat.me/?s=".$value;
	$title = isset($jsonProduct[$value]['title'])?$jsonProduct[$value]['title']:$value;
	$image = isset($jsonProduct[$value]['icon'])?$jsonProduct[$value]['icon']:"http://www.gloat.me/wp-content/uploads/2018/07/makeup.png";
	$tp[] = array("title"=>$title,"image"=>$image,"key"=>md5($title),"url"=>$url);
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
								<div class="col-md-4 voteBox">
										<div class="col-md-12">
										<?php
										$voteCount = get_contest_vodecount($post->ID);	
										if (is_user_logged_in()) {
											
											$status = get_post_favstatus($post->ID,get_current_user_id());
											if($status){
												echo '<span class="fa fa-heart f-selct top"></span>';	
											}else{
												echo '<a class="wpf-favorite-link" data-label="" href="#" data-id="'.$post->ID.'"><span class="fa fa-heart f-selct top"></span></a>';
											}
											

										}else{
											echo '<span class="fa fa-heart f-selct top"></span>';	
										}

											
										
										?>
									</div>
									<div class="col-md-12">
										<?php echo '<span class="glyphicon-class vcount"></span>';?>
									</div>

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
							<div class='col-md-4 col-xs-12'><a href="<?=$pro['url']?>" target="_blank"><div class='spro'><div class='col-md-4 col-xs-4'><img src='<?=$pro['image']?>' class='img-responsive' ></div><div class='col-md-8 col-xs-8'><?=$pro['title']?></div></div></div>
						<?PHP endforeach;?>
			</div>

			<div class="col-md-offset-1 col-md-10 " style="height: auto" >
				<?PHP include('contest-participant.php'); ?>
			</div>

			
		</div>
	</div><!-- .container -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=imrankhanjoya"></script>
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
<?php
get_footer('contest');
