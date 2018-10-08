<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WpTerms */

$this->title = 'Update Wp Terms: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Wp Terms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->term_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wp-terms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
