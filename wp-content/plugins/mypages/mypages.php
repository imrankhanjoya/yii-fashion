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
$site['brands'] = array("o3"=>"O3","KAZIMA"=>"kazima","lotus"=>"Lotus","nivea"=>"Nivea","olay"=>"Olay","mcaffeine"=>"MCaffeine","lakme"=>"Lakmé","loreal-paris"=>"L’Oreal Paris","khadi-natural"=>"Khadi Natural","ponds"=>"POND’S","brezzycloud"=>"Brezzycloud");


function custom_rewrite_basic() {
  global $wp_rewrite;
  $wp_rewrite->author_base = "its"; // or whatever
  $wp_rewrite->flush_rules();	


  $page = get_page_by_path( 'top' );	
  add_rewrite_rule('^top-in-([a-z A-Z]+)/?', 'index.php?page_id='.$page->ID.'&cat=$matches[1]', 'top');
	  
  flush_rewrite_rules();
}
add_action('init', 'custom_rewrite_basic');

function rj_add_query_vars_filter( $vars ){
    $vars[] = "cat";
    return $vars;
}
add_filter( 'query_vars', 'rj_add_query_vars_filter' );
