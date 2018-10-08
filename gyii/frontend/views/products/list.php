<?PHP
   use frontend\assets\LoginAsset;
   use common\widgets\Alert;

if (!Yii::$app->user->isGuest){
   LoginAsset::register($this);
}
?>
<?=$this->render('//partials/product-cats.php');?>
<?=$this->render('//partials/product-brands.php');?>

<div class="container">
<div class="row">



<?php

foreach($pList as $list){
	echo $this->render('//partials/product-min.php',$list);
}
?>

</div>
</div>

<!-- basic modal -->
      <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
         <div class="modal-dialog m-0 bottom-open">
            <div class="modal-content rounded-0 border-0">
               <div class="modal-body">
                  <div class="mt-3" style="bottom: 90px;">

                   
                    <div class="col-12">
                       <h2 class="mb-2">Quick Links</h2>
                     <h5><a href="#"><b>LIPSTICK</b></a><span><img class="btn-icon float-right" src="http://www.gloat.me/wp-content/themes/pashmina/images/lipstick.svg"></span></h5>
                     <h5><a href="#"><b>EYE</b></a><span><img class="btn-icon float-right" src="http://www.gloat.me/wp-content/themes/pashmina/images/eye-shadow.svg"></span></h5>
                     <h5><a href="#"><b>NAIL-POLISH</b></a><span><img class="btn-icon float-right" src="http://www.gloat.me/wp-content/themes/pashmina/images/nail-polish.svg"></span></h5>
                     <h5><a href="#"><b>HAIR</b></a><span><img class="btn-icon float-right" src="http://www.gloat.me/wp-content/themes/pashmina/images/woman-with-long-hair.svg"></span></h5>
                     <h5><a href="#"><b>FACIAL</b></a><span><img class="btn-icon float-right" src="http://www.gloat.me/wp-content/themes/pashmina/images/facial-treatment.svg"></span></h5>
                     <h5><a href="#"><b>CREAM</b></a><span><img class="btn-icon float-right" src="http://www.gloat.me/wp-content/themes/pashmina/images/cream.svg"></span></h5>
                  </div>

                  

                  <div class="col-12 d-lg-block mt-3">
                       <h2 class="mb-2">Search</h2>
                   

                    <select class="form-control p-0 mt-2 rounded-0" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                   </select>

                     <select class="form-control p-0 mt-2 rounded-0" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                   </select>

                     <select class="form-control p-0 mt-2 rounded-0" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                   </select>
                    </div>
                
                  <div class="col-12 mb-2 mt-5">
                     <form action="" method="get">
                        <input list="browsers" name="browser" class="form-control py-1 px-1 w-100 rounded-0">
                        <datalist id="browsers" class="p-0 rounded-0" >
                           <option class="px-0" value="Internet Explorer"></option>
                           <option class="px-0" value="Firefox"></option>
                           <option class="px-0" value="Chrome"></option>
                           <option class="px-0" value="Opera"></option>
                           <option class="px-0" value="Safari"></option>
                        </datalist>
                   <!--      <input type="submit" class="w-25 py-1 mt-1"> -->
                     </form>
                  </div>
                 <div class="col-12">
                     <input class="form-control rounded-0 px-1" type="text" name="">
                 </div>
               </div>
            </div>
               <div class="modal-footer pb-0">
                  <a type="" class="btn text-white w-50" data-dismiss="modal">Close</a>
                  <a type="" class="btn text-white w-50">Save changes</a>
               </div>
            </div>
         </div>
      </div>
      <div class="col text-right fixed-btn_bottm px-3 d-lg-none">
         <a href="#" class="btn text-white w-100" data-toggle="modal" data-target="#basicModal">Click to open Modal</a>
      </div>