<?php
use yii\helpers\Url;
?>
        <!-- <div class="cards-box w-100 ">
         <div class="row ml-0 mr-0 d-flex justify-content-between w-100">
                <div class="card p-2 card-btn-sdow">
                  <a href="<?=Url::to(["/profile/filters"])?>">
                     My Filter
                  </a>
               </div>
                <div class="card p-2 card-btn-sdow">
                  <a href="<?=Url::to(["/profile/edit"])?>">
                     Profile
                  </a>
               </div>
            
               <div class="card p-2 card-btn-sdow">
                 <a href="<?=Url::to(["/profile/edit-pass"])?>">
                 <b class="">Change Password</b>
                 </a>
               </div>
            
         </div>
      </div> -->

<ul class="nav justify-content-center bg-white border-bottom">
  <li class="nav-item col-4 border-right text-center px-0">
    <a class="nav-link active px-0" href="<?=Url::to(["/profile/filters"])?>"><b>My Filter</b></a>
  </li>
  <li class="nav-item col-4 border-right text-center px-0">
    <a class="nav-link px-0" href="<?=Url::to(["/profile/edit"])?>"><b>Profile</b></a>
  </li>
  <li class="nav-item col-4 text-center px-0">
    <a class="nav-link px-0" href="<?=Url::to(["/profile/edit-pass"])?>"><b>Change Password</b></a>
  </li>
</ul>