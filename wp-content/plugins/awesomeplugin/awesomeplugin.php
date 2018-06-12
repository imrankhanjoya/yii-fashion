<?php
/*
Plugin Name: Awesomeness
Plugin URI: http://simplysocial.co.in
description:-
a plugin to create awesomeness and spread joy
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/


// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_deideo' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class wpb_deideo extends WP_Widget {

    function __construct() {
        parent::__construct('ikj_wpb_widget', __('Top Categories', 'wpb_widget_domain'),
            array( 'description' => __( 'Widget Developed By IKJ', 'wpb_widget_domain' ), )
        );
    }

// Creating widget front-end

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args['before_widget'];
        echo $out = '<div class="card front-henna-card" style="background: url('.$instance['bg'].'); background-repeat:no-repeat">
                    <h2>Henna is all you need for your beauty</h2>
                <input type="button" value="Know more">
                </div>';
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {

        $title = isset( $instance[ 'title' ] )?$instance[ 'title' ]:__( 'New title', 'wpb_widget_domain' );
        $bg = isset( $instance[ 'bg' ] )?$instance[ 'bg' ]:__( 'New Bg', 'wpb_widget_domain' );
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'bg' ); ?>"><?php _e( 'bg:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'bg' ); ?>" name="<?php echo $this->get_field_name( 'bg' ); ?>" type="text" value="<?php echo esc_attr( $bg ); ?>" />
        </p>
    <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['bg'] = ( ! empty( $new_instance['bg'] ) ) ? strip_tags( $new_instance['bg'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here