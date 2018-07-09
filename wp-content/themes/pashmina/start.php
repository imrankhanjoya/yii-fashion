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
        }
        if(isset($_POST['email'])){
            $user->user_email = $_POST['email'];
            wp_update_user($user);
            print_r($user);
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
    $UserSkin = get_user_meta($user->ID,'skin');

}





$skinType = array("Normal","Dry","Oily","Acne-prone","Sensitive","Combination");
$skinColor = array("Extremely fair"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd0.png"),"Fair"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd1.png"),"Tan"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd2.png"),"Medium Brown"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd3.png"),"Dark"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd4.png"),"Deep Dark"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd5.png"),"Light"=>array("img"=>"http://gloat.me/wp-content/uploads/2018/07/face-phd6.png"));
$hairColor = array("White","Dark","Orange");
$brands = array("Clinique","BCBGMAXAZRIA","Levi's","Torrid","Benefit Cosmetics","Calvin Klein","La Roche-Posay","Laura Geller","Alex and Ani","Ella Moss","Milly","stila","Perricone MD","Mario Badescu");
$eyeColor = array("White","Dark","Orange");
$DressSize = array("0","2","4","6","8","10","12","14");
$topSize = array("xs","s","m","l","xl","xxl");




get_header('nomenu'); 

?>
    <div class="container" id="page-wrapper">
        <div class="row">
            
            <?php if($user->ID==0):?>
            <div class="col-lg-12 col-md-12" >

            <div class="form-group col-md-12 jointhemove text-center">
            <h1>Hi, Join the movement!</h1>
            <a class="btn a-btn-knowmore" href="<?=fbloginurl()?>">Join In</a>
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

            <?PHP if($show=='skin'):?>
            <div class="col-md-12 text-center ">
            <h1>Whats your skin color!</h1>
            <p>you can change this anytime in your profile.</p>
            </div>
            <?php foreach($skinColor as $key=>$color):?>
            <?PHP $class = $key == $attrib[0]?"btn-active":"" ?>
            <div class="form-group col-md-3 col-xs-4 site-form" style="background-image:url(<?=$color['img']?>); background-position:center; background-size: cover;">

            <?php $url = add_query_arg(array('key' => 'skin','val' =>$key),get_page_link($pageID->ID));?>
            <a class="btn a-btn-knowmore <?=$class?>" href="<?=$url?>"><?=$key?></a>

            </div>
            <?PHP endforeach;?>
            <div class="clear"></div>
            <?PHP endif;?>
                         
            

            <?PHP if($show=='skinType'):?>  
            <div class="col-md-12 text-center ">
            <h1>Whats your skin Type!</h1>
            <p>you can change this anytime in your profile.</p>
            </div>
            <?php foreach($skinType as $type):?>
            <?PHP $class = $type == $attrib[0]?"btn-active":"" ?>
            <div class="form-group col-md-3 col-xs-6 site-form">
            <?php $url = add_query_arg(array('key' => 'skinType','val' =>$type),get_page_link($pageID->ID));?>
            <a class="btn a-btn-knowmore <?=$class?>" href="<?=$url?>"><?=$type?></a>
            </div>
            <?PHP endforeach;?>
            <div class="clear"></div>
            <?PHP endif;?>


            <?PHP if($show=='eye'):?>  
            <div class="col-md-12 text-center ">
            <h1>Whats your eye color!</h1>
            <p>you can change this anytime in your profile.</p>
            </div>
            <form class="form-inline" name="myForm" method="POST" action="../process.php">
            <?php foreach($eyeColor as $color):?>
            <?PHP $class = $color == $attrib[0]?"btn-active":"" ?>
            <div class="form-group col-md-3 col-xs-6 site-form">
            <?php $url = add_query_arg(array('key' => 'eye','val' =>$color),get_page_link($pageID->ID));?>
            <a class="btn a-btn-knowmore <?=$class?>" href="<?=$url?>"><?=$color?></a>
            </div>
            <?PHP endforeach;?>
            <div class="clear"></div>
            </form>
            <?PHP endif;?>

            <?PHP if($show=='dress'):?>  
                <div class="col-md-12 text-center ">
                <h1>Whats your Dress size!</h1>
                <p>you can change this anytime in your profile.</p>
                </div>
                <?php foreach($DressSize as $dress):?>
                <?PHP $class = $dress == $attrib[0]?"btn-active":"" ?>
                <div class="col-md-3 col-xs-4 site-form text-center <?=$class?> chociebox" >
                <?php $url = add_query_arg(array('key' => 'dress','val' =>$dress),get_page_link($pageID->ID));?>
                 <a   href="<?=$url?>"><?=$dress?></a>
                </div>
                <?PHP endforeach;?>
                <div class="clear"></div>
            <?PHP endif;?>


            <?PHP if($show=='top'):?>  
                <div class="col-md-12 text-center ">
                    <h1>Whats your Dress size!</h1>
                    <p>you can change this anytime in your profile.</p>
                </div>
                <?php foreach($topSize as $top):?>
                    <?PHP $class = $top == $attrib[0]?"btn-active":"" ?>
                    <div class="col-md-3 col-xs-4 site-form chociebox <?=$class?>">
                    <?php $url = add_query_arg(array('key' => 'top','val' =>$top),get_page_link($pageID->ID));?>
                    <a  href="<?=$url?>"><?=$top?></a>
                    </div>
                <?PHP endforeach;?>
            <div class="clear"></div>
            <?PHP endif;?>


            <?PHP if($show=='brands'):?>
                    <div class="col-md-12 text-center ">
                        <h1>Whats Brands you like!</h1>
                        <p>you can change this anytime in your profile.</p>
                    </div>
                    <form class="form-inline" name="myForm" method="POST" action="">
                        <?php foreach($brands as $brand):?>
                            <?php $class = in_array($brand,$attrib)?"check":""?>
                            <?php $checked = in_array($brand,$attrib)?"checked":""?>
                            <div class="col-md-2 col-xs-4">
                                <label class="btn btn-primary">
                                    <img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Running.png" alt="..." class="img-thumbnail img-check  <?=$class?>">
                                    <?=$brand?>
                                    <input type="checkbox" name="brands[]" id="item4" <?=$checked?> value="<?=$brand?>" class="hidden" autocomplete="off">
                                </label>
                            </div>
                        <?PHP endforeach;?>
                        <div class="clearfix"></div>
                        <input type="submit" value="send">

                    </form>
            <?PHP endif;?>





            <?PHP if($show=='profile'):?>  
            
            <div class="container">
              <div class="profile-cards">
                <h4 class="text-center">Awesome you are all set!</h4>
                 <h4 class="text-center">Now just make sure you provide the right contact to get noticed for giveaways & more love </h4>
                 <div class="row">
                    <form class="form-inline" name="myForm" method="POST" action="" >
                        <input class="profile-input" required=true type="text" value="profile" name="profile" id="profile">
                        <div class="col-lg-4 text-center">
                        <img src="<?=$meta['cupp_upload_meta'][0]?>" style="width: 50px;">
                        <h5>Change avatar</h5>
                        </div>

                        <div class="col-lg-8">
                        <table cellspacing="0" cellpadding="0">
                        <tbody><tr>
                        <td class="profile-dtl">Name:</td>
                        <td>
                        <input class="profile-input" required=true type="text" value="<?=$meta['nickname'][0]?>" name="nickname" id="nickname">
                        <div class="form-note">Type to change your Name</div>
                        </td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">Email:</td>
                        <td>
                        <input class="profile-input" type="email" value="<?=$user->user_email?>" name="email" id="email">
                        </td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">About you:</td>
                        <td>
                        <input class="profile-input" value="<?=$meta['description'][0]?>" placeholder="Your professional title" type="text" name="description" id="description">
                        </td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">Skin Type:</td>
                        <td><?=$meta['skinType'][0]?></td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">Skin Color:</td>
                        <td><?=$meta['skin'][0]?></td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">Eye:</td>
                        <td><?=$meta['eye'][0]?></td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">Dress Size:</td>
                        <td><?=$meta['dress'][0]?></td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">Top Size:</td>
                        <td><?=$meta['top'][0]?></td>
                        </tr>
                        <tr>
                        <td class="profile-dtl">Birthday:</td>
                        <td>12 / 12 / 2001</td>
                        </tr>
                        </tbody></table>
                        </div>
                    <div class="col-lg-6">
                    <input type="submit" class="btn-outline-dark btn-lg btn-block" value="Update"/>
                    </div>
                    <div class="col-lg-6">
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Update"/>
                    </div>
               </form>
                 </div>
              </div>
            </div>
            
            <?PHP endif;?>
            

            </div>

            
    </div>

<?php
get_footer();
?>

