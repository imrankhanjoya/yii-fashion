<?PHP
   use frontend\assets\LoginAsset;
   use common\widgets\Alert;

if (!Yii::$app->user->isGuest){
   LoginAsset::register($this);
}


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
         <div class="col-lg-12 col-sm-12 col-md-12 col-12 p-0">
            <div class="banner-bg-img" style="background-image: url(<?=$topDetail['image']?>);">
               <div class="text-white text-center">
                  <h1 class="banner-middl-ttl px-3"><b><?=$topDetail['post_title']?></b></h1>
                  <p><?=$topDetail['post_excerpt']?></p>
               </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 navbar-header text-white px-lg-3 py-3">
               <p class="lettr-spec "><?=$topDetail['post_content']?></p>
            </div>
         </div>
     
      <div class="container">
      <div class="row">
         <div class="col-lg-8 col-sm-12 col-md-12 col-12 mt-lg-5 px-2 px-lg-3 card-top">
            <?php $r=1; foreach ($topDetail['products'] as $product): $product['rank'] = $r++; ?>
            <?=$this->render('//partials/top-card.php',$product);?>
            <?php endforeach;?>

         </div>
         <div class="col-lg-4 mt-lg-5 mt-2 col-md-6 col-12 px-2 px-lg-3 ">
             <?=$this->render('//partials/top-list.php',array("topList"=>$topDetail['topList']));?>
             <?=$this->render('//partials/related-products.php',array("related"=>$topDetail['related']));?>
         </div>
      </div>
   </div>