<?php
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

  $data['title'] = 'Gloat Me Join the Movement Of Beauty Tips';
  $data['url'] = 'http://www.gloat.me/';
  $data['image'] = 'http://www.gloat.me/wp-content/uploads/2018/07/fb_meta.png';
  $data['width'] = 750;
  $data['height'] = 752;
  $data['description'] ="Welcome to the beauty tips and collection of best cosmetics. Get solutions to all your Beauty queries and stay up-to on the latest Beauty Trends. It's platform where we make opinion collectively on the bases of your reviews and favorite products";  
  echo generateMeta($data);  
        
}
add_action( 'wp_head', 'gloatme_header_metadata',0);

get_header();

$val = get_page_by_path('get-start');

if(!is_user_logged_in()){
  $starPage = getLoginPage();
}else{
  $starPage = "/discuss-beauty/";
}
?>
<?PHP

              $args = array('post_type' => 'contest','posts_per_page' =>1,'orderby' => 'ASC');
              $dt_featured_posts = new WP_Query($args);
              while ($dt_featured_posts->have_posts()) : 
                $dt_featured_posts->the_post(); 

            ?>
            <a  href="<?php esc_url( the_permalink() ); ?>">    
            <div class="container hidden-xs" style="width:100%; height:400px; background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>); background-position: center;
    background-size: cover;">
                
            </div>
            <div class="container hidden-md hidden-lg" style="width:100%; height:400px; background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>); background-position: center;
    background-size: cover;">
                
            </div>
            </a>
              <?PHP
              endwhile; 
              wp_reset_postdata(); 
              ?>
        
    

<!-- Contest -->


<!-- TOP ITEM LIST -->
<div class="container ">
    <div class="row">
            <br>
            <?PHP
            $args = array('post_type' => 'top_items','posts_per_page' =>2,'orderby' => 'ASC');
            $dt_featured_posts = new WP_Query($args);
            while ($dt_featured_posts->have_posts()) : $dt_featured_posts->the_post();
            ?>
                <div class="col-md-6">
                <a class="top-banners"  style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>);" href="<?php esc_url( the_permalink() ); ?>">
                <div class="top-blck-bacgrnd"></div>
                <p><?php the_title(); ?></p>
                </a>
                </div>
            <?PHP endwhile; wp_reset_postdata(); ?>
    </div>
</div>
<!-- TOP ITEM LIST END -->
    <!-- home pages -->
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
                <div style=" padding:2%; text-align: center; background-color: #E8D7AB;    margin-bottom: 30px;">
                    <h1>Gloat Me Join the Movement Of Beauty Tips</h1>

                    <p>Welcome to the beauty tips and collection of best cosmetics. Get solutions to all your Beauty queries and stay up-to on the latest Beauty Trends. It's platform where we make opinion collectively on the bases of your reviews and favorite products </p>
                    <a href="<?=$starPage?>" class="btn btn-getfree">Lets Start</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <a href="http://gloat.me/tag/loreal/" class="home-banner-two" style="background-image: url('http://gloat.me/wp-content/uploads/2018/07/LorealParisDK0213136586v2Logo.jpg');">
                </a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <a href="<?=$starPage?>" class="home-banner-img" style="background-image: url('http://www.gloat.me/wp-content/uploads/2018/07/Adobe_Post_20180727_170459.jpg');">
                </a>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                <a href="http://gloat.me/tag/lakme/" class="home-banner-img" style="background-image: url(http://gloat.me/wp-content/uploads/2018/07/lakme.png);" >
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                <a class="home-banner-img" style="background-image: url(http://www.gloat.me/wp-content/uploads/2018/07/Adobe_Post_20180727_172640.jpg); background-size:cover;" href="http://gloat.me/shop/">
                </a>
            </div>
        </div>

        <div class="row media">
            <div class="col-lg-12 text-center ">
                <img class="" style="height: 30px" src="http://gloat.me/wp-content/uploads/2018/07/front-border.png">

                <h3>Latest Reviews On Cosmetics</h3>
            </div>
            

            <?php $args = array(
                        'post_type' => 'product',
                        'comment_approved'=>1,
                        'number'=>3, 
                        'comment_status'=>1 
                     );
                  $comments = get_comments($args);
                  $commentcount = count($comments); 


            foreach ($comments as $key => $comment) {
                           $ago = human_time_diff(strtotime($comment->comment_date));
                           //$useravatar = get_avatar($comment->user_id); 
                           ?>
                           
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="panel-default panel-body panel">
                              <div class="media">
                                 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
                                    <?= get_avatar($comment->user_id)?>
                                 </div>
                                 <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
                                    <p class="commnt-time-dtl small">By <b class="text-info"><?=$comment->comment_author?></b>
                                    </p>
                                    
                                    <p class="text-muted small"><a href="<?php echo get_permalink($comment->comment_post_ID); ?>#comment-<?php echo $comment->comment_ID; ?>" ><?=$comment->comment_content?></a></p>
                                    <i class="fa fa-clock-o commnt-time-dtl"><span class=""> <?=$ago?> ago</span></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php  } ?>


        </div>

    </div>
    <!-- end home pages -->

    


<?php
get_footer();
