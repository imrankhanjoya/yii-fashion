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
    <div class="container">
        <div class="row">
            <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'product','cat'=>4, 'posts_per_page' =>40, 'paged' => $paged );
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

<?php
get_footer();
?>

