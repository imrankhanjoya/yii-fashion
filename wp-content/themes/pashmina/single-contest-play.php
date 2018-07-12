<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */

get_header('nomenu'); 

$post_ID = get_the_ID();
$post = get_post();        
?>

<!-- first pages -->
	<div class="col-lg-12" style="padding: 0px;">
		<div class="chat-banner-img"></div>
	</div>
   <div class="container">
   	<div class="row">
	  <div class="col-lg-12 bordr-all-pgs">
		<h3 class="text-center"><b>Terms and Conditions</b></h3>
		<ul class="media small form-group">
		<li>The quick brown fox jumps over the little lazy dog. the</li>
		<li>This is the tie for all good men to come for the aid of the nation. </li>
		<li>The quick brown for all good men to come for hte aidd of the nation. The quick</li>
		<li> the quick brwn fox jumps over the little lazy dog. quick brown is here and al good men to come for the aid
		of the nation. </li>
		<li>This is the tie for all good men to come for the aid of the nation. </li>
		<li>The quick brown for all good men to come for hte aidd of the nation. The quick</li>
		<li>the quick brwn fox jumps over the little lazy dog. quick brown is here and al good men to come for the aid
		of the nation. This is the tie for all good men to come for the aid of the nation. </li>
		<li>The quick brown for all good men to come for hte aidd of the nation. The quick</li>
		<li> the quick brwn fox jumps over the little lazy dog. quick brown is here and al good men to come for the aid of
        the nation. </li>
      </ul>
      <div class="col-lg-12 media text-center">
      <a class="btn a-btn-knowmore" href="">STAKE THE CLAIM</a>
     </div>
    </div>
</div>
</div>
<!-- first-page ends -->

<!-- page no 2 -->
<div class="container">
	<div class="row bordr-all-pgs">
		<div class="col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2">
	 <div class="col-lg-5 col-md-5 col-xs-12 col-sm-5">
		<div class="picture-container">
         <div class="picture">
            <img src="https://www.icon2s.com/wp-content/uploads/2014/04/black-white-android-plus.png" class="picture-src abcd" id="wizardPicturePreview" title="">
            <input type="file" id="wizard-picture" class="">
          </div>
        </div>
	 </div>

	<div class="col-lg-7 col-md-7 col-xs-12 col-sm-7" style="margin-top:15%;">
		<h3><b>Your Style Statement</b></h3>
<!-- 	<textarea class="autoExpand forumPost form-control" rows="4" data-min-rows="4" placeholder="Enter your message here" style="border-radius: 0px;"></textarea> -->

<textarea class="autoExpand forumPost form-control" data-autoresize rows="4"  placeholder="Enter your message here"></textarea>
      <div class="media" style="margin-top: 8%;">
      <a class="btn a-btn-knowmore" href="">STAKE THE CLAIM</a>
     </div>
	</div>
   </div>
 	<div style="clear:both"></div>
 <div class="">
 	<div class="col-lg-8 col-md-offset-2 text-center col-md-8 col-sm-12"  style="margin-bottom: 5%;">
 		<h4 class="form-group"><b>Tell us, what made you gorgeous?</b></h4>
 		<input class="form-control filter-dropdn" id="myInput" type="text" placeholder="Search the products you used">
	  <ul class="list-group text-left" id="myList" style="display: none">
	    <li class="list-group-item">one <img class="img-responsive img-circle filter-dropdn-img" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815"></li>
	    <li class="list-group-item">two</li>
	    <li class="list-group-item">Third</li>
	    <li class="list-group-item">Fourth</li>
	  </ul>  
 	</div>
 </div>

 <div class="">
 	<div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	</div>
 	</div>
 <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	  </div>
 	</div>
 <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	</div>
 	</div>
 	 <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<!-- <a href="" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></a> -->
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	</div>
 	</div>
 		 <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	</div>
 	</div>
 		 <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<!-- <a href="" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></a> -->
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	</div>
 	</div>
 		 <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	</div>
 	</div>
 		 <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
 		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
 		<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
 			<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
 		</div>
 		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
 			<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
 			<h4 class="small media-heading">Rs. 250/-</h4>
 		</div>
 	</div>
 	</div>
 	<div style="clear:both"></div>
 	<div class="col-lg-12 media text-center" style="margin-top: 6%;">
      <a class="btn a-btn-knowmore" href="">STAKE THE CLAIM</a>
     </div>
  </div>
  </div>
</div>
<!-- page no 2 ends -->









<!-- page no 3 start -->

<div class="container">
	<div class=" ">
	<div class="row bordr-all-pgs">
		<div class="col-lg-offset-1 col-md-offset-1 col-lg-4 col-md-4 col-xs-12 col-sm-12">
		<div class="picture-container">
         <div class="picture">
            <img src="https://www.icon2s.com/wp-content/uploads/2014/04/black-white-android-plus.png" class="picture-src abcd" id="wizardPicturePreview" title="">
            <input type="file" id="wizard-picture" class="">
          </div>
        </div>
	 </div>

	 <div class="col-lg-6 col-md-6">
	 	<div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">
	 	    <h3><b>Sapna Awasthi</b></h3>
			<h5>The quick brown fox jumps over the little lazy
			dog. The quick brown fox jumps over the little
			lazy dog. The q the little lazy dog.</h5>
		</div>
		<div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
				<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<!-- <a href="" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></a> -->
				<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
				<h4 class="small media-heading">Rs. 250/-</h4>
				</div>
			</div>
		</div>

			<div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
				<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<!-- <a href="" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></a> -->
				<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
				<h4 class="small media-heading">Rs. 250/-</h4>
				</div>
			</div>
		</div>

	<div class="col-lg-8 col-md-8 col-xs-12 col-sm-6">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 stake-card-big">
				<div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 stake-the-img">
				<img class="img-responsive" src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<!-- <a href="" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></a> -->
				<h4 class="small media-heading"><b>Nivia facial Cream</b></h4>
				<h4 class="small media-heading">Rs. 250/-</h4>
				</div>
			</div>
		</div>
	 </div>


	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-top: 3%;margin-bottom: 2%;">
		<div class="col-lg-4 col-xs-12 col-sm-12 col-md-4 text-center">
			<h1 style="font-size: 60px;"><b>279</b></h1>
		</div>
		<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 text-center border_left">
			<h3>Title goes here</h3>
			<h5>Content goes here. Content goes here. Content goes here. content goes here. content goes. here. content goes here..</h5>
			<div class="col-lg-12 text-center media">
			<a class="btn a-btn-knowmore" href="" style="padding: 10px 83px !important;">Like</a>
			</div>	
		</div>
	</div>
   </div>
  </div>
<div class="row">
<div class="col-md-10 col-md-offset-1 col-lg-10" style="margin-top: 8%;">
   <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
	  <div class="carousel-inner carsl-run">
	    <div class="item active">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815" class="img-responsive"></a></div>
	    </div>
	    <div class="item">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/e477e4/fff&text=2" class="img-responsive"></a></div>
	    </div>
	    <div class="item">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/023/249/original/ps.jpg?1528530815" class="img-responsive"></a></div>
	    </div>
	    <div class="item">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="https://i.ytimg.com/vi/5-LyRjHlRgQ/maxresdefault.jpg" class="img-responsive"></a></div>
	    </div>
	    <div class="item">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/f566f5/333&text=5" class="img-responsive"></a></div>
	    </div>
	    <div class="item">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/f477f4/fff&text=6" class="img-responsive"></a></div>
	    </div>
	    <div class="item">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/eeeeee&text=7" class="img-responsive"></a></div>
	    </div>
	    <div class="item">
	      <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="http://placehold.it/500/fcfcfc/333&text=8" class="img-responsive"></a></div>
	    </div>
	  </div>
	  <a class="left carousel-control carousl-btn" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
	  <a class="right carousel-control carousl-btn" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
	 </div>
    </div>
   </div>
	</div>



<!-- page no 3 ends -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- images upload scrpt -->
<script type="text/javascript">

   $(document).ready(function(){

// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
        $("#wizardPicturePreview").addClass('img_upload-two');
    }
}
</script>
<!-- end images upload -->
<!-- search dropdown -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    //alert(value);
    
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      if(value==''){
    	$("#myList").hide();
    }else{
      $("#myList").show();
    }
    });
  });
});
</script><!-- serch dropdwon -->
<!-- silder start -->
<script type="text/javascript">
	$(document).ready(function(){
$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
        next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
});
	/*silder ends*/
</script>

<!-- textarea start -->
<script type="text/javascript">
	jQuery.each(jQuery('textarea[data-autoresize]'), function() {
    var offset = this.offsetHeight - this.clientHeight;
 
    var resizeTextarea = function(el) {
        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
    };
    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
});
</script>
<!-- textare end -->



	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<div class="entry-content" style="min-height:320px; padding:20px 20px; background-image: url(<?= get_the_post_thumbnail_url($post_ID)?>)">

						<a href="<?php esc_url( the_permalink() ); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
						<p><?PHP the_excerpt()?></p>
						<p><?=$post->post_content; ?></p>

						</div><!-- .entry-content -->
						
						<a href="getStart">Get Start</a>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-8 -->

			
		</div><!-- .row -->
	</div><!-- .container -->

<?php
get_footer();
