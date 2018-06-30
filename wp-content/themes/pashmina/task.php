<?php /* Template Name: TaskPage */ ?>
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
<div class="col-md-12" style="background-color: #ccc; height:100px; margin-bottom:10px">
                &nbsp;
</div>
    <div class="container discussion-page">
        <div class="row">
            
            <?php $custom_query = new WP_Query('post_type="product"'); // exclude category 9
            while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <?PHP  get_template_part('template-parts/content-product','page'); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); // reset the query ?>
            
            
        </div>
    </div>

<?php
get_footer();
?>

