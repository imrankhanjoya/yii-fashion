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

get_header(); ?>



<?php if( is_active_sidebar( 'dt-header1' ) ) : ?>

    <div class="col-lg-12 col-md-12 col-sm-12 my_widget_text">

        <?php dynamic_sidebar( 'dt-header1' ); ?>
    </div><!-- .col-lg-3 -->

<?php endif; ?>







    <?php if ( get_theme_mod( 'featured_posts' ) != '' ) : ?>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">

                <div class="dt-featured-post-slider">
                    <div class="swiper-wrapper">

                        <?php
                        $dt_featured_posts      = esc_html( get_theme_mod( 'featured_posts_select' ) );
                        $featured_posts_count   = esc_html( get_theme_mod( 'featured_posts_count' ) );

                        if ( $dt_featured_posts == '' ) {
                            $dt_featured_posts = '';
                        }

                        $args = array(
                            'post_type'		 => 'post',
                            'posts_per_page' => $featured_posts_count,
                            'orderby' 		 => 'ASC',
                            'category__in'   => $dt_featured_posts
                        );

                        $dt_featured_posts = new WP_Query($args);

                        while ( $dt_featured_posts->have_posts() ) : $dt_featured_posts->the_post(); ?>

                            <div class="swiper-slide">
                                <div class="dt-featured-post">
                                    <figure>

                                        <?php

                                        if ( has_post_thumbnail() ) :

                                            the_post_thumbnail( 'pashmina-thum-featured-post-img' );

                                        else : ?>
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank.png" alt="<?php _e( 'no image found', 'pashmina' )?>"/>
                                        <?php endif; ?>

                                        <span class="transition5"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><i class="fa fa-mail-forward transition5"></i></a> </span>
                                    </figure>

                                    <div class="entry-footer">
                                        <h3><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                                        <span><?php esc_attr( the_date() ); ?></span>
                                    </div>
                                </div><!-- .dt-featured-post -->
                            </div><!-- .swiper-slide -->

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                        <div class="clearfix"></div>
                    </div><!-- .swiper-wrapper -->

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div><!-- .dt-featured-post-slider -->
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

    <?php else : ?>

    <div class="dt-slider-separator"></div>

    <?php endif; ?>






    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card front-henna-card" style="background:url('http://localhost:8080/p/deideo/wp-content/uploads/2018/06/henna_retouched.jpg'); background-repeat:no-repeat">
                    <div style="background:rgba(255,255,255, 0.8); padding:0% 2%; text-align: center">
                        <h2>Henna is all you need for your beauty</h2>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>

                        <p style="">Henna is one of the best hair beauty ingredients that India has shared with the rest of the world. Since years, if not centuries, women have used the power of this natural compound to strengthen, nourish and beautify their tresses. Back then, they would use the leaves of henna for hair treatment; the modern woman use henna powder for hair therapy.</p>

                    </div>
                    <input class="btn btn-knowmore" type="button" value="Know More">
                </div>
            </div>



            <div class="col-lg-4">
                <div class="card front-henna-card" style="background:url('https://d26h2j717chvn2.cloudfront.net/assets/first-tote-12c3cc22fd9faa1866d536d52a693f73.jpg'); background-repeat:no-repeat">
                    <div style="background:rgba(255,255,255, 0.8); padding:0% 2%; text-align: center">
                        <h2>Henna is all you need for your beauty</h2>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>


                    </div>
                    <input class="btn btn-knowmore" type="button" value="Know More">
                </div>
            </div>
        </div>
    </div>








    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <?php if ( have_posts() ) :

                    while ( have_posts() ) : the_post();
                        if ( 'page' == get_option( 'show_on_front' ) ) { ?>

                            <div class="dt-content-area">
                                <?php

                                get_template_part( 'template-parts/content', 'page' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                                ?>
                            </div>

                        <?php } else { ?>

                            <section <?php post_class( 'dt-front-posts-wrap' ); ?>>
                                <div class="dt-front-post">



                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <p>
                                            <figure>
                                                <?php  if ( has_post_thumbnail() ) :

                                                    the_post_thumbnail( 'pashmina-thum-featured-post-img' );

                                                else : ?>

                                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank.png" alt="no image found"/>

                                                <?php endif; ?>

                                                <span><a href="<?php esc_url( the_permalink() ); ?>" title="<?php esc_attr( the_title() ); ?>"><i class="fa fa-mail-forward transition5"></i></a> </span>
                                            </figure>
                                            </p>
                                        </div>


                                        <article class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="front-cat"> <?php $categories_list = get_the_category_list( esc_html__( ', ', 'pashmina' ) );
                                                if ( $categories_list && pashmina_categorized_blog() ) {
                                                    printf( $categories_list ); // WPCS: XSS OK.
                                                } ?></div>
                                            <header class="entry-header">
                                                <h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a></h2>
                                            </header><!-- .entry-header -->
                                            <div class="entry-meta">
                                                <span class="posted-on">Posted on <a href="http://localhost:8080/p/deideo/?p=1" rel="bookmark"><time class="entry-date published" datetime="<?php esc_html( the_time("F d, Y") ); ?>"><?php esc_html( the_time("F d, Y") ); ?></time><time class="updated" datetime="2018-06-10T10:55:09+00:00">June 10, 2018</time></a></span>
                                                <span class="byline"> by <span class="author vcard"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo esc_html( get_the_author() ) ?></a></span></span>

                                            </div>
                                            <div>
                                                <?php esc_html( the_excerpt() ); ?>
                                            </div>

                                            <footer class="entry-footer">
                                                <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php _e( 'CONTINUE READING', 'pashmina' ); ?></a>
                                            </footer><!-- .entry-footer -->
                                        </article>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </section>

                        <?php } ?>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                    <div class="clearfix"></div>

                    <div class="dt-pagination-nav">
                        <?php echo paginate_links(); ?>
                    </div><!---- .dt-pagination-nav ---->

                <?php else : ?>

                    <p><?php _e( 'Sorry, no posts matched your criteria.', 'pashmina' ); ?></p>

                <?php endif; ?>

            </div>

<!--            <aside class="col-lg-4 col-md-4">-->
<!--                <div class="dt-sidebar">-->
<!--                    < ? php //get_sidebar(); ? >-->
<!--                </div><!-- dt-sidebar -->
<!--            </aside><!-- .col-lg-4 -->
        </div>
    </div>

<?php
get_footer();
