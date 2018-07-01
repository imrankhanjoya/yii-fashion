<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

get_header(); ?>
<?PHP

$userid = $_GET['author'];
$size = 'thumbnail';

$all_meta_for_user = get_user_meta( $userid );
$imgURL = $all_meta_for_user['cupp_upload_meta'][0];

//print_r($all_meta_for_user);
$name = $all_meta_for_user['nickname'][0];
$eye = $all_meta_for_user['eye'][0];
if($eye!=""){
    $eye = $eye." eyes with ";
}
$skin = $all_meta_for_user['skin'][0];
if($skin!=""){
    $skin = " skin color ".$skin;
}
$brands = $all_meta_for_user['brands'];
if(!empty($brands)){
    $brands = "Fan of ".implode(", ",$brands);
}
$dress = $all_meta_for_user['dress'][0];
if(!empty($dress)){
    $dress = ", Love size ".$dress;
}
$top = $all_meta_for_user['top'][0];
if(!empty($top)){
    $top = " with top ".$top." size";
}

?>


	<div class="container">
		<div class="row">
            <header class="page-header">
            <div class="row" style="padding:10px">
                <div class="col-md-2 col-xs-4 col-md-offset-2 ">
                    <header style="padding-top:30px">
                    <img src="<?=$imgURL?>" class="img-responsive" style="width:100px" >
                    </header>
                </div>
                <div class="col-md-8 col-xs-6">

                        <?php
                        echo '<h1>'.$name.'</h1>';
                        echo $eye.$skin.$dress.$top;
                        echo "<br>";
                        echo $brands;
                        //the_archive_title( '<h1 class="page-title">', '</h1>' );
                        //the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>

                </div>
            </div>
            </header><!-- .page-header -->
			<div class="col-lg-12 col-md-12">

			<?php if ( have_posts() ) : ?>



				<?php while ( have_posts() ) : the_post(); ?>

				<section class="dt-front-posts-wrap">
					<div class="dt-front-post">

						<?php  if ( has_post_thumbnail() ) : ?>
							<figure>

								<?php
								the_post_thumbnail( 'pashmina-front-post-img' );
								?>

								<span><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><i class="fa fa-mail-forward transition5"></i></a> </span>
							</figure>

						<?php endif; ?>

						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3">
								<div class="entry-meta">
									<p><strong><?php _e( 'Author:', 'pashmina' ); ?></strong><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo esc_html( get_the_author() ) ?></a></p>

									<p><strong><?php _e( 'Published on:', 'pashmina' ); ?></strong><?php esc_html( the_time("F d, Y") ); ?></p>

									<p><strong><?php _e( 'Category:', 'pashmina' ); ?></strong>
										<?php $categories_list = get_the_category_list( esc_html__( ', ', 'pashmina' ) );
										if ( $categories_list && pashmina_categorized_blog() ) {
											printf( $categories_list ); // WPCS: XSS OK.
										} ?></p>
								</div>
							</div>

							<article class="col-lg-9 col-md-9 col-sm-9">
								<header class="entry-header">
									<h2><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_attr( get_the_title() ); ?></a></h2>
								</header><!-- .entry-header -->

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

				<?php endwhile; ?>

				<div class="clearfix"></div>

				<div class="dt-pagination-nav">
					<?php echo paginate_links(); ?>
				</div><!---- .dt-pagination-nav ---->

			<?php else : ?>

				<p><?php _e( 'Sorry, no posts matched your criteria.', 'pashmina' ); ?></p>

			<?php endif; ?>

			</div>


		</div>
	</div>

<?php
get_footer();
