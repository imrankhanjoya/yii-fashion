<?php

ignore_user_abort(true);
define('DOING_CRON', true);

if ( !defined('ABSPATH') ) {
	/** Set up WordPress environment */
	require_once( dirname( __FILE__ ) . '/wp-load.php' );
}

require_once( ABSPATH . '/wp-admin/includes/taxonomy.php');

ini_set("display_errors",1);
$names = array('Brandon Gregory','Colten Meza','Kenny Schneider','Ellen Davis','Jayvion Leon','Hana Pace','Tristen Sexton',
'Hector Neal','Jordan Brennan','Michelle Sanford','Evie Hendrix','Ada Dean','Ellie White','Rolando Kelley','Alvin Mooney','Sloane Aguilar','Dustin Santana','Kamila Todd','Barrett Leach','Scarlett Arnold','Moses Larsen','Ramon Cochran','Malik Valdezv','Phoebe Carr','Meghan Mcintosh','Roland Best','Evangeline Delacruz','Keenan Martin','Fiona Hicks','Vicente Lowe','Esteban Davies','Ronin Solomon','Lina Morse','Lailah Gilmore','Erick Logan','Nyasia Mcneil','Irvin Drake','Kasen Tyler','Tristin Gray','Saniya Haynes','Jacqueline Watts','Averie Hatfield');
$username = array();
for($i=0;$i<20;$i++){
$picture = 'https://picsum.photos/200/300/?image='.rand(1,999);

$username = $names[rand(0,75)]; 
$userData = [];
$userData['fbid'] = rand(999999,9999999); 
$userData['nickname'] = $username; 
$userData['display_name'] = $username; 
$userData['username'] = str_replace(" ","_",$username); 
$userData['gender'] = 'female'; 
$userData['picture'] = $picture; 
$userData['email'] = rand(10000,99999)."@gmail.com"; 

// print_r($userInfo);
// $UserId = wp_create_user($userData['username'],'my123',$userData['email']);
// if($UserId){
//     print_r($UserId);
//     add_user_meta($UserId,'gender',$userData['gender'],false); 
//     add_user_meta($UserId,'first_name',$userData['nickname'],false); 
//     add_user_meta($UserId,'nickname',$userData['nickname'],false); 
//     add_user_meta($UserId,'fbid',$userData['fbid'],false); 
//     add_user_meta($UserId,'fbToken',$token,false); 
//     add_user_meta($UserId,'picture',$userData['picture'],false); 
//     add_user_meta($UserId,'cupp_upload_meta',$userData['picture'],false);
//     echo "\n$UserId User created\n";       
// }
 }

for($i=5;$i<10;$i++){
    $title = $names[rand(0,75)];
    $picture = 'https://picsum.photos/200/300/?image='.rand(1,999); 
    $postdata['ID'] = 0;
    $postdata['post_author'] = $i;
    $postdata['post_type'] = "contest_replay";
    $postdata['post_title'] = $title;
    $postdata['post_content'] = $names[rand(0,75)].$names[rand(0,75)]." ".$names[rand(0,75)];
    $postdata['post_status'] = 'publish';
    $postdata['post_name'] = $title;
    $postdata['post_parent'] = 532;
    $postdata['meta_input']['image'] =  $picture;
    $val = wp_insert_post( $postdata,true);
    var_dump($val);
}

die();


