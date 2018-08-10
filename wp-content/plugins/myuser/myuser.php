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
ini_set("display_errors",1);


add_action( 'wp_ajax_save_personal', 'save_personal' );

function save_personal() {
    $key = $_POST['key'];
    $val = $_POST['val'];
    echo sotreUserMeta($key,$val);
    exit;
}

function storeUseraddress($userID){

    foreach($_POST as $key=>$val){
        delete_user_meta($userID,$key);
        add_user_meta($userID,$key,$val,true);
    }
}
function getLoginPage(){



    $val = get_page_by_path( 'get-start');
    return $callback = add_query_arg(array('fbgo' =>'true'),get_page_link($val->ID));
}

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
    global $wpdb;
    $query =  "select user_id, meta_key from $wpdb->usermeta where meta_key ='fbid' and meta_value = '".$userData['fbid']."' order by user_id desc limit 1 ";
    $results = $wpdb->get_results($query, ARRAY_A );

    $emailresults = '';
    if(isset($userData['email']) && $userData['email']!=''){
        $query =  "select ID from $wpdb->users where user_email ='".$userData['email']."' limit 1 ";
        $emailresults = $wpdb->get_results($query, ARRAY_A );
    }


    if(!empty($results)){
        
        $url = preUrl();

        loginUser($results[0]['user_id']);
        $val = get_page_by_path( 'get-start' );
        
        if(!$url){
            $url = add_query_arg(array('show' =>'personal','t'=>'exist'),get_page_link($val->ID));
        }
        wp_redirect($url);
        
    }elseif(!empty($emailresults)){
        $url = preUrl();
        loginUser($emailresults[0]['ID']);
        $val = get_page_by_path( 'get-start' );
        
        if(!$url){
            $url = add_query_arg(array('show' =>'personal','t'=>'exist'),get_page_link($val->ID));
        }    
        wp_redirect($url);
    }else{

        if($userData['email']==''){
            $userData['email'] = rand(100,3000).time()."@facebook.com";
        }
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
            
            if(strstr($userData['email'],"@yahoo.com")){
                $url = add_query_arg(array('show' =>'getemail','t'=>'new'),get_page_link($val->ID));
            }else{
                $url = add_query_arg(array('show' =>'personal','t'=>'new'),get_page_link($val->ID));    
            }
            
            
            wp_redirect($url);
        }else{
            $val = get_page_by_path( 'discuss-beauty-tips' );
            $url = add_query_arg(array('show' =>'personal'),get_page_link($val->ID));
            wp_redirect($url);
        }
    }
}


function sotreUserMeta($key,$val,$flag=true){
    $user = wp_get_current_user();
    if($key=="skin"){
        delete_user_meta($user->ID,'skin');
        add_user_meta($user->ID,'skin',$val,true);
        return "skinType";
    }if($key=="skinType"){
        delete_user_meta($user->ID,'skinType');
        add_user_meta($user->ID,'skinType',$val,true);
        return "eye";
    }elseif($key=="eye"){
        delete_user_meta($user->ID,'eye');        
        add_user_meta($user->ID,'eye',$val,true); 
        return "dress";
    }elseif($key=="haircolor"){
        delete_user_meta($user->ID,'haircolor');
        add_user_meta($user->ID,'haircolor',$val,true); 
        return "eye";
    }elseif($key=="birthday"){
        delete_user_meta($user->ID,'birthday');
        add_user_meta($user->ID,'birthday',$val,true); 
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
    }elseif($key=="nickname"){
        delete_user_meta($user->ID,'nickname');
        delete_user_meta($user->ID,'first_name');
        delete_user_meta($user->ID,'display_name');
        add_user_meta($user->ID,'first_name',$val,false); 
        add_user_meta($user->ID,'nickname',$val,false); 
        add_user_meta($user->ID,'display_name',$val,false); 
        return "profile";
    }elseif($key=="description"){
        delete_user_meta($user->ID,'description');
        add_user_meta($user->ID,'description',$val,false); 
        return "profile";
    }elseif($key=="email"){
        delete_user_meta($user->ID,'email');
        add_user_meta($user->ID,'email',$val,false); 
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
    $userInfo['display_name'] = $val->name; 
    $userInfo['username'] = $username; 
    $userInfo['gender'] = $val->gender; 
    $userInfo['picture'] = $val->picture->data->url; 
    $userInfo['email'] = $val->email; 

    return $userInfo;
}


function showheader(){
    return false;
}

function get_fav_count($userID,$post_type){

    global $wpdb;

    $sql = "SELECT count(*) as count FROM ".$wpdb->prefix."favorite_post WHERE user_id = {$userID} and post_type = '{$post_type}'";
    $val = $wpdb->get_results($sql, ARRAY_A);   
                  
    return $val[0]['count'];

}

add_action( 'wp_ajax_get_contest_vodecount', 'get_contest_vodecount' );
function get_contest_vodecount($post_id=0){
    if($post_id==0){
        $post_id = $_POST['postID'];
    }

    global $wpdb;
    $sql = "SELECT count(*) as count FROM {$wpdb->prefix}favorite_post WHERE post_id = %d";
    $return = $wpdb->get_results( $wpdb->prepare( $sql, $post_id ), ARRAY_A);  
    if(isset($_POST['postID'])){
        echo isset($return[0]['count'])?$return[0]['count']:0; 
        exit;
    }else{
        return $return[0]['count'];
    }
}

function get_post_favstatus( $post_id, $user_id ) {
        global $wpdb;
        $sql = "SELECT post_id FROM {$wpdb->prefix}favorite_post WHERE post_id = %d AND user_id = %d";
        $return = $wpdb->get_row( $wpdb->prepare( $sql, $post_id, $user_id ) );
        return $return;
}