<?php

/**
 * This template adds the Getting Started page.
 *
 * @package WordPress
 * @subpackage simple-perle
 */


/**
 * Load Getting Started styles in the admin
 */
function simple_perle_start_page_admin_scripts() {

	// Load styles only on our page
	global $pagenow;
	if( 'themes.php' != $pagenow )
		return;

	// Start Page styles
	wp_register_style( 'start-page', get_template_directory_uri() . '/inc/admin/start-page/start-page.css', false, '1.0.0' );
	wp_enqueue_style( 'start-page' );

}
add_action( 'admin_enqueue_scripts', 'simple_perle_start_page_admin_scripts' );

//Add the theme info page
if (!function_exists('simple_perle_add_start_page')) {
	function simple_perle_add_start_page() {
		add_theme_page(__('Theme Start Page', 'simple-perle'), __('Theme Start Page', 'simple-perle'), 'edit_theme_options', 'start-page.php', 'simple_perle_info_page');
	}
}
add_action('admin_menu', 'simple_perle_add_start_page');


if (!function_exists('simple_perle_info_page')) {
	function simple_perle_info_page() {
		$theme_data = wp_get_theme(); ?>

	<div class="wrap about-wrap nudge-themes-start-page">
		<img class="theme-screenshot" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" alt="" />
		<h1><?php printf(__('Welcome to %1s %2s', 'simple-perle'), $theme_data->Name, $theme_data->Version ); ?></h1>
		<p class="sub-heading"><?php printf( __('Thanks for downloading %s!', 'simple-perle'), $theme_data->Name ); ?>
		<?php echo $theme_data->Description; ?></p>

		<div class="postbox my-form-wrap">
			<h3 class="box-title"><?php printf( __('Getting Started with %s', 'simple-perle'), $theme_data->Name ); ?></h3>

			<div class="feature-section two-col">
				<div class="col">
						<div class="media-container">
							<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/docs-Perle-docs.png'; ?>">
						</div>
						
					</div>
				<div class="col">
					<h3><?php printf( __('Documentation', 'simple-perle')); ?></h3>
						<p><?php printf( __('Need help setting up Simple Perle? Take a look at the documentation for help on getting setup.', 'simple-perle')); ?></p>
						<a href="https://nudgethemes.com/documentation/" class="button button-primary" target="_blank"><?php printf( __('Go to the Documentation', 'simple-perle')); ?></a>
				</div>
			</div>
		</div>

		<div class="postbox my-form-wrap">
			<h2 id="Perle-upgrade" class="box-title"><?php printf( __('Upgrade to Perle', 'simple-perle')); ?></h2>
			<p class="upgrade-btn-wrap"><?php printf( __('Upgrading to <a href="https://nudgethemes.com/wordpress-themes/Perle-theme/" target="_blank">Perle</a> allows you to customize your site\'s colors, upload a custom logo and set featured content using <a href="http://jetpack.me/" target="_blank"> Jetpack</a>, as well as several other features which will help you make your site your very own.', 'simple-perle'));?><br><a href="https://nudgethemes.com/wordpress-themes/Perle-theme/" class="button button-primary button-upgrade" target="_blank"><?php printf( __('Upgrade to Perle', 'simple-perle')); ?></a></p>

			<div class="feature-section two-col">
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/perle-features-featured-content.jpg'; ?>">
					</div>
					<h3><?php printf( __('Featured Posts', 'simple-perle')); ?></h3>
					<p><?php printf( __('Highlight your four best posts, pages or portfolio items with Jetpack\'s Featured Content. The subtle animation will add a touch of charm to your page.', 'simple-perle')); ?></p>
				</div>
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/perle-features-woocommerce.jpg'; ?>">
					</div>
					<h3><?php printf( __('WooCommerce Support', 'simple-perle')); ?></h3>
					<p><?php printf( __('Sell anything with the free WooCommerce plugin which powers almost 30&percnt; of all online shops. Perle lets you set up shop with a flawless integrated design.', 'simple-perle')); ?></p>
				</div>
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/perle-features-custom-color.jpg'; ?>">
					</div>
					<h3><?php printf( __('Custom Colors & CSS', 'simple-perle')); ?></h3>
					<p><?php printf( __('Perle lets you easily customize your site\'s colors. If you know a bit of CSS, you can take it a little further using the Custom CSS area.', 'simple-perle')); ?></p>
				</div>
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/perle-features-special-styles.jpg'; ?>">
					</div>
					<h3><?php printf( __('Special Styles', 'simple-perle')); ?></h3>
					<p><?php printf( __('Give your content a little extra style with over hanging images, drop caps and sub-headings. Take a look at <a href="https://nudgethemes.com/documentation/perle-documentation/" target="_blank">Perle\'s documentation</a> for how easily you can create these. ', 'simple-perle')); ?></p>
				</div>
				<div class="nt-theme-upgrade clear">
					<a href="https://nudgethemes.com/wordpress-themes/Perle-theme/" class="button button-primary button-upgrade" target="_blank"><?php printf( __('Upgrade to Perle', 'simple-perle')); ?></a>
				</div>
			</div>
		</div> <!-- end my-form-wrap -->
	</div>
	<?php
	}
}