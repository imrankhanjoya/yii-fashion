<?php
/**
 * The template for displaying WooCommerce
 *
 * @package ClubHair
 */

get_header(); ?>

<section class="content content-woocommerce">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<?php woocommerce_content(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
