<?PHP 
use yii\helpers\Url;
// echo "<pre>";
// print_r($userProfile);
// echo "</pre>";
// exit;
use frontend\assets\LoginAsset;
use common\widgets\Alert;
if (!Yii::$app->user->isGuest){
LoginAsset::register($this);
}
?>

<!-- *************************TOP HEADER ************************ -->

<div class="col-12 col-sm-12 col-md-12 col-lg-12 bg-img-fst pt-5 px-1 px-lg-2">
        
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center dv-white">
               <img class="rounded-circle whit-dv-img" src="<?=$userProfile['usermeta']['cupp_upload_meta']?>">
               <h4><b><?=$userProfile['display_name']?></b></h4>
               <a href="#"  class="p-2"><b>601</b> follower</a> <a href="#" class="p-2"> <span><b>13</b> following</span></a>
            </div>
       
      </div>



      <div class="row ml-0 mr-0">	
         <div class="col-lg-12 col-12 px-1 px-lg-1 text-center">
         	<div class="cards-box">
            <a class="  " href="">
               <ul class="list-unstyled d-inline-flex px-1 px-lg-3 border-right mt-3">
                  <li><i class="fa fa-comment-o h4 mr-2 mt-1"></i></li>
                  <li class="text-left">
                     <h6 class="mb-0 line-height-tl"><b>1.8 K</b><br>group</h6>
                  </li>
               </ul>
            </a>
            <a class="  " href="">
               <ul class="list-unstyled d-inline-flex px-1 px-lg-3 border-right mt-3">
                  <li><i class="	fa fa-group h4 mr-2 mt-1"></i></li>
                  <li class="text-left">
                     <h6 class="mb-0 line-height-tl"><b>15</b><br>Group</h6>
                  </li>
               </ul>
            </a>
            <a class="  " href="">
               <ul class="list-unstyled d-inline-flex  border-right mt-3 px-1 px-lg-3">
                  <li><i class="fa fa-address-book h4 mr-2 mt-1"></i></li>
                  <li class="text-left">
                     <h6 class="mb-0 line-height-tl"><b>10</b><br>Looks</h6>
                  </li>
               </ul>
            </a>
            <a class="  " href="">
               <ul class="list-unstyled d-inline-flex px-1 px-lg-3  mt-3">
                  <li><i class="fa fa-star-o h4 mr-2 mt-1"></i></li>
                  <li class="text-left">
                     <h6 class="mb-0 line-height-tl"><b>0</b><br>Reviews</h6>
                  </li>
               </ul>
            </a>
         </div>
       </div>
      </div>



<div class="p-lg-3 container-fluid px-1 profile-btn-bg mt-2 mt-lg-0">
   <div class="cards-box">
   <div class="row ml-0 mr-0">
      <div class="col-lg-6 col-6 text-center">
          <div class="card p-2 card-btn-sdow">
            <a data-type="user" data-id="<?=$userProfile['ID']?>" href="#" class="addtofav">
               Follow
            </a>
         </div>
      </div>
      <div class="col-lg-6 col-6 text-center">
         <a href="<?=Url::to(['profile/edit']);?>"><div class="card p-2 card-btn-sdow">
             <b class="">Send Massage</b>
         </div></a>
      </div>
   </div>
</div>
</div>

<!-- *************************TOP HEADER ************************ -->










<!-- POST CREATED -->
<?php if(!empty($userProfile['postList'])):?>
<div class="p-lg-3 container-fluid px-1  mt-2 mt-lg-0">
   <h2 class="px-3">My Top Posts</h2>
   <div class="cards-box ">
   <div class="row ml-0 mr-0">
      <?PHP foreach($userProfile['postList'] as $val):?>
      <div class="col-lg-4 col-12 py-0 px-2" >
         <div class="col-12  mt-3 py-3" style="box-shadow: 1px 1px 5px 1px #dddddd">
            <a href="<?=Url::to(['/community/detail','slug'=>$val['post_name']])?>" >
               <?=$val['post_title']?>
            </a>
         </div>
      </div>
      <?PHP endforeach; ?>
   </div>
</div>
</div>
<?php endif; ?>



<!-- ***********USER COMMENTS************ -->

<?php if(!empty($userProfile['commentList'])):?>
<div class="p-lg-3 container-fluid px-1  mt-2 mt-lg-0">
   <h2 class="px-3">Recent Comments</h2>
   <div class="cards-box ">
   <div class="row ml-0 mr-0">
      <?PHP foreach($userProfile['commentList'] as $val):?>
      <div class="col-lg-4 col-12 py-0 px-2" >
         <div class="col-12  mt-3 py-3" style="box-shadow: 1px 1px 5px 1px #dddddd; border-radius:10px">
            <a href="<?=Url::to(['/community/detail','slug'=>$val['comment_content']])?>" >
               <?=$val['comment_content']?>
            </a>
         </div>
      </div>
      <?PHP endforeach; ?>
   </div>
</div>
</div>
<?php endif; ?>



<?php if(!empty($userProfile['following'])):?>
<div class="p-lg-3 container-fluid px-1  mt-2 mt-lg-0">
   <h2 class="px-3">Follwing</h2>
   <div class="cards-box">
   <div class="row ml-0 mr-0">
      <?PHP foreach($userProfile['following'] as $val):?>
      <div class="col-12 col-lg-3 px-4">
      <div class="row mt-3 py-3" style="box-shadow: 1px 1px 5px 1px #dddddd; min-height:100px;">
          <div class="col-4">
            <img src='<?=$val['meta_value']?>' class="rounded-circle" style="height: 80px; width: 80px"  >
         </div>
         <div class="col-8">
            
            <a href="<?=Url::to(['/profile','slug'=>$val['user_login']])?>" >
               <?=$val['display_name']?>
            </a><br>
            <a data-type="user" data-id="<?=$val['ID']?>" href="#" class="addtofav btn py-1 px-1 mt-2 small">
               Follow
            </a>
         </div>
         
      </div>
      </div>
      <?PHP endforeach; ?>
   </div>
</div>
</div>
<?php endif; ?>


<!-- TOPUSERS -->
<div class="p-lg-3 container-fluid px-1  mt-2 mt-lg-0">
   <h2 class="px-3">Top users</h2>
	<div class="cards-box">
   <div class="row ml-0 mr-0">
      <?PHP foreach($userProfile['topusers'] as $val):?>
      <div class="col-12 col-lg-3 px-4">
      <div class="row mt-3 py-3" style="box-shadow: 1px 1px 3px 1px #dddddd; min-height:100px;">
          <div class="col-4">
            <img src='<?=$val['meta_value']?>' class="rounded-circle" style="height: 80px; width: 80px"  >
         </div>
         <div class="col-8">
            
            <a href="<?=Url::to(['/profile','slug'=>$val['user_login']])?>" >
               <?=$val['display_name']?>
            </a><br>
            <a data-type="user" data-id="<?=$val['ID']?>" href="#" class="addtofav btn py-1 px-1 mt-2 small">
               Follow
            </a>
         </div>
         
      </div>
      </div>
      <?PHP endforeach; ?>
   </div>
</div>
</div>


