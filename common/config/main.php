<?php
return [
    'language' => 'ru-RU',
    'name' => 'Яблоневый сад',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db'=>[
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=127.0.0.1;dbname=',
        'username' => '',
        'password' => '',
        'charset' => 'utf8',
        ]
    ],
    'modules'=> [
        'debug' => [
        'class' => 'yii\debug\Module',
    ],
        'gii' => [
            'class' => 'yii\gii\Module',
        ]
    ]
];


