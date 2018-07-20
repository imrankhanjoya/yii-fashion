<?php
   /**
    * The template for displaying all single posts.
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
    *
    * @package Pashmina
    */
   


   get_header(); 
   
$post = get_post();
?>
TOP SINGLE PRODUCT
<div class="col-md-12" style="padding: 0px;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="should-banner" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>);">
      <div class="should-ttl">
         <h1><?php the_title()?></h1>
         <h3><?PHP the_excerpt()?></h3>
         
      </div>
   </div>
   <div class="should-black-card">
    <?php the_content()?>
      
   </div>
</div>
<div class="container">
   <div class="row">


      <?php 
      $args = array( 'post_type' => 'product', 'posts_per_page' =>10 );
      $custom_query = new WP_Query($args);
      ?>

      
      
      <div class="col-lg-9 col-md-9 col-xs-12 col-sm-9">
         <?PHP $i=1; while($custom_query->have_posts()) : $custom_query->the_post(); 
         $val = get_post_meta(get_the_ID()); 
         //print_r($val);
         $price = $val['LowestNewPrice'][0]!=""?$val['LowestNewPrice'][0]:$val['ListPrice'][0];   
          ?>
         <div class="top-item">
            <div class="row">
               <div class="col-lg-3 col-sm-3 col-xs-12 text-center ">
                  <h1 class=""><b>TOP #<?=$i?></b></h1>
                  <img class="img-responsive visible-xs-inline visible-md-inline visible-lg-inline visible-sm-inline" src="<?=$val['LargeImage'][0]?>">
               </div>
               <div class="col-lg-9 col-sm-9 col-md-9">
                  <div class="row">
                     <div class="col-lg-10 col-md-10 col-sm-10">
                        <a href="<?php esc_url( the_permalink() ); ?>"><h3><?php the_title()?></h3></a>
                        <h5><?=$val['Brand'][0]?></h5>
                        <div class="btn-should-card">
                          <?php if ( function_exists( 'wfp_button' ) ) wfp_button(); ?>
                           <button class="" data-toggle="" data-target="">
                           <i class="fa fa-heart-o"></i> 
                           <span class="fav-text">Fav this</span>
                           </button>
                           <span class="fav-count">0</span> Favs
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
                        <button type="button" class="btn btn-dark">BUY</button>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>



         

               <?php $i++; endwhile;  ?>
               <?php wp_reset_postdata(); // reset the query ?>


      </div>




      <div class="col-lg-3 col-md-3 col-xs-12 col-sm-3 " style="margin-top: 60px;">
         <div class="social-icon-top">
            <h5>SHARE THIS LIST</h5>
            <a class="fb-share fa fa-facebook" href=""></a>
            <a class="fa fa-twitter" href=""></a>
            <a class="fa fa-pinterest-p" href=""></a>
            <a class="fa fa-envelope-o" href=""></a>
         </div>
         <div class="social-ttl-list">
          <h5>RECENT TOP 10</h5>
         <a href="">
            <h6>10 Products To Use For Beautiful, Defined Brows</h6>
         </a>
         <a href="">
            <h6>10 Products To Use For Beautiful, Defined Brows</h6>
         </a>
          <a href="">
            <h6>10 Products To Use For Beautiful, Defined Brows</h6>
         </a>
          <a href="">
            <h6>10 Products To Use For Beautiful, Defined Brows</h6>
         </a>
         </div>
      </div>
   </div>
</div>
<?php
get_footer();