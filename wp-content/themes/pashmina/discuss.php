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

$user = wp_get_current_user();

if($user->ID){
  $askQuestion = "askquersion";
}else{
  $askQuestion = getLoginPage();
}
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
                      <div class="row">
                          <div class="col-md-12 text-center" >
                            <img src="http://www.gloat.me/wp-content/uploads/2018/08/My-Post.jpg" class="img-responsive" />
                          </div>
                      </div>
                      <!--RECENT TOP DISCUSSION-->
                      <div class="col-lg-12 pd-0">
                      <h5>RECENT TOP DISCUSSION</h5>
                      <?php
                      $args = array( 'post_type' => 'discuss', 'posts_per_page' =>10, 'paged' => 1,'orderby'=>'comment_count' );
                      $custom_query = new WP_Query($args);
                      ?>
                      <?PHP while($custom_query->have_posts()) : $custom_query->the_post(); ?>
                      <a href="">
                      <a href="<?php esc_url( the_permalink() ); ?>"><h6 class="entry-title"><?php the_title(); ?></h6></a>
                      </a>
                      <?PHP endwhile;?>
                      <?php $custom_query->reset_postdata(); // reset the query ?>
                      </div>
                      <!--END OF RECENT TOP DISCUSSION-->

                      <!--Unanswered Talks-->
                      <div class="col-lg-12 pd-0">
                      <h5>Unanswered Talks</h5>
                      <h6 class="p-style">Discussions with no comments. be first to to post comment.</h6>
                      <?php

                      $args = array( 'post_type' => 'discuss','comment_count'=>0, 'posts_per_page' =>10, 'paged' => 1 );
                      $custom_query = new WP_Query($args);
                      ?>
                      <?PHP while($custom_query->have_posts()) : $custom_query->the_post(); ?>
                      
                      <a href="<?php esc_url( the_permalink() ); ?>"><h6 class="entry-title"><?php the_title(); ?></h6></a>
                      
                      <?PHP endwhile;?>
                      <?php $custom_query->reset_postdata(); // reset the query ?>
                      </div>
                      <!--END Unanswered Talks-->

                      <div class="row">

                          <div class="col-lg-12" style="margin-top:20px">
                          
                          <?php

                          global $wpdb;
                          $sql = "select post_author from $wpdb->posts as posts 
                            where post_type = 'discuss' and post_status ='publish' group by post_author";
                          $results = $wpdb->get_results( $sql, ARRAY_A );
                            foreach($results as $row){
                              echo "<div style='width:40px'>";
                              echo "<a href='".get_author_posts_url($row['post_author'])."'>";
                              echo get_avatar($row['post_author']);
                              echo "</a>";
                              echo "</div>";
                            }
                          ?>
                          <h6 class="p-style">Users who have posted recently.</h6>                          
                          </div> 
                      </div>
                      
            </div>
            
            
        </div>
    </div>
















<?php
get_footer();
?>

