<?php
/*
Plugin Name: My Pages
Plugin URI: http://simplysocial.co.in
description:-
My custom pages
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/
?>
<?PHP 
$site['brands'] = array("avon"=>"AVON","bobbi-brown"=>"Bobbi Brown","o3"=>"O3","KAZIMA"=>"kazima","lotus"=>"Lotus","nivea"=>"Nivea","olay"=>"Olay","mcaffeine"=>"MCaffeine","lakme"=>"Lakmé","loreal"=>"L’Oreal Paris","khadi-natural"=>"Khadi Natural","ponds"=>"POND’S","brezzycloud"=>"Brezzycloud");

$skinType = array("Normal","Dry","Oily","Acne-prone","Sensitive","Combination");
$skinColor = array("Extremely fair"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd0.png"),"Fair"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd1.png"),"Tan"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd2.png"),"Medium Brown"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd3.png"),"Dark"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd4.png"),"Deep Dark"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd5.png"),"Light"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd6.png"));
$hairColor = array("White","Dark","Orange");
$brands = array(
"bobbi_brown"=>array("title"=>"Bobbi Brown","logo"=>"/2018/07/Bobbi_Brown_logo_logotype-copy.png"),
"avon"=>array("title"=>"AVON","logo"=>"/2018/07/avon.png"),
"nyx"=>array("title"=>"NYX","logo"=>"/2018/07/NYX_logo-copy.png"),
"mac"=>array("title"=>"Mac","logo"=>"/2018/07/Mac_logo_logotype-copy.png"),
"lakme"=>array("title"=>"LAKME","logo"=>"/2018/07/LAKME-copy.png"),
"la_girl_usa"=>array("title"=>"LA Girl USA","logo"=>"/2018/07/LA_Girl_USA_logo-copy.png"),
"pearls_paris"=>array("title"=>"Pearls & Paris","logo"=>"/2018/07/cropped-logoupdated22-copy.png"),
"clinique"=>array("title"=>"Clinique","logo"=>"/2018/07/Clinique_logo_logotype-copy.png"),
"revlon"=>array("title"=>"Revlon","logo"=>"/2018/07/Revlon_logo-copy.png")
);

$eyeColor = array("White","Dark","Orange");
$DressSize = array("0","2","4","6","8","10","12","14");
$topSize = array("xs","s","m","l","xl","xxl");


function custom_rewrite_basic() {
  global $wp_rewrite;
  $wp_rewrite->tag = "product-for"; // or whatever
  $wp_rewrite->author_base = "its"; // or whatever
  $wp_rewrite->flush_rules();	

  $page = get_page_by_path('top');	
  add_rewrite_rule('^top-cosmetic-products/?', 'index.php?page_id='.$page->ID.'&cat=$matches[1]', 'top');
	 
  $page = get_page_by_path('archive');
  add_rewrite_rule('^gloat-me-pick/?', 'index.php?page_id='.$page->ID.'&tag=gloatme', 'top');

  $page = get_page_by_path('archive');
  add_rewrite_rule('^top-recommended/?', 'index.php?page_id='.$page->ID.'&tag=recommended', 'top');	 

  flush_rewrite_rules();
}
add_action('init', 'custom_rewrite_basic');

function rj_add_query_vars_filter( $vars ){
    $vars[] = "cat";
    return $vars;
}
add_filter( 'query_vars', 'rj_add_query_vars_filter' );

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}

