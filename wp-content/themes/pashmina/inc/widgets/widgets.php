<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pashmina_widgets_init() {

    // Register Right Sidebar
    register_sidebar( array(
        'name'          => __( 'Right Sidebar', 'pashmina' ),
        'id'            => 'dt-right-sidebar',
        'description'   => __( 'Add widgets to Show widgets at right panel of page', 'pashmina' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 1
    register_sidebar( array(
        'name'          => __( 'Bellow Header 1', 'pashmina' ),
        'id'            => 'dt-header1',
        'description'   =>  __( 'Add widgets to Show widgets at Footer Position 1', 'pashmina' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 2
    register_sidebar( array(
        'name'          => __( 'Footer Position 2', 'pashmina' ),
        'id'            => 'dt-footer2',
        'description'   =>  __( 'Add widgets to Show widgets at Footer Position 2', 'pashmina' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 3
    register_sidebar( array(
        'name'          => __( 'Footer Position 3', 'pashmina' ),
        'id'            => 'dt-footer3',
        'description'   =>  __( 'Add widgets to Show widgets at Footer Position 3', 'pashmina' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position 4
    register_sidebar( array(
        'name'          => __( 'Footer Position 4', 'pashmina' ),
        'id'            => 'dt-footer4',
        'description'   =>  __( 'Add widgets to Show widgets at Footer Position 4', 'pashmina' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'pashmina_widgets_init' );

/**
 * Enqueue Admin Scripts
 */
function pashmina_media_script( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }

    wp_enqueue_style( 'pashmina-widgets', get_template_directory_uri() . '/inc/widgets/widgets.css' );

    wp_enqueue_media();
    wp_enqueue_script( 'pashmina-media-upload', get_template_directory_uri() . '/inc/widgets/widgets.js', array( 'jquery' ), '', true );

}
add_action( 'admin_enqueue_scripts', 'pashmina_media_script' );

/**
 * Social Icons widget.
 */
class pashmina_social_icons extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'pashmina_social_icons',
            __( 'Pashmina: Social Icons', 'pashmina' ),
            array(
                'description'   => __( 'Social Icons', 'pashmina' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title      = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
        $facebook   = isset( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
        $twitter    = isset( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
        $g_plus     = isset( $instance[ 'g-plus' ] ) ? $instance[ 'g-plus' ] : '';
        $instagram  = isset( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '';
        $github     = isset( $instance[ 'github' ] ) ? $instance[ 'github' ] : '';
        $flickr     = isset( $instance[ 'flickr' ] ) ? $instance[ 'flickr' ] : '';
        $pinterest  = isset( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '';
        $wordpress  = isset( $instance[ 'wordpress' ] ) ? $instance[ 'wordpress' ] : '';
        $youtube    = isset( $instance[ 'youtube' ] ) ? $instance[ 'youtube' ] : '';
        $vimeo      = isset( $instance[ 'vimeo' ] ) ? $instance[ 'vimeo' ] : '';
        $linkedin   = isset( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : '';
        $behance    = isset( $instance[ 'behance' ] ) ? $instance[ 'behance' ] : '';
        $dribbble   = isset( $instance[ 'dribbble' ] ) ? $instance[ 'dribbble' ] : '';

        ?>

        <aside class="widget dt-social-icons">
            <h2 class="widget-title"><?php if( ! empty( $title ) ) { echo esc_attr( $title ); }; ?></h2>

            <ul>
                <?php if( ! empty( $facebook ) ) { ?>
                    <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $twitter ) ) { ?>
                    <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $g_plus ) ) { ?>
                    <li><a href="<?php echo esc_url( $g_plus ); ?>" target="_blank"><i class="fa fa-google-plus transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $instagram ) ) { ?>
                    <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $github ) ) { ?>
                    <li><a href="<?php echo esc_url( $github ); ?>" target="_blank"><i class="fa fa-github transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $flickr ) ) { ?>
                    <li><a href="<?php echo esc_url( $flickr ); ?>" target="_blank"><i class="fa fa-flickr transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $pinterest ) ) { ?>
                    <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fa fa-pinterest transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $wordpress ) ) { ?>
                    <li><a href="<?php echo esc_url( $wordpress ); ?>" target="_blank"><i class="fa fa-wordpress transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $youtube ) ) { ?>
                    <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fa fa-youtube transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $vimeo ) ) { ?>
                    <li><a href="<?php echo esc_url( $vimeo ); ?>" target="_blank"><i class="fa fa-vimeo transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $linkedin ) ) { ?>
                    <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $behance ) ) { ?>
                    <li><a href="<?php echo esc_url( $behance ); ?>" target="_blank"><i class="fa fa-behance transition35"></i></a> </li>
                <?php } ?>

                <?php if( ! empty( $dribbble ) ) { ?>
                    <li><a href="<?php echo esc_url( $dribbble ); ?>" target="_blank"><i class="fa fa-dribbble transition35"></i></a> </li>
                <?php } ?>

                <div class="clearfix"></div>
            </ul>
        </aside>

        <?php
    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'             => '',
                'facebook'          => '',
                'twitter'           => '',
                'g-plus'            => '',
                'instagram'         => '',
                'github'            => '',
                'flickr'            => '',
                'pinterest'         => '',
                'wordpress'         => '',
                'youtube'           => '',
                'vimeo'             => '',
                'linkedin'          => '',
                'behance'           => '',
                'dribbble'          => ''
            )
        );

        ?>

        <div class="dt-social-icons">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Title', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" placeholder="<?php _e( 'https://www.facebook.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" placeholder="<?php _e( 'https://twitter.com/', 'pashmina' ); ?>" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'g-plus' ); ?>"><?php _e( 'G plus', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'g-plus' ); ?>" name="<?php echo $this->get_field_name( 'g-plus' ); ?>" value="<?php echo esc_attr( $instance['g-plus'] ); ?>" placeholder="<?php _e( 'https://plus.google.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" placeholder="<?php _e( 'https://instagram.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'Github', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo esc_attr( $instance['github'] ); ?>" placeholder="<?php _e( 'https://github.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" placeholder="<?php _e( 'https://www.flickr.com/"', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" placeholder="<?php _e( 'https://www.pinterest.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e( 'WordPress', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" value="<?php echo esc_attr( $instance['wordpress'] ); ?>" placeholder="<?php _e( 'https://wordpress.org/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" placeholder="<?php _e( 'https://www.youtube.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" placeholder="<?php _e( 'https://vimeo.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" placeholder="<?php _e( 'https://linkedin.com', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'Behance', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo esc_attr( $instance['behance'] ); ?>" placeholder="<?php _e( 'https://www.behance.net/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo esc_attr( $instance['dribbble'] ); ?>" placeholder="<?php _e( 'https://dribbble.com/', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->
        </div><!-- .dt-social-icons -->
        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance                = $old_instance;
        $instance[ 'title' ]     = sanitize_text_field( $new_instance[ 'title' ] );
        $instance[ 'facebook' ]  = esc_url_raw( $new_instance[ 'facebook' ] );
        $instance[ 'twitter' ]   = esc_url_raw( $new_instance[ 'twitter' ] );
        $instance[ 'g-plus' ]    = esc_url_raw( $new_instance[ 'g-plus' ] );
        $instance[ 'instagram' ] = esc_url_raw( $new_instance[ 'instagram' ] );
        $instance[ 'github' ]    = esc_url_raw( $new_instance[ 'github' ] );
        $instance[ 'flickr' ]    = esc_url_raw( $new_instance[ 'flickr' ] );
        $instance[ 'pinterest' ] = esc_url_raw( $new_instance[ 'pinterest' ] );
        $instance[ 'wordpress' ] = esc_url_raw( $new_instance[ 'wordpress' ] );
        $instance[ 'youtube' ]   = esc_url_raw( $new_instance[ 'youtube' ] );
        $instance[ 'vimeo' ]     = esc_url_raw( $new_instance[ 'vimeo' ] );
        $instance[ 'linkedin' ]  = esc_url_raw( $new_instance[ 'linkedin' ] );
        $instance[ 'behance' ]   = esc_url_raw( $new_instance[ 'behance' ] );
        $instance[ 'dribbble' ]  = esc_url_raw( $new_instance[ 'dribbble' ] );
        return $instance;

    }

}

/**
 * Popular Posts
 */
class pashmina_recent_posts extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'dt_recent_posts',
            __( 'Pashmina: Recent Posts', 'pashmina' ),
            array(
                'description'   => __( 'Posts display widget for Recent posts', 'pashmina' )
            )
        );
    }

    public function widget( $args, $instance ) {

        global $post;
        $title          = esc_html( isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );
        $no_of_posts    = esc_attr( isset( $instance[ 'no_of_posts' ] ) ? $instance[ 'no_of_posts' ] : '' );

        $query  = new WP_Query( array(
            'post_type'         => 'post',
            'ignore_sticky_posts' => 1,
            'posts_per_page'    => $no_of_posts
        ) );

        ?>

        <div class="widget dt-popular-posts">
            <?php
                if ( $query->have_posts() ) :

                    if ( !empty( $title ) ) : ?> <h2 class="widget-title"><?php echo esc_html( $title ); ?></h2> <?php endif; ?>

                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                        <div class="dt-popular-post">
                            <figure>

                                <?php
                                if ( has_post_thumbnail() ) :
                                    $image = '';
                                    $title_attribute = get_the_title( $post->ID );
                                    $image .= '<a href="'. esc_url( get_permalink() ) . '" title="' . the_title( '', '', false ) .'">';
                                    $image .= get_the_post_thumbnail( $post->ID, 'pashmina-popular-img', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
                                    echo $image;
                                endif;
                                ?>

                            </figure>

                            <div class="dt-popular-post-cont">
                                <h3><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php
                                    $title = get_the_title();
                                    $limit   = '40';
                                    $pad     = '...';

                                    if( strlen( $title ) <= $limit ) {
                                        echo esc_html( $title );
                                    } else {
                                        $title = substr( $title, 0, $limit ) . $pad;
                                        echo esc_html( $title );
                                    }
                                    ?></a></h3>

                                <span class="dt-popular-post-date"><?php esc_html( the_time("F d, Y") ); ?></span>
                            </div><!-- .dt-recent-post-content -->

                            <div class="clearfix"></div>
                        </div><!-- .dt-recent-post-holder -->

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched.', 'pashmina' ); ?></p>
                <?php endif; ?>

            <div class="clearfix"></div>
        </div><!-- .dt-news-layout-wrap -->

        <?php
    }

    public function form( $instance ) {

        $instance = wp_parse_args( $instance, array(
            'title'              => '',
            'no_of_posts'        => '6'
        ) );

        ?>

        <div class="dt-admin-recent-posts">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><strong><?php _e( 'Title', 'pashmina' ); ?></strong></label>

                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><strong><?php _e( 'No. of Posts', 'pashmina' ); ?></strong></label>

                <input type="number" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" value="<?php echo esc_attr( $instance['no_of_posts'] ); ?>">
            </div><!-- .dt-admin-input-wrap -->
        </div><!-- .dt-news-list-1 -->
        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance                   = $old_instance;
        $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );
        $instance[ 'no_of_posts' ]  = absint( $new_instance[ 'no_of_posts' ] );
        return $instance;

    }

}

/**
 * Ads sidebar widget.
 */
class pashmina_ads extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'pashmina_ads',
            __( 'Pashmina: Banner Advertisement ', 'pashmina' ),
            array(
                'description'   => __( 'Advertisement for sidebar', 'pashmina' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $title          = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
        $ads_image_path = isset( $instance[ 'ads_image' ] ) ? $instance[ 'ads_image' ] : '';
        $ads_link       = isset( $instance[ 'ads_link' ] ) ? $instance[ 'ads_link' ] : '';
        $ads_link_type  = isset( $instance[ 'ads_link_type' ] ) ? $instance[ 'ads_link_type' ] : '';

        if( empty( $title ) ) {
            $title = __( 'Advertisement', 'pashmina' );
        };

        if( empty( $ads_image_path ) ) {
            $ads_image_path = '';
        };

        if( empty( $ads_link ) ) {
            $ads_link = __( 'URL', 'pashmina' ) ;
        };

        if( $ads_link_type == 'nofollow' ) {
            $ads_link_type = 'nofollow';

        } else {
            $ads_link_type = 'dofollow';
        }

        ?>
        <div class="widget dt-ads">

            <?php if ( $ads_link != '' && $ads_link != 'URL' ) : ?>

                <a href="<?php echo esc_url( $ads_link ); ?>" title="<?php echo esc_attr( $title ); ?>" rel="<?php echo esc_attr( $ads_link_type ); ?>" target="_blank"><img src="<?php echo esc_url( $ads_image_path ); ?>" alt="<?php echo esc_attr( $title ); ?>"></a>

            <?php else : ?>

                <img src="<?php echo esc_url( $ads_image_path ); ?>" alt="<?php echo esc_attr( $title ); ?>">

            <?php endif; ?>

        </div>
        <?php
    }

    public function form( $instance ) {

        $instance = wp_parse_args( $instance, array(
            'title'              => '',
            'ads_link'           => '',
            'ads_image'          => '',
            'ads_link_type'      => ''
        ) );

        ?>

        <div class="dt-ads">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" placeholder="<?php _e( 'Ads Title', 'pashmina' ); ?>">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'ads_link' ); ?>"><?php _e( 'Ads Link', 'pashmina' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'ads_link' ); ?>" name="<?php echo $this->get_field_name( 'ads_link' ); ?>" value="<?php echo esc_attr( $instance['ads_link'] ); ?>" placeholder="<?php _e( 'http://daisythemes.com/', 'pashmina' ); ?>" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'ads_link_type' ); ?>"><?php _e( 'Link Type', 'pashmina' ); ?></label>

                <select id="<?php echo $this->get_field_id('ads_link_type'); ?>" name="<?php echo $this->get_field_name('ads_link_type'); ?>">
                    <option value="dofollow" <?php selected( $instance['ads_link_type'], 'dofollow' ); ?>>Do Follow</option>
                    <option value="nofollow" <?php selected( $instance['ads_link_type'], 'nofollow' );?>>No Follow</option>
                </select>
            </div>

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'ads_image' ); ?>"><?php _e( 'Ads Image', 'pashmina' ); ?></label>

                <?php $dt_ads_img = $instance['ads_image'];
                if ( ! empty( $dt_ads_img ) ) { ?>
                    <img src="<?php echo $dt_ads_img; ?>" />
                <?php } else { ?>
                    <img src="" />
                <?php } ?>

                <input type="hidden" class="dt-custom-media-image" id="<?php echo $this->get_field_id( 'ads_image' ); ?>" name="<?php echo $this->get_field_name( 'ads_image' ); ?>" value="<?php echo $instance['ads_image']; ?>" />
                <input type="button" id="custom_media_button" class="dt-img-upload" name="<?php echo $this->get_field_name( 'ads_image' ); ?>"  value="<?php _e( 'Select Ads Image', 'pashmina' ); ?>" />
            </div><!-- .dt-admin-input-wrap -->
        </div><!-- .dt-ads -->
        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance                   = $old_instance;
        $instance[ 'title' ]        = sanitize_text_field( $new_instance[ 'title' ] );
        $instance[ 'ads_link' ]     = esc_url_raw( $new_instance[ 'ads_link' ] );
        $instance['ads_link_type']  = strip_tags( $new_instance['ads_link_type'] );
        $instance['ads_image']      = esc_url_raw( $new_instance['ads_image'] );
        return $instance;

    }

}

/**
 * About Widget
 */
class pashmina_about extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'pashmina_about',
            __( 'Pashmina: About Me', 'pashmina'),
            array(
                'description'   => __( 'Show a single page', 'pashmina' )
            )
        );

    }

    public function widget( $args, $instance ) {

        $dt_about_page = isset( $instance['dt_about_page'] ) ? $instance['dt_about_page'] : '';

        foreach ( $dt_about_page as $dt_about_page_key => $dt_about_page_value ) :
            $dt_about_page_id = esc_attr( $dt_about_page_value['page'] ); ?>

            <aside class="widget dt-about-holder">
                <article>
                    <h2 class="widget-title"><?php echo esc_html( get_the_title( $dt_about_page_id ) ); ?></h2>

                    <?php  if ( has_post_thumbnail( $dt_about_page_id ) ) : ?>

                        <figure>

                            <?php
                                $image = '';
                                $title_attribute = get_the_title( $dt_about_page_id );
                                $image .= '<a href="'. esc_url( get_permalink( $dt_about_page_id ) ) . '" title="' . the_title( '', '', false ) .'">';
                                $image .= get_the_post_thumbnail( $dt_about_page_id, 'pashmina-about-img', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'transition35' ) ).'</a>';
                                echo $image;
                            ?>

                        </figure>

                    <?php endif; ?>

                   <p><?php

                        $post = get_post( $dt_about_page_id );

                        $excerpt = get_the_excerpt( $post );
                        $limit   = '220';

                        if( strlen( $excerpt ) <= $limit ) {
                            echo esc_attr( $excerpt );
                        } else {
                            $excerpt = substr( $excerpt, 0, $limit );
                            echo esc_attr( $excerpt );
                        }

                    ?>
                    <a href="<?php echo esc_url( get_permalink( $dt_about_page_id ) ); ?>" title="<?php _e( 'Read Details', 'pashmina' ); ?>"><?php _e( ' ...', 'pashmina' ); ?></a></p>

                </article>
            </aside>

        <?php endforeach; ?>

        <?php
    }

    public function form( $instance ) {

        $dt_about_page = isset( $instance['dt_about_page'] ) ? $instance['dt_about_page'] : '';
        if ( ! empty( $dt_about_page ) ) {
            foreach ( $dt_about_page as $dt_about_page_key => $dt_about_page_value ) { ?>

                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_about_page' ).$dt_about_page_key; ?>"><?php _e( 'Select a Page', 'pashmina' ); ?></label>

                    <?php

                    $arg = array(
                        'name' => $this->get_field_name( "dt_about_page" ).'['.esc_attr( $dt_about_page_key ).'][page]',
                        'id'   => $this->get_field_id( "dt_about_page" ).$dt_about_page_key,
                        'selected' => $dt_about_page_value['page'],
                    );

                    wp_dropdown_pages( $arg );

                    ?>

                </div><!-- .dt-admin-input-wrap -->

            <?php }

        } else {
            for ( $dt_service_counter = 0; $dt_service_counter < 1; $dt_service_counter++ ) { ?>

                <div class="dt-admin-input-wrap">
                    <label for="<?php echo $this->get_field_id( 'dt_about_page' ).$dt_service_counter; ?>"><?php _e( 'Select a Page', 'pashmina' ); ?></label>

                    <?php

                    $arg = array(
                        'name' => $this->get_field_name( "dt_about_page" ).'['.esc_attr( $dt_service_counter ).'][page]',
                        'id'   => $this->get_field_id( "dt_about_page" ).$dt_service_counter,
                    );

                    wp_dropdown_pages($arg);

                    ?>

                </div><!-- .dt-admin-input-wrap -->

                <?php
            }
        }
    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;
        $instance['dt_about_page'] = array();

        if ( isset( $new_instance['dt_about_page'] ) ) {
            foreach ( $new_instance['dt_about_page'] as $stream_source ) {
                $instance['dt_about_page'][] = $stream_source;
            }
        }
        return $instance;
    }

}

// Register widgets
function pashmina_register_widgets() {

    register_widget( 'pashmina_social_icons' );
    register_widget( 'pashmina_recent_posts' );
    register_widget( 'pashmina_ads' );
    register_widget( 'pashmina_about' );

}
add_action( 'widgets_init', 'pashmina_register_widgets' );
