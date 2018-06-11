<?php 
/**
 * Register theme sidebars
 * @package Start_Blogging
 * @version 1.0.0
 */
 
function start_blogging_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'start-blogging' ),
		'id' => 'blogright',
		'description' => esc_html__( 'Right sidebar for the blog', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Blog Left Sidebar', 'start-blogging' ),
		'id' => 'blogleft',
		'description' => esc_html__( 'Left sidebar for the blog', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'start-blogging' ),
		'id' => 'pageright',
		'description' => esc_html__( 'Right sidebar for pages', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	register_sidebar( array(
		'name' => esc_html__( 'Page Left Sidebar', 'start-blogging' ),
		'id' => 'pageleft',
		'description' => esc_html__( 'Left sidebar for pages', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Banner', 'start-blogging' ),
		'id' => 'banner',
		'description' => esc_html__( 'For Images and Sliders.', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Announcement', 'start-blogging' ),
		'id' => 'announcement',
		'description' => esc_html__( 'For adding announcements just below the banner area.', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="announcement widget-title">',
		'after_title' => '</div>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Breadcrumbs', 'start-blogging' ),
		'id' => 'breadcrumbs',
		'description' => esc_html__( 'For adding breadcrumb navigation if using a plugin, or you can add content here.', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Content Top 1', 'start-blogging' ),
		'id' => 'ctop1',
		'description' => esc_html__( 'Content Top 1 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Top 2', 'start-blogging' ),
		'id' => 'ctop2',
		'description' => esc_html__( 'Content Top 2 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Top 3', 'start-blogging' ),
		'id' => 'ctop3',
		'description' => esc_html__( 'Content Top 3 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Top 4', 'start-blogging' ),
		'id' => 'ctop4',
		'description' => esc_html__( 'Content Top 4 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );		
			
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 1', 'start-blogging' ),
		'id' => 'cbottom1',
		'description' => esc_html__( 'Content Bottom 1 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 2', 'start-blogging' ),
		'id' => 'cbottom2',
		'description' => esc_html__( 'Content Bottom 2 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 3', 'start-blogging' ),
		'id' => 'cbottom3',
		'description' => esc_html__( 'Content Bottom 3 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom 4', 'start-blogging' ),
		'id' => 'cbottom4',
		'description' => esc_html__( 'Content Bottom 4 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'start-blogging' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'start-blogging' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'start-blogging' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'start-blogging' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'start-blogging' ),
		'id' => 'footer',
		'description' => esc_html__( 'This is a sidebar position that sits above the footer menu and copyright', 'start-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
}
add_action( 'widgets_init', 'start_blogging_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 * in the content top group.
 */

function start_blogging_ctop() {
	$count = 0;
	if ( is_active_sidebar( 'ctop1' ) )
		$count++;
	if ( is_active_sidebar( 'ctop2' ) )
		$count++;
	if ( is_active_sidebar( 'ctop3' ) )
		$count++;		
	if ( is_active_sidebar( 'ctop4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Count the number of widgets to enable resizable widgets
 * in the content bottom group.
 */

function start_blogging_cbottom() {
	$count = 0;
	if ( is_active_sidebar( 'cbottom1' ) )
		$count++;
	if ( is_active_sidebar( 'cbottom2' ) )
		$count++;
	if ( is_active_sidebar( 'cbottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'cbottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Count the number of widgets to enable resizable widgets
 * in the bottom group.
 */

function start_blogging_bottom() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}