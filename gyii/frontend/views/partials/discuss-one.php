<?PHP
use yii\helpers\Url;
use yii\helpers\Html;
$post_content = strip_tags($post_content);
$post_content = substr($post_content,0,300);
?>
<div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0 mt-2 mt-lg-5">
   <div class="row mt-2">
      <div class="col-lg-1 pr-lg-0 d-none d-lg-block col-2">
         <img class="rounded-circle user-profile" src="<?=$userimage?>">
      </div>
      <div class="col-lg-11 col-12">
         <span class="text-secondary user-big-ttl"><?=$post_title[0]?></span>
         <a href="<?=Url::to(['community/detail',"slug"=>$post_name]);?>">
            <h2 class="mt-2"><?=$post_title?></h2>
         </a>
         <p><?=$post_content?></p>
      </div>
   </div>
   <hr>
   <div class="row mb-2">
      <div class="col-lg-6 col-7">
         <a class="p-0" href=""><i class="fa fa-calendar"></i> <?=$post_date?></a>
         <a class="p-0 light-text" href=""><i class="mr-1 fa fa-eye ml-1"></i>444</a>
      </div>
      <div class="col-lg-6 col-5 text-right">
         <a class="comment-btn p-2" href=""><i class="fa fa-comment-o ml-1"></i> comment</a>
      </div>
   </div>
</div>