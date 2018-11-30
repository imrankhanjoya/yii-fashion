<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'gloatme',
        ],
        'user' => [
            'identityClass'   => 'frontend\models\User',
            'enableAutoLogin' => true,
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => []
                ]
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'shop' => 'products/list',
                'products-for/<tag:[a-z0-9-]+>' => 'products/tag',
                'request-password-reset' => 'site/request-password-reset',
                'signup' => 'site/signup',
                'login' => 'site/login',
                'top-cosmetic-products' => 'top/list',
                'product/<slug:[a-z0-9-]+>' => 'products/index',
                'discuss-beauty-tips' => 'community',
                'discuss/<slug:[a-z0-9-]+>' => 'community/detail',
                'top_items/<slug:[a-z0-9-]+>' => 'top/index',
                'top/<slug:[a-z0-9-]+>' => 'top/index',
            ],
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
