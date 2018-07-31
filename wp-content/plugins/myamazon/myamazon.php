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
    $items .= '<li><a href="/trending/">Trending</a></li>';
    $items .= '<li><a href="/shop/">Shop</a></li>';
    $items .= '<li><a href="/discuss-beauty/">Discuss</a></li>';
    
    return $items;
}

add_filter( 'wp_nav_menu_items', 'add_loginout_link', 2, 2 );
function add_loginout_link( $items, $args ) {

    
    if (is_user_logged_in() && $args->theme_location == 'primary') {
        $user = wp_get_current_user();
        $items .= '<li><a href="'.get_author_posts_url($user->ID).'" alt="View my Profile"><span class="glyphicon glyphicon-heart"></span>&nbsp;Me</a></li>';
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
        $items .= '<li><a href="'. getLoginPage().'">Join</a></li>';
        $items .= '<li><a href="'. getLoginPage().'">Get Start</a></li>';
    }
    return $items;
}


function generateMeta($data){
    $out = '<meta property="og:site_name" content="Gloat.Me fashion and style"/>';
    $out .= "\n";
    $out .= '<meta property="fb:app_id" content="135773309784309" />';$out .= "\n";
    $out .= '<meta property="og:locale" content="en_US" />';$out .= "\n";
    $out .= '<meta property="og:type" content="article" />';$out .= "\n";
    $out .= '<meta property="article:publisher" content="https://www.facebook.com/gloatme" />';$out .= "\n";
    if(isset($data['title'])){
        $out .= '<title>'.$data['title'].'</title>';$out .= "\n";
        $out .= '<meta itemprop="name" content="'.$data['title'].'" />';$out .= "\n";
        $out .= '<meta name="twitter:title" content="'.$data['title'].'" />';$out .= "\n";
        $out .= '<meta property="og:title" content="'.$data['title'].'" />';$out .= "\n";
    }
    if(isset($data['description'])){
        $out .= '<meta name="description" content="'.$data['description'].'" />';$out .= "\n";
        $out .= '<meta property="og:description" content="'.$data['description'].'" />';$out .= "\n";
        $out .= '<meta itemprop="description" content="'.$data['description'].'" />';$out .= "\n";
        $out .= '<meta name="twitter:description" content="'.$data['description'].'" />';$out .= "\n";
    }
    if(isset($data['url'])){
        $out .= '<meta name="twitter:url" content="'.$data['url'].'" />';$out .= "\n";
        $out .= '<meta property="og:url" content="'.$data['url'].'" />';$out .= "\n";
    }
    if(isset($data['image'])){
        $out .= '<meta property="og:image" content="'.$data['image'].'" />';$out .= "\n";
        if(isset($data['width']))
        $out .= '<meta property="og:image:width" content="'.$data['width'].'" />';$out .= "\n";
        if(isset($data['height']))
        $out .= '<meta property="og:image:height" content="'.$data['height'].'" />';$out .= "\n";
        $out .= '<meta itemprop="image" content="'.$data['image'].'" />';$out .= "\n";
        $out .= '<meta name="twitter:image" content="'.$data['image'].'" /><meta name="twitter:card" content="summary_large_image" />';$out .= "\n";        
    }
    return $out;
}


add_action('init', 'my_setcookie');

// my_setcookie() set the cookie on the domain and directory WP is installed on
function my_setcookie(){
  $path = "/";
  $host = parse_url(get_option('siteurl'), PHP_URL_HOST);
  $expiry = strtotime('+1 month');
  $url = $_SERVER['REQUEST_URI'];
  if($url=="/"){
    return false;
  }elseif(strstr($url,"get-start") || strstr($url,"contest-participent") || strstr($url,"wp-login.php")){
    return false;
  }elseif(strstr($url,"contest")){
    $url = $url.'?startit=true';
    setcookie('getBack',$url, $expiry, $path, $host);
  }else{
    setcookie('getBack',$url, $expiry, $path, $host);
  }
}


function preUrl(){
    return isset($_COOKIE['getBack'])?$_COOKIE['getBack']:false;
}