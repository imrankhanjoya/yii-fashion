<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Pashmina
*/
   
function gloatme_header_metadata() {
  $data['title'] = get_the_title();
  $data['description'] = get_the_excerpt();  
  echo generateMeta($data);          
}
add_action( 'wp_head', 'gloatme_header_metadata',0);

get_header(); 
   
$post = get_post();
$url = get_permalink();
$title = get_the_title();
$tags = get_the_tags();

$tag_name = $tags[0]->name;
?>
<div class="col-md-12" style="padding: 0px;">
   <div class="should-banner" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>);">
      <div class="should-ttl">
         <h1><?php the_title()?></h1>
         <h3><?PHP the_excerpt()?></h3>
      </div>
   </div>
   <div class="should-black-card">
      <p><?=$post->post_content?></p>
   </div>
</div>
<div class="container">
   <div class="row">
      <?php 
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array( 'post_type' => 'product','tag'=>$tag_name, 'posts_per_page' =>10, 'paged' => $paged );
      $custom_query = new WP_Query($args);
      ?>

      <div class="col-lg-8 col-md-8 col-xs-12 col-sm-8">
         <?PHP $i=1; while($custom_query->have_posts()) : $custom_query->the_post(); 
         $val = get_post_meta(get_the_ID()); 
         //print_r($val);
         $price = $val['LowestNewPrice'][0]!=""?$val['LowestNewPrice'][0]:$val['ListPrice'][0];   
          ?>
         <div class="top-item">
            <div class="row">
               <div class="col-lg-3 col-sm-3 col-xs-12 text-center ">
                  <h1 class="topclass"><b>TOP #<?=$i?></b></h1>
                  <img class="img-responsive prodct-crd-img visible-xs-inline visible-md-inline visible-lg-inline visible-sm-inline" src="<?=$val['LargeImage'][0]?>">
               </div>
               <div class="col-lg-9 col-sm-9 col-md-9">
                  <div class="row">
                     <div class="col-lg-10 col-md-10 col-sm-10">
                        <a href="<?php esc_url( the_permalink() ); ?>"><h3><?php the_title()?></h3></a>
                        <h5><?=$val['Brand'][0]?></h5>
                        <div class="btn-should-card">
                           <?php if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
                       
                           
                           &nbsp;&nbsp;&nbsp;
                           <i class="fa fa-comment"></i> <?=get_comments_number(get_the_ID())?> Reviews
                        </div>
                     </div>
                     <div class="col-md-2 col-xs-12 col-md-2 col-sm-2 text-center" style="padding: 0px;">
                        <div class="icon-product"></div>
                        <h6><b>Seller Rank</b> (<?=$val['SalesRank'][0]?>)</h6>
                     </div>
                     <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 product-ttl-p">
                        <?php the_content()?>
                     </div>
                     <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6 btn-should-card">
                        <span>Lowest price from</span>
                        <h3 class="price-dtl"><?=$price?></h3>
                     </div>
                     <div class="col-xs-12 col-lg-6 col-sm-6 col-md-6 text-right">
                        <a href="<?php esc_url( the_permalink() ); ?>">
                        <button type="button" class="btn btn-link">READ REVIEWS</button>
                        </a>
                        <a  target="_blank" href="<?=$val['DetailPageURL'][0]?>">
                        <button type="button" class="btn btn-danger buy-bttn-prodct">BUY</button>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-12 text-center">
            <div class="" style="border:1px solid #d0d0d0"></div>
            <div class="text-center" style="border:1px solid #dadada;width: 70%;margin-top:2px;margin-left: 15%;"></div>
         </div>
               <?php $i++; endwhile; ?>
               <?php wp_reset_postdata(); // reset the query ?>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 " style="margin-top: 60px;">
         <div class="social-icon-top">
            <h5>SHARE THIS LIST</h5>
            
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($url)?>&t=<?=urlencode($title)?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
   target="_blank" title="Share on Facebook" class="fb-share fa fa-facebook" href=""></a>
            <a href="https://twitter.com/share?url=<?=urlencode($url)?>&via=gloatme&text=<?=urlencode($title)?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
   target="_blank" title="Share on Twitter" class="fa fa-twitter" href=""></a>
            <a href="https://plus.google.com/share?url=<?=urlencode($url)?>"
   onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=350,width=480');return false;"
   target="_blank" title="Share on Google+" class="fa fa-google-plus" href=""></a>
            <a class="fa fa-envelope-o" href=""></a>
         </div>
         <div class="social-ttl-list">
          <h5>RECENT TOP COLLECTION</h5>
          <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'top_items', 'posts_per_page' =>10, 'paged' => $paged );
$custom_query = new WP_Query($args);
            ?>
            <?PHP while($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <a href="">
            <a href="<?php esc_url( the_permalink() ); ?>"><h6 class="entry-title"><?php the_title(); ?></h6></a>
            </a>
            <?PHP endwhile;?>
         
         
         </div>


          <?php get_sidebar(); ?>
      </div>

     </div>
   </div>

  
<?php
get_footer();