<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=gloatme',
            'username' => 'root',
            'password' => 'HT$#H1Y&Y@s45',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'hellogloat.me@gmail.com',
                'password' => 'ilikethis2005',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'cache'=>[
            'class'=>'yii\caching\FileCache',
        ],
    ],
];
