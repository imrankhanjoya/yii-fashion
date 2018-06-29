<?php
/*
Plugin Name: posttypes
Plugin URI: http://simplysocial.co.in
description:-
My custom post ype system
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/

function create_post_type() {
    register_post_type( 'discuss',
        array(
            'labels' => array(
                'name' => __( 'Discuss' ),
                'singular_name' => __( 'Discuss' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}
add_action( 'init', 'create_post_type' );