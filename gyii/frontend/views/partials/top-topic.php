<?PHP
use yii\helpers\Url;
$post_name = isset($post_name)?$post_name:"";
$post_title = isset($post_title)?$post_title:"";
$image = isset($image)?$image:"";
?>
<div class="col-lg-6 col-12 mt-2 mt-lg-4">
  <a href="<?=Url::to(['/top',"slug"=>$post_name]);?>" class="top-banners top-banners-hovr p-3 text-center position-relative align-items-center d-flex" style="background-image: url(<?=$image?>);" href="#">
     <div class="top-blck-bacgrnd"></div>
     <div class="text-center col-12 p-0">
        <h3 class="text-white lettr-spec h4 mb-0"><b><?=$post_title?></b></h3>
     </div>
  </a>
</div>