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


define('DOING_CRON', true);

if ( !defined('ABSPATH') ) {
	/** Set up WordPress environment */
	require_once( dirname( __FILE__ ) . '/wp-load.php' );
}

global $geotag_table, $wpdb;

global $wpdb;
$results = $wpdb->get_results( "select post_title from $wpdb->posts where post_type = 'product' and post_status ='publish' ", ARRAY_A );

$allPost=[];
foreach($results as $post){
    $allPost[] = $post['post_title'];
}
$jsondata = json_encode($allPost);
$productjson = file_put_contents(get_template_directory()."/product.json",$jsondata);

die();
