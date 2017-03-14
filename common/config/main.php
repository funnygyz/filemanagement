<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
            'authManager'=>[
            'class'=>'yii\rbac\Dbmanager',
        ],
    ],
    'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
    ],
];
