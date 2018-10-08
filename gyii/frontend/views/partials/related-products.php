<?PHP
use yii\helpers\Url;
//print_r($related);
?>
<div class="cards-box card p-lg-2 mb-2 rounded-0">
                     <h3 class="">Related Products</h3>
                     <hr class="my-1">
                     <div class="swiper-container silder-contd swiper-container-horizontal">
                        <div class="swiper-wrapper silder-mobile" style="transform: translate3d(-990px, 0px, 0px); transition-duration: 0ms;">
                           <?PHP foreach($related as $key=>$val):?>
                           <div class="swiper-slide" style="width: 330px;">
                              <div class="swiper-zoom-container silder-zm-m">
                               <div class="row mt-2 my-lg-2">
                                       <div class="col-lg-4 col-12 text-center">
                                          <div class=" card-brder-hovr text-center image-middl-card">
                                             <img class="img-fluid" src="<?=$val['image']?>">
                                          </div>
                                       </div>
                                       <div class="col-lg-8 col-12 text-left pl-lg-0">
                                          <a href="<?=Url::to(['/products','slug' =>$val['guid']]);?>
"><h6 class="mb-0 silder-text"><?=$val['post_title']?></h6>
                                          <h6 class=" mb-0 mt-2">
                                             <b><i class="fa fa-inr mr-1 silder-text" aria-hidden="true"></i><span class="silder-text"><?=$val['ListPrice']?></span></b> 
                                             <del class="text-secondary ml-1"> 
                                             <i class="fa fa-inr" aria-hidden="true"></i> 3000
                                             </del>
                                          </h6>
                                       </div>
                                       <div class="col-lg-12 mt-3 d-lg-none">
                                          <a href="<?=$val['DetailPageURL']?>" class="btn btn-green w-100"><img class="btn-icon mr-2" src="https://cdn1.iconfinder.com/data/icons/smallicons-logotypes/32/amazon-512.png">Explore at amazon</a>
                                       </div>
                                    </div>
                                 </div>
                           </div>
                           <?PHP endforeach; ?>
                          
                           
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                        <!-- Add Navigation -->
                        <div class="swiper-button-prev card-next-btn" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>
                        <div class="swiper-button-next card-next-btn swiper-button-disabled" tabindex="0" role="button" aria-label="Next slide" aria-disabled="true"></div>
                     <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                     <a href="" class="btn d-none d-lg-block">
                        <h5 class="mb-0">View More</h5>
                     </a>
                  </div>