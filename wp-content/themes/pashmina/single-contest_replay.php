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
		<div class="row" >
			<div class="col-md-12 " style="text-align: center; margin-bottom:10px">
				<h2>Office look fashion click Started on 24 Jun 2005 </h2>
			</div>
			<div class="col-md-offset-1 col-lg-4 col-md-4 ">
				<img src="<?=$userimage['image'][0]?>" >
			</div>
			<div class="col-lg-5 col-md-5">


						<a href="<?=$url?>">
              		<h1 class="entry-title"><?php the_title(); ?></h1>
            </a>
						<?=$post->post_content?>
						<h2>What made her awesome </h2>
						<?php foreach($tp as $pro):?>
							<div id='"+value.key+"' class='col-md-6 col-xs-12 spro'><div class='col-md-4 col-xs-4'><img src='<?=$pro['image']?>' class='img-responsive' ></div><div class='col-md-8 col-xs-8'><?=$pro['title']?></div></div>
						<?PHP endforeach;?>
						
			</div><!-- .col-lg-8 -->

			
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer('contest');
