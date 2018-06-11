<?php
/**
 * The template for displaying social media icons
 *
 * @package ClubHair
 */

?>
<?php if ( get_theme_mod( 'clubhair_facebooklink' ) || get_theme_mod( 'clubhair_twitterlink' ) || get_theme_mod( 'clubhair_pinterestlink' ) || get_theme_mod( 'clubhair_instagramlink' ) || get_theme_mod( 'clubhair_linkedinlink' ) || get_theme_mod( 'clubhair_googlepluslink' ) || get_theme_mod( 'clubhair_youtubelink' ) || get_theme_mod( 'clubhair_vimeo' ) || get_theme_mod( 'clubhair_tumblrlink' ) || get_theme_mod( 'clubhair_flickrlink' ) ) : ?>
<div class="social-icons">
	<ul class="list-unstyled list-social-icons">
<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_facebooklink' ) ) : ?>
		<li class="social-icon social-icon-facebook"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_facebooklink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Facebook', 'clubhair' ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_twitterlink' ) ) : ?>
		<li class="social-icon social-icon-twitter"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_twitterlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Twitter', 'clubhair' ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_pinterestlink' ) ) : ?>
		<li class="social-icon social-icon-pinterest"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_pinterestlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Pinterest', 'clubhair' ); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_instagramlink' ) ) : ?>
		<li class="social-icon social-icon-instagram"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_instagramlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Instagram', 'clubhair' ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_linkedinlink' ) ) : ?>
		<li class="social-icon social-icon-linkedin"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_linkedinlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Linkedin', 'clubhair' ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_googlepluslink' ) ) : ?>
		<li class="social-icon social-icon-googleplus"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_googlepluslink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Google+', 'clubhair' ); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_youtubelink' ) ) : ?>
		<li class="social-icon social-icon-youtube"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_youtubelink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'YouTube', 'clubhair' ); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_vimeo' ) ) : ?>
		<li class="social-icon social-icon-vimeo"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_vimeo' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Vimeo', 'clubhair' ); ?>" target="_blank"><i class="fab fa-vimeo-v"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_tumblrlink' ) ) : ?>
		<li class="social-icon social-icon-tumblr"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_tumblrlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Tumblr', 'clubhair' ); ?>" target="_blank"><i class="fab fa-tumblr"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubhair_flickrlink' ) ) : ?>
		<li class="social-icon social-icon-flickr"><a href="<?php echo esc_url( get_theme_mod( 'clubhair_flickrlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_attr_e( 'Flickr', 'clubhair' ); ?>" target="_blank"><i class="fab fa-flickr"></i></a></li>
		<?php endif; ?>
<?php if ( get_theme_mod( 'clubhair_facebooklink' ) || get_theme_mod( 'clubhair_twitterlink' ) || get_theme_mod( 'clubhair_pinterestlink' ) || get_theme_mod( 'clubhair_instagramlink' ) || get_theme_mod( 'clubhair_linkedinlink' ) || get_theme_mod( 'clubhair_googlepluslink' ) || get_theme_mod( 'clubhair_youtubelink' ) || get_theme_mod( 'clubhair_vimeo' ) || get_theme_mod( 'clubhair_tumblrlink' ) || get_theme_mod( 'clubhair_flickrlink' ) ) : ?>
	</ul>
</div>
<?php endif; ?>
