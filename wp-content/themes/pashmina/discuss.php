<?php /* Template Name: DiscussPage */ 
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

function gloatme_header_metadata() {

  
  $data['title'] = "Discussion related to beauty";
  $data['url'] = "http://www.gloat.me/discuss-beauty-tips/";
  $data['image'] = "http://www.gloat.me/wp-content/uploads/2018/07/discuss.jpg";
  $data['width'] = 964;
  $data['height'] = 720;
  $data['description'] = "Discussion related to products and beauty tips.";
  echo generateMeta($data);  
        
}
add_action( 'wp_head', 'gloatme_header_metadata',0);


$user = wp_get_current_user();


get_header(); 

?>
<div class="col-lg-12" style="padding:0px;">
<img src='<?= get_the_post_thumbnail_url(get_the_ID())?>' class="img-responsive">
</div>


    <div class="container discussion-page">
        <div class="row">
            <div class="col-lg-9 col-md-9">
              <?php $custom_query = new WP_Query('post_type="discuss"'); // exclude category 9
            while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <?PHP  get_template_part('template-parts/content-discuss','page'); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); // reset the query ?>
            </div>
            <div class="col-lg-3">
      <div class="col-lg-12 pd-0">
        <h5><b>Top Contributors</b></h5>
        <p class="p-style">Peple who started the most discussions on Talks.</p>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>Pawet Kadysz<i class=" icon-type fa fa-comment-o"></i></b>103</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>agnieszka bladzik<i class=" icon-type fa fa-comment-o"></i></b>84</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>lan prince<i class=" icon-type fa fa-comment-o"></i></b>79</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>noun <i class=" icon-type fa fa-comment-o"></i></b>76</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>maciej korsan<i class=" icon-type fa fa-comment-o"></i></b>72</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>tigg<i class=" icon-type fa fa-comment-o"></i></b>69</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>Ron dadoo<i class=" icon-type fa fa-comment-o"></i></b>42</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>Artor tobocki<i class=" icon-type fa fa-comment-o"></i></b>32</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class="h6-type"><b>mariusz rzapkowski<i class=" icon-type fa fa-comment-o"></i></b>24</h6>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2 pd-0">
           <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
        </div>
        <div class="col-lg-10 pd-0">
          <h6 class=""><b>michat kulesza<i class=" icon-type fa fa-comment-o"></i></b>12</h6>
        </div>
      </div>
      <div class="col-lg-12 pd-0">
        <h5><b>Unanswered Talks</b></h5>
        <h6 class="p-style">Discussions with no comments. be first to to post comment.</h6>
      </div>
      <div class="row">
          <div class="col-lg-2 pd-0">
             <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
          </div>
          <div class="col-lg-10 pd-0">
            <h6 class=""><b>ponzu </b><span class="p-style"> posted</span></h6>
          </div>
          <div class="col-lg-12">
            <h6 class="p-style">I’ve never use sunscreen & only rely on my foundation SPF which I know is not good for skin. </h6>
          </div>
          <div class="col-lg-12">
            <p class=""><i class="icon-type fa fa-comment-o"></i> 0 Comments</p>
          </div> 
        </div>
        <div class="row">
          <div class="col-lg-2 pd-0">
             <img class="img-responsive user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWbbZHtGYKzepy6xsRyy1ZX9x2wLe_Qbq7s9-49slCtLCmdcFs">
          </div>
          <div class="col-lg-10 pd-0">
            <h6 class=""><b>ponzu </b><span class="p-style"> posted</span></h6>
          </div>
          <div class="col-lg-12">
            <h6 class="p-style">I know is not good for skin. </h6>
          </div> 
        </div>
      </div>
            
            
        </div>
    </div>
















<?php
get_footer();
?>

