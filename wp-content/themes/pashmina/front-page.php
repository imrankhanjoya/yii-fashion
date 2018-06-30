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
get_header();

?>



<?php if (is_active_sidebar('dt-header1')) : ?>

    <div class="col-lg-12 col-md-12 col-sm-12 my_widget_text">

        <?php dynamic_sidebar('dt-header1'); ?>
    </div><!-- .col-lg-3 -->

<?php endif; ?>







<?php if (get_theme_mod('featured_posts') != '') : ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="dt-featured-post-slider">
                    <div class="swiper-wrapper">

                        <?php
                        $dt_featured_posts = esc_html(get_theme_mod('featured_posts_select'));
                        $featured_posts_count = esc_html(get_theme_mod('featured_posts_count'));

                        if ($dt_featured_posts == '') {
                            $dt_featured_posts = '';
                        }

                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => $featured_posts_count,
                            'orderby' => 'ASC',
                            'category__in' => $dt_featured_posts
                        );

                        $dt_featured_posts = new WP_Query($args);

                        while ($dt_featured_posts->have_posts()) : $dt_featured_posts->the_post(); ?>

                            <div class="swiper-slide">
                                <div class="dt-featured-post">
                                <h3><a href="<?php esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>"><?php $title = get_the_title(); echo substr($title,0,100)  ?></a>
                                </h3>
                                </div>
                                <!-- .dt-featured-post -->
                            </div><!-- .swiper-slide -->

                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>

                        <div class="clearfix"></div>
                    </div>
                    <!-- .swiper-wrapper -->

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                <!-- .dt-featured-post-slider -->
            </div>
            <!-- .col-lg-12 -->
        </div>
        <!-- .row -->
    </div><!-- .container -->

<?php else : ?>

    <div class="dt-slider-separator"></div>

<?php endif; ?>






    <div class="container container_box">
        <div class="row">
            <div class="col-lg-8">
                <div class="card front-henna-card"
                     style="background:url('http://localhost:8080/p/deideo/wp-content/uploads/2018/06/henna_retouched.jpg'); background-repeat:no-repeat">
                    <div style="background:rgba(255,255,255, 0.8); padding:0% 2%; text-align: center">
                        <h2>Henna is all you need for your beauty</h2>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>

                        <p style="">Henna is one of the best hair beauty ingredients that India has shared with the rest
                            of the world. Since years, if not centuries, women have used the power of this natural
                            compound to strengthen, nourish and beautify their tresses. Back then, they would use the
                            leaves of henna for hair treatment; the modern woman use henna powder for hair therapy.</p>

                    </div>
                    <a class="btn a-btn-knowmore"  href="<?=fbloginurl()?>">Know More</a>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card front-henna-sub">
                    <img
                        src="http://localhost:8080/p/deideo/wp-content/uploads/2018/06/81XtrpOsnjL._SL1204_.jpg">

                    <div style=" padding:0% 2%; text-align: center; background-color: #fff">
                        <h3>Subscribe for Henna kit for hair in just ₹199 monthly</h3>

                        <a class="btn a-btn-knowmore"  value="Subscribe" href="https://amzn.to/2LMs0n9" target="_blank">Subscribe</a>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container container_box">
        <div class="row">
            <div class="col-lg-9">

                <div style=" padding:2%; text-align: center; background-color: #E8D7AB">
                    <h3>Join the Movement</h3>

                    <h3>Subscribe for Henna kit for hair in just $10 monthly</h3>
                    <p>Subscribe once & get automated delivery every month | Free Shipping</p>
                    <input class="btn btn-getfree"  value="Get it free">


                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div style=" padding:2%; text-align: center;">
                    <img style="height: 30px" src="http://localhost:8080/p/deideo/wp-content/uploads/2018/06/front-border.png">
                    <h3>Join the Movement</h3>

                    <h3>Subscribe for Henna kit for hair in just $10 monthly</h3>

                    <input class="btn btn-getfree" type="button" value="Get it free">


                </div>
            </div>
        </div>
    </div>



<?php
get_footer();
