<?php
/**
 * The template for displaying comments
 * The area of the page that contains both current comments and the comment form.
 * @package Start_Blogging
 * @version 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">		
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Comment to &ldquo;%s&rdquo;', 'comments title', 'start-blogging' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Comment to &ldquo;%2$s&rdquo;',
						'%1$s Comments to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'start-blogging'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>			
		</h2>

		<?php start_blogging_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 60,
				) );
			?>
		</ol>

		<?php start_blogging_comment_nav(); ?>

	<?php endif; ?>

<?php 
/*
 * Customize the comments form
 * Special thanks to the Kale theme for a starting point.
 */
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );

		$fields =  array(
			'author' => '<div class="row"><p class="comment-form-author col-md-4">' . '<label for="author" class="sr-only">' . __( '*Name', 'start-blogging'  ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			'<input id="author" class="form-control" name="author" placeholder="' . esc_attr__('*Name', 'start-blogging') . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" /></p>',
				
			'email'     =>  '<p class="comment-form-email col-md-4"><label for="email" class="sr-only">'. esc_attr__( 'Email', 'start-blogging' ) .($req ? '<span class="required">*</span>' : '') . '</label><input type="email" class="form-control" name="email" id="email" placeholder="' . esc_attr__('*Email', 'start-blogging') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></p>',
			
			'url'       => '<p class="comment-form-url col-md-4"><label class="sr-only">' . esc_attr__( 'Website', 'start-blogging' ) . '</label><input type="text" class="form-control" name="url" id="url" placeholder="' . esc_attr__('Website', 'start-blogging') . '"="' . esc_attr( $commenter['comment_author_url'] ) . '"/></p></div>'
		);
		$comment_field  =  '<div class="row"><p class="comment-form-comment col-md-12"><label for="comment" class="sr-only">' . esc_attr_x( '*Comment *', 'noun', 'start-blogging' ) . '</label> <textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true" required="required" placeholder="' . esc_attr__('*Comment', 'start-blogging') . '"></textarea></p></div>';

		$class_submit   = 'btn btn-default';
		$comment_form_args  = array(    
			'fields'  =>  apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field' =>  $comment_field,
			'class_submit'  =>  $class_submit   
		);
	?>
	
		<?php if ( comments_open() ) { 
        if ( get_option('comment_registration') && !is_user_logged_in() ) { ?>
            <p class="login-to-comment"><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'start-blogging'), wp_login_url( get_permalink() )); ?></p>
        <?php } else { 
            comment_form($comment_form_args); 
        } 
    } 
	?>
</div>