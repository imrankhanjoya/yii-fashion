<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WpTerms */

$this->title = 'Create Wp Terms';
$this->params['breadcrumbs'][] = ['label' => 'Wp Terms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wp-terms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
