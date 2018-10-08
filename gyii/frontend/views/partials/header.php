<?PHP
use yii\helpers\Url;
use yii\helpers\Html;
$this->registerJsVar('tofav',Url::to(['ajax/fav']));
$this->registerJsVar('fileupload',Url::to(['ajax/upload']));

?>
<img class="d-lg-none" src="banner-navbar.jpg">
      <div class="col-lg-12 text-center">
         <a href=""><img class="w-25 py-4 d-none d-lg-inline-block " src="http://www.gloat.me/wp-content/uploads/2018/08/Gloatme-full-white.png"></a>
      </div>
      <nav class="navbar navbar-expand-lg py-2 py-lg-2 navbar-header">
         <a class="navbar-brand w-50 d-lg-none" href=""><img class="w-75 float-left" src="http://www.gloat.me/wp-content/uploads/2018/08/Gloatme-Full-Inverse.png"></a>
         <button class="navbar-toggler text-white border-0 pr-0" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link px-lg-4 py-3 py-lg-2 text-white" href="<?=Url::to(['/']);?>">HOME<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link px-lg-4 py-3 py-lg-2 text-white" href="<?=Url::to(['/top/list']);?>">TRENDING</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link px-lg-4 py-3 py-lg-2 text-white" href="<?=Url::to(['products/list']);?>">SHOP</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link px-lg-4 py-3 py-lg-2 text-white" data-toggle="modal" data-target="#myModal" href="#">SIGNUP</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link px-lg-4 py-3 py-lg-2 text-white" href="<?=Url::to(['/community']);?>">COMMUNITY</a>
               </li>
               <?php if (Yii::$app->user->isGuest):?>
               <li class="nav-item">
                  <a class="nav-link px-lg-4 py-3 py-lg-2 text-white" href="<?=Url::to(['site/login']);?>"><i class="fa fa-heart mr-1"></i>Login</a>
               </li>   
               <?PHP endif;?>   
               <?php if (!Yii::$app->user->isGuest):?>
               <li class="nav-item">
                  <a class="nav-link px-lg-4 py-3 py-lg-2 text-white" href="<?=Url::to(['/profile']);?>"><i class="fa fa-heart mr-1"></i>ME</a>
               </li>
               <?PHP endif;?>
            </ul>
         </div>
      </nav>