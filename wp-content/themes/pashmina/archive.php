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

$cat = single_cat_title(null,false);

$brands = isset($site['brands'])?$site['brands']:"";
?>
<div class="col-md-12">
<div class="row">
    <div class="col-lg-6 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="" class="top-ttl-heddng">
        <span>GloatMe's Pick</span>
        <h4>Here are the best products that will make you look &amp; feel good!</h4>
        </a>
    </div>
      <div class="col-lg-6 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="" class="top-ttl-heddng">
        <span>top 10</span>
        <h4>view most recommended</h4>
        </a>
    </div>
</div>
</div>
<div style="clear:both"></div>
<nav class="navbar">
  <div class="container-fluid">
    <div id="navbar" class="product-dtl-list">
      <ul class="nav navbar-nav">
        <?php foreach($brands as $key=>$val): $cID = get_cat_ID($val);?>
        <li class="active"><a href="<?php echo esc_url( get_category_link($cID) ); ?>"><?=$val?></a></li>
        <?PHP endforeach;?>
      </ul>
     
    </div>
  </div>
</nav>



	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				 <?php 
            //$custom_query = new WP_Query('post_type="product"'); // exclude category 9
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'product',$findIn=>$queried_object->slug, 'posts_per_page' =>40, 'paged' => $paged );
$custom_query = new WP_Query($args);
            ?>
			<?php if ( $custom_query->have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
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
