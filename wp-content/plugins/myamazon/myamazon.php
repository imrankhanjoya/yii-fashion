<?php
/*
Plugin Name: MyAmazon
Plugin URI: http://simplysocial.co.in
description:-
My custom post ype system
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/
?>
<?PHP 

add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 2, 3 );
function your_custom_menu_item ( $items, $args ) {
    $items .= '<li><a href="/top-in-dove">Top</a></li>';
    $items .= '<li><a href="/products">Products</a></li>';
    $items .= '<li><a href="/discuss-beauty">Discuss</a></li>';
    
    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 2, 2 );
function add_loginout_link( $items, $args ) {

    
    if (is_user_logged_in() && $args->theme_location == 'primary') {
        $user = wp_get_current_user();
        $items .= '<li><a href="'. wp_logout_url() .'">Log Out</a></li>';
        $items .= '<li><a href="'.get_author_posts_url($user->ID).'">Profile</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li><a href="'. getLoginPage().'">Log In</a></li>';
    }
    return $items;
}

