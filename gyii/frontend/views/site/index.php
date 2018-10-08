<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="row mr-0 ml-0">
         <div class="col-12 col-lg-12 p-0">
            <a href="">
            <img class="float-left" src="https://cdnmediablog.files.wordpress.com/2018/08/legend_20180830_244516.gif" style="width:64%;">
            </a>
            <a href="">
            <img class="" src="https://cdnmediablog.files.wordpress.com/2018/08/legend_20180830_014301.gif" style="width:36%;">
            </a>
         </div>
      </div>


       <div class="container px-2 px-lg-3">
         <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
            <div class="row">
               <div class="col-lg-12 col-12 col-md-12 mt-0 mt-lg-4">
                  <div class="p-3" style="background-image: url(http://www.gloat.me/wp-content/themes/pashmina/images/banner_2.svg);">
                     <div class="text-center col-lg-12">
                        <p>
                           <img class="product-ttl-heig" src="http://www.gloat.me/wp-content/themes/pashmina/images/woman-with-long-hair.svg">Wash your face with ice water or simply rub and ice cube with a tsp of honey on the face for instant face lift
                        </p>
                        <button class="text-center btn rounded-0">Stay in Touch for Beauty Tips</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">


                <?PHP
              foreach($topList as $topItem){
                
                echo $this->render('//partials/top-topic.php',$topItem);  
              }
              ?>
               

            </div>
            <div class="row">
               <div class="col-lg-12 col-12 text-center mt-2 mt-lg-4">
                  <div class=" p-3" style="background-color: #e9d8ab;">
                     <h1 class="">Gloat Me Join the Movement of Bouaty Tips</h1>
                     <p class="px-2">Welcome to the beauty tips and collection of best cosmetics. Get solutions to all your Beauty queries and stay up-to on the latest Beauty Trends. It's platform where we make opinion collectively on the bases of your reviews and favorite products </p>
                     <button class="btn rounded-0">Lets Start</button>
                  </div>
               </div>
            </div>
         </div>
      </div>


<!-- silder start one -->
<?=$this->render('//partials/pro-slider.php',array("products"=>$proTag,"title"=>$proOneTitle));?>
<!-- silder ends  -->




<div class="container px-2 px-lg-3">
         <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
            <div class="row">
               <div class="col-lg-4">
                  <a class="top-banners top_banner-t mt-0 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(http://gloat.me/wp-content/uploads/2018/07/LorealParisDK0213136586v2Logo.jpg);" href="#"></a>
               </div>
               <div class="col-lg-8">
                  <a class="top-banners mt-2 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(http://www.gloat.me/wp-content/themes/pashmina/images/discuss.png);" href="#"></a>
                  <div class="row">
                     <div class="col-lg-6 col-12">
                        <a class="top-banners mt-2 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(http://www.gloat.me/wp-content/themes/pashmina/images/Product.png);" href="#"></a>
                     </div>
                     <div class="col-lg-6 col-12">
                        <a class="top-banners mt-2 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(http://gloat.me/wp-content/uploads/2018/07/lakme.png);" href="#"></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


<!-- silder start one -->
<?=$this->render('//partials/pro-slider.php',array("products"=>$proTagTag,"title"=>$proTwoTitle));?>
<!-- silder ends  -->