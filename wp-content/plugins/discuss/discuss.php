<?php
/*
Plugin Name: discuss
Plugin URI: http://simplysocial.co.in
description:-
Discuss plugin
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/

add_action( 'wp_ajax_post_disscuss', 'post_disscuss' );
function post_disscuss(){
    $pkey = $_POST['data'];
    $error = false;
    if(strlen($pkey[0]['value'])<20){
        $error['title'] = "Title is too short.";
    }
    if(strlen($pkey[1]['value'])<50){
        $error['description'] = "Description is too short.";
    }


    $postarr = array();
    $postarr['ID'] = 0;
    $postarr['post_author'] = 1;
    $postarr['post_type'] = 'discuss';
    $postarr['post_title'] =  $pkey[0]['value'];
    $postarr['post_name'] =  $pkey[0]['value'];
    $postarr['post_content'] = $pkey[1]['value'];
    
        
    $postarr['post_excerpt'] =  $pkey[1]['value'];
    $postarr['post_status'] =  "publish";
    $postarr['comment_status'] =  "open";
    $result= [];
    if($error==false){
        $post_ID = wp_insert_post($postarr,true );
        $cat[] = wp_create_category($pkey[2]['value'],0);
        wp_set_post_categories( $post_ID,$cat); 
        $result['status'] = true;
        $result['message'] = "Post has been saved.";
        echo json_encode($result,true);
    }else{
        $result['status'] = false;
        $result['error'] = $error;
        $result['message'] = "Error while saving data.";
        echo json_encode($result,true);
    }
    exit;
}