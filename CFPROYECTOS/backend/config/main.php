<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
<<<<<<< HEAD:CFPROYECTOS/backend/config/main.php
        'urlManager' => ['enablePrettyUrl' => true,
=======
        'urlManager' => [
            'enablePrettyUrl' => true,
>>>>>>> 77890b5568d4447c747dad038d872ff209dbd1ec:cfproyecto/backend/config/main.php
            'showScriptName' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'apibt',
                    'pluralize' => false
                ],
            ],
        ],
//        'view' => [
//            'theme' => [
//                'basePath' => '@app/themes/azulguinda',
//                'baseUrl' => '@app/themes/azulguinda', /* Con esto modificamos el css que tiene la aplicacion de yii */
//                'pathMap' => [
//                    '@app/views' => '@app/themes/azulguinda/views'
//                ]
//            ]
//        ]
    ],
    'params' => $params,
];
