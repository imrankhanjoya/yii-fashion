<?php
use yii\helpers\Url;
use frontend\assets\LoginAsset;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
if (!Yii::$app->user->isGuest){
LoginAsset::register($this);
}
$this->title = 'Edit Profile';

$skinType = array(
  "extremely_fair"=>array("name"=>"Extremely Fair"),
  "fair"=>array("name"=>"Fair"),
  "medium_brown"=>array("name"=>"Medium Brown"),
  "dark"=>array("name"=>"Dark"),
  "deep_dark"=>array("name"=>"Deep Dark"),
  "light"=>array("name"=>"Light"),
);
$skinColor = array(
  "normal"=>array("name"=>"Normal"),
  "dry"=>array("name"=>"Dry"),
  "oily"=>array("name"=>"Oily"),
  "acne_prone"=>array("name"=>"Acne-prone"),
  "sensitive"=>array("name"=>"Sensitive"),
  "combination"=>array("name"=>"Combination"),
);
$eyeColor = array(
  "black"=>array("name"=>"Black"),
  "brown"=>array("name"=>"Brown"),
  "green"=>array("name"=>"Green"),
  "amber"=>array("name"=>"Amber"),
  "hazel"=>array("name"=>"Hazel"),
  "golden"=>array("name"=>"Golden"),
);
$dressSize = array(
  "0"=>array("name"=>"0"),
  "2"=>array("name"=>"2"),
  "4"=>array("name"=>"4"),
  "6"=>array("name"=>"6"),
  "8"=>array("name"=>"8"),
  "10"=>array("name"=>"10"),
  "12"=>array("name"=>"12"),
  "14"=>array("name"=>"14"),
);

$topSize = array(
  "xs"=>array("name"=>"XS"),
  "s"=>array("name"=>"S"),
  "m"=>array("name"=>"M"),
  "l"=>array("name"=>"L"),
  "xl"=>array("name"=>"XL"),
  "xxl"=>array("name"=>"XXL")
);


$brands = array(
  "xs"=>array("name"=>"XS"),
  "s"=>array("name"=>"S"),
  "m"=>array("name"=>"M"),
  "l"=>array("name"=>"L"),
  "xl"=>array("name"=>"XL"),
  "xxl"=>array("name"=>"XXL")
);

$brands = array(
"bobbi_brown"=>array("title"=>"Bobbi Brown","logo"=>"/2018/07/Bobbi_Brown_logo_logotype-copy.png"),
"avon"=>array("title"=>"AVON","logo"=>"/2018/07/avon.png"),
"nyx"=>array("title"=>"NYX","logo"=>"/2018/07/NYX_logo-copy.png"),
"mac"=>array("title"=>"Mac","logo"=>"/2018/07/Mac_logo_logotype-copy.png"),
"lakme"=>array("title"=>"LAKME","logo"=>"/2018/07/LAKME-copy.png"),
"la_girl_usa"=>array("title"=>"LA Girl USA","logo"=>"/2018/07/LA_Girl_USA_logo-copy.png"),
"pearls_paris"=>array("title"=>"Pearls & Paris","logo"=>"/2018/07/cropped-logoupdated22-copy.png"),
"clinique"=>array("title"=>"Clinique","logo"=>"/2018/07/Clinique_logo_logotype-copy.png"),
"revlon"=>array("title"=>"Revlon","logo"=>"/2018/07/Revlon_logo-copy.png")
);
?>
<?PHP echo $this->render('//partials/profile-menu.php'); ?>
<div class="container">
  
  <?=$msg?>
  <div class="row">
    <div class="col-lg-12">
      
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your skin color!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            <div class="row">
              <?PHP foreach($skinType as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2 face-cards">
                <div class="cards-box">
                  <div metaval="<?=$key?>" class="addmeta face-girls d-flex align-items-center" style="background-image:url(http://gloat.me/wp-content/uploads/2018/07/face-phd0.png);">
                    <button class="btn rounded-0 ml-3"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
              
              
            </div>
          </div>
          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your skin Type!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            
            <div class="row">
              <?PHP foreach($skinColor as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button class="btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
              
              
            </div>
          </div>

         

          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your eye color!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            
            <div class="row">
              <?PHP foreach($eyeColor as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button class="btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
              
              
            </div>
          </div>


         

          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your Dress size!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            
            <div class="row">
              <?PHP foreach($dressSize as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button class="btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
              
              
            </div>
          </div>

          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your Top size!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            
            <div class="row">
              <?PHP foreach($topSize as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button class="btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
              
              
            </div>
          </div>


          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your Top size!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            
            <div class="row">
              <?PHP foreach($topSize as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button class="btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
              
              
            </div>
          </div>


          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your Fav Brands!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            
            <div class="row">
              <?PHP foreach($brands as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button class="btn rounded-0"><?=$val['title']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
              
              
            </div>
          </div>


          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <!--  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span> -->
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <!--  <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span> -->
        </a>
      </div>
      
    </div>
  </div>
</div>