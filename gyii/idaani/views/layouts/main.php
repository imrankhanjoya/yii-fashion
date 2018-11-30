<?php

/* @var $this \yii\web\View */
/* @var $content string */

use idaani\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="bg-clr-ylw top-mobile contenr-all">
    



 <nav class="navbar navbar-expand-md  mt-md-3 py-md-3 nav-fixid  mobile-idaani-nav sidebarNavigation">
            <div class="container-fluid">
               <img class="idaani-logo" src="img/idaani-logo.jpg " style="">
               <button class="navbar-toggler rightNavbarToggler px-0" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fa fa-bars" aria-hidden="true"></i>
               </button>
               <div class="collapse navbar-collapse d-lg-flex justify-content-md-center" id="navbarsExample08">
                  <ul class="navbar-nav idaani-nav">
                     <i class="fa fa-close nav-close-icon d-md-none"></i>
                     <li class="nav-item active">
                        <a class="nav-link px-3" href="#mini-about">about <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link px-3" href="#new-pages">Inspirations</a>
                     </li>
                     <li class="nav-item text-muted">
                        <a class="nav-link px-3" href="#new-work-ttl">New work</a>
                     </li>
                     <!-- <li class="nav-item dropdown">
                        <a class="nav-link px-3" href="https://example.com" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">blog</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown08">
                           <a class="dropdown-item" href="#mini-about">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#new-work-ttl">New work</a>
                        </div>
                     </li> -->
                  </ul>
                  <a class="d-none d-md-block" href="#"><i class="fa fa-search text-muted search-icon" aria-hidden="true" style=""></i></a>
               </div>
            </div>
         </nav>
         <div class="nav flex-column tabs-pages">
            <a class="nav-link active px-0 nav_indicator py-2" href="#top-images" data-toggle="tooltip" data-placement="left" title="top images">
            </a>
            <a class="nav-link px-0 nav_indicator py-2" href="#mini-about"  data-toggle="tooltip" data-placement="left" title="mini about"></a>
            <a class="nav-link px-0 nav_indicator py-2" href="#three-tabs"  data-toggle="tooltip" data-placement="left" title="video banner"></a>
            <a class="nav-link px-0 nav_indicator py-2" href="#new-work-ttl"  data-toggle="tooltip" data-placement="left" title="new work title"></a>
            <a class="nav-link px-0 nav_indicator py-2" href="#featured-img" data-toggle="tooltip" data-placement="left" title="featured work"></a>
            <a class="nav-link px-0 nav_indicator py-2" href="#new-pages"  data-toggle="tooltip" data-placement="left" title="new pages"></a>
         </div>





        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
