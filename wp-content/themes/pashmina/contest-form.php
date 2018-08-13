<?PHP
$post = get_post();

wp_enqueue_style('autocomplete',get_template_directory_uri().'/js/Autocomplete/easy-autocomplete.min.css', array(), '4.4.0', '' );
wp_enqueue_script('autocomplete',get_template_directory_uri().'/js/Autocomplete/jquery.easy-autocomplete.js', array('jquery'), '4.4.0', '' );
wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/simpleUpload.min.js', array( 'jquery' ), '4.0.6', '' );

$filePath = get_template_directory_uri()."/brands.json";
$proPath = get_template_directory_uri()."/product.json";

$userimage = 'http://www.gloat.me/wp-content/uploads/2018/07/upload.png';

$user = wp_get_current_user();

//start_contest($post->ID);

$contest_post = findContest($post->ID,$user->ID);
$title = $user->display_name;
$desc = '';
$img = '';
$reply_url = '';
if($contest_post){
    $reply_url = $contest_post[0]['guid'];
    $title = $contest_post[0]['post_title'];
    $desc = $contest_post[0]['post_content'] ;
    $userimage = get_post_meta($contest_post[0]['ID']);
    $userbrands =[];
    if(isset($userimage['taggeBrands'])){
        $userbrands = unserialize($userimage['taggeBrands'][0]);
    }
    $img = $userimage = $userimage['image'][0];
    $array = explode('.',$img);
    if(!empty($array)){
        $userimage = str_replace(".".end($array),"-max.".end($array),$img);
    }
}else{
    $contest_post[0]['ID'] = 0;
}
?>
<div class="container">

<div class="row">
    
    <div class="col-md-12" style="text-align: center; margin-top:2%; margin-bottom:2%">
    <h1 class="seffect"><?=the_title()?></h1>
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
            <button type="submit" id="upfile" class="" style="top:45%; position: absolute; left:39%">Choose Photo</button>
            <img id="userimage" ld="<?=get_template_directory_uri();?>/images/loading.svg" src="<?=$userimage?>" org="<?=$userimage?>" >
                
        </div>
        <div class="col-md-6" style="margin-bottom:90px">
            
            <h2>Awesome lets start to win!</h2>
            <div id="error"></div>
            <div class="form-group">
            <input type="text" name="title" value="<?=$title?>" placeholder="Your Display Name" class="form-control" id="title" required>
            </div>
            <div class="form-group">
            <textarea id="description" class="form-control" style="min-height:150px" name="detail" placeholder="Say some thing about your style" required><?=$desc?></textarea>
            </div>
            <div class="form-group">
            <button type="submit" id="sendmessage" class="col-xs-12 col-md-6" >Save</button>
            </div>

        </div>

        
    </div>
        
    <!--ITEM END-->

      
    </div>
    <div class="item" style="min-width:300px">
      


        <!--ITEM START-->

      
      
    <div class="col-md-12">
     
      <div class="row">
        <div class="col-md-2 col-md-offset-1 col-xs-4">
            <img src="<?=$img?>" > 
        </div>
        <div class="col-md-8 col-xs-8">
            <h2>Congratulation!</h2>
            <p>Your entry has been submitted for <?php the_title()?></p>
            <div class="hidden-xs">
            <p>
                <b>Share your contest entry with your friends on social media to win.</b>
                <div id="copyUrl"><?=$reply_url?></div>
            </p>
            
            <a class="fbcolor" href="http://www.facebook.com/sharer.php?s=100&url=<?=$reply_url?>&images=http://myurl/images/my_image.png&title=mytitle&summary=containsummary"><i class="fa fa-facebook"></i> Facebook</a>
            <a class="whatsappcolor" href="whatsapp://send?text=<?=$title;?> at Gloat.me–<?=$reply_url;?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i> WhatsApp</a>
            <a class="copycolor" href="#" val=" <?=$reply_url?>" onClick="copyText('copyUrl')"><i class="fa fa-copy"></i> Copy Url</a>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 hidden-md hidden-lg" style="padding:25px 15px">
            <p><b>Share your contest entry with your friends on social media to win.</b>
                <div id="copyUrlm"><?=$reply_url?></div>
            </p>
            
            <a class="fbcolor col-xs-4" href="http://www.facebook.com/sharer.php?s=100&url=<?=$reply_url?>&images=http://myurl/images/my_image.png&title=mytitle&summary=containsummary"><i class="fa fa-facebook"></i> Facebook</a>
            <a class="whatsappcolor col-xs-4" href="whatsapp://send?text=<?=$title;?> at Gloat.me–<?=$reply_url;?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i> WhatsApp</a>
            <a class="copycolor col-xs-4" href="#" val=" <?=$reply_url?>" onClick="copyText('copyUrlm')"><i class="fa fa-copy"></i> Copy Url</a>
        </div>
        <div class="col-md-11 col-md-offset-1 col-xs-12">
            <h4>Select brands you have used in above photo</h4>
            <?php foreach($brands as $key=>$brand):?>
                <?php $class = in_array($key,$userbrands)?"check":""?>
                <?php $checked = in_array($key,$userbrands)?"checked":""?>
                <div class="col-md-2 col-xs-6">
                    <label class="">
                        <img src="<?="http://www.gloat.me/wp-content/uploads/".$brand['logo']?>" val="<?=$key?>" class="img-thumbnail brandcheck img-check  <?=$class?>">
                        <?=$brand['title']?>
                    </label>
                </div>
            <?PHP endforeach;?>
        </div>
          <div class="btn-group btn-group-justified" style="margin-bottom:35px;">
              <a  id="gobackbutton" href="#" class="btn btn-primary">Back to Photo</a>
              <a href="" class="btn btn-primary submit_share">Submit & Share</a>
          </div>
      </div>  





      </div>
    
    </div>
        <!--ITEM ENDSTART-->
      
    </div>
  </div>

  

</div>












    


</div><!--ROW END-->
</div><!--CONTAINER END-->


<script type="text/javascript">
var  $ = jQuery.noConflict();
var ajax_url = '<?=admin_url( 'admin-ajax.php' )?>';
var userPostId = <?=$contest_post[0]['ID']?>;

$(document).ready(function(){

    $("#upfile").click(function(){
        $( "#upfilefield" ).trigger( "click" );
    });
    
    $('input[type=file]').change(function(){

        $(this).simpleUpload("/myupload.php", {

            start: function(file){
                $("#userimage").attr("src",$("#userimage").attr("ld"));
            },

            progress: function(progress){
                console.log("upload progress: " + Math.round(progress) + "%");
            },
            success: function(data){
                
                if(data.success){
                    $("#userimage").attr("src",data.data);
                    $("#imagepath").val(data.data);
                }else{
                    $("#error").html(data.error);
                    $("#userimage").attr("src",$("#userimage").attr("org"));    
                }
            },

            error: function(error){
                console.log(error);
                $("#userimage").attr("src",$("#userimage").attr("org"));
            }

        });


    });

    jQuery("#sendmessage").click(function(){
        var title = jQuery("#title").val();
        var description = jQuery("#description").val();
        var imagepath = jQuery("#imagepath").val();
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
        
        
        var findkey = jQuery(this).val();
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
                userPostId = response.ID;
                $(".submit_share").attr("href",response.guid);
                jQuery("#error").html("");
                jQuery("#myCarousel").carousel('next');
                jQuery('.loader').hide();

                
            }
        });
    });

    jQuery("#gobackbutton").click(function(){
        jQuery("#myCarousel").carousel('prev');
    });
    
    

    $(".brandcheck").click(function(){
        var val = $(this).attr("val");
        jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'add_brands',
                ppost:userPostId,
                brand:val
            },
            success : function( response ) {
                console.log(response);

                             
            }
        });
    });
    
    

    
   

});



function copyText(cdiv) {
  /* Get the text field */
  var copyText = $("#"+cdiv).html();
  $("#"+cdiv).fadeOut(1000).fadeIn();

  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(copyText).select();
  document.execCommand("copy");
  $temp.remove();
}


</script>
<div class="loader">
    <img src="<?=get_template_directory_uri();?>/images/loading.svg">
</div>