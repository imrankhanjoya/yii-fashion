<?php
/**
 * Module Name: About Me Widget
 * Module Description: Easily create an About Me Widget.
 * Sort Order: 20
 * First Introduced: 1.0.3
 */

/**
* Register the widget for use in Appearance -> Widgets
*/
add_action( 'widgets_init', 'simple_perle_about_me_widget_init' );
function simple_perle_about_me_widget_init() {
	register_widget( 'Simple_Perle_About_Me_Widget' );
}

class Simple_Perle_About_Me_Widget extends WP_Widget {

	const IMG_SHAPE_CIRCLE = 'circle';

	/**
	* Register widget with WordPress.
	*/
	public function __construct() {
		parent::__construct(
			'simple_perle_about_me_widget',
			sprintf( __( '%s About Me Widget', 'simple-perle' ),wp_get_theme()),
			array(
				'classname' => 'simple_perle_about_me_widget',
				'description' => __( 'Display an About Me widget in your sidebar', 'simple-perle' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	/**
	* Front-end display of widget.
	*
	* @see WP_Widget::widget()
	*
	* @param array $args     Widget arguments.
	* @param array $instance Saved values from database.
	*/
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$instance = wp_parse_args( $instance, array(
			'title' => '',
			'img_url' => '',
			'img_shape' => '',
			'text' => '',
			'read_more_text' => '',
			'link' => ''
		) );

		/** This filter is documented in core/src/wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( $title ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}

		$output = '';
		$link_start = '';
		$link_end = '';
		if ( '' != $instance['link']) {
			$link_start = '<a href="' . esc_url( $instance['link'] ) . '" class="simple-perle-about-me-link">';
			$link_end = '</a>';
		}

		$image = '';
		if ( '' != $instance['img_url'] ) {

			$img_shape_class = $instance['img_shape'] == self::IMG_SHAPE_CIRCLE ? '-circle' : '';

			$image = $link_start.'<div style="background-image:url(' . esc_url( $instance['img_url'] ) . ')" ';
			$image .= 'class="simple-perle-about-me-image ' . $img_shape_class . '" ';
			$image .= '></div>' . $link_end;
		}

		$read_more = '';
		if ('' != $instance['read_more_text'] && '' != $link_start) {
			$read_more = '<span class="simple-perle-about-me-read-more">' . $link_start . esc_html( $instance['read_more_text'] ) . $link_end . '</span>';
		}

		$text = '';
		if ( '' != $instance['text'] ) {
			/** This filter is documented in core/src/wp-includes/default-widgets.php */
			$text = apply_filters( 'widget_text', $instance['text'] );
			$text = '<div class="text-container">' . wpautop( $text ) . $read_more . '</div>';
		}

		$output = $image . $text ;
		echo '<div class="simple-perle-about-me-widget-container">' . do_shortcode( $output ) . '</div>';


		echo "\n" . $args['after_widget'];
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		 $allowed_caption_html = array(
		 	'a' => array(
		 		'href' => array(),
		 		'title' => array(),
		 		),
		 	'b' => array(),
		 	'em' => array(),
		 	'i' => array(),
		 	'p' => array(),
		 	'strong' => array()
		 	);

		$instance = $old_instance;

		$instance['title']          = strip_tags( $new_instance['title'] );
		$instance['img_url']        = esc_url( trim( $new_instance['img_url'] ) );
		$instance['img_shape']      = $new_instance['img_shape'] == self::IMG_SHAPE_CIRCLE ? self::IMG_SHAPE_CIRCLE : '';
		$instance['text']           = wp_kses( stripslashes($new_instance['text'] ), $allowed_caption_html );
		$instance['read_more_text'] = strip_tags( $new_instance['read_more_text'] );
		$instance['link']           = esc_url( trim( $new_instance['link'] ) );

		return $instance;
	}

	/**
	* Back end widget form.
	*
	* @see WP_Widget::form()
	*
	* @param array $instance Previously saved values from database.
	*/
	public function form( $instance ) {
		// Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'img_url' => '', 'img_shape' => '', 'text' => '', 'read_more_text' => '', 'link' => '' ) );

		$title          = esc_attr( $instance['title'] );
		$img_url        = esc_url( $instance['img_url'], null, 'display' );
		$img_shape      = $instance['img_shape'] == self::IMG_SHAPE_CIRCLE ? self::IMG_SHAPE_CIRCLE : '';
		$text           = esc_textarea( $instance['text'] );
		$read_more_text = esc_attr( $instance['read_more_text'] );
		$link           = esc_url( $instance['link'], null, 'display' );

		echo '<p><label for="' . $this->get_field_id( 'title' ) . '">' . esc_html__( 'Widget title:', 'simple-perle' ) . '
			<input class="widefat" id="' . $this->get_field_id( 'title' ) . '" name="' . $this->get_field_name( 'title' ) . '" type="text" value="' . $title . '" />
			</label></p>

			<p><label for="' . $this->get_field_id( 'img_url' ) . '">' . esc_html__( 'Image URL:', 'simple-perle' ) . '
			<input class="widefat" id="' . $this->get_field_id( 'img_url' ) . '" name="' . $this->get_field_name( 'img_url' ) . '" type="text" value="' . $img_url . '" /> <span class="description customize-control-description">' . esc_html__( 'Image should be at least 135x135 px', 'simple-perle' ) .'</span>
			</label></p>

			<p>
				<label>'. esc_html( 'Image shape:', 'simple-perle' ) .'</label>
				<ul>
				<li><label><input class="" id="' . $this->get_field_id( 'img_shape' ) . '" name="' . $this->get_field_name( 'img_shape' ) . '" type="radio" value="" ' . ($img_shape == '' ? 'checked="checked"' : '') . '/>
				' . esc_html__( 'square', 'simple-perle' ) . '</label>
				</li>
				<li><label><input class="" id="' . $this->get_field_id( 'img_shape' ) . '" name="' . $this->get_field_name( 'img_shape' ) . '" type="radio" value="' . self::IMG_SHAPE_CIRCLE . '" ' . ($img_shape == self::IMG_SHAPE_CIRCLE ? 'checked="checked"' : '') . '/>
					' . esc_html__( 'circle', 'simple-perle' ) . '</label>
				</li>
				</ul>

			</p>

			<p><label for="' . $this->get_field_id( 'text' ) . '">' . esc_html__( 'Text:', 'simple-perle' ) . '
			<textarea class="widefat" id="' . $this->get_field_id( 'text' ) . '" name="' . $this->get_field_name( 'text' ) . '" rows="5" cols="20">' . $text . '</textarea>
			</label></p>

			<p><label for="' . $this->get_field_id( 'read_more_text' ) . '">' . esc_html__( 'Read more text:', 'simple-perle' ) . '
			<input class="widefat" id="' . $this->get_field_id( 'read_more_text' ) . '" name="' . $this->get_field_name( 'read_more_text' ) . '" type="text" value="' . $read_more_text . '" />
			</label></p>

			<p><label for="' . $this->get_field_id( 'link' ) . '">' . esc_html__( 'Link URL (when the image or read more is clicked):', 'simple-perle' ) . '
			<input class="widefat" id="' . $this->get_field_id( 'link' ) . '" name="' . $this->get_field_name( 'link' ) . '" type="text" value="' . $link . '" />
			</label></p>';
	}
} // Class Simple_Perle_About_Me_Widget
