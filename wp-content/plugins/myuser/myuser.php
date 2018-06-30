<?php
/*
Plugin Name: MyUSer
Plugin URI: http://simplysocial.co.in
description:-
My user management system
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/
require_once __DIR__ . '/Facebook/autoload.php';
function fbloginurl(){
    $fb = new Facebook\Facebook(["app_id"=>"135773309784309","app_secret"=>"ed1a94d872c933bda46ef4f80ca66bb6"]);
    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email','user_posts','public_profile','user_birthday','user_gender']; // optional
    $val = get_page_by_path( 'get-start' );
    $callback = get_page_link($val->ID);
    return  $helper->getLoginUrl($callback, $permissions);
}

function saveUser($response,$token){
    
    $userData = parseUserInfo($response);
    $UserId = wp_create_user($userData['username'],base64_encode(rand(100,3000)),$userData['email']);
    if($UserId){
        add_user_meta($UserId,'gender',$userData['gender'],false); 
        add_user_meta($UserId,'first_name',$userData['nickname'],false); 
        add_user_meta($UserId,'nickname',$userData['nickname'],false); 
        add_user_meta($UserId,'fbid',$userData['fbid'],false); 
        add_user_meta($UserId,'fbToken',$token,false); 
        add_user_meta($UserId,'picture',$userData['picture'],false); 
        add_user_meta($UserId,'cupp_upload_meta',$userData['picture'],false);
        loginUser($UserId);
        $val = get_page_by_path( 'get-start' );
        $url = add_query_arg(array('show' =>'skin'),get_page_link($val->ID));
        wp_redirect($url);
    }
}


function sotreUserMeta($key,$val,$flag=true){
    $user = wp_get_current_user();
    if($key=="skin"){
        delete_user_meta($user->ID,'skin');
        add_user_meta($user->ID,'skin',$val,true);
        return "eye";
    }elseif($key=="eye"){
        delete_user_meta($user->ID,'eye');        
        add_user_meta($user->ID,'eye',$val,true); 
        return "dress";
    }elseif($key=="haircolor"){
        delete_user_meta($user->ID,'haircolor');
        add_user_meta($user->ID,'haircolor',$val,true); 
        return "eye";
    }elseif($key=="dress"){
        delete_user_meta($user->ID,'dress');
        add_user_meta($user->ID,'dress',$val,true); 
        return "top";
    }elseif($key=="top"){
        delete_user_meta($user->ID,'top');
        add_user_meta($user->ID,'top',$val,true); 
        return "brands";
    }elseif($key=="brands"){
        add_user_meta($user->ID,'brands',$val,$flag);
        return "profile";
    }
}

function loginUser($user_id){

    $user = get_user_by( 'id', $user_id ); 
    if( $user ) {
        wp_set_current_user( $user_id, $user->user_login );
        wp_set_auth_cookie( $user_id );
        do_action( 'wp_login', $user->user_login );

    }

}



function parseUserInfo($response){
    $val = $response->getBody();
    $val = json_decode($val);
    $username = str_replace(" ",'_',$val->name); 

    while(username_exists($username)){
        $username = $username.rand(1,100);
    }

    $userInfo = [];
    $userInfo['fbid'] = $val->id; 
    $userInfo['nickname'] = $val->name; 
    $userInfo['username'] = $username; 
    $userInfo['gender'] = $val->gender; 
    $userInfo['picture'] = $val->picture->data->url; 
    $userInfo['email'] = $val->email; 

    return $userInfo;
}


function showheader(){
    return false;
}