<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'B-BEST RYDHA',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language'=>'id-ID',
    'components' => [
            'response' => [
            'formatters' => [
                'pdf' => [
                    'class' => 'robregonm\pdf\PdfResponseFormatter',
                    'mode' => '', // Optional
                    'format' => 'A4',  // Optional but recommended. http://mpdf1.com/manual/index.php?tid=184
                    'defaultFontSize' => 0, // Optional
                    'defaultFont' => '', // Optional
                    'marginLeft' => 15, // Optional
                    'marginRight' => 15, // Optional
                    'marginTop' => 16, // Optional
                    'marginBottom' => 16, // Optional
                    'marginHeader' => 9, // Optional
                    'marginFooter' => 9, // Optional
                    'orientation' => 'Landscape', // optional. This value will be ignored if format is a string value.
                    'options' => [
                        // mPDF Variables
                        // 'fontdata' => [
                            // ... some fonts. http://mpdf1.com/manual/index.php?tid=454
                        // ]
                    ]
                ],
            ]
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
        'i18n' => [
            'translations' => [
                'user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    
                ],
                'bbest' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@bbest/messages',
                    'sourceLanguage' => 'id-ID',
                    'fileMap' => [
                        'app' => 'app.php',
                        'user' => 'user.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'H3eBIWR0sl0KnnNNRwDbfEsLKTAV-RJf',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,

        ],
        'user' => [
                'class' => 'app\modules\user\components\User',
            ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
                'useFileTransport' => false,
                 'transport' => [
                        'class' => 'Swift_SmtpTransport',
                        'host'     => 'smtp.gmail.com',
                        'username'   => 'afairuzzabadi0@gmail.com',
                        'password'   => 'Bismillah_1',
                        'port'     => '587',
                        'encryption' => 'tls',
                ],
                'messageConfig' => [
                        'from' => 'afairuzzabadi0@gmail.com',
                        'charset' => 'UTF-8',
                 ]
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            //'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            ],
        ],

        'language' => 'id',
    ],
    'params' => $params,

     'modules' => [
                'user' => [
                    'class' => 'app\modules\user\Module',
                    
                ],
                 'modelClasses'  => [
                  'User' => 'app\modules\user\models\Role',
                  //'Profile' => 'app\models\MyProfile',
                ],
                 'reportico' => [
                    'class' => 'reportico\reportico\Module' ,
                    'controllerMap' => [
                                'reportico' => 'reportico\reportico\controllers\ReporticoController',
                                'mode' => 'reportico\reportico\controllers\ModeController',
                                'ajax' => 'reportico\reportico\controllers\AjaxController',
                        ]
                    ],
            ],
    ];



if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = [
     //   'class' => 'yii\debug\Module',
    //];

    /*$config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];*/
}

return $config;
