<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductsQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'sku') ?>

    <?= $form->field($model, 'SalesRank') ?>

    <?= $form->field($model, 'ListPrice') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'LowestNewPrice') ?>

    <?php // echo $form->field($model, 'post_date') ?>

    <?php // echo $form->field($model, 'post_content') ?>

    <?php // echo $form->field($model, 'post_title') ?>

    <?php // echo $form->field($model, 'post_excerpt') ?>

    <?php // echo $form->field($model, 'post_status') ?>

    <?php // echo $form->field($model, 'post_parent') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'DetailPageURL') ?>

    <?php // echo $form->field($model, 'Publisher') ?>

    <?php // echo $form->field($model, 'Manufacturer') ?>

    <?php // echo $form->field($model, 'Brand') ?>

    <?php // echo $form->field($model, 'guid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
