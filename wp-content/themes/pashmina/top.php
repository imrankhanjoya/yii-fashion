<?php /* Template Name: TopPages */ ?>
<?php
if(!session_id()) {
    session_start();
}
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */
?>

<?PHP



get_header(); 

global $query_string;
$cat = $GLOBALS['wp_query']->query['cat'];
?>
<div class="col-md-12">
<div class="row">
    <div class="col-lg-6 text-center top-ttl"  style="background-color:#92FFD8">
        <a href="" class="top-ttl-heddng">
        <h1>GloatMe's Pick</h1>
        <p>Here are the best products that will make you look & feel good!</p>
        </a>
    </div>
      <div class="col-lg-6 text-center top-ttl" style="background-color:#FFDFCA">
        <a href="" class="top-ttl-heddng">
        <h1>top 10</h1>
        <p>view most recommended</p>
        </a>
    </div>
</div>
</div>
    <div class="container">
        <div class="row">
<!-- html farukh -->
<div class="col-lg-12 text-center panel-body">
    <h1 class="hidden-xs"><b>Editor's Pick</b></h1>
    <h3>Here are the best products that will make you look & feel good!</h3>
</div>
<?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'top_items', 'posts_per_page' =>40, 'paged' => $paged );
$custom_query = new WP_Query($args);
            ?>
            <?PHP while($custom_query->have_posts()) : $custom_query->the_post(); ?>




<div class="col-md-6">
    <a class="top-banners"  style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>);" href="<?php esc_url( the_permalink() ); ?>">
       <div class="top-blck-bacgrnd"></div>
        <p><?php the_title(); ?></p>
    </a>
</div>
 <?php endwhile; ?>
<div class="col-md-6">
   <a href="" class="top-banners" style="background-image: url(http://d1acy2vp0zxghs.cloudfront.net/featured_categories/images/000/000/109/original/w58.jpg?1486540459);">
      <div class="top-blck-bacgrnd"></div>
      <p>Brown shades will never look out of style</p>
  </a>
 </div>
 <div class="col-md-6">
   <a href="" class="top-banners" style="background-image: url(http://d1acy2vp0zxghs.cloudfront.net/featured_categories/images/000/000/109/original/w58.jpg?1486540459);">
      <div class="top-blck-bacgrnd"></div>
      <p>Brown shades will never look out of style</p>
  </a>
 </div>
 <div class="col-md-6">
   <a href="" class="top-banners" style="background-image: url(http://d1acy2vp0zxghs.cloudfront.net/featured_categories/images/000/000/109/original/w58.jpg?1486540459);">
      <div class="top-blck-bacgrnd"></div>
      <p>Brown shades will never look out of style</p>
  </a>
 </div>
 <div class="col-md-6">
   <a href="" class="top-banners" style="background-image: url(http://d1acy2vp0zxghs.cloudfront.net/featured_categories/images/000/000/109/original/w58.jpg?1486540459);">
      <div class="top-blck-bacgrnd"></div>
      <p>Brown shades will never look out of style</p>
  </a>
 </div>
 <div class="col-md-6">
   <a href="" class="top-banners" style="background-image: url(http://d1acy2vp0zxghs.cloudfront.net/featured_categories/images/000/000/109/original/w58.jpg?1486540459);">
      <div class="top-blck-bacgrnd"></div>
      <p>Brown shades will never look out of style</p>
  </a>
 </div>
 <div class="col-lg-12">
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
 </div>
<!-- end html farukh -->



            
            
            <?PHP //while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <?PHP // get_template_part('template-parts/content-top_item','page'); ?>

            <?php //endwhile; ?>

            <?php //next_posts_link( '&larr; Older posts', $custom_query->max_num_pages); ?>
<?php //previous_posts_link( 'Newer posts &rarr;' ); ?>

            <?php //wp_reset_postdata(); // reset the query ?>

         </div>   
    </div>
<?php
get_footer();
?>

