<?PHP


$post = get_post();

wp_enqueue_style('autocomplete',get_template_directory_uri().'/js/Autocomplete/easy-autocomplete.min.css', array(), '4.4.0', '' );
wp_enqueue_script('autocomplete',get_template_directory_uri().'/js/Autocomplete/jquery.easy-autocomplete.js', array('jquery'), '4.4.0', '' );
wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/simpleUpload.min.js', array( 'jquery' ), '4.0.6', '' );

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
	
	</div>





	<div  class="carousel slide" id="myCarousel" data-interval="false" data-ride="carousel" style="height: 600px">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      

      <!--ITEM START-->
      <div style="col-md-8 col-md-offset-2">
		<input type="file" name="file" id="upfilefield" style="display: none;">
		<input type="hidden" name="imagepath" value="<?=$img?>" id="imagepath">
		<div class="col-md-6" id="imageFrame">
				<img id="userimage" 
                            ld="<?=get_template_directory_uri();?>/images/loading.svg" 
                            src="<?=$userimage?>" 
                            org="<?=$userimage?>" 
                             >
				<button type="submit" id="upfile" class="" style="top:45%; position: absolute; left:30%">Choose Photo</button>
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
var  $ = jQuery;
var ajax_url = '<?=admin_url( 'admin-ajax.php' )?>';
function removeBox(key){
    		jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'remove_tagedproduct',
                ppost:<?=$contest_post[0]['ID']?>,
                key:key
            },
            success : function( response ) {
            	
            	$("#"+key).hide(500);
            	
                             
            }
        });
    }
function setpro(index, value){
    	return "<div id='"+value.key+"' class='col-md-3 col-xs-12 spro'><div class='col-md-4 col-xs-4'><img src='"+value.image+"' class='img-responsive' ></div><div class='col-md-8 col-xs-8'>"+value.title+"<span onClick='removeBox(\""+value.key+"\")'  class='glyphicon glyphicon-remove-circle'></span></div></div>";
    }    
function storevalue(val){
    	var p = val;
    	  var ppost = <?=$contest_post[0]['ID']?>;
    	  $("#products").attr('val','');

    	jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'save_tagedproduct',
                product_title:p,
                ppost:ppost,
            },
            success : function( response ) {
            	$("#taggedPro").html('');
            	$("#products").attr('val','');
            	$.each(response, function(index, value) {
                	$("#taggedPro").append(setpro(index,value));
                	$("#taggedPro").find("div span").unbind("click").bind("click",function(){ removeBox(); });
                }); 
            	
                jQuery("#error").html("");                
            }
        });		
    }

jQuery(document).ready(function(){

    jQuery("#upfile").click(function(){
        $( "#upfilefield" ).trigger( "click" );
    });
    jQuery("#upfile").tap(function(){
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

    jQuery("#sendmessage").click(function(){
        var title = $("#title").val();
        var description = $("#description").val();
        var imagepath = $("#imagepath").val();
        var ppost = <?=$post->ID?>;
        if(imagepath.length<10){
        	jQuery("#error").html("Upload image first.");
        	return false;
        }
        if(title.length<2){
        	jQuery("#error").html("Enter nice title please.");
        	return false;
        }
        if(description.length<10){
        	jQuery("#error").html("Enter nice description please.");
        	return false;
        }
        
        
        var findkey = $(this).val();
        jQuery('.loader').show();
        jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'save_contest',
                ppost:ppost,
                title:title,
                image:imagepath,
                description:description,
            },
            success : function( response ) {
                jQuery("#error").html("");
                jQuery("#myCarousel").carousel('next');
                
            }
        });
    });

    $("#gobackbutton").click(function(){
    	jQuery("#myCarousel").carousel('next');
    });
    
    

    jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'save_tagedproduct',
                ppost:<?=$contest_post[0]['ID']?>,
            },
            success : function( response ) {
            	$("#taggedPro").html('');
            	$.each(response, function(index, value) {
                	$("#taggedPro").append(setpro(index,value));
                });
                             
            }
        });
    

    jQuery("#products").easyAutocomplete(productFile);
    jQuery("#myCarousel").carousel({interval:false});


   

});


var options = {
	url:'<?=$filePath?>',
	getValue: "title",
	list: {match:{enabled: true},
	template: {
		type: "iconRight",
		fields: {
			iconSrc: "icon"
		}
	}
	}
};
var productFile = {
	url:'<?=$proPath?>',
	list: {match:{enabled: true}, onKeyEnterEvent:function(){ 
		var value = $("#products").getSelectedItemData().title;
		storevalue(value);}, onChooseEvent:function(){ 
		var value = $("#products").getSelectedItemData().title;
		storevalue(value);}
	},
	template: {
		type: "custom",
		method: function(value, item) {
			return "<div style='width:60px; height:60px; float:left; margin-right:5px; overflow:hidden'><img src='" + item.icon + "'  style=' min-height:100%; min-width:100%; width:auto; height:auto;' /> </div><div>"+ value+"</div> <div class='clearfix'></div>";
		}
	},
	getValue:"title"
};




</script>