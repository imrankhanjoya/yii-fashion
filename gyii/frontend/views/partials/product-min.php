<?PHP
use yii\helpers\Url;
//print_r($post_title);

?>
<div class="col-lg-3 col-md-6 col-12 col-sm-12 px-2 px-lg-3 my-2">
               <div class="cards-box">
                  <div class="product-card-img image-middl-card">
                     <img class="img-fluid" src="<?=$image?>">
                  </div>
                  <h6 class="product-ttl-heig"><a href="<?=Url::to(['/products',"slug"=>$guid]);?>"><b><?=$Brand?></b></a></h6>
                  <h6 class="product-ttl-heig"><a href="<?=Url::to(['/products',"slug"=>$guid]);?>"><b><?=$post_title?></b></a></h6>
                  <button type="button" class="btn btn-light"><a class="small" href="#"><?=$ListPrice?></a></button>
                  <?php if (Yii::$app->user->isGuest):?>
                  <button type="button" class="btn btn-light float-right"><a class="small" href="#" ><i class="mr-1 fa fa-heart" aria-hidden="true"></i>login to add</a></button>
                  <?php endif;?>
                  <?php if (!Yii::$app->user->isGuest):?>
                     <button type="button" class="btn btn-light float-right"><a class="small addtofav" href="#" data-type="product" data-id="<?=$ID?>"><i class="mr-1 fa fa-heart" aria-hidden="true"></i>add to fav</a></button>
                  <?php endif;?>   
               </div>
            </div>