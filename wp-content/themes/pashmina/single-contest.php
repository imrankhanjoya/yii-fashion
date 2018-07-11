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
