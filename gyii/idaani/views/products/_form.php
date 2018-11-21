<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SalesRank')->textInput() ?>

    <?= $form->field($model, 'ListPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'LowestNewPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_date')->textInput() ?>

    <?= $form->field($model, 'post_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_excerpt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'post_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post_parent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DetailPageURL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Manufacturer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
