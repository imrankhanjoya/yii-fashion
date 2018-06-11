<?php
/**
 * The template for displaying post meta (post date, post author and post comments)
 *
 * @package ClubHair
 */

?>
<?php if ( 'post' === get_post_type() ) : ?>
<div class="post-meta">
	<div class="post-date">
		<i class="far fa-clock"></i> <?php echo the_time( get_option( 'date_format' ) ); ?>
	</div>
	<div class="post-author">
		<?php // translators: %s containing the name of the author. ?>
		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'clubhair' ), get_the_author() ) ?>"><i class="fas fa-user-circle"></i> <?php echo get_the_author() ?></a>
	</div>
	<?php if ( post_password_required() !== true ) : ?>
	<div class="post-comments">
		<i class="far fa-comment"></i> <?php comments_number( __( '0 Comments', 'clubhair' ), __( '1 Comment', 'clubhair' ), __( '% Comments', 'clubhair' ) ); ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
