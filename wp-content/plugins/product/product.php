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
	echo $val = wp_insert_post( $postdata,true);
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