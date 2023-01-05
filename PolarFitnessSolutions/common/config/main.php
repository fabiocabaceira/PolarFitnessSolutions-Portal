<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'request' => [
        'parsers' => [
            'application/json' => \yii\web\JsonParser::class
        ],
            ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        ],
    ],
];
