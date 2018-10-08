<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
    	'js/simpleUpload.min.js','js/fave.js'];
    public $depends = [
        
        'frontend\assets\BootAsset',
        'yii\web\YiiAsset',
        
    ];	
}
