<?php /* Template Name: GetStart */ ?>

<?php
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

get_header(); 
require_once __DIR__ . '/Facebook/autoload.php';


if(isset($_REQUEST['code'])){
    $accessToken = $_REQUEST['code'];
    $fb = new Facebook\Facebook(["app_id"=>"135773309784309","app_secret"=>"ed1a94d872c933bda46ef4f80ca66bb6","accessToken"=>$accessToken]);
    $helper = $fb->getRedirectLoginHelper();
    try {
      $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }
    echo '<h3>Access Token</h3>';
    var_dump($accessToken->getValue());
    exit;
}

$fb = new Facebook\Facebook(["app_id"=>"135773309784309","app_secret"=>"ed1a94d872c933bda46ef4f80ca66bb6"]);
$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'user_posts']; // optional
$callback = 'http://localhost:8080/p/deideo/?page_id=231';
$loginUrl = $helper->getLoginUrl($callback, $permissions);

echo '<a href="'.$loginUrl.'">Log in with Facebook!</a>';






$skinColor = array("Extremely fair","Fair","Medium","Olive","Moderately pigmented","Markedly pigmented","Light");
$hairColor = array("White","Dark","Orange");
$eyeColor = array("White","Dark","Orange");
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h1>Hi, Please let us know your name!</h1>
            <form class="form-inline" name="myForm" method="POST" action="../process.php">
                <div class="form-group col-md-12 site-form">
                    <input class="form-control" id="customer_name" name="customer_name" placeholder="Your Name" type="text" required/>
                    <input type="submit" value="Submit" />
                </div>
                <div class="clear"></div>
            </form>
            <div class="row">
            <h1>Whats your skin color!</h1>
            <form class="form-inline" name="myForm" method="POST" action="../process.php">
                <?php foreach($skinColor as $color):?>
                <div class="form-group col-md-3 site-form">
                    <?=$color?>
                </div>
                <?PHP endforeach;?>
                <div class="clear"></div>
            </form>
            </div>
                            
            <div class="row">
            <h1>Whats your hair color!</h1>
            <form class="form-inline" name="myForm" method="POST" action="../process.php">
                <?php foreach($hairColor as $color):?>
                <div class="form-group col-md-3 site-form">
                    <?=$color?>
                </div>
                <?PHP endforeach;?>
                <div class="clear"></div>
            </form>
            </div>


            <div class="row">
            <h1>Whats your eye color!</h1>
            <form class="form-inline" name="myForm" method="POST" action="../process.php">
                <?php foreach($eyeColor as $color):?>
                <div class="form-group col-md-3 site-form">
                    <?=$color?>
                </div>
                <?PHP endforeach;?>
                <div class="clear"></div>
            </form>
            </div>
            

            </div>

            
        </div>
    </div>

<?php
get_footer();
