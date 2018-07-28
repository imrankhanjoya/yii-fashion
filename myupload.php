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
$user = wp_get_current_user();

if(isset($user->data->ID)){
	if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}
	$file = $_FILES['file'];
	$fileSize = getimagesize( $file['tmp_name']);

	$fileType = trim($file['type']);

	if(($fileSize[0]>500 && $fileSize[1] > 500) &&  $file['size']<= 1961538 && ( $fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png')){
		
		$upload_overrides = array( 'test_form' => false );

		
		
		$movefile = wp_handle_upload( $file, $upload_overrides );
		
		

		
		$newPath = $movefile['url'];
		if ( $movefile && ! isset( $movefile['error'] ) ) {
			$val = image_resize($movefile['file'],200,200,true,'small');
			$val = image_resize($movefile['file'],300,300,false,'mid');
			$val = image_resize($movefile['file'],500,500,false,'max');
			$val = explode("wp-content",$val);
			$newPath = get_site_url()."/wp-content".$val[1];
			$output = array("success" => true,"data"=>$movefile['url'],"error" => "No error");
			header("Content-Type: application/json; charset=utf-8");
			echo json_encode($output);

		} else {
		   $output = array("success" => false,"error"=>"Error while uploading.");
			header("Content-Type: application/json; charset=utf-8");
			echo json_encode($output);

		}
	}else{
		
		if($fileSize[0]<500 || $fileSize[1] < 500){
			$file['error'] = "File min height and width should be greater then 500x500.";
		}elseif($file['size'] > 181730){
			$file['error'] = "File is too large";
		}else{
			$file['error'] = "File type not supported ".$file['type'];
		}
		$output = array("success" => false,"error"=>$file['error']);
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($output);
	}
}
die();
