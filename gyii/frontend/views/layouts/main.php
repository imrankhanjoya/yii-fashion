<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//ajax.googleapis.com/" rel="dns-prefetch" />
    <link href="//apis.google.com/" rel="dns-prefetch" />
    <link href="//fonts.googleapis.com/" rel="dns-prefetch" />
    <link href="//netdna.bootstrapcdn.com/" rel="dns-prefetch" />
    <link href="//assets.pinterest.com/" rel="dns-prefetch" />
    <link href="//platform.twitter.com/" rel="dns-prefetch" />
    <link href="//www.facebook.com/" rel="dns-prefetch" />
    <link href="//www.google-analytics.com/" rel="dns-prefetch" />
    <link href="//media-cache-ak0.pinimg.com/" rel="dns-prefetch" />
    <link href="//twitter.com/" rel="dns-prefetch" />
    <link href="//syndication.twitter.com/" rel="dns-prefetch" />
    <link href="//cdn.syndication.twimg.com/" rel="dns-prefetch" />
    <link href="//themes.googleusercontent.com/" rel="dns-prefetch" />
    <link href="//connect.facebook.net/" rel="dns-prefetch" />
    <link href="//pagead2.googlesyndication.com/" rel="dns-prefetch" />
    <link href="//contextual.media.net/" rel="dns-prefetch" />
    <link href="//googleads.g.doubleclick.net/" rel="dns-prefetch" />
    <link href="//qsearch.media.net/" rel="dns-prefetch" />
    <link rel='dns-prefetch' href='//ajax.googleapis.com' />
    <link rel='dns-prefetch' href='//s0.wp.com' />
    <link rel='dns-prefetch' href='//cdn2.stylecraze.com' />
    <link rel='dns-prefetch' href='//www.googletagservices.com' />
    <link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<?=$this->render('//partials/header.php');?>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>


<?=$this->render('//partials/footer.php');?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
