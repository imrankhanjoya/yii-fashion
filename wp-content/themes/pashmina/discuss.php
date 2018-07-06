<?php /* Template Name: DiscussPage */ ?>
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
<div class="col-lg-12" style="padding: 0px;">
<div class="chat-banner-img"></div>

</div>
<br>
&nbsp;

    <div class="container discussion-page">
        <div class="row">
            
            <?php $custom_query = new WP_Query('post_type="discuss"'); // exclude category 9
            while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <?PHP  get_template_part('template-parts/content-discuss','page'); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); // reset the query ?>
            
        </div>
    </div>







<!-- home pages -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><a class="home-banner-img" style="background-image: url(http://graphicgoogle.com/wp-content/uploads/2017/10/Facebook-New-Fashion-Sale-Banner.jpg);" href="">
    </a>
  </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a class="home-banner-img" style="background-image: url(http://gloat.me/wp-content/uploads/2018/07/beautiful-girl-9-1365886.jpg);" href="">
    </a>
  </div>

<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
  <div style=" padding:2%; text-align: center; background-color: #E8D7AB;    margin-bottom: 30px;">
                    <h3>Gloat Me Join the Movement</h3>
                    <p>We assembled GloatMe with the goal that together we could give straightforwardness and strengthening in excellence for each other. Here your experiences and commitments on magnificence items will mean the world to another person's next buy.</p>
                    <a href="" class="btn btn-getfree">Get it free</a>
   </div>
</div> 

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"><a class="home-banner-two" style="background-image: url(https://cdn5.f-cdn.com/contestentries/985367/20576522/58ed4d048f118_thumb900.jpg);" href="">
    </a>
  </div>
     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><a class="home-banner-img" style="background-image: url(https://ohio4h.org/sites/ohio4h/files/styles/basic_page_banner/public/State%20Fashion%20Board%20Banner2.jpg?itok=tPIUJUni);" href="">
    </a>
  </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><a class="home-banner-img" style="background-image: url(https://cdn5.f-cdn.com/contestentries/985367/20576522/58ed4d048f118_thumb900.jpg);" href="">
    </a>
  </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><a class="home-banner-img" style="background-image: url(http://gloat.me/wp-content/uploads/2018/07/beautiful-girl-9-1365886.jpg);" href="">
    </a>
  </div>
  </div>
  <div class="row media">
    <div class="col-lg-12 text-center ">
    <img class="" style="height: 30px" src="http://gloat.me/wp-content/uploads/2018/07/front-border.png">
    <h3>Latest Reviews</h3>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 media">
    <div class="panel-default panel-body panel">
      <div class="media">
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
      <img class="img-responsive img-circle" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815">
      </div>
      <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
      <p class="commnt-time-dtl small">By <b class="text-info">Emily</b><br>
     Combination skin, Olive, 25-35</p>
       <span class="text-muted small"><b>Unique and it works!</b></span>
      <p class="text-muted small">I was rather skeptical when I first received the soap from a friend who got it from Korea...</p>
        <i class="fa fa-clock-o commnt-time-dtl"><span class=""> 1 day ago</span></i>
     </div>
    </div>
    </div>
  </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 media">
    <div class="panel-default panel-body panel">
      <div class="media">
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
      <img class="img-responsive img-circle" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815">
      </div>
      <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
      <p class="commnt-time-dtl small">By <b class="text-info">Emily</b><br>
     Combination skin, Olive, 25-35</p>
       <span class="text-muted small"><b>Unique and it works!</b></span>
      <p class="text-muted small">I was rather skeptical when I first received the soap from a friend who got it from Korea...</p>
        <i class="fa fa-clock-o commnt-time-dtl"><span class=""> 1 day ago</span></i>
     </div>
    </div>
    </div>
  </div>

    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 media">
    <div class="panel-default panel-body panel">
      <div class="media">
      <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
      <img class="img-responsive img-circle" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815">
      </div>
      <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
      <p class="commnt-time-dtl small">By <b class="text-info">Emily</b><br>
     Combination skin, Olive, 25-35</p>
       <span class="text-muted small"><b>Unique and it works!</b></span>
      <p class="text-muted small">I was rather skeptical when I first received the soap from a friend who got it from Korea...</p>
        <i class="fa fa-clock-o commnt-time-dtl"><span class=""> 1 day ago</span></i>
     </div>
    </div>
    </div>
  </div>
  </div>

</div>
<!-- end home pages -->









<?php
get_footer();
?>

