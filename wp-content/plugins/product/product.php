<?php
/*
Plugin Name: My product
Plugin URI: http://simplysocial.co.in
description:-
My custom pages
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
CREATE TABLE `wp_contest` (
 `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
 `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `value` longtext COLLATE utf8mb4_unicode_ci,
 PRIMARY KEY (`id`),
 KEY `post_id` (`post_id`),
 KEY `meta_key` (`key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=4141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
 */
add_action( 'wp_ajax_save_contest', 'save_contest' );





function save_contest() {
	$user = wp_get_current_user();
	$results = findContest($_POST['ppost'],$user->ID);
	if($results){
		$ID = $results[0]['ID'];
	}else{
		$ID = 0;
	}
	
	$postdata['ID'] = $ID;
	$postdata['post_author'] = $_POST['userID'];
	$postdata['post_type'] = "contest_replay";
	$postdata['post_title'] = $_POST['title'];
	$postdata['post_content'] = $_POST['description'];
	$postdata['post_status'] = 'publish';
	$postdata['post_name'] = $_POST['title'];
	$postdata['post_parent'] = $_POST['ppost'];
	$postdata['meta_input']['image'] =  $_POST['image'];
	$val = wp_insert_post( $postdata,true);
	echo json_encode(get_post($val),true);
   exit;
}




add_action( 'wp_ajax_save_tagedproduct', 'save_tagedproduct' );

function save_tagedproduct(){
	if(isset($_POST['product_title'])){
		$product_title = $_POST['product_title'];
		$ppost = $_POST['ppost'];
		$results = findContest($_POST['ppost'],$user->ID);
		$val = get_post_meta($_POST['ppost'],'taggedProduct');
		if(!empty($val[0])){
			$taggedProduct = $val[0];
			$taggedProduct[$product_title] = $product_title;
		}else{
			$taggedProduct[$product_title] = $product_title;
		}
		$val = update_post_meta($_POST['ppost'],'taggedProduct',$taggedProduct,false);
	
	}
	$val = get_post_meta($_POST['ppost'],'taggedProduct');
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

	echo json_encode($tp,true);
	exit;
}

add_action( 'wp_ajax_remove_tagedproduct', 'remove_tagedproduct' );
function remove_tagedproduct(){
	$pkey = $_POST['key'];
	$val = get_post_meta($_POST['ppost'],'taggedProduct');
	
	$jsonProduct = file_get_contents($proPath = get_template_directory()."/parsed.json");
	$jsonProduct = json_decode($jsonProduct,true);
	$tp=[];
	$upval = [];
	foreach ($val[0] as $key => $value) {
		if(md5($value) == $pkey){ //This is removeing items 
			continue;
		}	
		if($value==""){
			continue;
		}

		$upval[] = $value;
		$title = isset($jsonProduct[$value]['title'])?$jsonProduct[$value]['title']:$value;
		$image = isset($jsonProduct[$value]['icon'])?$jsonProduct[$value]['icon']:"http://www.gloat.me/wp-content/uploads/2018/07/makeup.png";
		
		$tp[] = array("title"=>$title,"image"=>$image,"key"=>md5($title));
	}
	$val = update_post_meta($_POST['ppost'],'taggedProduct',$upval,false);
	echo json_encode($tp,true);
	exit;
}

add_action( 'wp_ajax_add_brands', 'add_brands' );
function add_brands(){
	$pkey = $_POST['brand'];

	$val = get_post_meta($_POST['ppost'],'taggeBrands');
		
	if(empty($val)){
		$upval[$pkey] = $pkey;	
	}else{
		$upval = $val[0];
		if(isset($upval[$pkey])){
			unset($upval[$pkey]);
		}else{
			$upval[$pkey] = $pkey;	
		}
	}
	print_r($upval);
	$val = update_post_meta($_POST['ppost'],'taggeBrands',$upval,false);
	//delete_post_meta($_POST['ppost'],'taggeBrands');
	echo json_encode($val,true);
	exit;
}

function findContest($postID,$userID){
	global $wpdb;
   $query =  "select * from $wpdb->posts where post_parent = $postID and post_author = $userID and post_type= 'contest_replay' and post_status = 'publish' limit 1 ";
   $results = $wpdb->get_results($query, ARRAY_A );
   
   if(!empty($results)){
   	return $results;
   }else{
   	return false;
   }
}

add_action( 'wp_ajax_get_participent', 'get_participent' );
function get_participent($contest_id =0){
	if(isset($_POST['contest'])){
		$contest_id = $_POST['contest'];	
	}
	
	global $wpdb;
	$query =  "select count(*) as count from $wpdb->posts as posts
	where posts.post_parent = $contest_id and posts.post_type= 'contest_replay' and posts.post_status = 'publish'";

	$results = $wpdb->get_results($query, ARRAY_A );
	if(!empty($results)){
		return $results['0']['count'];
	}else{
		return 0 ;
	}
}


function getProductByBrand($brands,$limit=3){

	$key = md5($brands);

	$result = getCache($key);

	if(!$result){
		

		/*
		select * from $wpdb->terms 
		where slug in ($brandString)
		 */
		$brandString = "'". implode("','",$brands)."'";
		global $wpdb;

		"select * from $wpdb->terms 
		where slug in ($brandString)";
		$query = "select slug,name,posts.post_title,posts.guid,meta_p.meta_value as detailUrl,meta.meta_value as image from 
		$wpdb->terms 
		left join $wpdb->term_relationships as relationships on relationships.term_taxonomy_id = wp_terms.term_id
		left join $wpdb->posts as posts on posts.id = relationships.object_id
		left join $wpdb->postmeta as meta on meta.post_id = posts.id and meta.meta_key = 'LargeImage'
		left join $wpdb->postmeta as meta_p on meta_p.post_id = posts.id and meta_p.meta_key = 'DetailPageURL'
		where slug in ($brandString) group by slug  limit 20";
		$result = $wpdb->get_results($query);
		setCache($key,$result);
		return $result;
	}else{
		return $result;
	}

}

function get_contest(){
	global $wpdb;

	$query =  "select posts.ID,posts.post_date,posts.post_content,posts.post_title,posts.guid,meta.meta_value,contest.post_title as contest,contest.ID as contest_id,wmeta.meta_value as winner from $wpdb->posts as posts 
	left join $wpdb->postmeta as meta on meta.post_id = posts.ID and meta_key = 'image'
	left join $wpdb->postmeta as wmeta on wmeta.post_id = posts.ID and wmeta.meta_key = 'winner'
	left join $wpdb->posts as contest on contest.ID = posts.post_parent
	where posts.post_type= 'contest_replay' and posts.post_author= 4 and posts.post_status = 'publish'";
	$results = $wpdb->get_results($query, ARRAY_A );


    $out = '';
    if(!empty($results)){
    	  $out .= "<h3 style='text-decoration:underline'>Contest your have participated.</h3>";	
        foreach ($results as $key => $val) {
            $out .= "<div class='col-md-12 col-lg-12 col-xs-12' style='border-bottom: 1px solid; margin-bottom: 20px;'>";
            $array = explode('.',$val['meta_value']);
            if(!empty($array)){
              $newimage = str_replace(".".end($array),"-small.".end($array),$val['meta_value']);
            }
            $out .= "<div class='col-md-2 col-xs-4'>";
            $out .= "<img src='".$newimage."' />";
            $out .= "</div>";
            $out .= "<div class='col-md-8 col-xs-6'>";
            $out .= "<a href='".$val['guid']."'><h3 style='margin-top:-10px'>".$val['post_title']."</h3></a>";
            $out .= "<p>".$val['post_content']."</p>";
            $out .= "</div>";
            $out .= "<div class='col-md-2 col-xs-2'>";
            if($val['winner']!='') {
                if($val['winner']==1){
                    $wlabel = "Winner";
                }elseif($val['winner']==2){
                    $wlabel = "2<sub>nd</sub> Winner";
                }elseif($val['winner']==3){
                    $wlabel = "3<sub>rd</sub> Winner";
                }

                $out .= "<b>".$wlabel."</b><br>";
                $out .= "<a href='#tab_default_6' data-toggle='tab'>Claim your reward</a>";
            }else{

                $out .= '<div class="col-md-12 text-center "  ><span class="glyphicon glyphicon-heart" aria-hidden="true" style="font-size:40px"></span></div>';
                $voteCount = get_contest_vodecount($val['ID']);
                $out .= '<div class="col-md-12 text-center" style="font-size:30px">'.$voteCount.'</div>';
            }
            $out .= "</div>";
            $out .= "</div>";
        }
    }else{
        $out .= "<div class='col-md-12 col-lg-12 col-xs-12'>";
        $out .= "<h3>You have not participated in any contest yet!.</h3>";
        $out .= "</div>";
    }

	return $out;
}