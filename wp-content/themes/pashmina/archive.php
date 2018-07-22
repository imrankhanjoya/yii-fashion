<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

get_header(); 
 $queried_object = get_queried_object();
 if($queried_object->taxonomy=='category'){
 	$findIn = "category_name";
 }else{
 	$findIn = "tag";
 }
 $findKey = $queried_object->slug;

$cat = single_cat_title(null,false);

$brands = isset($site['brands'])?$site['brands']:"";
?>
<?php
include( "product_filter.php");
?>



	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				 <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'product',$findIn=>$findKey, 'posts_per_page' =>40, 'paged' => $paged );
$custom_query = new WP_Query($args);
            ?>
			<?php if ( $custom_query->have_posts() ) : ?>

				<header class="page-header">
					<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

				                <?PHP  get_template_part('template-parts/content-product','page'); ?>


				<?php endwhile; ?>

				<div class="clearfix"></div>

				<div class="dt-pagination-nav">
					<?php echo paginate_links(); ?>
				</div><!---- .dt-pagination-nav ---->

			<?php else : ?>

				<p><?php _e( 'Sorry :(, no posts matched your criteria.', 'pashmina' ); ?></p>

			<?php endif; ?>

			</div>

			
		</div>
	</div>

<?php
get_footer();
