<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */

get_header('nomenu'); 

$post_ID = get_the_ID();
$post = get_post();  

?>




	<div class="container">
		<div class="row">
			
						<?=$post->post_content?>			
			
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
