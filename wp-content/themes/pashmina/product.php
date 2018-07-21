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


function gloatme_header_metadata() {

  $data['title'] = 'Cosmetic Product listing';
  $data['url'] = "http://www.gloat.me/product/";
  $data['image'] = "http://www.gloat.me/wp-content/uploads/2018/07/gloatmeproducts.png";
  $data['width'] = 600;
  $data['height'] = 600;
  $data['description'] ="Listing of best cosmetic products on the bases of seller ranking and comments.";  
  echo generateMeta($data);  
        
}
add_action( 'wp_head', 'gloatme_header_metadata',0);


$user = wp_get_current_user();


get_header(); 
$brands = isset($site['brands'])?$site['brands']:"";
?>
<!-- <div class="col-md-12" style="background-color: #ccc; height:100px; margin-bottom:10px">
                &nbsp;
</div> -->

<div class="col-md-12">
<div class="row product_cat">
    <div class="col-lg-2 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="/tag/lip/" class="top-ttl-heddng">
        <span>LIPSTICK</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/lipstick.svg">
        </a>
    </div>
      <div class="col-lg-2 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="/tag/eye/" class="top-ttl-heddng">
        <span>Eyes</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/eye-shadow.svg">
        </a>
    </div>
    <div class="col-lg-2 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="/tag/nail/" class="top-ttl-heddng">
        <span>Nail-Polish</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/nail-polish.svg">
        
        </a>
    </div>
    <div class="col-lg-2 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="/tag/hair/" class="top-ttl-heddng">
        <span>hair</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/woman-with-long-hair.svg">
        </a>
    </div>
    <div class="col-lg-2 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="/tag/skin/" class="top-ttl-heddng">
        <span>facial</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/facial-treatment.svg">
        </a>
    </div>
    <div class="col-lg-2 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="/tag/cream/" class="top-ttl-heddng">
        <span>cream</span>
        <img class="picon" src="<?= get_template_directory_uri();?>/images/cream.svg">
        </a>
    </div>
    

</div>
</div>
<div style="clear:both"></div>
    
    <nav class="navbar">
  <div class="container-fluid">
    <div id="navbar" class="product-dtl-list">
      <ul class="nav navbar-nav">
        <?php foreach($brands as $key=>$val): $cID = get_cat_ID($key); $key==$findKey?$class='active':$class='';  ?>
        <li ><a  class="<?=$class?>" href="<?php echo esc_url( get_category_link($cID) ); ?>"><?=esc_html($val)?></a></li>
        <?PHP endforeach;?>
      </ul>
     
    </div>
  </div>
</nav>



    <div class="container discussion-page">
        <div class="row">
            
            <?php 
            //$custom_query = new WP_Query('post_type="product"'); // exclude category 9
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'product', 'posts_per_page' =>40, 'paged' => $paged,"meta_key"=>"SalesRank","orderby"=>"meta_value_num","order"=>"DESC" );
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


</div>

<?php
get_footer();
?>

