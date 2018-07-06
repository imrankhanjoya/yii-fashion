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
<div style="clear:both"></div>
    <nav class="navbar">
        <div class="container-fluid">
          <div id="navbar" class="product-dtl-list">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Mobile</a></li>
              <li><a href="#">Computers</a></li>
              <li><a href="#">Laptops</a></li>
               <li class="active"><a href="#">Tablets</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Computer Accessories</a></li>
            </ul>
           
          </div>
        </div>
      </nav>



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

<!-- 6/7/2018 -->
<div class="container">
   <div class="row">
    
     <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
     <div class="panel panel-body"  style="background-color: #fde8e7;">
     <h3><strong>Welcome love!</strong></h3>
     <p class="small">
    We built Favful so that together we could provide transparency and empowerment in beauty for each other.  Here your insights and contributions on beauty products will mean everything to someone else’s next purchase.
     </p>
     <p class="small">Here we show you support and love with beauty sponsors, giveaways, community deals and honest stories.</p>
     <p class="small">Let’s have fun! XO.</p>
    </div>

     <h3>Latest Reviews</h3>


      <div class="table-bordered panel-body media">
           <span class="text-muted small"><b>Unique and it works!</b></span>
           <p class="text-muted small">I was rather skeptical when I first received the soap from a friend who got it from Korea...</p>
            <i class="fa fa-clock-o commnt-time-dtl"><span class=""> 1 day ago</span></i>
      </div>
      <div class="media panel-group">
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
      <img class="img-responsive img-circle" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815">
      </div>
      <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
      <p class="commnt-time-dtl small">By <b>Emily</b><br>
     Combination skin, Olive, 25-35</p>
     </div>
    </div>


      <div class="table-bordered panel-body media">
        <span class="text-muted small"><b>Unique and it works!</b></span>
      <p class="text-muted small">I was rather skeptical when I first received the soap from a friend who got it from Korea...</p>
      <i class="fa fa-clock-o commnt-time-dtl"><span class=""> 1 day ago</span></i>
      </div>
      <div class="media panel-group">
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
      <img class="img-responsive img-circle" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815">
      </div>
      <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
      <p class="commnt-time-dtl small">By <b>Emily</b><br>
     Combination skin, Olive, 25-35</p>
     </div>
    </div>


      <div class="table-bordered panel-body media">
           <span class="text-muted small"><b>Unique and it works!</b></span>
           <p class="text-muted small">I was rather skeptical when I first received the soap from a friend who got it from Korea...</p>
            <i class="fa fa-clock-o commnt-time-dtl"><span class=""> 1 day ago</span></i>
      </div>
      <div class="media panel-group">
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
      <img class="img-responsive img-circle" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815">
      </div>
      <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
      <p class="commnt-time-dtl small">By <b>Emily</b><br>
     Combination skin, Olive, 25-35</p>
     </div>
    </div>
   </div>
  </div>
</div>

<?php
get_footer();
?>

