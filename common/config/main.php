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
        'dsn' => 'mysql:host=127.0.0.1;dbname=oko-gsm_azsrp',
        'username' => '045223259_azsrp',
        'password' => 'ch9387fhsdh8303i',
        'charset' => 'utf8',
        ]
    ],
    'modules'=> [
        'debug' => [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['83.149.37.97', '::1'],
    ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['83.149.37.97', '::1'],
        ]
    ]
];


