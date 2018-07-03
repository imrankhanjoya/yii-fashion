<?php
/**
 * Template Name: Full with Page
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

get_header('nomenu'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php
                        while ( have_posts() ) : the_post();?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                

                                <div class="entry-content">
                                <?php
                                the_content( sprintf(
                                /* translators: %s: Name of current post. */
                                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pashmina' ), array( 'span' => array( 'class' => array() ) ) ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                ) );

                                wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pashmina' ),
                                'after'  => '</div>',
                                ) );
                                ?>
                                </div><!-- .entry-content -->

                                
                                </article><!-- #post-## -->

                            

                        <?PHP endwhile; // End of the loop.
                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!-- .col-lg-8 -->
        </div><!-- .row -->
    </div><!-- .container -->

<?php
get_footer();
