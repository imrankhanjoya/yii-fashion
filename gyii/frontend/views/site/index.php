<?php
use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
 
$m_title = "Gloat.me, Join the movement";
$m_url   = "http://www.gloat.me";
$m_image   = Yii::$app->request->baseUrl.'/img/gloatmeproducts.png';
$m_desc  = "Welcome to the beauty tips and collection of best cosmetics. Get solutions to all your Beauty queries and stay up-to on the latest Beauty Trends. It\'s platform where we make opinion collectively on the bases of your reviews and favorite products";

$this->title = $m_title;
\Yii::$app->view->registerMetaTag([ 'name' => 'description', 'content' => $m_desc ]);

\Yii::$app->view->registerMetaTag(['itemprop' => 'name', 'content' => $m_title ]);
\Yii::$app->view->registerMetaTag(['itemprop' => 'image', 'content' => $m_image ]);


\Yii::$app->view->registerMetaTag([ 'name' => 'twitter:title', 'content' => $m_title ]);
\Yii::$app->view->registerMetaTag([ 'name' => 'twitter:description', 'content' => $m_desc ]);
\Yii::$app->view->registerMetaTag([ 'name' => 'twitter:url', 'content' => $m_url ]);
\Yii::$app->view->registerMetaTag([ 'name' => 'twitter:image', 'content' => $m_image ]);

\Yii::$app->view->registerMetaTag([ 'name' => 'og:title', 'content' => $m_title ]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:site_name', 'content' => $m_title ]);
\Yii::$app->view->registerMetaTag([ 'property' => 'fb:app_id', 'content' =>'135773309784309' ]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:locale', 'content' =>'en_US' ]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:name', 'content' => $m_desc ]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:url', 'content' => $m_url ]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:description', 'content' => $m_desc]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:image', 'content' => $m_image]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:image:width', 'content' =>750]);
\Yii::$app->view->registerMetaTag([ 'property' => 'og:image:height', 'content' =>752]);

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
                  <div class="p-3" style="background-image: url(img/banner/banner_2.svg);">
                     <div class="text-center col-lg-12">
                        <p>
                           <img class="product-ttl-heig" src="img/banner/woman-with-long-hair.svg">Wash your face with ice water or simply rub and ice cube with a tsp of honey on the face for instant face lift
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
                  <a class="top-banners top_banner-t mt-0 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(img/banner/lorealparisdk0213136586v2logo.jpg);" href="<?=Url::to(['products/brand','brand'=>'loreal']);?>"></a>
               </div>
               <div class="col-lg-8">
                  <a class="top-banners mt-2 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(img/banner/discuss.png);" href="<?=Url::to(['/discuss-beauty-tips']);?>"></a>
                  <div class="row">
                     <div class="col-lg-6 col-12">
                        <a class="top-banners mt-2 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(img/banner/Product.png);" href="#"></a>
                     </div>
                     <div class="col-lg-6 col-12">
                        <a class="top-banners mt-2 mt-lg-4 p-3 text-center position-relative align-items-center d-flex" style="background-image: url(img/banner/Lakme-Banner.png);" href="<?=Url::to(['products/brand','brand'=>'lakme']);?>"></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


<!-- silder start one -->
<?=$this->render('//partials/pro-slider.php',array("products"=>$proTagTag,"title"=>$proTwoTitle));?>
<!-- silder ends  -->