<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */

?>

<div class="col-md-12 container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	

	<div class="entry-content">
		<p><?PHP the_content();?></p>
    <hr>
    <div class="row">
    <div class="col-lg-8">
        <div class="user-images-commt">
          <a  alt="" title="one" href=""><img src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/019/904/original/IMG_20180327_151403_920.jpg?1522142355" alt="">
          </a>
        </div>
        <div class="user-images-commt">
         <a  alt="" title="two" href=""><img src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/011/458/original/JVSE6554.JPEG?1529931163" alt="">
         </a>
       </div>
        <div class="user-images-commt">
         <a alt="" title="three" href=""><img src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/018/991/original/picture?1513659076" alt="">
         </a>
      </div>
    </div>
    <div class="col-lg-4 text-right">
            <a href="">
              <span class="text-center">2</span><br>
              <span>replies</span>
            </a>          
    </div>
    </div>
	
	</div><!-- .entry-content -->
	

	<footer class="entry-footer">
		<?php pashmina_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
</div>
