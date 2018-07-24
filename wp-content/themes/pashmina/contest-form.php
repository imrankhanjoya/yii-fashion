<?PHP
wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/simpleUpload.min.js', array( 'jquery' ), '4.0.6', '' );


$post = get_post();

wp_enqueue_style('autocomplete',get_template_directory_uri().'/js/Autocomplete/easy-autocomplete.min.css', array(), '4.4.0', '' );
wp_enqueue_script('autocomplete',get_template_directory_uri().'/js/Autocomplete/jquery.easy-autocomplete.js', array('jquery'), '4.4.0', '' );

$filePath = get_template_directory_uri()."/brands.json";
$proPath = get_template_directory_uri()."/product.json";

$userimage = 'http://www.gloat.me/wp-content/uploads/2018/07/upload.png';

$user = wp_get_current_user();

$contest_post = findContest($post->ID,$user->ID);
$title = '';
$desc = '';
$img = '';
if($contest_post){
	$title = $contest_post[0]['post_title'];
	$desc = $contest_post[0]['post_content'] ;
	$userimage = get_post_meta($contest_post[0]['ID']);
	$img = $userimage = $userimage['image'][0];
}
?>
<div class="container">

<div class="row">
	
	<div class="col-md-12" style="text-align: center; margin-top:2%; margin-bottom:2%">
	<h1 class="seffect"><?=the_title()?></h1>
	<span id="upfile" class="glyphicon glyphicon-camera"  style="pointer;">Change</span>
	</div>





	<div  class="slide" id="myCarousel" data-interval="false" data-ride="carousel" style="height: 600px">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      

      <!--ITEM START-->
      <div style="col-md-8 col-md-offset-2">
		<input type="file" name="file" id="upfilefield" style="display: none;">
		<input type="hidden" name="imagepath" value="<?=$img?>" id="imagepath">
		
      
		<div class="col-md-6" id="imageFrame">
				<!-- <button type="submit" id="upfile" class="" style="top:45%; position: absolute; left:30%">Choose Photo</button> -->
				<img id="userimage" 
                            ld="<?=get_template_directory_uri();?>/images/loading.svg" 
                            src="<?=$userimage?>" 
                            org="<?=$userimage?>" 
                             >
				
		</div>
		<div class="col-md-6" style="margin-bottom:60px">
			
			<h2>Awesome lets start to win!</h2>
			<div id="error"></div>
			<div class="form-group">
			<input type="text" name="title" value="<?=$title?>" placeholder="Say some thing about your style" class="form-control" id="title" required>
			</div>
			<div class="form-group">
			<textarea id="description" class="form-control" name="detail" placeholder="Say some thing about your style" required><?=$desc?></textarea>
			</div>
			<button type="submit" id="sendmessage" >Save</button>

		</div>

		
	</div>
		
	<!--ITEM END-->

      
    </div>
    <div class="item" style="min-width:300px">
      


    	<!--ITEM START-->

	  
	  
	<div class="col-md-12">
	  <div class="form-group col-md-12" style="padding:0px">
	    <input type="text" style="width: 100%; min-width:300px " id="products" placeholder="Tag the products that you used in your awesome look" >
	  </div>
	  
	  <div class="col-md-12" id="taggedPro"></div>	


	  <div class="col-md-2 col-xs-5" style="margin-bottom: 50px; margin-top: 50px">
	  <input type="button" name="submit" id="gobackbutton" class="a-btn-knowmore" value="Back to Photo">
	  </div>
	  <div class="col-md-offset-8 col-md-2 col-xs-offset-2 col-xs-5" style="margin-bottom: 50px; margin-top: 50px">
	  <input type="button" name="submit" class="a-btn-knowmore" value="Submit & Share">
	  </div>
	
	</div>
    	<!--ITEM ENDSTART-->


      
    </div>
  </div>

  

</div>












	


</div><!--ROW END-->
</div><!--CONTAINER END-->


<script type="text/javascript">

jQuery(document).ready(function(){

    jQuery("#upfile").click(function(){
        $( "#upfilefield" ).trigger( "click" );
    });
    

    jQuery('input[type=file]').change(function(){

        jQuery(this).simpleUpload("/mypost.php", {

            start: function(file){
                $("#userimage").attr("src",$("#userimage").attr("ld"));
            },

            progress: function(progress){
                console.log("upload progress: " + Math.round(progress) + "%");
            },

            success: function(data){
                
                jQuery("#userimage").attr("src",data.data);
                jQuery("#imagepath").val(data.data);
            },

            error: function(error){
                //upload failed
                $("#userimage").attr("src",$("#userimage").attr("org"));
            }

        });


    });

    
   

});



</script>