<?php
/**
 * A pseudo-CRON daemon for scheduling WordPress tasks
 *
 * WP Cron is triggered when the site receives a visit. In the scenario
 * where a site may not receive enough visits to execute scheduled tasks
 * in a timely manner, this file can be called directly or via a server
 * CRON daemon for X number of times.
 *
 * Defining DISABLE_WP_CRON as true and calling this file directly are
 * mutually exclusive and the latter does not rely on the former to work.
 *
 * The HTTP request to this file will not slow down the visitor who happens to
 * visit when the cron job is needed to run.
 *
 * @package WordPress
 */

ignore_user_abort(true);

ini_set('display_errors',1);

if ( !empty($_POST) || defined('DOING_AJAX') || defined('DOING_CRON') )
	die();

/**
 * Tell WordPress we are doing the CRON task.
 *
 * @var bool
 */
define('DOING_CRON', true);

if ( !defined('ABSPATH') ) {
	/** Set up WordPress environment */
	require_once( dirname( __FILE__ ) . '/wp-load.php' );
}

require_once( ABSPATH . '/wp-admin/includes/taxonomy.php');
$user = wp_get_current_user();

$postID = $_REQUEST['postid'];
$page = $_REQUEST['page'];
$perpage = 10;
$start = $perpage * ($page-1);
$end = $perpage;

global $wpdb;

$query =  "select posts.ID,posts.post_date,posts.post_content,posts.post_title,posts.guid,meta.meta_value from $wpdb->posts as posts 
left join $wpdb->postmeta as meta on meta.post_id = posts.ID and meta_key = 'image'
where posts.post_parent = $postID and posts.post_type= 'contest_replay' and posts.post_status = 'publish' limit $start , $end";

// $query =  "select posts.ID,posts.post_date,posts.post_content,posts.post_title,posts.guid as meta_value from $wpdb->posts as posts 
// where  posts.post_type= 'attachment' limit $start , $end";

$results = $wpdb->get_results($query, ARRAY_A );
$newData = [];



foreach($results as $key=>$val){
		$array = explode('.',$val['meta_value']);
		if(!empty($array)){
		  $newimage = str_replace(".".end($array),"-mid.".end($array),$val['meta_value']);
		}

		$results[$key]['meta_value'] =$newimage;
	
}


   if(!empty($results)){
   	$data['status'] = true;
   	$data['data'] = $results;
   	echo json_encode($data);
   }else{
   	$data['status'] = false;
   	$data['data'] = [];
   	echo json_encode($data);
   }


die();
