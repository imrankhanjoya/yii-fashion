<?PHP


$post = get_post();

wp_enqueue_style('autocomplete',get_template_directory_uri().'/js/Autocomplete/easy-autocomplete.min.css', array(), '4.4.0', '' );
wp_enqueue_script('autocomplete',get_template_directory_uri().'/js/Autocomplete/jquery.easy-autocomplete.min.js', array('jquery'), '4.4.0', '' );

$filePath = get_template_directory_uri()."/brands.json";
$proPath = get_template_directory_uri()."/product.json";

?>
<div class="container">

<div class="row">
	<div class="col-md-12" style="text-align: center; margin-top:2%; margin-bottom:2%">
	<h1><?=the_title()?></h1>
	<p>description</p>
	</div>
	<div class="col-md-8 col-md-offset-2">

		<div class="col-md-6" style="background-image:url('http://www.gloat.me/wp-content/uploads/2018/07/myg.png'); background-position: center; height: 400px; text-align: center;">
				<button type="submit" class="" style="margin-top:50%">Choose Photo</button>
		</div>
		<div class="col-md-6">
			
			<h2>Awesome lets start to win!</h2>
			<form action="/action_page.php">
			<div class="form-group">
			<input type="text" name="title" value="" placeholder="Say some thing about your style" class="form-control" id="title">
			</div>
			<div class="form-group">
			<textarea class="form-control" name="detail" placeholder="Say some thing about your style"></textarea>
			</div>
			<button type="submit" >Submit</button>
			</form>

		</div>

		
	</div>


	<div class="col-md-8 col-md-offset-2" style="text-align: center; margin-top:2%; margin-bottom:20%; min-height: 200px">
	<h2>Tag products used in above photo</h2>
	
		<form class="form-inline">
	  <!-- <div class="form-group col-md-4" style="padding:0px">
	    <input id="brands" type="text" style="width: 100%" id="brand" placeholder="Brand">
	  </div> -->
	  <div class="form-group col-md-12" style="padding:0px">
	    <input type="text" style="width: 100%" id="products" placeholder="Product">
	  </div>
	  
	</form>

	</div>


</div>


</div>


<script type="text/javascript">
var  $ = jQuery;
var ajax_url = '<?=admin_url( 'admin-ajax.php' )?>';

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
                //received progress
                console.log("upload progress: " + Math.round(progress) + "%");
            },

            success: function(data){
                
                jQuery("#userimage").attr("src",data.data);
            },

            error: function(error){
                //upload failed
                $("#userimage").attr("src",$("#userimage").attr("org"));
            }

        });


    });

    jQuery(".productFind").keypress(function(){
        var findkey = $(this).val();
        jQuery('.loader').show();
        jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'find_product',
                key:findkey,
                val: jQuery(this).attr('val')
            },
            success : function( response ) {
                
                
            }
        });
    });

    jQuery("#brands").easyAutocomplete(options);
    jQuery("#products").easyAutocomplete(productFile);


});


var options = {
	url:'<?=$filePath?>',
	list: {match:{enabled: true}
	}
};
var productFile = {
	url:'<?=$proPath?>',
	list: {match:{enabled: true}
	}
};




</script>