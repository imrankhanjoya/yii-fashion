<?php /* Template Name: TopPages */ ?>
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
?>

<?PHP



get_header(); 

global $query_string;
$cat = $GLOBALS['wp_query']->query['cat'];
?>
<div class="col-md-12">
<div class="row">
    <div class="col-lg-6 text-center top-ttl panel-body" style="background-color:#92FFD8">
        <a href="/gloat-me-pick/" class="top-ttl-heddng">
        <span>GloatMe's Pick</span>
        <h4>Here are the best products that will make you look &amp; feel good!</h4>
        </a>
    </div>
      <div class="col-lg-6 text-center top-ttl panel-body" style="background-color:#FFDFCA">
        <a href="/top-recommended/" class="top-ttl-heddng">
        <span>top 10</span>
        <h4>view most recommended</h4>
        </a>
    </div>
</div>
</div>
    <div class="container">
        <div class="row">
<!-- html farukh -->
<div class="col-lg-12 text-center panel-body">
    <h1 class="hidden-xs"><b>Editor's Pick</b></h1>
    <h3>Here are the best products that will make you look & feel good!</h3>
</div>
<?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'top_items', 'posts_per_page' =>40, 'paged' => $paged );
$custom_query = new WP_Query($args);
            ?>
            <?PHP while($custom_query->have_posts()) : $custom_query->the_post(); ?>




<div class="col-md-6">
    <a class="top-banners"  style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID())?>);" href="<?php esc_url( the_permalink() ); ?>">
       <div class="top-blck-bacgrnd"></div>
        <p><?php the_title(); ?></p>
    </a>
</div>
 <?php endwhile; ?>

<?php next_posts_link( '&larr; Older posts', $custom_query->max_num_pages); ?>
<?php previous_posts_link( 'Newer posts &rarr;' ); ?>
 
<!-- end html farukh -->



            
            
            <?PHP //while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <?PHP // get_template_part('template-parts/content-top_item','page'); ?>

            <?php //endwhile; ?>

            <?php //next_posts_link( '&larr; Older posts', $custom_query->max_num_pages); ?>
<?php //previous_posts_link( 'Newer posts &rarr;' ); ?>

            <?php //wp_reset_postdata(); // reset the query ?>

         </div>   
    </div>
<?php
get_footer();
?>

