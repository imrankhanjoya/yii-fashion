<?PHP


$post = get_post();

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
	<input type="file" name="file" id="upfilefield" style="display: none;">
		<input type="hidden" name="imagepath" value="<?=$img?>" id="imagepath">
		<img id="userimage" 
                            ld="<?=get_template_directory_uri();?>/images/loading.svg" 
                            src="<?=$userimage?>" 
                            org="<?=$userimage?>" 
                             >
				
	</div>









	


</div><!--ROW END-->
</div><!--CONTAINER END-->


<script type="text/javascript">

jQuery(document).ready(function(){

    jQuery("#upfile").click(function(){
    		alert("hello");
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