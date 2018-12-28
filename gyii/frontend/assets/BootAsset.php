<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class BootAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css',
    ];
    public $js = [
        'https://code.jquery.com/jquery-1.12.4.js',
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',   
        'js/custom.js'   
    ];
    
}
