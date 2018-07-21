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
    echo $key = $_POST['key'];
    echo $val = $_POST['val'];
    return $val;
    exit;
}

