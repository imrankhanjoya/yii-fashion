<?PHP
use yii\helpers\Url;
use yii\helpers\Html;

//print_r($topList);exit;
?>
<div class="p-2 p-lg-0 cards-box">
               <h5><b>SHARE THIS LIST</b></h5>
               <h5><b>RECENT TOP COLLECTION</b></h5>
               <div class="">
                  <?php foreach($topList as $list): ?>
                  <a href="<?=Url::to(['top/',"slug"=>$list['post_name']]);?>">
                     <h6 class=""><?=$list['post_title']?></h6>
                  </a>
                 <?php endforeach; ?>
                  
               </div>
            </div>