<?php
/*
Plugin Name: MyCache
Plugin URI: http://simplysocial.co.in
description:-
My custom post ype system
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/

function getCache($key,$cachetime = 120){
    $file = "/tmp/".$key;
    if( !file_exists($file) OR (filemtime($file) < (time() - $cachetime))) {
    	return false;
    }
    $val = file_get_contents($file);
    return unserialize($val);
}

function setCache($key,$val,$cachetime = 1920){
	$val = serialize($val);
   file_put_contents("/tmp/".$key,$val,LOCK_EX);
   return $val;
}