<?php
/*
Plugin Name: My product
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
add_action( 'wp_ajax_find_product', 'find_product' );

function find_product() {
    $key = $_POST['key'];
    $val = $_POST['val'];
    echo sotreUserMeta($key,$val);
    exit;
}

