<?php
use yii\helpers\Url;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->registerJsVar('addmeta',Url::to(['ajax/addmeta']));

$this->title = 'Edit Profile';

$skinColor = array(
  "extremely_fair"=>array("name"=>"Extremely Fair"),
  "fair"=>array("name"=>"Fair"),
  "medium_brown"=>array("name"=>"Medium Brown"),
  "dark"=>array("name"=>"Dark"),
  "deep_dark"=>array("name"=>"Deep Dark"),
  "light"=>array("name"=>"Light"),
);
$skinType = array(
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
      
      <div id="carouselFilter" class="carousel slide"  data-ride="carousel" data-interval="false">
        <div class="carousel-inner">


          <!-- Whats your skin color! -->
          <div class="carousel-item active">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your skin color!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            <div class="row">
              <?PHP foreach($skinColor as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2 face-cards">
                <div class="cards-box">
                  <div class="face-girls d-flex align-items-center" style="background-image:url(http://gloat.me/wp-content/uploads/2018/07/face-phd0.png);">
                    <button metaval="<?=$key?>" metakey="skin_color" class="addmeta btn rounded-0 ml-3"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
            </div>
          </div>

          <!-- Whats your skin Type! -->
          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your skin Type!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            <div class="row">
              <?PHP foreach($skinType as $key=>$val):?>
              <div class="col-lg-3 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button  metaval="<?=$key?>" metakey="skin_type" class="addmeta btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>     
            </div>
          </div>

         
          <!-- Whats your eye color! -->
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
                  <div class="active  black-card justify-content-center d-flex align-items-center">
                    <button metaval="<?=$key?>" metakey="eye_color" class="addmeta btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
            </div>
          </div>


         
          <!-- Whats your Dress size! -->
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
                    <button metaval="<?=$key?>" metakey="dress_size" class="addmeta btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>  
            </div>
          </div>


          

          <!-- Whats your Top size! -->
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
                    <button metaval="<?=$key?>" metakey="top_size" class="addmeta btn rounded-0"><?=$val['name']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?> 
            </div>
          </div>

          <!-- Whats your Fav Brands! -->
          <div class="carousel-item">
            <div class="col-lg-12 text-center mt-2">
              <h1>Whats your Fav Brands!</h1>
              <h6>you can change this anytime in your profile.
              </h6>
            </div>
            <div class="row">
              <?PHP foreach($brands as $key=>$val):?>
              <div class="col-lg-2 col-6 mb-2">
                <div class="cards-box">
                  <div class="active btn-face-girls black-card justify-content-center d-flex align-items-center">
                    <button metaval="<?=$key?>" metakey="brand" class="addmeta btn rounded-0"><?=$val['title']?></button>
                  </div>
                </div>
              </div>
              <?PHP endforeach;?>
            </div>
          </div>


          
        </div>
       
      </div>
      
    </div>
  </div>
</div>

<?php
$script = <<< JS

    $(".addmeta").click(function(e){

    
    var metaObj = $(this);
    var metakey = $(this).attr("metakey");
    var metaval = $(this).attr("metaval");
    
    
    $.ajax({
    method: "POST",
    url: addmeta,
    dataType:'JSON',
    data: {metaval:metaval,metakey:metakey}
    }).done(function( msg ) {
      if(metakey!='brand'){
        $("#carouselFilter").carousel("next");
      }
    });
    e.preventDefault();

  });
JS;
$this->registerJs($script);
?>