<?php

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'th_TH', // เปิดใช้งานภาษาไทย
    'components' => [
        'authManager' => [
            // 'class' =>  'yii\rbac\PhpManager',
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
       'thaiFormatter'=>[
        'class'=>'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
    ], 
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['sumlee_y'],
            'confirmWithin' => 21600,
            'cost' => 12,
            'enableUnconfirmedLogin' => true,
        ],
        'capa' => [
            'class' => 'backend\modules\capa\capa',
        ],
        'isms' => [
            'class' => 'backend\modules\isms\isms',
        ],
        'mailreng' => [
            'class' => 'backend\modules\mailreng\mailreng',
        ],
    ],
];
