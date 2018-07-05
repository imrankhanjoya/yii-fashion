<?php /* Template Name: ProductPage */ ?>
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
$user = wp_get_current_user();


get_header(); 

?>
<!-- <div class="col-md-12" style="background-color: #ccc; height:100px; margin-bottom:10px">
                &nbsp;
</div> -->

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
<div class="container media">
    <nav class="navbar">
        <div class="container-fluid panel-body">
          <div id="navbar" class="">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Mobile</a></li>
              <li><a href="#">Computers</a></li>
              <li><a href="#">Laptops</a></li>
               <li class="active"><a href="#">Tablets</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Computer Accessories</a></li>
             <!--  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li> -->
            </ul>
           
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

</div>


    <div class="container discussion-page">
        <div class="row">
            
            <?php 
            //$custom_query = new WP_Query('post_type="product"'); // exclude category 9
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'product', 'posts_per_page' =>40, 'paged' => $paged );
$custom_query = new WP_Query($args);
            ?>
            <?PHP while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <?PHP  get_template_part('template-parts/content-product','page'); ?>

            <?php endwhile; ?>

            <?php next_posts_link( '&larr; Older posts', $custom_query->max_num_pages); ?>
<?php previous_posts_link( 'Newer posts &rarr;' ); ?>

            <?php wp_reset_postdata(); // reset the query ?>

            
        </div>
    </div>

<?php
get_footer();
?>

