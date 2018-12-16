<?PHP
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\LoginAsset;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
$this->registerJsVar('mediaupload',Url::to(['ajax/media']));
$this->registerJsVar('postsave',Url::to(['ajax/create-post']));
LoginAsset::register($this);
?>

<div class="container">
   
    <?php if(isset($result['msg'])):?>
    <div class="alert <?= $result['status']==true?'alert-success':'alert-danger'?>">
      <?=$result['msg']?>
    </div>
    <?php endif;?>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(["id"=>"comment-form"]); ?>

                <?PHP
                $errorDiv = '<div class="help-block help-block-error col-lg-12"></div>';
                ?>
               <img src="" id="mediapic" />
               <input type="file" id="media" title="Upload file"  name="file">
                <?= $form->field($model, 'ID',['options' => ["required"=>true]])->hiddenInput()->label(false); ?>
                <?= $form->field($model, 'parentID',['options' => ["required"=>true]])->hiddenInput(["value"=>0])->label(false); ?>
                <?= $form->field($model, 'content')->textarea() ?>
                <?= $form->field($model, 'url')->hiddenInput(["id"=>"mediapath"])->label(false)?>
                
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'post-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>