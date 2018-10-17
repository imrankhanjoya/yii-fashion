<?PHP
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\LoginAsset;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
$this->registerJsVar('mediaupload',Url::to(['ajax/media']));
$this->registerJsVar('postsave',Url::to(['ajax/create-post']));
LoginAsset::register($this);

$category = ["Acne-Prone Skin","Age Defiers","Bath & Body","Combination Skin","Dry Skin"=>"Dry Skin","Ingredient Sticklers","Oily Skin","Product review","Sensitive Skin","Skincare Aware"];

?>


<div class="container">
	
    <h1>Start Topic</h1>
    <?php if(isset($result['msg'])):?>
    <div class="alert <?= $result['status']==true?'alert-success':'alert-danger'?>">
      <?=$result['msg']?>
    </div>
    <?php endif;?>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(["id"=>"post-form"]); ?>

                <?PHP
                $errorDiv = '<div class="help-block help-block-error col-lg-12"></div>';
                ?>

               <datalist id="browsers" class="p-0 rounded-0 w-100" >
                  <?PHP
                  foreach($category as $key=>$val){
                  	echo '<option class="px-0 w-100" value="'.$val.'"></option>';
              		}
                  ?>
               </datalist>
                <?= $form->field($model, 'ID',['options' => ["required"=>true]])->hiddenInput(['autofocus' => true])->label(false); ?>
                <?= $form->field($model, 'title',['options' => ["required"=>true]])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'category',['options' => ["required"=>true,"list"=>"browsers"]])->textInput(["list"=>"browsers"]) ?>

                <?= $form->field($model, 'content')->textarea() ?>
                <?= $form->field($model, 'tags',['options' => ["required"=>true]])->textInput(['autofocus' => true,"placeholder"=>"Use commas between tags"]) ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'post-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

<?PHP
$script = <<< JS
tinymce.init({
selector: '#postform-content',
menubar:false,
toolbar:'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat insert link image lists media preview ',
images_upload_url: mediaupload,
images_upload_base_path: '',
images_upload_credentials: true,
autoresize_min_height:300,
plugins : 'autoresize advlist autolink link image lists media preview',
setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});


// $( "#post-form" ).submit(function( event ) {
//   var dataVal = $(this).serialize();
//   $.ajax({
// 		method: "POST",
// 		url: postsave,
// 		dataType:'JSON',
// 		data:dataVal
// 		});
//   event.preventDefault();
// });




JS;
$this->registerJs($script);
?>


