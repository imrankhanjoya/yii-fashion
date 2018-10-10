<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Tangerine%3A700%7CPathway+Gothic+One%7COpen+Sans+Condensed%3A300%2C700%7CDawning+of+a+New+Day%7CPinyon+Script%7CRaleway+Dots%7COswald%3A300%2C300i%2C400%2C700%7CRoboto%3A200%2C300%2C400%2C500%2C600%2C700%7CDancing+Script%7CTangerine&ver=4.9.6',
        'css/gloat-me.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
    ];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'frontend\assets\BootAsset',
        
        
    ];
}
