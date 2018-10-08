<?PHP
use yii\helpers\Url;
use frontend\components\TextUtility;
$oneproducts = $products;
$products = array_chunk($products,4);
$TextUtility = new TextUtility();
?>
<div class="container">
         <div class="row">
            <div class="col-lg-12 col-12 px-2 px-lg-3">
               <div class="cards-box p-lg-2 mb-2 rounded-0">
                  <h2 class="text-center mt-2 mt-lg-5 mb-2"><?=$TextUtility->showTitle($title,100)?></h2>
                  <div id="carouselExampleControls" class="carousel slide  hidden-xs" data-ride="carousel">
                     <div class="carousel-inner">
                        
                        <?php foreach($products as $key=>$val):?>
                        <div class="carousel-item <?=$key==0?'active':''?>">
                           <div class="row">
                              <?php foreach($val as $key=>$item):?>
                              <div class="col-lg-3 col-6 text-center">
                                 <div class="silder_card">
                                    <img class="" src="<?=$item['image']?>">
                                 </div>
                                 <h5><?=$item['Brand']?></h5>
                                 <p><a href="<?=Url::to(['products/',"slug"=>$item['guid']]);?>" class="h6"><?=$TextUtility->showTitle($item['post_title'],100)?></a></p>
                                 <a href="" class="btn btn-green py-1 px-2"><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png"><span class="h5 mb-0">Explore at amazon</span></a>
                              </div>
                              <?PHP endforeach; ?>
                              
                           </div>
                        </div>
                        <?PHP endforeach; ?>
                        
                     </div>
                     <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
                  <div class="swiper-container silder-contd swiper-container-horizontal d-lg-none">
                     <div class="swiper-wrapper silder-mobile">
                         <?php foreach($oneproducts as $key=>$item):?>
                        <div class="swiper-slide swiper-slide-active">
                           <div class="swiper-zoom-container silder-zm-m">
                              <div class="row mt-2 my-lg-2">
                                 <div class="col-lg-4 col-12 text-center">
                                    <div class="silder_card text-center image-middl-card">
                                       <img class="img-fluid" src="<?=$item['image']?>">
                                    </div>
                                 </div>
                                 <div class="col-lg-8 col-12 text-center text-lg-left pl-lg-0 mt-1 mt-lg-0">
                                    <a href="<?=Url::to(['products/',"slug"=>$item['guid']]);?>"><h5><?=$item['Brand']?></h5></a>
                                    <a href="<?=Url::to(['products/',"slug"=>$item['guid']]);?>"><h6><?=$item['post_title']?></h6></a>
                                    <a href="<?=$item['DetailPageURL']?>" target="_blank"  class="btn btn-green py-1 px-2"><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png">Explore at amazon</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?PHP endforeach; ?>
                     </div>
                     <!-- Add Pagination -->
                     <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                     <!-- Add Navigation -->
                     <div class="swiper-button-prev card-next-btn swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                     <div class="swiper-button-next card-next-btn" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                     <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                  </div>
               </div>
            </div>
         </div>
      </div>