<?PHP
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
               <div class="row">
                  <div class="col-lg-3 col-sm-3 col-md-3 col-12 text-center ">
                     <h1 class="top-txt"><b>TOP #<?=$rank?></b></h1>
                     <img  class="img-fluid mt-3" src="<?=$image?>" />
                  </div>
                  <div class="col-lg-9 col-sm-9 col-md-9 col-12">
                     <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-12 mt-2 mt-lg-0">
                           <a href="<?=Url::to(['products/',"slug"=>$guid]);?>">
                              <h3><?=$post_title?></h3>
                           </a>
                           <h5 class="mt-3 mb-0"><b><?=$Brand?></b></h5>
                           <?php if (Yii::$app->user->isGuest):?>
                           <button type="button" class="btn bg-white d-none d-lg-inline-block"><a class="small" href="#" ><i class="mr-1 fa fa-heart" aria-hidden="true"></i>login to add</a></button>
                           <?php endif;?>
                           <?php if (!Yii::$app->user->isGuest):?>
                              <button type="button" class="btn bg-white d-none d-lg-inline-block"><a class="small addtofav" href="#" data-type="product" data-id="<?=$ID?>"><i class="mr-1 fa fa-heart" aria-hidden="true"></i>add to fav</a></button>
                           <?php endif;?>  
                           <!-- <button type="button" class="btn bg-white d-none d-lg-inline-block"><a class="small" href="#"><i class="mr-1 fa fa-heart" aria-hidden="true"></i>Login to add</a></button>
 -->
                           <button type="button" class="btn bg-white d-none d-lg-inline-block"><a class="small" href="#"><i class="mr-1  fa fa-comment" aria-hidden="true"></i></a><span class="text-muted"> 0 Reviews</span></button>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-12 p-0 text-center d-none d-lg-block">
                           <img class="w-50 img-fluid icon-product" src="http://d1acy2vp0zxghs.cloudfront.net/products/images/000/009/707/medium/innisfreenosebum.jpeg?1465881563">
                           <h6><b>Seller Rank</b> (<?=$SalesRank?>)</h6>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-12 mt-2 mt-lg-4">
                           <p><?=$post_content?>
                              <span><a class="ml-2" href="#"><b>View More</b></a>
                              </span>
                           </p>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-6 mt-2 ">
                           <h3 class="text-secondary">Lowest price from</h3>
                           <?php if($LowestNewPrice!="NA"): ?>
                           <del class="mt-0 text-dark"><?=$ListPrice?></del>
                           <span class="mt-0 text-dark"><?=$LowestNewPrice?></span>
                           <?php else: ?>
                           <span class="mt-0 text-dark"><?=$ListPrice?></span>   
                           <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-md-right text-left my-3 pl-lg-0">
                           <a href="<?=$DetailPageURL?>" target="_blank" class="btn btn-green w-100 fixed-btn_bottm"><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png">Explore at amazon</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12 text-center my-lg-4 p-0">
                  <div class="border"></div>
                  <div class="mr-auto ml-auto border mt-1 w-75"></div>
               </div>
            </div>