<?php

/* @var $this yii\web\View */




$m_title = "Gloat.me, Shop beauty products at one place for top brands.";
$m_url   = "http://www.gloat.me";
$m_image   = Yii::$app->request->baseUrl.'/img/gloatmeproducts.png';
$m_desc  = "Collection of beauty products from BobbiBrown, O3, Kazima, Lotus, Nivea, Olay, MCaffeine, Lakme, Paris, Brezzycloud, PONDS, LOreal, NYX etc. Filter and find all at one place.";

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
<div class="col-lg-12">
     <div class="row">
        <div class="col-lg-6 col-6 text-center py-3" style="background-color: #92FFD8;">
           <a href="" class="">
        <h2 class="text-uppercase"><b>Gloat.Me Pick</b></h2>
        <h4 class="mt-1">Products collection by Glaot.Me! to add to your beauty and looks</h4>
        </a>
        </div>
         <div class="col-lg-6 col-6 text-center py-3" style="background-color: #FFDFCA;">
           <a href="" class="">
        <h2 class="text-uppercase"><b>Gloat.Me Pick</b></h2>
        <h4 class="mt-1">Products collection by Glaot.Me! to add to your beauty and looks</h4>
        </a>
        </div>


     </div>
 </div>

 <div class="container px-2 px-lg-3">
         <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
            <div class="col-lg-12 mt-5 mb-2 text-center">
               <h2><b>Editor's Pick</b></h2>
               <h3>Here are the best products that will make you look & feel good!</h3>
            </div>
            <div class="row">
               
              <?PHP
              foreach($topList as $topItem){
                
                echo $this->render('//partials/top-topic.php',$topItem);  
              }
              ?>
                
               
            </div>
          
         </div>
      </div>
