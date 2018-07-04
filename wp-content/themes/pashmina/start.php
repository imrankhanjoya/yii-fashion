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
    if(isset($_POST['brands'])) {
        delete_user_meta($user->ID,'brands');
        foreach($_POST['brands'] as $val){
            $show = sotreUserMeta('brands',$val,false);
        }

        $url = add_query_arg(array('show' => $show),get_page_link(231));
        wp_redirect($url);
    }elseif(isset($_GET['key']) && isset($_GET['val'])){
        $show = sotreUserMeta($_GET['key'],$_GET['val']);
        $val = get_page_by_path( 'get-start' );
        $url = add_query_arg(array('show' => $show),get_page_link($val->ID));
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
    <div class="container">
        <div class="row">
            
            <?php if($user->ID==0):?>
            <div class="col-lg-12 col-md-12">
            
                <div class="form-group col-md-12 site-form  ">
                    <h1>Hi, Join the movement!</h1>
                    <a class="btn a-btn-knowmore" href="<?=fbloginurl()?>">Join In</a>
                </div>
            </div>
            <div class="clear"></div>
            <?PHP endif;?>

            <?PHP if($show=='skin'):?>
                <div class="col-md-12 text-center ">
                <h1>Whats your skin color!</h1>
                <p>you can change this anytime in your profile.</p>
                </div>
                <?php foreach($skinColor as $key=>$color):?>
                    <?PHP $class = $key == $attrib[0]?"btn-active":"" ?>
                <div class="form-group col-md-3 col-xs-4 site-form" style="background-image:url(<?=$color['img']?>); background-position:center; background-size: cover;">
                    
                    <?php $url = add_query_arg(array('key' => 'skin','val' =>$key),get_page_link(231));?>
                     <a class="btn a-btn-knowmore <?=$class?>" href="<?=$url?>"><?=$key?></a>

                </div>
                <?PHP endforeach;?>
                <div class="clear"></div>
            <?PHP endif;?>
                         
            <?PHP if($show=='hair'):?>                
                <div class="col-md-12 text-center ">
            <h1>Whats your hair color!</h1>
            <p>you can change this anytime in your profile.</p>
        </div>
            <form class="form-inline" name="myForm" method="POST" action="../process.php">
                <?php foreach($hairColor as $color):?>
                    <?PHP $class = $color == $attrib[0]?"btn-active":"" ?>
                <div class="form-group col-md-3 col-xs-6 site-form">
                    <?php $url = add_query_arg(array('key' => 'hair','val' =>$color),get_page_link(231));?>
                     <a class="btn a-btn-knowmore <?=$class?>" href="<?=$url?>"><?=$color?></a>
                </div>
                <?PHP endforeach;?>
                <div class="clear"></div>
            </form>
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
                    <?php $url = add_query_arg(array('key' => 'eye','val' =>$color),get_page_link(231));?>
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
                <div class="col-md-3 col-xs-4 site-form">
                <?php $url = add_query_arg(array('key' => 'dress','val' =>$dress),get_page_link(231));?>
                 <a class="btn a-btn-knowmore <?=$class?>" href="<?=$url?>"><?=$dress?></a>
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
                    <div class="col-md-3 col-xs-4 site-form">
                    <?php $url = add_query_arg(array('key' => 'top','val' =>$top),get_page_link(231));?>
                    <a class="btn a-btn-knowmore <?=$class?>" href="<?=$url?>"><?=$top?></a>
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
       <div class="col-lg-4 text-center">
         <img src="<?=$meta['cupp_upload_meta'][0]?>" style="width: 50px;">
         <h5>Change avatar</h5>
       </div>
       <div class="col-lg-8">
         <table cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td class="profile-dtl">Name:</td>
                  <td>
                    <input class="profile-input" required="" type="text" value="<?=$meta['nickname'][0]?>" name="" id="">
                    <div class="form-note">Type to change your username</div>
                  </td>
                </tr>
                <tr>
                  <td class="profile-dtl">Email:</td>
                  <td>
                      <input class="profile-input" type="email" value="<?=$user->user_email?>" name="" id="">
                  </td>
                </tr>
                <tr>
                  <td class="profile-dtl">About you:</td>
                  <td>
                    <input class="profile-input" value="<?=$meta['description'][0]?>" placeholder="Your professional title" type="text" name="" id="">
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
         <button type="button" class="btn-outline-dark btn-lg btn-block">Success</button>
       </div>
       <div class="col-lg-6">
         <button type="button" class="btn btn-success btn-lg btn-block">Success</button>
       </div>
     </div>
  </div>
</div>

            <?PHP endif;?>
            

            </div>

            
    </div>

<?php
get_footer();
?>

