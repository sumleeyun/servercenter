<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

use \yii\web\Request;

$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());
return [
    'id' => 'app-backend',
    'name' => 'datacenter',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ],
        'guidebook' => [
            'class' => 'app\modules\guidebook\GuidebookModule',
        ],
        'support' => [
            'class' => 'app\modules\support\module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['sumlee_y']
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'dektrium\user\models\User',
                //เรียกใช้โมเดล user ของ dektrium
                ]
            ],
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => $baseUrl,
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@backend/themes/adminlte/views'
                ]
            ]
        ],
        'user' => [
            /* 'identityClass' => 'common\models\User',
              'enableAutoLogin' => true,
              'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true], */
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => true,
        ],
        'as access' => [
            'class' => 'mdm\admin\components\AccessControl',
            'allowActions' => [
                //module, controller, action ที่อนุญาตให้ทำงานโดยไม่ต้องผ่านการตรวจสอบสิทธิ์
                'site/*',
                //'admin/*',
                'some-controller/some-action',
            ]
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'BACKENDSESSION',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            //'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true, //ลบ index.php
            'rules' => [
                '' => 'site/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
//        'usuarioLdap' => [
//            'class' => 'yetopen\usuarioLdap\Module',
//            'ldapConfig' => [
//                'hosts' => ['10.107.1.200'],
//                'base_dn' => 'DC=intranet,DC=rtaf,DC=mi,DC=th',
//                'account_prefix' => 'cn=e_news',
//                'account_suffix' => ',CN=e_news,OU=comm,OU=RTAF,DC=intranet,DC=rtaf,DC=mi,DC=th',
//                'use_ssl' => true,
//                'username' => 'e_news',
//                'password' => 'Tommy#2020',
//            ],
//            'createLocalUsers' => TRUE,
//            'defaultRoles' => ['standardUser'],
//            'syncUsersToLdap' => TRUE,
//            'secondLdapConfig' => [
//                'hosts' => ['host.example.com'],
//                'base_dn' => 'dc=mydomain,dc=local',
//                'account_prefix' => 'cn=',
//                'account_suffix' => ',CN=e_news,OU=comm,OU=RTAF,DC=intranet,DC=rtaf,DC=mi,DC=th',
//                'username' => 'bind_username',
//                'password' => 'bind_password',
//            ],
//            'allowPasswordRecovery' => FALSE,
//            'passwordRecoveryRedirect' => ['/controller/action']
//        ],
    ],
    'params' => $params,
];
