<?php
/*
Plugin Name: Recent Products
Plugin URI: http://simplysocial.co.in
description:-
a plugin to create awesomeness and spread joy
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/

function WP_Widget_Recent_Postsss() {
    register_widget( 'WP_Widget_Recent_Postsss' );
}
add_action( 'widgets_init', 'WP_Widget_Recent_Postsss' );
class WP_Widget_Recent_Postsss extends WP_Widget {


    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "Recent Products") );
        parent::__construct('recent-posts', __('Recent Products'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        //print_r($instance);
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
         $filter = array('post_type' => 'product','posts_per_page' => 5, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true);
        if ($number) {
            $filter['category']=$number;
        } ?>
        <?=$before_widget?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul id="service-list">
        <?php 
        $the_query = new WP_Query( $filter );
        if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li class="service">
                <h5><?php the_title(); ?></h5>
            </li><!-- /.service -->
        <?php endwhile; else: ?>

            <p>Nothing Here.</p>

        <?php endif; wp_reset_postdata(); ?>
        <?=$after_widget?>
        <?php

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        print_r($old_instance);
        print_r($new_instance);die();
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['catnew'] = (int) $new_instance['catnew'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        
        //echo"<pre>";print_r($instance);
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;

        $catnew    = isset( $instance['catnew'] ) ? esc_attr($instance['catnew'])  : false;

        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>


        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'number:' ); ?></label>
        <select id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" class="widefat" style="width:100%;">
        <?php 
        $args=array('orderby' => 'name', 'order' => 'ASC'); 
        $categories = get_categories( $args );
        foreach($categories as $value) { ?>
            <option <?php selected( $instance['number'], $value->term_id ); ?> value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
        <?php } ?>


        
        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
        <?php
    }
}