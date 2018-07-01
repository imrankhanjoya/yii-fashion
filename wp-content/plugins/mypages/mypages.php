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

function custom_rewrite_basic() {
  $val = add_rewrite_rule('^top-in-([a-z A-Z]+)/?', 'index.php?page_id=55&cat=$matches[1]', 'top');
   flush_rewrite_rules();
}
add_action('init', 'custom_rewrite_basic');

function rj_add_query_vars_filter( $vars ){
    $vars[] = "cat";
    return $vars;
}
add_filter( 'query_vars', 'rj_add_query_vars_filter' );
