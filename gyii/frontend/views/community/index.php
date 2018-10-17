<?PHP
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="col-lg-12 p-0 py-2 border-banner d-none d-lg-block" style="background-image: url('http://www.gloat.me/wp-content/themes/pashmina/images/banner.svg');">
         <center>
            <img class="p-2" src="https://cdnmediablog.files.wordpress.com/2018/09/discuss1.png">
         </center>
      </div>

<div class="p-lg-3 container-fluid px-1 profile-btn-bg mt-2 mt-lg-0">
         <div class="cards-box">
         <div class="row ml-0 mr-0">
            <div class="col-lg-8 col-8 text-center">
                <div class="card p-2 card-btn-sdow">
                  <input type="text" name="search">
               </div>
            </div>
            <div class="col-lg-4 col-4 text-center">
               <a href="<?=Url::to(['community/post'])?>"><div class="card p-2 card-btn-sdow">
                   <b class="">Start Topic</b>
               </div></a>
            </div>
         </div>
      </div>
  </div>
<div class="container">
         <div class="row ">
            <div class="col-lg-9 px-2 px-lg-3">
               
               <?PHP foreach ($discussList as $key => $value): 
               //print_r($value);exit; ?>
            	<?=$this->render('//partials/discuss-one.php',$value);?>
            	<?PHP endforeach;?>
               
               
            </div>
            <div class="col-lg-3 col-12 mt-2 mt-lg-5 px-2 px-lg-3 mb-5 mb-lg-0">
               <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
                  <a href="<?=Url::to(['community/post'])?>">
               	<img src="http://www.gloat.me/wp-content/uploads/2018/08/My-Post.jpg">
                  </a>
               </div>

               <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
                     <h4><B>RECENT TOP DISCUSSION</B></h4>
                     <ul class="p-0">
                        <?PHP foreach ($mostecommented as $key => $value): ?>
                           <li class="d-block text-secondary p-1"><a href="<?=Url::to(['community/detail',"slug"=>$value['post_name']]);?>"><?=$value['post_title']?></a></li>
                        <?PHP endforeach;?>  
                     </ul>
               </div>

               <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
               <h4><B>Unanswered Talks</B></h4>
                     <ul class="p-0">
                        <?PHP foreach ($nocomment as $key => $value): ?>
                           <li class="d-block text-secondary p-1"><a href="<?=Url::to(['community/detail',"slug"=>$value['post_name']]);?>"><?=$value['post_title']?></a></li>
                        <?PHP endforeach;?>  
                     </ul>
               </div>




               <div class="p-2 p-lg-0 cards-box mb-2 mb-lg-0">
                  	<ul class="p-0">
                         <li class="d-block p-0">
                         <?PHP foreach ($topUsers as $key => $value):  ?>
                              <img class="user-profile  m-1 rounded-circle" src="<?=$value['userimage']?>">
                         <?PHP endforeach;?> 
                           </li>
                           <li class="d-block">
                              <p class="text-secondary mt-3"> Users who have posted recently.</p>
                           </li>
                     </ul>
               </div>

            </div>
         </div>
      </div>






























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
               <div class="modal-footer pb-0  px-2  px-lg-3">
                  <a type="" class="btn text-white w-50" data-dismiss="modal">Close</a>
                  <a type="" class="btn text-white w-50">Save changes</a>
               </div>
            </div>
         </div>
      </div>
      <div class="col text-right fixed-btn_bottm d-lg-none px-2 px-lg-3">
         <a href="#" class="btn text-white w-100" data-toggle="modal" data-target="#basicModal">Click to open Modal</a>
      </div>