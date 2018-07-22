<?php /* Template Name: GetStart */ ?>
<?php
if(!session_id()) {
    session_start();
}
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

wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/simpleUpload.min.js', array( 'jquery' ), '4.0.6', '' );

?>

<?PHP

$pageID =  get_page_by_path('get-start');


$user = wp_get_current_user();
$meta = get_user_meta($user->ID);


require_once __DIR__ . '/Facebook/autoload.php';

    if(isset($_REQUEST['code'])){

        $fb = new Facebook\Facebook(["app_id"=>"135773309784309","app_secret"=>"ed1a94d872c933bda46ef4f80ca66bb6","accessToken"=>$accessToken]);
        $helper = $fb->getRedirectLoginHelper();
        try {
          $accessToken = $helper->getAccessToken();

        }catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        $aToken = $accessToken->getValue();

        $response = $fb->get('/me?fields=id,email,name,gender,picture,first_name',$aToken);

        saveUser($response,$aToken);

    }elseif($user->ID){

            $show = 'skin';
            if(isset($_POST['profile'])) {
                
                if(isset($_POST['nickname'])){
                    $show = sotreUserMeta("nickname",$_POST['nickname']);
                    $user->display_name = $_POST['nickname'];
                    wp_update_user($user);
                }
                if(isset($_POST['email'])){
                    $user->user_email = $_POST['email'];
                    wp_update_user($user);
                }
                if(isset($_POST['birthday'])){
                    sotreUserMeta('birthday',$_POST['birthday']);
                }
                if(isset($_POST['description'])){
                    
                    $show = sotreUserMeta("description",$_POST['description']);
                }

                $url = add_query_arg(array('show' =>'profile'),get_page_link($pageID->ID));
                wp_redirect($url);
            }elseif(isset($_POST['brands'])) {
                delete_user_meta($user->ID,'brands');
                foreach($_POST['brands'] as $val){
                    $show = sotreUserMeta('brands',$val,false);
                }
                $url = add_query_arg(array('show' => $show),get_page_link($pageID->ID));
                wp_redirect($url);
            }elseif(isset($_GET['key']) && isset($_GET['val'])){
                $show = sotreUserMeta($_GET['key'],$_GET['val']);
                
                $url = add_query_arg(array('show' => $show),get_page_link($pageID->ID));
                wp_redirect($url);
            }elseif(isset($_GET['show'])){
                $show = $_GET['show'];

            }
            $attrib = get_user_meta($user->ID,$show);

    }elseif(isset($_GET['fbgo'])){
        $fblogin = fbloginurl();
        wp_redirect($fblogin);
        exit;
    }









get_header('nomenu'); 

?>
    <div class="container" id="page-wrapper">
        <div class="row">
            
            <?php if($user->ID==0):?>
            <div class="col-lg-12 col-md-12" >

            <div class="form-group col-md-12 jointhemove text-center">
            <h1>Hi, Join the movement!</h1>

            <a class="btn a-btn-knowmore" href="<?=getLoginPage()?>">Join In</a>
            </div>
            </div>
            <div class="clear"></div>
            <style type="text/css">
                .dt-header{
                    background-color: transparent;
                }
                .page-template-start{
                background-position: 50% 50%;
                background-repeat: no-repeat;
                background-size:inherit;
                -webkit-animation-name: cycle; /* Safari 4.0 - 8.0 */
                -webkit-animation-duration: 15s; /* Safari 4.0 - 8.0 */
                -webkit-animation-iteration-count: infinite; /* Safari 4.0 - 8.0 */
                animation-name: cycle;
                animation-duration: 25s;
                animation-iteration-count: infinite;
                width: 100%;
                height: 100%;
                position:relative;

                }

                @keyframes cycle {
                0% { background-image: url("http://gloat.me/wp-content/uploads/2018/07/woman-girl-shooting-photography.jpg"); }
                25% { background-image: url("http://gloat.me/wp-content/uploads/2018/07/pexels-photo-1185617.jpeg"); }
                50% { background-image: url("http://gloat.me/wp-content/uploads/2018/07/pexels-photo-1038041.jpeg");}
                75% { background-image: url("http://gloat.me/wp-content/uploads/2018/07/pexels-photo-1035685.jpeg"); }
                100% { background-image: url("http://gloat.me/wp-content/uploads/2018/07/pexels-photo-458684.jpeg"); }
                }
                body{
                    color:#fff;
                    text-shadow: 0px 0px 5px #ccc;
                    min-height:100%;
                   position:relative;

                }
                .jointhemove{
                    color:#fff;
                    text-shadow: 0px 0px 5px #ccc;
                }
                .dt-logo img {
                    width: auto;
                    max-height: 120px;
                    margin: 20px 0;
                    /* box-shadow: 2px 2px 5px #fff; */
                    background-color: #f1ee69;
                    padding: 5px;
                }
                footer {
                clear: both;
                position: relative;
                z-index: 10;
                height: 3em;
                margin-top: -3em;
                }

                  </style>
            <?PHP endif;?>

            <?PHP if($show=='personal'):?>
            
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
              

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active skin">
                    
                    <!--SKIN COLOR -->

                        <div class="col-md-12 col-xs-12 text-center ">
                        <h1>Whats your skin color!</h1>
                        <p>you can change this anytime in your profile.</p>
                        </div>
                        <?php foreach($skinColor as $key=>$color):?>
                        <?PHP $class = $key == $meta['skin'][0]?"btn-active":"" ?>
                        <?php $url = add_query_arg(array('key' => 'skin','val' =>$key),get_page_link($pageID->ID));?>
                        <div key="skin" val="<?=$key?>" class="save_personal hovereffect form-group col-md-3 col-xs-6 site-form " style="background-image:url(<?=$color['img']?>); background-position:center; background-size: cover;">
                        <span class="btn a-btn-knowmore <?=$class?>"><?=$key?></span>
                        </div>
                        
                        <?PHP endforeach;?>


                    <!--SKIN END COLOR -->


                </div>

                <div class="item skinType">

                    <!--SKIN TYPE -->
                    <div class="col-md-12 text-center ">
                    <h1>Whats your skin Type!</h1>
                    <p>you can change this anytime in your profile.</p>
                    </div>
                    <?php foreach($skinType as $type):?>
                    <?PHP $class = $type == $meta['skinType'][0]?"btn-active":"" ?>
                    <?php $url = add_query_arg(array('key' => 'skinType','val' =>$type),get_page_link($pageID->ID));?>
                    <div key="skinType" val="<?=$type?>" class="save_personal hovereffect form-group col-md-3 col-xs-6 btn a-btn-knowmore site-form <?=$class?>">

                    <?=$type?>
                    </div>
                    <?PHP endforeach;?>
                    <div class="clear"></div>
                    <!--SKIN END TYPE -->
                  
                </div>

                <div class="item eye">

                    <!--EYE COLOR -->
                    <div class="col-md-12 text-center ">
                    <h1>Whats your eye color!</h1>
                    <p>you can change this anytime in your profile.</p>
                    </div>
                    <?php foreach($eyeColor as $color):?>
                    <?PHP $class = $color == $meta['eye'][0]?"btn-active":"" ?>
                    <?php $url = add_query_arg(array('key' => 'eye','val' =>$color),get_page_link($pageID->ID));?>
                    <div key="eye" val="<?=$color?>" class="save_personal hovereffect form-group col-md-3 col-xs-6 site-form btn a-btn-knowmore <?=$class?>">
                    
                    <span><?=$color?></span>
                    </div>
                    <?PHP endforeach;?>

                    <!--EYE COLOR END-->

                </div>

                <div class="item dress">

                    <!--DRESS -->
                    <div class="col-md-12 text-center ">
                        <h1>Whats your Dress size!</h1>
                        <p>you can change this anytime in your profile.</p>
                    </div>
                    <?php foreach($DressSize as $dress):?>
                    <?PHP $class = $dress == $meta['dress'][0]?"btn-active":"" ?>
                    <div key="eye" val="<?=$color?>" class="save_personal hovereffect col-md-3 col-xs-4 site-form text-center a-btn-knowmore <?=$class?>" >
                     <?=$dress?>
                    </div>
                    <?PHP endforeach;?>
                    
                    <!--DRESS END-->

                </div>


                <div class="item top">

                    <!--TOP SIZE -->
                    <div class="col-md-12 text-center ">
                    <h1>Whats your Top size!</h1>
                    <p>you can change this anytime in your profile.</p>
                    </div>
                    <?php foreach($topSize as $top):?>
                        <?PHP $class = $top == $meta['top'][0]?"btn-active":"" ?>
                        <div key="top" val="<?=$top?>" class="save_personal hovereffect col-md-3 col-xs-4 site-form chociebox a-btn-knowmore <?=$class?>">
                        <?php $url = add_query_arg(array('key' => 'top','val' =>$top),get_page_link($pageID->ID));?>
                        <?=$top?>
                        </div>
                    <?PHP endforeach;?>
                    <!--TOP SIZE END-->

                </div>
                <div class="item brands">

                    <!--BRANDS-->
                    <div class="col-md-12 text-center ">
                        <h1>Whats Brands you like!</h1>
                        <p>you can change this anytime in your profile.</p>
                    </div>
                    <form class="form-inline" name="myForm" method="POST" action="">
                        <?php foreach($brands as $key=>$brand):?>
                            <?php $class = in_array($key,$meta['brands'])?"check":""?>
                            <?php $checked = in_array($key,$meta['brands'])?"checked":""?>
                            <div class="col-md-2 col-xs-6">
                                <label class="">
                                    <img src="<?="http://www.gloat.me/wp-content/uploads/".$brand['logo']?>" alt="..." class="img-thumbnail img-check  <?=$class?>">
                                    <?=$brand['title']?>
                                    <input type="checkbox" name="brands[]" id="item4" <?=$checked?> value="<?=$key?>" class="hidden" autocomplete="off">
                                </label>
                            </div>
                        <?PHP endforeach;?>
                        <div class="clearfix"></div>
                        <div class="col-md-offset-5 col-md-2 col-xs-4">
                        <input class="showloader" type="submit" value="Love these brands">
                        </div>
                    </form>
                    <!--BRANDS END-->

                </div>
              </div>

                
                
              
              
            </div>



            <?php endif;?>





            





            <?PHP if($show=='profile'):?>  
            
            <div class="container">
              <div class="">
                <h4 class="text-center">Awesome you are all set!</h4>
                 <h4 class="text-center">Now just make sure you provide the right contact to get noticed for giveaways & more love </h4>
                 <div class="row">
                    <input id="upfilefield" type="file" name="file" style="display:none">
                    
                        
                        <div class="col-lg-3 col-md-offset-2 text-center">
                            <div class="userframe" >
                            <img id="userimage" 
                            ld="<?=get_template_directory_uri();?>/images/loading.svg" 
                            src="<?=$meta['cupp_upload_meta'][0]?>" 
                            org="<?=$meta['cupp_upload_meta'][0]?>" 
                            style="width:100%;">
                            <span id="upfile" class="glyphicon glyphicon-camera"  style="color:#fff;cursor: pointer; position: absolute; top:20px; left:10px; text-shadow: 1px 1px 5px #ccc">Change</span>
                            </div>
                            
                        </div>

                        <div class="col-lg-6">
                            <form class="form-horizontal"  name="myForm" method="POST" action="" >
                                
                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Slug</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?=$user->user_login?>" name="username" id="username" placeholder="Username">
                                </div>
                                </div>

                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?=$meta['nickname'][0]?>" name="nickname" id="nickname" placeholder="Display Name">
                                </div>
                                </div>

                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" value="<?=$user->user_email?>" name="email" id="email" placeholder="Email">
                                </div>
                                </div>


                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">BirthDay</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control" value="<?=$meta['birthday'][0]?>" name="birthday" id="birthday" placeholder="Your BirthDay">
                                </div>
                                </div>


                                <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Style Statement</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Your style statement"  name="description" id="description"><?=$meta['description'][0]?></textarea>
                                </div>
                                </div>
                                <input type="submit" name="profile" class="col-md-offset-5 col-md-3 btn btn-success" value="Update"/>
                             </form>
                        </div>
                    
                        <div class="col-lg-9 col-md-offset-2 text-center" style="margin-top:50px">
                        <table class="table">
                        <tr>
                        <td>Skin Type:</td>
                        <td>Skin Color:</td>
                        <td>Eye:</td>
                        <td>Dress Size:</td>
                        <td>Top Size:</td>
                        </tr>
                        <tr>
                        <td><a href="/get-start/?show=personal"><?=$meta['skinType'][0]?></a></td>
                        <td><a href="/get-start/?show=personal"><?=$meta['skin'][0]?></a></td>
                        <td><a href="/get-start/?show=personal"><?=$meta['eye'][0]?></a></td>
                        <td><a href="/get-start/?show=personal"><?=$meta['dress'][0]?></a></td>
                        <td><a href="/get-start/?show=personal"><?=$meta['top'][0]?></a></td>
                        </tr>
                        </table>
                        </div>
                
              
                 </div>
              </div>
            </div>
            
            <?PHP endif;?>
            

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

    jQuery(".save_personal").click(function(){
        jQuery("div."+jQuery(this).attr('key')+" div.a-btn-knowmore").removeClass('btn-active');
        jQuery("div."+jQuery(this).attr('key')+" div").removeClass('btn-active');
        jQuery(this).addClass('btn-active');
        jQuery('.loader').show();
        jQuery.ajax({
            url : ajax_url,
            type : 'post',
            data : {
                action : 'save_personal',
                key: jQuery(this).attr('key'),
                val: jQuery(this).attr('val')
            },
            success : function( response ) {
                
                jQuery("#myCarousel").carousel("next");
                jQuery('.loader').hide();
            }
        });
    });



});

</script>
<div class="loader">
    <img src="<?=get_template_directory_uri();?>/images/loading.svg" width=100%>
</div>
<?php
get_footer();
?>

