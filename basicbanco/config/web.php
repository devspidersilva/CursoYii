<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name'=>'minha aplicação',// se bçao botar nome por padrão irá ficar "My application
    'version'=>'1.2', // se não colocar por padrão fica 1.0
    /*'aliases'=>[
        'meualias1'=> 'path/to/meu/alias1'
    ],*/
    'language'=>'en',//
    'sourceLanguage'=>'pt-BR',//
    'timeZone'=>'America/Bahia',//
    'charset'=>'UTF-8',//
       /*
        *usado geralmente quando a aplicação está em mode de manutenção
        *trata todas as requisições atraves de uma unica action, 
        *basta informar a action e partir pro abraço
        *apenas para aplicações web
        */
    /*'catchAll'=>[
        'pessoas/index',
        'param1' => 'Anderson',
        'param2' => 'Silva'
    ],*/
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'agdljhsalkjdhsakljdhlkasdhljkasdkashdlkjashlkjdaslkjdljsakdasd',
        ],
        /** registrando um novo component
         * não precisa ser o mesmo nome da classe
         * o importante é colocar o nome da classe depois do namespace
         * 'string' é o atributo criado na classe MyComponent        
         * */
        'myComponent'=>[
            'class'=> 'app\classes\components\MyComponent',
            'string'=> 'Yii 2 Vídeos'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache'
            
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1']
    ];
}

return $config;
