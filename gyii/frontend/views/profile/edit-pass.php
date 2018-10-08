<?php
use yii\helpers\Url;
use frontend\assets\LoginAsset;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (!Yii::$app->user->isGuest){
   LoginAsset::register($this);
}


$this->title = 'Edit Profile';
?>
<?PHP echo $this->render('//partials/profile-menu.php'); ?>

<div class="container mt-4">



    
    <?=$msg?>
    <div class="row">
        <div class="col-lg-6 offset-lg-2">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?PHP $errorDiv = '<div class="help-block help-block-error col-lg-12"></div>'; ?>
                
                <?= $form->field($model, 'password',['options' => ["required"=>true,'class' => 'input-group input-group-sm mb-3'],'template' => '<div class="input-group-prepend">{label}</div>{input}'.$errorDiv])->textInput(["type"=>"password"])->label("New password",["class"=>"input-group-text"]); ?>

                <?= $form->field($model, 'confirm_password',['options' => ["required"=>true,'class' => 'input-group input-group-sm mb-3'],'template' => '<div class="input-group-prepend">{label}</div>{input}'.$errorDiv])->textInput(["type"=>"password"])->label("Confirm password",["class"=>"input-group-text"]); ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        
    </div>
</div>
