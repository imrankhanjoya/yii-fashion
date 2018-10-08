<?PHP
   use frontend\assets\LoginAsset;
   use common\widgets\Alert;

if (!Yii::$app->user->isGuest){
   LoginAsset::register($this);
}

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