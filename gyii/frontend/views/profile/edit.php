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




    <div class="row">
        <div class="col-lg-6 offset-lg-2 mb-3">
            
            <img src="<?=$model->usermeta['image']?>" id="userpic" class="rounded-circle border-1" style="height: 200px">
            <input type="file" id="file" title="Upload file"  name="profilepic">
            
        </div>
        <div class="col-lg-6 offset-lg-2">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?PHP
                $errorDiv = '<div class="help-block help-block-error col-lg-12"></div>';
                ?>
                
                <?= $form->field($model, 'user_login',['options' => ["required"=>true,'class' => 'input-group input-group-sm mb-3'],'template' => '<div class="input-group-prepend">{label}</div>{input}'.$errorDiv])->textInput(['autofocus' => true])->label("User name",["class"=>"input-group-text"]); ?>

                <?= $form->field($model, 'user_email',['options' => ["required"=>true,'class' => 'input-group input-group-sm mb-3'],'template' => '<div class="input-group-prepend">{label}</div>{input}'.$errorDiv])->textInput(['autofocus' => true])->label("Your Email",["class"=>"input-group-text"]); ?>

                <?= $form->field($model, 'display_name',['options' => ["required"=>true,'class' => 'input-group input-group-sm mb-3'],'template' => '<div class="input-group-prepend">{label}</div>{input}'.$errorDiv])->textInput()->label("Display Name",["class"=>"input-group-text"]); ?>

                <?= $form->field($model, 'birthday',['options' => ["required"=>true,'class' => 'input-group input-group-sm mb-3'],'template' => '<div class="input-group-prepend">{label}</div>{input}'.$errorDiv])->textInput(['value'=>$model->usermeta['birthday'],"type"=>"date"])->label("Birth day",["class"=>"input-group-text"]); ?>



                <?= $form->field($model, 'description')->textInput(['value'=>$model->usermeta['description'],"type"=>"textarea"]) ?>
                <?= $form->field($model, 'usermeta["image"]')->hiddenInput(['value'=>$model->usermeta['image'],'id' => 'userimage'])->label(false) ?>

                
                <div class="form-group">
                    <?= Html::submitButton('Upate', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        
    </div>
</div>
