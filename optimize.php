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


$start = $argv[1];
$query =  "select posts.ID,posts.post_date,posts.post_content,posts.post_title,posts.guid as meta_value from $wpdb->posts as posts where  posts.post_type= 'attachment' limit $start,10 ";
global $wpdb;
$results = $wpdb->get_results($query, ARRAY_A );
echo "Total images ".count($results)."\n";
foreach($results as $val){
	echo $val['meta_value'];
	echo "\n";
	$file = explode("/wp-content/",$val['meta_value']);
	$file = __DIR__.'/wp-content/'.$file[1];
	//echo $file = __DIR__.'/wp-content/uploads/pexels-photo-164262.jpeg';
	echo $val = image_resize($file,300,300,false,'mid');
	echo "\n";
	echo $val = image_resize($file,300,300,true,'fixmid');
	echo "\n";
	echo $val = image_resize($file,200,200,true,'small');
	echo "\n";
	echo $val = image_resize($file,300,300,false,'mid');
	echo "\n";
	echo $val = image_resize($file,600,600,false,'max');
	echo "\n";
	
}
	
die();
