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
  $data['image'] = "http://www.gloat.me/wp-content/uploads/2018/07/gloatmediscuss.png";
  $data['width'] = 964;
  $data['height'] = 720;
  $data['description'] = "Discussion related to products and beauty tips.";
  echo generateMeta($data);  
        
}
add_action( 'wp_head', 'gloatme_header_metadata',0);


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
















<?php
get_footer();
?>

