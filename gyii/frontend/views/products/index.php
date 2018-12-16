<!--Product detail page-->
<?PHP
use frontend\assets\LoginAsset;
   use common\widgets\Alert;
   
if (!Yii::$app->user->isGuest){
   LoginAsset::register($this);
}

?>
<?php

use yii\helpers\Url;
?>
<div class="container">
         <div class="row">
            <div class="co-md-6 col-lg-6 p-0  px-lg-3 mt-lg-5 order-lg-last text-center bg-white">
               <img class="" src="<?=$pDetail['image']?>">
               <div class="product-mobile-bg"></div>
            </div>
            <div class="co-md-6 col-lg-6 px-2 px-lg-3 mt-lg-5">
               <div class="cards-box mb-2 mb-lg-0 card-top">
                  <!--  <p>0.5 oz/ 15 mL Mattifying Primer – 1 oz/ 30 mL Mattifying Setting Spray – 0.14 oz/ 4 g Matte Setting Powder</p> -->
                  <h1 class="mb-1"><?=$pDetail['post_title']?></h1>
                  <div class="mt-2">
                     <span class="float-left mr-3">By <?=$pDetail['Brand']?></span>
                     <a href="" class="ml-auto">
                     <span class="fa fa-heart mr-1 "></span>Add to Favorite</a>
                  </div>
                  <div class="row mt-lg-2">
                     <div class="col-lg-6 col-12 col-md-6 col-sm-6 d-lg-none">
                        <h3 class="mb-0 "><i class="fa fa-inr mr-1 mt-lg-2" aria-hidden="true"></i>15,199.00 <span class="text-secondary"><del> <i class="fa fa-inr ml-1" aria-hidden="true"></i> 3000</del></span></h3>
                        <a href="" class="btn btn-green w-100 d-lg-none mt-3"><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png">Explore at Amazon</a>
                     </div>
                     <div class="col-lg-6 col-12 col-md-6 col-sm-6 d-lg-none">
                        <a href="<?=$pDetail['DetailPageURL']?>" class="btn btn-green w-100 fixed-btn_bottm"><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png">Explore at amazon</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 mt-lg-3 p-0 mb-lg-2">
                  <div class="text-body p-2 p-lg-0 cards-box mb-2 mb-lg-0">
                     <h3>Description</h3>
                     <?=$pDetail['post_content']?>
                     <a href="" class="text-center mt-2 color-pink">Read More</a>
                  </div>
               </div>
               <div class="row mt-lg-2 ">
                  <div class="col-lg-12  d-none d-lg-block">
                     <p><?=$pDetail['post_excerpt']?></p>
                  </div>
                  <div class="col-lg-6 col-12 col-md-6 col-sm-6 d-none d-lg-block">
                     <h3 class="mb-0 ">
                        <?PHP if($pDetail['LowestNewPrice']!="NA"):?>
                        <i class="fa fa-inr mr-1 mt-lg-2" aria-hidden="true"></i><?=$pDetail['LowestNewPrice']?>
                        <span class="text-secondary">
                           <del><i class="fa fa-inr" aria-hidden="true"></i><?=$pDetail['ListPrice']?></del>
                        </span>
                        <?PHP else:?>
                        <i class="fa fa-inr mr-1 mt-lg-2" aria-hidden="true"></i><?=$pDetail['ListPrice']?>
                        <?PHP endif;?>
                     </h3>
                     <a href="" class="btn btn-green w-100 d-lg-none mt-3 "><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png">Explore at Amazon</a>
                  </div>
                  <div class="col-lg-6 col-12 col-md-6 col-sm-6 d-none d-lg-block ">
                     <a href="<?=$pDetail['DetailPageURL']?>" target="_blank" class="btn btn-green w-100 fixed-btn_bottm"><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png">Explore at amazon</a>
                  </div>
               </div>
            </div>
         </div>
       
         <div class="row">
            <div class="col-lg-12 mt-lg-3 px-2 px-lg-3 mb-lg-5">
               <div class="bg-light-dark text-body p-2 cards-box mb-2 mb-lg-0">
                  <span class=""><b>Tags:</b></span>
                  
                  <?php foreach($pDetail['tags'] as $tag):?>
                     <?php if($tag['taxonomy']=='post_tag'):?>
                  <a class="" href="<?=Url::to(['products/tag','tag' =>$tag['slug']]);?>" rel="tag"><?=$tag['name']?></a> 
                     <?php else:?>
                        <?PHP $brand = $tag;   ?>
                     <?php endif;?>
                  <?php endforeach; ?> 
                    
                  <ul class="list-unstyled mb-0">
                     <b>Categories:</b>
                     <li class="list-inline-item">
                        <a href="<?=Url::to(['products/brand','brand' =>$brand['slug']]);?>" class="">
                           <h5 class="mb-0"><?=$brand['name']?></h5>
                        </a>
                     </li>
                     
                  </ul>
               </div>
            </div>
         </div>
      </div>



<div class="py-lg-4 light-gary">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 px-2 px-lg-3 pr-lg-0">
            <?PHP
               if(!empty($pDetail['pcommnets'])){
                  echo $this->render('//partials/comment-view.php',array("allcomments"=>$pDetail['pcommnets'],"parent"=>0));
               }else{
                  echo $this->render('//partials/no-comments.php');
               }
            ?>
            <br>
            <?=$this->render('//partials/comment-form.php',['model'=>$model]);?>
            

         </div>
         <div class="col-lg-4 px-2 px-lg-3">
            
            <?=$this->render('//partials/related-products.php',array("related"=>$pDetail['related']));?>
            <?=$this->render('//partials/recent-comments.php');?>
         </div>
      </div>
   </div>
</div>